<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Adminnotify;
use App\Category;
use App\Week;
use App\Lesson;
use App\Course;
use App\Content;
use App\Subscribe;
use Validator;
use App\Quiz;
use App\Instructor;
use App\Enroll;
use App\Specialization;
use App\Enrollspecialization;
use App\Specialprogress;
use App\Master;
use App\Enrollmaster;
use App\Masterprogress;
use App\Coursemaster;
use App\Coursespec;
use App\Announcement;
use App\User;

class contentController extends Controller
{
    public function index()
    {
        $masters = Master::latest()->limit(6)->get();
        $specializations = Specialization::latest()->limit(6)->get();
        $topCategories = Category::latest()->has('courses')->limit(3)->get();
        $coursesCount = count(Course::all());

        return view('site.index')->withMasters($masters)->withSpecializations($specializations)->withTopCategories($topCategories)->withCoursesCount($coursesCount);
        return view('site.home-page.courses-types');
        return view('site.home-page.master-slider')->withMasters($masters);
        return view('site.home-page.specialization-slider')->withSpecializations($specializations);
        return view('site.home-page.live-slider');
        return view('site.home-page.top-categories')->withTopCategories($topCategories);
        return view('site.home-page.testimonial');
        return view('site.home-page.authorize');
    }

    public function getAllCategories(){
        $categories = Category::all();
        $courses = Course::all();
        return view('site.all-categories.all-categories')->withCourses($courses);
    }

    public function getCourse($id)
    {
        $course = Course::find($id);

        if(Auth::check()){
            $alreadyEnrolled = Enroll::where('user_id',Auth::user()->id)->where('course_id',$course->id)->get();
        }else{
            $alreadyEnrolled = [];
        }
        return view('site.courses.courses-index')->withCourse($course)->withAlreadyEnrolled($alreadyEnrolled);

        return view('site.courses.courses-header')->withCourse($course)->withAlreadyEnrolled($alreadyEnrolled);
    }

    public function getCourseContent($id){
        $course = Course::find($id);
        //$lesson = Lesson::find($z);
        $weeks = $course->weeks;
        $quizzes = Quiz::all();
        
        if(count($weeks) > 0){
            $lessons = Lesson::where('week_id',$weeks[0]->id)->get();
            if(count($lessons) > 0){
                $lesson = $lessons[0];
            }
        }else{
            $lesson = [];
        }

        $enroll = Enroll::where('user_id',Auth::user()->id)->where('course_id',$course->id)->get();

        if(count($enroll) > 0 && count($weeks) > 0){
            $enroll[0]->last_lesson = $lesson->id;
            $enroll[0]->save();
        }

        return view('site.courses.course-content')->withCourse($course)->withLesson($lesson)->withQuizzes($quizzes)->withEnroll($enroll);
    }

    public function getLessonContent($id,$z)
    {
        $course = Course::find($id);
        $lesson = Lesson::find($z);
        $quizzes = Quiz::all();

        $enroll = Enroll::where('user_id',Auth::user()->id)->where('course_id',$course->id)->get();
        
        if(count($enroll) > 0){
            $enroll[0]->last_lesson = $lesson->id;
            $enroll[0]->save();
        }

        return view('site.courses.course-content')->withCourse($course)->withLesson($lesson)->withQuizzes($quizzes)->withEnroll($enroll);
    }

    public function selectCategory(Request $request)
    {
        $id = $request->id;

        if($id == 0){
            $courses = Course::with('instructor:id,full_name')->latest()->get();
        }else{
            $category = Category::find($id);
            $courses = $category->courses()->with('instructor:id,full_name')->get();
        }

        return response()->json($courses);
    }

