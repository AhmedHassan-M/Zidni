<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\University\AcademicYear;

class manageAcademicYear extends Controller
{
    public function updateCurrentYear(Request $request) {
        
        $name = $request->yearName;
        $description = $request->yearDescription;
        $firstSemesterPeriod = explode(" - ", $request->currentYearSemester_1);
        $firstSemesterSubmissionPeriod = explode(" - ", $request->currentYearApplicationSemester_1);
        $firstSemesterExamsPeriod = explode(" - ", $request->currentYearExamsSemester_1);
        $secondSemesterPeriod = explode(" - ", $request->currentYearSemester_2);
        $secondSemesterSubmissionPeriod = explode(" - ", $request->currentYearApplicationSemester_2);
        $secondSemesterExamsPeriod = explode(" - ", $request->currentYearExamsSemester_2);
        $id = $request->current_year;
        $currentTime = time();

        if($currentTime > strtotime($firstSemesterSubmissionPeriod[0]) && $currentTime < strtotime($secondSemesterExamsPeriod[1])){
            // return redirect()->back()->with('failure' , 'Select upcoming application period start date')->withInput();
            if(!empty($id)){
                $currentYear = AcademicYear::find($id);
                $currentYear->name = $name;
                $currentYear->description = $description;
                if(strtotime($firstSemesterPeriod[0]) > $currentTime || strtotime($firstSemesterPeriod[1]) > $currentTime || strtotime($firstSemesterSubmissionPeriod[0]) > $currentTime || strtotime($firstSemesterSubmissionPeriod[1]) > $currentTime || strtotime($firstSemesterExamsPeriod[0]) > $currentTime || strtotime($firstSemesterExamsPeriod[1]) > $currentTime || strtotime($secondSemesterPeriod[0]) > $currentTime || strtotime($secondSemesterPeriod[1]) > $currentTime || strtotime($secondSemesterSubmissionPeriod[0]) > $currentTime || strtotime($secondSemesterSubmissionPeriod[1]) > $currentTime || strtotime($secondSemesterExamsPeriod[0]) > $currentTime || strtotime($secondSemesterExamsPeriod[1]) > $currentTime){
                    $currentYear->semester_one_start = date("Y-m-d" , strtotime($firstSemesterPeriod[0]));
                    $currentYear->semester_one_end = date("Y-m-d" , strtotime($firstSemesterPeriod[1]));
                    $currentYear->semester_one_app_start = date("Y-m-d" , strtotime($firstSemesterSubmissionPeriod[0]));
                    $currentYear->semester_one_app_end = date("Y-m-d" , strtotime($firstSemesterSubmissionPeriod[1]));
                    $currentYear->semester_one_exam_start = date("Y-m-d" , strtotime($firstSemesterExamsPeriod[0]));
                    $currentYear->semester_one_exam_end = date("Y-m-d" , strtotime($firstSemesterExamsPeriod[1]));
                    $currentYear->semester_two_start = date("Y-m-d" , strtotime($secondSemesterPeriod[0]));
                    $currentYear->semester_two_end = date("Y-m-d" , strtotime($secondSemesterPeriod[1]));
                    $currentYear->semester_two_app_start = date("Y-m-d" , strtotime($secondSemesterSubmissionPeriod[0]));
                    $currentYear->semester_two_app_end = date("Y-m-d" , strtotime($secondSemesterSubmissionPeriod[1]));
                    $currentYear->semester_two_exam_start = date("Y-m-d" , strtotime($secondSemesterExamsPeriod[0]));
                    $currentYear->semester_two_exam_end = date("Y-m-d" , strtotime($secondSemesterExamsPeriod[1]));
                    $currentYear->save();
                }else{
                    return redirect()->back()->with('failure' , 'Select upcoming dates')->withInput();
                }

                return redirect()->back()->with('success' , 'Current academic year has been updated successfully');
            }else{
                return redirect()->back()->with('failure' , 'Visit upcoming year page so you can create a new academic year');
            }
        }else{
            return redirect()->back()->with('failure' , 'You are out of academic year range');
        }
    }

