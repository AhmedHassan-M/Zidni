<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\University\Application;
use App\User;
use App\University\Activity;
use App\University\Document;
use App\University\Field;

class manageApplication extends Controller
{
    public function applicationFirstStep() {
        $specializations = Field::all();
        $currentUser = User::find(Auth::user()->id);
        return view('university.registration.registration-step-one')->withSpecializations($specializations)->withCurrentUser($currentUser);
    
    }

    public function Apply(Request $request)
    {
        $phone = $request->studentPhone;
        $full_phone = $request->full_phone;
        $timezone = $request->studentTimeZone;
        $passport = $request->studentPassport;
        $passport_name = $request->studentPassportNameEn;
        $name_ar = $request->studentNameAr;
        $birth_day = $request->studentBrithDay.' '.$request->studentBrithMonth.' '.$request->studentBrithYear;
        $citizenship = $request->studentCitizenship;
        $marital_status = $request->studentMaritalStatus;
        $gender = $request->studentGender;
        $country = $request->studentCountry;
        $employment = $request->studentCurrentEmployment;
        $certificate = $request->studentCertificate;
        $graduation = $request->studentGraduationYear;
        $specialization_id = $request->studentSpecialization;
        $currentUser = Auth::user();

        $validator = Validator::make(['user_id' => $currentUser->id], [
            'user_id' => 'unique:applications,user_id',
        ]);

        if($validator->fails()){
            $application = $currentUser->application;
        }else{
            $application = new Application;
        }
        
        $application->phone = $phone;
        $application->full_phone = $full_phone;
        $application->timezone = $timezone;
        $application->passport = $passport;
        $application->passport_name = $passport_name;
        $application->name_ar = $name_ar;
        $application->birth_date = $birth_day;
        $application->citizenship = $citizenship;
        $application->marital_status = $marital_status;
        $application->gender = $gender;
        $application->country = $country;
        $application->employment = $employment;
        $application->certificate = $certificate;
        $application->graduate_year = $graduation;
        $application->step = 1;
        $application->status = 0;
        $application->specialization_id = $specialization_id;
        $application->user_id = Auth::user()->id;
        $application->save();

        return redirect()->back()->with('success' , 'Your application has been sent successfully and waiting for review');
    }

    public function allApplications() {

        $applications = Application::has('user')->latest()->get();
        return view('admin-university.applicant.all-applicant')->withApplications($applications);
    
    }

    public function allAcceptedApplications() {

        $applications = Application::has('user')->where('acceptance' , 1)->latest()->get();
        return view('admin-university.applicant.accepted-applicant')->withApplications($applications);
    
    }
    
    public function allRejectedApplications() {

        $applications = Application::has('user')->where('acceptance' , 0)->latest()->get();
        return view('admin-university.applicant.rejected-applicant')->withApplications($applications);
    
    }

    public function deleteApplication(Request $request)
    {
        $id = $request->id;
        $application = Application::find($id);

        $application->delete();
        return response()->json('success');
    }

    public function applicantProfile($id) 
    {
        $application = Application::find($id);

        if($application->step <= 1){
            $application->reviewed_at = new \DateTime();
            $application->save();
        }
        
        return view('admin-university.applicant.applicant-profile')->withApplication($application);
    }

    public function updateApplicantStatus(Request $request , $id)
    {
        if($request->applicantOnlineDocumentsStatus){
            $firstChoice = 'applicantCompletedOnlineDocuments';
            $secondChoice = 'applicantRequiredOnlineDocuments';
            $thirdChoice = 'applicantRejectOnlineDocuments';
            $status = $request->applicantOnlineDocumentsStatus;
        }elseif($request->applicantOfflineDocumentsStatus){
            $firstChoice = 'applicantCompletedOfflineDocuments';
            $secondChoice = 'applicantRequiredOfflineDocuments';
            $thirdChoice = 'applicantRejectOfflineDocuments';
            $status = $request->applicantOfflineDocumentsStatus;
        }elseif($request->applicantPaymentStatus){
            $firstChoice = 'applicantCompletedPayment';
            $thirdChoice = 'applicantRejectPayment';
            $status = $request->applicantPaymentStatus;
        }

        $activity = new Activity;

        $application = Application::find($id);

        if($status == 'completed'){
            $application->status = 1;
            $application->step = 2;
            $application->details = NULL;
            $details = $request->$firstChoice;
        }elseif($status == 'request-documents'){
            $application->status = 1;
            $details = $request->$secondChoice;
            $application->details = $details;
        }elseif($status == 'rejected-applicant'){
            $application->status = 0;
            $details = $request->$thirdChoice;
            $application->details = $details;
            $application->acceptance = 0; // Application rejected
        }

        $application->save();

        $activity = new Activity;
        $activity->activity = $status;
        $activity->application_id = $application->id;
        $activity->save();

        return redirect()->back()->with('success' , 'Applicant status updated successfully');
    }

    public function applicationSecondStep() {
        $currentUser = User::find(Auth::user()->id);

        if($currentUser->application->step >= 1){
            if($currentUser->application->status == 1){
                return view('university.registration.registration-step-two');
            }
        }
        
        return redirect()->back();
    }

    public function uploadDocuments(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $application = $user->application;
        $application->step = 2;
        $application->status = 0;
        $application->save();
        
        if($user->has('application.document')->exists()){
            $document = $user->application->document;
            $document->application_id = $user->application->id;
        }else{
            $document = new Document;
            $document->application_id = $user->application->id;
        }

        $firstFile = $this->uploadFiles($document , $request->filepond_1[0] , 'file1');

        if($firstFile){
            $document->file1 = $firstFile;
        }

        $secondFile = $this->uploadFiles($document , $request->filepond_2[0] , 'file2');

        if($secondFile){
            $document->file2 = $secondFile;
        }

        $thirdFile = $this->uploadFiles($document , $request->filepond_3[0] , 'file3');

        if($thirdFile){
            $document->file3 = $thirdFile;
        }
        
        $document->save();

        return response()->json('success');
    }

    public function applicationThirdStep() {
        $currentUser = User::find(Auth::user()->id);

        if($currentUser->application->step >= 2){
            if($currentUser->application->status == 1){
                return view('university.registration.registration-step-three')->withCurrentUser($currentUser);
            }
        }

        return redirect()->back();
    }
}