    public function getMyCourses(){
        $enrolledCurrent = Enroll::where('user_id',Auth::user()->id)->where('progress','<',100)->latest()->get();
        $enrolledFinished = Enroll::where('user_id',Auth::user()->id)->where('progress',100)->latest()->get();

        $enrolledSpecializationCurrent = Enrollspecialization::where('user_id',Auth::user()->id)->where('progress','<',100)->latest()->get();
        $enrolledSpecializationFinished = Enrollspecialization::where('user_id',Auth::user()->id)->where('progress',100)->latest()->get();

        $enrolledMasterCurrent = Enrollmaster::where('user_id',Auth::user()->id)->where('progress','<',100)->latest()->get();
        $enrolledMasterFinished = Enrollmaster::where('user_id',Auth::user()->id)->where('progress',100)->latest()->get();

        $randomEnrolledCourse = Enroll::where('user_id',Auth::user()->id)->inRandomOrder()->first();
        if(empty($randomEnrolledCourse)){
            $recommendedCourses = Course::inRandomOrder()->whereDoesntHave('enroll' , function ($query) {
                $query->where('user_id' , Auth::user()->id);
            })->limit(6)->get();
            //return $recommendedCourses;
        }else{
            $course = Course::find($randomEnrolledCourse->course_id);
            $recommendedCourses = Course::where('category_id' , $course->category_id)->whereDoesntHave('enroll' , function ($query) {
                $query->where('user_id' , Auth::user()->id);
            })->latest()->limit(6)->get();
        }

        return view('site.my-courses.my-courses')->withEnrolledCurrent($enrolledCurrent)->withEnrolledFinished($enrolledFinished)->withEnrolledSpecializationCurrent($enrolledSpecializationCurrent)->withEnrolledSpecializationFinished($enrolledSpecializationFinished)->withEnrolledMasterCurrent($enrolledMasterCurrent)->withEnrolledMasterFinished($enrolledMasterFinished)->withRecommendedCourses($recommendedCourses);
    }
    //1
    public function vision_mission()
    {
        $items = Content::where('type','visionMission')->first();
        return view('admin.manage-content.vision-mission',['items'=>$items]);
    }  
    public function vision_mission_process(Request $request)
    {
        $item  = Content::where('id',1)->first();
        $item->value =  $request->input('visionMission');
        $item->type = 'visionMission';
        $item->save();
        return redirect('/admin/vision-mission');
    }
    //2
    public function how_to_learn()
    {
        $items = Content::where('type','howToLearn')->get();
        return view('admin.manage-content.how-to-learn',['items'=>$items]);
    }  
    public function how_to_learn_process(Request $request)
    {
        $item  = Content::where('id',2)->first();
        $item->value =  $request->input('howToLearn');
        $item->type = 'howToLearn';
        $item->save();
        return redirect('/admin/how-to-learn');
    }
    //3
    public function Agreement()
    {
        $items = Content::where('type','Agreement')->get();
        return view('admin.manage-content.agreement',['items'=>$items]);
    }  
    public function Agreement_process(Request $request)
    {
        $item  = Content::where('id',3)->first();
        $item->value =  $request->input('Agreement');
        $item->type = 'Agreement';
        $item->save();
        return redirect('/admin/agreement');
    }
    //4
    public function board_of_advisor()
    {
        $items = Content::where('type','BoardOfAdvisor')->get();
        return view('admin.manage-content.board-of-advisor',['items'=>$items]);
    }  
    public function board_of_advisor_process(Request $request)
    {
        $item  = Content::where('id',4)->first();
        $item->value =  $request->input('BoardOfAdvisor');
        $item->type = 'BoardOfAdvisor';
        $item->save();
        return redirect('/admin/board-of-advisor');
    }
    //5
    // public function instructors()
    // {
    //     $items = Content::where('type','instructors')->get();
    //     return view('admin.manage-content.instructors',['items'=>$items]);
    // }  
    // public function instructors_process(Request $request)
    // {
    //     $item  = Content::where('id',5)->first();
    //     $item->value =  $request->input('instructors');
    //     $item->type = 'instructors';
    //     $item->save();
    //     return redirect('/admin/instructors');
    // }
    //6
    public function police()
    {
        $items = Content::where('type','police')->get();
        return view('admin.manage-content.police',['items'=>$items]);
    }  
    public function police_process(Request $request)
    {
        $item  = Content::where('id',6)->first();
        $item->value =  $request->input('police');
        $item->type = 'police';
        $item->save();
        return redirect('/admin/police');
    }
    //7
    public function AboutUs()
    {
        $items = Content::where('type','AboutUs')->get();
        return view('admin.manage-content.about-us',['items'=>$items]);
    }  
    public function AboutUs_process(Request $request)
    {
        $item  = Content::where('id',7)->first();
        $item->value =  $request->input('AboutUs');
        $item->type = 'AboutUs';
        $item->save();
        return redirect('/admin/about-us');
    }
    //8
    public function faq()
    {
        $items = Content::where('type','FAQ')->get();
        return view('admin.manage-content.faq',['items'=>$items]);
    }  
    public function faq_process(Request $request)
    {
        $item  = Content::where('id',8)->first();
        $item->value =  $request->input('FAQ');
        $item->type = 'FAQ';
        $item->save();
        return redirect('/admin/faq');
    }
    //9
    public function help()
    {
        $items = Content::where('type','help')->get();
        return view('admin.manage-content.help',['items'=>$items]);
    }  
    public function help_process(Request $request)
    {
        $item  = Content::where('id',9)->first();
        $item->value =  $request->input('help');
        $item->type = 'help';
        $item->save();
        return redirect('/admin/help');
    }
    public function subscrib(Request $request)
    {
        $v = Validator::make(request()->all(), [
            'subscribeInput' => 'string|email|unique:Subscribes,email',
            ]);
    
            if ($v->fails()) {
                return response()->json(['success' =>false,'message'=> $v ->errors()->all()]);
            }
            $subscrib  = new Subscribe;
            $subscrib->email =  $request->subscribeInput;
            $subscrib->save();
            return response()->json([
                'status'=> 200,
                'success' =>true,
                'message'=> 'Subscribe created successfully',
                'data'=>$subscrib
            ]);
    }
    public function getsubscrib()
    {
        $subscribs = Subscribe::all();
        return view('admin.subscribe-inbox.subscribe-inbox',['subscribs'=> $subscribs]);
    }
    public function deletsubscrib(Request $request)
    { 
       $subscrib = Subscribe::find($request->id);
       $subscrib->delete();
       return  response()->json([
        'status'=> 200,
        'success' =>true,
        'message'=> 'Subscribe deleted successfully',
        ]);
    }
    public function allSpecializations()
    {
        $specializations = Specialization::latest()->get();
        return view('site.specialization.all-specialization')->withSpecializations($specializations);
    }
    public function getSpecialization($id)
    {
        $specialization = Specialization::find($id);
        $courses = $specialization->courses;
        $a = array();
        foreach($courses as $course){
                array_push($a,$course->instructor_id);
        }
        $instructorsID = array_unique($a);
        $instructors = Instructor::whereIn('id',$instructorsID)->get();

        if(Auth::check()){
            $alreadyEnrolled = Enrollspecialization::where('user_id',Auth::user()->id)->where('specialization_id',$id)->get();
        }else{
            $alreadyEnrolled = [];
        }

        return view('site.specialization.specialization-index')->withSpecialization($specialization)->withInstructors($instructors)->withAlreadyEnrolled($alreadyEnrolled);

        return view('site.specialization.specialization-header')->withSpecialization($specialization)->withInstructors($instructors)->withAlreadyEnrolled($alreadyEnrolled);
    }
    public function getSpecializationCourses($id){
        $specialization = Specialization::find($id);
        $courses = $specialization->courses;
        $enroll = Enrollspecialization::where('user_id',Auth::user()->id)->where('specialization_id',$specialization->id)->get();
        
        if(count($enroll) == 0){
            return redirect('/specialization/'.$id);
        }else{
            $enrollID = $enroll[0]->id;
            $savedCourses = Specialprogress::where('enroll_id',$enrollID)->get();

            $a = array();
            foreach($savedCourses as $savedCourse){
                array_push($a,$savedCourse->course_id);
            }

            foreach($specialization->courses as $k => $course){
                if(!in_array($course->id , $a)){
                    $progress = new Specialprogress;
                    $progress->enroll_id = $enrollID;
                    $progress->course_id = $course->id;
                    $progress->save();
                }
            }
            return view('site.courses.courses-list')->withSpecialization($specialization)->withCourses($courses)->withEnroll($enroll)->withSavedCourses($savedCourses);
        }
    }
    public function getSpecializationCourseContent($s,$id)
    {
        $course = Course::find($id);
        $weeks = $course->weeks;

        foreach($weeks as $week){
            $lessons = $week->lesson;
        
            if(count($lessons) == 0){
                return redirect('/404');
            }else{
                $lesson = $lessons[0]->id;
                return redirect('/specialization/course-content/'.$s.'/'.$id.'/'.$lesson);
            }
        }
        return redirect('/404');
    }
    public function getSpecializationLesson($s,$id,$l)
    {
        $specialization = Specialization::find($s);
        $enroll = Enrollspecialization::where('user_id',Auth::user()->id)->where('specialization_id',$specialization->id)->get();

        if(count($enroll) > 0){
            $enrollID = $enroll[0]->id;

            $savedCourses = Specialprogress::where('enroll_id',$enrollID)->get();

            $a = array();
            foreach($savedCourses as $savedCourse){
                array_push($a,$savedCourse->course_id);
            }

            foreach($specialization->courses as $k => $course){
                if(!in_array($course->id , $a)){
                    $progress = new Specialprogress;
                    $progress->enroll_id = $enrollID;
                    $progress->course_id = $course->id;
                    $progress->save();
                }
            }

            $updatedCourses = Specialprogress::where('enroll_id',$enrollID)->get();
            
        }

        $course = Course::find($id);
        $lesson = Lesson::find($l);

        if(count($enroll) > 0){
            $enroll[0]->last_lesson = $lesson->id;
            $enroll[0]->save();
        }

        $quizzes = Quiz::all();
        
        $currentEnroll = Specialprogress::where('enroll_id',$enrollID)->where('course_id',$course->id)->get();

        return view('site.specialization.course-content')->withSpecialization($specialization)->withCourse($course)->withLesson($lesson)->withQuizzes($quizzes)->withEnroll($enroll)->withUpdatedCourses($updatedCourses)->withCurrentEnroll($currentEnroll);
    }
    public function getAllMasters()
    {
        $masters = Master::latest()->get();
        return view('site.masters-degree.all-masters')->withMasters($masters);
    }
    public function getMasterDegree($id)
    {
        $master = Master::find($id);

        $courses = $master->courses;
        $a = array();
        foreach($courses as $course){
                array_push($a,$course->instructor_id);
        }
        $instructorsID = array_unique($a);
        $instructors = Instructor::whereIn('id',$instructorsID)->get();

        if(Auth::check()){
            $alreadyEnrolled = Enrollmaster::where('user_id',Auth::user()->id)->where('master_id',$master->id)->get();
        }else{
            $alreadyEnrolled = [];
        }
        return view('site.masters-degree.masters-index')->withMaster($master)->withAlreadyEnrolled($alreadyEnrolled)->withInstructors($instructors);

        return view('site.masters-degree.masters-header')->withMaster($master)->withAlreadyEnrolled($alreadyEnrolled)->withInstructors($instructors);
    }
    public function getMasterCourses($id)
    {
        $master = Master::find($id);
        $courses = $master->courses;
        $enroll = Enrollmaster::where('user_id',Auth::user()->id)->where('master_id',$master->id)->get();
        
        if(count($enroll) == 0){
            return redirect('/masters-degree/'.$id);
        }else{
            $enrollID = $enroll[0]->id;
            $savedCourses = Masterprogress::where('enroll_id',$enrollID)->get();

            $a = array();
            foreach($savedCourses as $savedCourse){
                array_push($a,$savedCourse->course_id);
            }

            foreach($master->courses as $k => $course){
                if(!in_array($course->id , $a)){
                    $progress = new Masterprogress;
                    $progress->enroll_id = $enrollID;
                    $progress->course_id = $course->id;
                    $progress->save();
                }
            }
        return view('site.masters-degree.courses-list')->withMaster($master)->withCourses($courses)->withEnroll($enroll)->withSavedCourses($savedCourses);
        }
    }
    public function getMasterCourseContent($m,$id)
    {
        $course = Course::find($id);
        $weeks = $course->weeks;

        foreach($weeks as $week){
            $lessons = $week->lesson;
        
            if(count($lessons) == 0){
                return redirect('/404');
            }else{
                $lesson = $lessons[0]->id;
                return redirect('/master-degree/course-content/'.$m.'/'.$id.'/'.$lesson);
            }
        }

        return redirect('/404');
    }
    public function getMasterLesson($m,$id,$l)
    {
        $master = Master::find($m);
        $enroll = Enrollmaster::where('user_id',Auth::user()->id)->where('master_id',$master->id)->get();

        if(count($enroll) > 0){
            $enrollID = $enroll[0]->id;

            $savedCourses = Masterprogress::where('enroll_id',$enrollID)->get();

            $a = array();
            foreach($savedCourses as $savedCourse){
                array_push($a,$savedCourse->course_id);
            }

            foreach($master->courses as $k => $course){
                if(!in_array($course->id , $a)){
                    $progress = new Masterprogress;
                    $progress->enroll_id = $enrollID;
                    $progress->course_id = $course->id;
                    $progress->save();
                }
            }

            $updatedCourses = Masterprogress::where('enroll_id',$enrollID)->get();
            
        }

        $course = Course::find($id);
        $weeks = $course->weeks;
        $a = array();
        foreach($weeks as $week){
            array_push($a,$week->id);
        }
        
        $lessons = Lesson::whereIn('week_id',$a)->get();

        $default = array();
        foreach($lessons as $lessonss){
            array_push($default,0);
        }

        $lesson = Lesson::find($l);

        if(count($enroll) > 0){
            $enroll[0]->last_lesson = $lesson->id;
            $enroll[0]->save();
        }

        $quizzes = Quiz::all();
        
        $currentEnroll = Masterprogress::where('enroll_id',$enrollID)->where('course_id',$course->id)->get();

        return view('site.masters-degree.course-content')->withMaster($master)->withCourse($course)->withLesson($lesson)->withQuizzes($quizzes)->withEnroll($enroll)->withUpdatedCourses($updatedCourses)->withCurrentEnroll($currentEnroll)->withDefault($default);
    }
    public function allInstructors()
    {
        $instrucuors = Instructor::latest()->get();

        return view('site.instructor.instructor-index')->withInstructors($instrucuors);

        return view('site.instructor.instructor-header')->withInstructors($instrucuors);
    }