    public function createUpcomingYear(Request $request)
    {
        $name = $request->yearName;
        $description = $request->yearDescription;
        $firstSemesterPeriod = explode(" - ", $request->currentYearSemester_1);
        $firstSemesterSubmissionPeriod = explode(" - ", $request->currentYearApplicationSemester_1);
        $firstSemesterExamsPeriod = explode(" - ", $request->currentYearExamsSemester_1);
        $secondSemesterPeriod = explode(" - ", $request->currentYearSemester_2);
        $secondSemesterSubmissionPeriod = explode(" - ", $request->currentYearApplicationSemester_2);
        $secondSemesterExamsPeriod = explode(" - ", $request->currentYearExamsSemester_2);
        $currentTime = time();

        $upcomingYear = AcademicYear::orderBy('semester_one_app_start' , 'desc')->first();

        if($currentTime < strtotime($upcomingYear->semester_one_app_start)){
            $newYear = $upcomingYear;
            $msg = 'Upcoming academic year updated successfully';
        }else{
            $newYear = new AcademicYear;
            $msg = 'Upcoming academic year added successfully';
        }

        $newYear->name = $name;
        $newYear->description = $description;
        if(strtotime($firstSemesterPeriod[0]) > $currentTime || strtotime($firstSemesterPeriod[1]) > $currentTime || strtotime($firstSemesterSubmissionPeriod[0]) > $currentTime || strtotime($firstSemesterSubmissionPeriod[1]) > $currentTime || strtotime($firstSemesterExamsPeriod[0]) > $currentTime || strtotime($firstSemesterExamsPeriod[1]) > $currentTime || strtotime($secondSemesterPeriod[0]) > $currentTime || strtotime($secondSemesterPeriod[1]) > $currentTime || strtotime($secondSemesterSubmissionPeriod[0]) > $currentTime || strtotime($secondSemesterSubmissionPeriod[1]) > $currentTime || strtotime($secondSemesterExamsPeriod[0]) > $currentTime || strtotime($secondSemesterExamsPeriod[1]) > $currentTime){
            $newYear->semester_one_start = date("Y-m-d" , strtotime($firstSemesterPeriod[0]));
            $newYear->semester_one_end = date("Y-m-d" , strtotime($firstSemesterPeriod[1]));
            $newYear->semester_one_app_start = date("Y-m-d" , strtotime($firstSemesterSubmissionPeriod[0]));
            $newYear->semester_one_app_end = date("Y-m-d" , strtotime($firstSemesterSubmissionPeriod[1]));
            $newYear->semester_one_exam_start = date("Y-m-d" , strtotime($firstSemesterExamsPeriod[0]));
            $newYear->semester_one_exam_end = date("Y-m-d" , strtotime($firstSemesterExamsPeriod[1]));
            $newYear->semester_two_start = date("Y-m-d" , strtotime($secondSemesterPeriod[0]));
            $newYear->semester_two_end = date("Y-m-d" , strtotime($secondSemesterPeriod[1]));
            $newYear->semester_two_app_start = date("Y-m-d" , strtotime($secondSemesterSubmissionPeriod[0]));
            $newYear->semester_two_app_end = date("Y-m-d" , strtotime($secondSemesterSubmissionPeriod[1]));
            $newYear->semester_two_exam_start = date("Y-m-d" , strtotime($secondSemesterExamsPeriod[0]));
            $newYear->semester_two_exam_end = date("Y-m-d" , strtotime($secondSemesterExamsPeriod[1]));
            $newYear->save();
        }else{
            return redirect()->back()->with('error' , 'Select upcoming dates')->withInput();
        }

        return redirect()->back()->with('success' , $msg);
    }

    public function addUpcomingYear() {

        $currentTime = time();
        $upcomingYear = AcademicYear::orderBy('semester_one_app_start' , 'desc')->first();

        if($currentTime < strtotime($upcomingYear->semester_one_app_start)){
            return view('admin-university.registration-year.upcoming-year')->withUpcomingYear($upcomingYear);
        }

        return view('admin-university.registration-year.upcoming-year');
    
    }

    public function editCurrentYear() {

        $currentTime = time();
        $currentYears = AcademicYear::orderBy('semester_one_app_start' , 'desc')->get();

        for($i = 0 ; $i < count($currentYears) ; $i++){
            if($currentTime > strtotime($currentYears[$i]->semester_one_app_start) && $currentTime < strtotime($currentYears[$i]->semester_two_exam_end)){
                $currentYear = $currentYears[$i];
                return view('admin-university.registration-year.current-year')->withCurrentYear($currentYear);
            }
        }

        return view('admin-university.registration-year.current-year');
    }
}