    public function topCategoryCourses(Request $request)
    {
        $id = $request->categoryID;

        if($id == 'all'){
            $courses = Course::limit(6)->get();
        }else{
            $courses = Course::where('category_id' , $id)->with('instructor')->withCount('enroll')->latest()->limit(6)->get();
        }
        
        return response()->json($courses);
    }

    public function selectNavbarCategory(Request $request)
    {
        $id = $request->menuCategory;

        $latestCategory = Category::find($id);
        $CoursesID = $latestCategory->courses()->select('id')->get();
        $navMastersID = Coursemaster::whereIn('course_id' , $CoursesID)->select('master_id')->latest()->get();
        $navMasters = Master::whereIn('id' , $navMastersID)->latest()->limit(6)->get();

        $navSpecialID = Coursespec::whereIn('course_id' , $CoursesID)->select('specialization_id')->latest()->get();
        $navSpecial = Specialization::whereIn('id' , $navSpecialID)->latest()->limit(6)->get();

        return response()->json(["masterDegree" => $navMasters , "specializations" => $navSpecial]);
    }

    public function sendAnnouncements(Request $request)
    {
        $title = $request->announcementTitle;
        $text = $request->announcementText;

        $announcement = new Announcement;
        $announcement->title = $title;
        $announcement->text = $text;
        $announcement->save();

        $students = User::where('admin', 0)->get();

        foreach ($students as $key => $student) {
            $to = $student->email;
            $subject = $announcement->title;
            $txt = $announcement->text;
            $headers = "From: admin@zidni.com";

            mail($to,$subject,$txt,$headers);
        }
        

        return response()->json('success');
    }

    public function profile()
    {
        if(Auth::user()->admin != 1){
            $announcements = Announcement::latest()->get();
            return view('site.profile.profile')->withAnnouncements($announcements);
        }else{
            return redirect("/404");
        }
    }

    public function getMyActivity()
    {
        $enroll = Enroll::where('user_id' , Auth::user()->id)->orderBy('updated_at' , 'desc')->first();
        $enrollMaster = Enrollmaster::where('user_id' , Auth::user()->id)->orderBy('updated_at' , 'desc')->first();
        $enrollSpec = Enrollspecialization::where('user_id' , Auth::user()->id)->orderBy('updated_at' , 'desc')->first();

        $latestCourseActivity = date("0000-00-00 00:00:00");
        $latestMasterActivity = date("0000-00-00 00:00:00");
        $latestSpecActivity = date("0000-00-00 00:00:00");

        $courseLastLesson = NULL;
        $masterLastLesson = NULL;
        $masterLastCourse = NULL;
        $specLastLesson = NULL;
        $specLastCourse = NULL;
        $courses = NULL;
        $masters = NULL;
        $specializations = NULL;
        $enrollContinueWatch = NULL;
        $enrollMasterContinueWatch = NULL;
        $enrollSpecContinueWatch = NULL;

        if(!empty($enroll)){

            $latestCourseActivity = date($enroll->updated_at);

            if($enroll->last_lesson == 0){
                $course = Course::find($enroll->course_id);
                $week = $course->weeks()->select('id')->first();
                $lesson = $week->lesson()->first();
                $courseLastLesson = $lesson->id;
            }else{
                $courseLastLesson = $enroll->last_lesson;
            }

            if($enroll->progress >= 100){
                $enrollContinueWatch = Enroll::where('user_id' , Auth::user()->id)->where('progress' , '<' , 100)->orderBy('updated_at' , 'desc')->first();
                if(!empty($enrollContinueWatch)){
                    $courses = Course::find($enrollContinueWatch->course_id);
                }else{
                    $courses = NULL;
                }
                
            }else{
                $enrollContinueWatch = $enroll;
                $courses = Course::find($enroll->course_id);
            }

        }
        if(!empty($enrollMaster)){

            $latestMasterActivity = date($enrollMaster->updated_at);
            $masterLastLesson = $enrollMaster->last_lesson;
            if($masterLastLesson != 0){
                $lesson = Lesson::find($masterLastLesson);
                $week = Week::find($lesson->week_id);
                $course = Course::find($week->course_id);
                $masterLastCourse = $course->id;
            }else{
                $masterLastCourse = 0;
            }

            if($enrollMaster->progress >= 100){
                $enrollMasterContinueWatch = Enrollmaster::where('user_id' , Auth::user()->id)->where('progress' , '<' , 100)->orderBy('updated_at' , 'desc')->first();
                if(!empty($enrollMasterContinueWatch)){
                    $masters = Master::find($enrollMasterContinueWatch->master_id);
                }else{
                    $masters = NULL;
                }
                
            }else{
                $enrollMasterContinueWatch = $enrollMaster;
                $masters = Master::find($enrollMaster->master_id);
            }

        }
        if(!empty($enrollSpec)){

            $latestSpecActivity = date($enrollSpec->updated_at);
            $specLastLesson = $enrollSpec->last_lesson;
            if($specLastLesson != 0){
                $lesson = Lesson::find($specLastLesson);
                $week = Week::find($lesson->week_id);
                $course = Course::find($week->course_id);
                $specLastCourse = $course->id;
            }else{
                $specLastCourse = 0;
            }

            if($enrollSpec->progress >= 100){
                $enrollSpecContinueWatch = Enrollspecialization::where('user_id' , Auth::user()->id)->where('progress' , '<' , 100)->orderBy('updated_at' , 'desc')->first();
                if(!empty($enrollSpecContinueWatch)){
                    $specializations = Specialization::find($enrollSpecContinueWatch->specialization_id);
                }else{
                    $specializations = NULL;
                }
                
            }else{
                $enrollSpecContinueWatch = $enrollSpec;
                $specializations = Specialization::find($enrollSpec->specialization_id);
            }
        }

        $last = NULL;
        $type = NULL;

        if($latestCourseActivity > $latestMasterActivity && $latestCourseActivity > $latestSpecActivity){
            $last = Course::find($enroll->course_id);
            $type = 'course';
        }elseif($latestMasterActivity > $latestCourseActivity && $latestMasterActivity > $latestSpecActivity){
            $last = Master::find($enrollMaster->master_id);
            $type = 'master';
        }elseif($latestSpecActivity > $latestCourseActivity && $latestSpecActivity > $latestMasterActivity){
            $last = Specialization::find($enrollSpec->specialization_id);
            $type = 'specialization';
        }

        $topCategories = Category::latest()->has('courses')->limit(3)->get();
        $ourSpecializations = Specialization::latest()->has('courses')->limit(3)->get();
        $ourMasters = Master::latest()->has('courses')->limit(3)->get();

        //return [$latestCourseActivity, $latestMasterActivity ,$latestSpecActivity];
        return view('site.my-activity.my-activity')->withEnrollContinueWatch($enrollContinueWatch)->withEnrollMasterContinueWatch($enrollMasterContinueWatch)->withEnrollSpecContinueWatch($enrollSpecContinueWatch)->withLatestSpecActivity($latestSpecActivity)->withLatestCourseActivity($latestCourseActivity)->withLatestMasterActivity($latestMasterActivity)->withCourses($courses)->withMasters($masters)->withSpecializations($specializations)->withLast($last)->withType($type)->withCourseLastLesson($courseLastLesson)->withMasterLastLesson($masterLastLesson)->withMasterLastCourse($masterLastCourse)->withSpecLastLesson($specLastLesson)->withSpecLastCourse($specLastCourse)->withEnroll($enroll)->withEnrollMaster($enrollMaster)->withEnrollSpec($enrollSpec)->withTopCategories($topCategories)->withOurSpecializations($ourSpecializations)->withOurMasters($ourMasters);
    }
    public function getCertificate($t,$id) {

        if($t == 'course'){
            $enroll = Enroll::find($id);
            $recipient = User::find($enroll->user_id);
            $course = Course::find($enroll->course_id);
            $instructor = $course->instructor;

            return view('site.get-certificate.get-certificate')->withT($t)->withEnroll($enroll)->withRecipient($recipient)->withCourse($course)->withInstructor($instructor);
        }
        elseif($t == 'specialization'){
            $enroll = Enrollspecialization::find($id);
            $recipient = User::find($enroll->user_id);
            $course = Specialization::find($enroll->specialization_id);
            $specCourses = $course->courses;

            $specInstructors = array();
            foreach($specCourses as $specCourse){
                $instructor = $specCourse->instructor;
                $specInstructors[] = $instructor->full_name;
            }

            $unique_instructors = array_unique($specInstructors);
            
            return view('site.get-certificate.get-certificate')->withT($t)->withEnroll($enroll)->withRecipient($recipient)->withCourse($course)->withSpecCourses($specCourses)->with('unique_instructors' , $unique_instructors);
        }
        elseif($t == "master-degree"){
            $enroll = Enrollmaster::find($id);
            $recipient = User::find($enroll->user_id);
            $course = Master::find($enroll->master_id);
            $masterCourses = $course->courses;

            $masterInstructors = array();
            foreach($masterCourses as $masterCourse){
                $instructor = $masterCourse->instructor;
                $masterInstructors[] = $instructor->full_name;
            }

            $unique_instructors = array_unique($masterInstructors);
            
            return view('site.get-certificate.get-certificate')->withT($t)->withEnroll($enroll)->withRecipient($recipient)->withCourse($course)->withMasterCourses($masterCourses)->with('unique_instructors' , $unique_instructors);
        }

        
    }
    public function allAdminNotifications()
    {
        return view('admin.notifications.all-notifications');
    }
}

