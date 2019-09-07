<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Enroll;
use App\Course;
use App\Week;
use App\Lesson;
use App\Question;
use App\Answer;
use App\Specialization;
use App\enrollSpecialization;
use App\Specialprogress;
use App\Master;
use App\Enrollmaster;
use App\Masterprogress;
use App\Adminnotify;
use App\Count;

class enrollController extends Controller
{
    public function enrollCourse($id){
        $alreadyEnrolled = Enroll::where('user_id',Auth::user()->id)->where('course_id',$id)->get();

        if(count($alreadyEnrolled) > 0){
            return redirect('/courses/course-content/'.$id);
        }else{

            $enroll = new Enroll;
            $enroll->user_id = Auth::user()->id;
            $enroll->course_id = $id;
            $enroll->save();

            // Notification to Admin
            $course = Course::find($id);

            $text = "New Student ".Auth::user()->full_name." has enrolled in ".$course->name." course";
            $notification = new Adminnotify;
            $notification->title = "Course Enrollment";
            $notification->text = $text;
            $notification->link = "/admin/all-courses";
            $notification->save();

            $admins = User::where('admin',1)->get();

            foreach($admins as $admin){
                $available = Count::where('user_id',$admin->id)->get();

                if(count($available) == 0){
                    $count = new Count;
                    $count->user_id = $admin->id;
                    $count->number = 1;
                    $count->save();
                }else{
                    $available[0]->number = $available[0]->number + 1;
                    $available[0]->save();
                }
            }

            return redirect('/courses/course-content/'.$id);
        }
    }
    public function updateProgress(Request $request)
    {
        //return response()->json([$request->no,$request->currentLess,$request->currentCour]);
        $lessonsNo = $request->no;
        $currentLesson = $request->currentLess;
        $currentCourse = $request->currentCour;

        $course = Course::find($currentCourse);
        $weeksID = Week::where('course_id',$course->id)->select('id')->get();

        $lessons = Lesson::whereIn('week_id',$weeksID)->get();

        $enroll = Enroll::where('user_id',Auth::user()->id)->where('course_id',$course->id)->get();

        if(count($enroll) > 0){

            if(empty($enroll[0]->finished)){

                $progress = "";

                for($i = 0 ; $i < $lessonsNo ; $i++){
                    
                    if($lessons[$i]->id == $currentLesson){
                        $progress = $progress."1";
                    }else{
                        $progress = $progress."0";
                    }
                }

                $progressPrecentage = (1/$lessonsNo) * 100;

                $enroll[0]->finished = $progress;
                $enroll[0]->progress = $progressPrecentage;
                $enroll[0]->save();
                return response()->json($progress);
            }else{
                $oldProgress = str_split($enroll[0]->finished);
                $progress = "";
                $watched = 0;

                for($i = 0 ; $i < $lessonsNo ; $i++){
                    if($oldProgress[$i] == "0"){
                        if($lessons[$i]->id == $currentLesson){
                            $progress = $progress."1";
                            $watched++;
                        }else{
                            $progress = $progress."0";
                        }
                    }else{
                        $progress = $progress."1";
                        $watched++;
                    }
                }

                $progressPrecentage = ($watched/$lessonsNo) * 100;
                
                $enroll[0]->finished = $progress;
                $enroll[0]->progress = $progressPrecentage;
                $enroll[0]->save();
                return response()->json($lessons);
                return response()->json($progress);
            }
        }
    }
    public function answerQuestions(Request $request)
    {
        $questionNo = $request->questionNo;
        $result = 0;

        for($i = 1 ; $i <= $questionNo ; $i++){
            $questionReqName = "questionid".$i;
            $answerReqName = "quizTest".$i;

            $questionID = $request->$questionReqName;
            $question = Question::find($questionID);
            $score = $question->score;
            $correct = $request->$answerReqName;

            if($correct == 1){
                $result = $result + $score;
            }elseif($correct == 0){
                $result = $result + 0;
            }

            $quiz = $question->quiz;
            $passingScore = $quiz->passing_score;

        }
        $enrollID = $request->enrollID;
        $enroll = Enroll::find($enrollID);

        if($enroll->quiz == 0){
            if($result < $passingScore){
                $enroll->quiz = 0;
            }elseif($result >= $passingScore){
                $enroll->quiz = 1;
                $t=time();
                $enroll->certificate_date = date("Y-m-d",$t);
            }
            $enroll->save();
        }

        return response()->json($result);

    }
    public function enrollSpecialization($id){
        $alreadyEnrolled = Enrollspecialization::where('user_id',Auth::user()->id)->where('specialization_id',$id)->get();
        
        if(count($alreadyEnrolled) > 0){
            $enrollID = $alreadyEnrolled[0]->id;
            $savedCourses = Specialprogress::where('enroll_id',$enrollID)->get();

            $a = array();
            foreach($savedCourses as $savedCourse){
                array_push($a,$savedCourse->course_id);
            }

            $specialization = Specialization::find($id);

            foreach($specialization->courses as $k => $course){
                if(!in_array($course->id , $a)){
                    $progress = new Specialprogress;
                    $progress->enroll_id = $enrollID;
                    $progress->course_id = $course->id;
                    $progress->save();
                }
            }

            return redirect('/specialization/courses-list/'.$id);
        }else{

            $enroll = new Enrollspecialization;
            $enroll->user_id = Auth::user()->id;
            $enroll->specialization_id = $id;
            $enroll->save();

            $specialization = Specialization::find($id);

            foreach($specialization->courses as $course){
                $progress = new Specialprogress;
                $progress->enroll_id = $enroll->id;
                $progress->course_id = $course->id;
                $progress->save();
            }

            // Notification to Admin

            $text = "New Student ".Auth::user()->full_name." has enrolled in ".$specialization->name." specialization";
            $notification = new Adminnotify;
            $notification->title = "Specialization Enrollment";
            $notification->text = $text;
            $notification->link = "/admin/all-specializations";
            $notification->save();

            $admins = User::where('admin',1)->get();

            foreach($admins as $admin){
                $available = Count::where('user_id',$admin->id)->get();

                if(count($available) == 0){
                    $count = new Count;
                    $count->user_id = $admin->id;
                    $count->number = 1;
                    $count->save();
                }else{
                    $available[0]->number = $available[0]->number + 1;
                    $available[0]->save();
                }
            }

            return redirect('/specialization/courses-list/'.$id);
        }
    }
    public function answerSpecializationCourseQuestions(Request $request)
    {
        $questionNo = $request->questionNo;
        $result = 0;

        for($i = 1 ; $i <= $questionNo ; $i++){
            $questionReqName = "questionid".$i;
            $answerReqName = "quizTest".$i;

            $questionID = $request->$questionReqName;
            $question = Question::find($questionID);
            $score = $question->score;
            $correct = $request->$answerReqName;

            if($correct == 1){
                $result = $result + $score;
            }elseif($correct == 0){
                $result = $result + 0;
            }

            $quiz = $question->quiz;
            $passingScore = $quiz->passing_score;

        }
        $enrollID = $request->enrollID;
        $enroll = Specialprogress::find($enrollID);

        if($enroll->quiz == 0){
            if($result < $passingScore){
                $enroll->quiz = 0;
            }elseif($result >= $passingScore){
                $enroll->quiz = 1;
            }
            $enroll->save();
        }

        return response()->json($result);
    }
    public function enrollMasterDegree($id)
    {
        $alreadyEnrolled = Enrollmaster::where('user_id',Auth::user()->id)->where('master_id',$id)->get();
        
        if(count($alreadyEnrolled) > 0){
            $enrollID = $alreadyEnrolled[0]->id;
            $savedCourses = Masterprogress::where('enroll_id',$enrollID)->get();

            $a = array();
            foreach($savedCourses as $savedCourse){
                array_push($a,$savedCourse->course_id);
            }

            $master = Master::find($id);

            foreach($master->courses as $k => $course){
                if(!in_array($course->id , $a)){
                    $progress = new Masterprogress;
                    $progress->enroll_id = $enrollID;
                    $progress->course_id = $course->id;
                    $progress->save();
                }
            }

            return redirect('/master-degree/courses-list/'.$id);
        }else{

            $enroll = new Enrollmaster;
            $enroll->user_id = Auth::user()->id;
            $enroll->master_id = $id;
            $enroll->save();

            $master = master::find($id);

            foreach($master->courses as $course){
                $progress = new Masterprogress;
                $progress->enroll_id = $enroll->id;
                $progress->course_id = $course->id;
                $progress->save();
            }

            // Notification to Admin

            $text = "New Student ".Auth::user()->full_name." has enrolled in ".$master->name." master-degree";
            $notification = new Adminnotify;
            $notification->title = "Master-Degree Enrollment";
            $notification->text = $text;
            $notification->link = "/admin/all-masters";
            $notification->save();

            $admins = User::where('admin',1)->get();

            foreach($admins as $admin){
                $available = Count::where('user_id',$admin->id)->get();

                if(count($available) == 0){
                    $count = new Count;
                    $count->user_id = $admin->id;
                    $count->number = 1;
                    $count->save();
                }else{
                    $available[0]->number = $available[0]->number + 1;
                    $available[0]->save();
                }
            }

            return redirect('/master-degree/courses-list/'.$id);
        }
    }
    public function answerMasterCourseQuestions(Request $request)
    {
        $questionNo = $request->questionNo;
        $result = 0;

        for($i = 1 ; $i <= $questionNo ; $i++){
            $questionReqName = "questionid".$i;
            $answerReqName = "quizTest".$i;

            $questionID = $request->$questionReqName;
            $question = Question::find($questionID);
            $score = $question->score;
            $correct = $request->$answerReqName;

            if($correct == 1){
                $result = $result + $score;
            }elseif($correct == 0){
                $result = $result + 0;
            }

            $quiz = $question->quiz;
            $passingScore = $quiz->passing_score;

        }
        $enrollID = $request->enrollID;
        $enroll = Masterprogress::find($enrollID);

        if($enroll->quiz == 0){
            if($result < $passingScore){
                $enroll->quiz = 0;
            }elseif($result >= $passingScore){
                $enroll->quiz = 1;
            }
            $enroll->save();
        }

        return response()->json($result);
    }
    public function updateSpecializationProgress(Request $request){
        $lessonsNo = $request->no;
        $currentLesson = $request->currentLess;
        $currentCourse = $request->currentCour;
        $specializationID = $request->specialization;

        $course = Course::find($currentCourse);
        $weeksID = Week::where('course_id',$course->id)->select('id')->get();

        $lessons = Lesson::whereIn('week_id',$weeksID)->get();

        $enrollID = Enrollspecialization::where('user_id',Auth::user()->id)->where('specialization_id',$specializationID)->first();

  

        $enroll = Specialprogress::where('enroll_id',$enrollID->id)->where('course_id',$course->id)->get();

        if(count($enroll) > 0){

            if(empty($enroll[0]->finished)){

                $progress = "";

                for($i = 0 ; $i < $lessonsNo ; $i++){
                    
                    if($lessons[$i]->id == $currentLesson){
                        $progress = $progress."1";
                    }else{
                        $progress = $progress."0";
                    }
                }

                $progressPrecentage = (1/$lessonsNo) * 100;

                $enroll[0]->finished = $progress;
                $enroll[0]->progress = $progressPrecentage;
                $enroll[0]->save();
                
            }else{
                $oldProgress = str_split($enroll[0]->finished);
                $progress = "";
                $watched = 0;

                for($i = 0 ; $i < $lessonsNo ; $i++){
                    if($oldProgress[$i] == "0"){
                        if($lessons[$i]->id == $currentLesson){
                            $progress = $progress."1";
                            $watched++;
                        }else{
                            $progress = $progress."0";
                        }
                    }else{
                        $progress = $progress."1";
                        $watched++;
                    }
                }

                $progressPrecentage = ($watched/$lessonsNo) * 100;
                
                $enroll[0]->finished = $progress;
                $enroll[0]->progress = $progressPrecentage;
                $enroll[0]->save();
                // return response()->json($watched);
                // return response()->json($progress);
            }
        }

        $specialization = Specialization::find($specializationID);
        $coursesNo = count($specialization->courses);
        $finalLimit = $coursesNo * 100;

        $overAlls = Specialprogress::where('enroll_id',$enrollID->id)->get();
        $overAllProgress = 0;
        foreach($overAlls as $overAll){
            $overAllProgress = $overAllProgress + $overAll->progress;
        }

        $overAllProgressPercentage = ($overAllProgress/$finalLimit) * 100;

        $enrollID->progress = $overAllProgressPercentage;
        if($overAllProgressPercentage >= 100){
            $t=time();
            $enrollID->certificate_date = date("Y-m-d",$t);
        }
         
        $enrollID->save();
        return response()->json($lessons);
    }
    public function updateMasterProgress(Request $request)
    {
        $lessonsNo = $request->no;
        $currentLesson = $request->currentLess;
        $currentCourse = $request->currentCour;
        $masterID = $request->master;

        $course = Course::find($currentCourse);
        $weeksID = Week::where('course_id',$course->id)->select('id')->get();

        $lessons = Lesson::whereIn('week_id',$weeksID)->get();

        $enrollID = Enrollmaster::where('user_id',Auth::user()->id)->where('master_id',$masterID)->first();

        $enroll = Masterprogress::where('enroll_id',$enrollID->id)->where('course_id',$course->id)->get();

        if(count($enroll) > 0){

            if(empty($enroll[0]->finished)){

                $progress = "";

                for($i = 0 ; $i < $lessonsNo ; $i++){
                    
                    if($lessons[$i]->id == $currentLesson){
                        $progress = $progress."1";
                    }else{
                        $progress = $progress."0";
                    }
                }

                $progressPrecentage = (1/$lessonsNo) * 100;

                $enroll[0]->finished = $progress;
                $enroll[0]->progress = $progressPrecentage;
                $enroll[0]->save();
                
            }else{
                $oldProgress = str_split($enroll[0]->finished);
                $progress = "";
                $watched = 0;

                for($i = 0 ; $i < $lessonsNo ; $i++){
                    if($oldProgress[$i] == "0"){
                        if($lessons[$i]->id == $currentLesson){
                            $progress = $progress."1";
                            $watched++;
                        }else{
                            $progress = $progress."0";
                        }
                    }else{
                        $progress = $progress."1";
                        $watched++;
                    }
                }

                $progressPrecentage = ($watched/$lessonsNo) * 100;
                
                $enroll[0]->finished = $progress;
                $enroll[0]->progress = $progressPrecentage;
                $enroll[0]->save();
            }
        }

        $master = Master::find($masterID);
        $coursesNo = count($master->courses);
        $finalLimit = $coursesNo * 100;

        $overAlls = Masterprogress::where('enroll_id',$enrollID->id)->get();
        $overAllProgress = 0;
        foreach($overAlls as $overAll){
            $overAllProgress = $overAllProgress + $overAll->progress;
        }

        $overAllProgressPercentage = ($overAllProgress/$finalLimit) * 100;

        $enrollID->progress = $overAllProgressPercentage;

        if($overAllProgressPercentage >= 100){
            $t=time();
            $enrollID->certificate_date = date("Y-m-d",$t);
        }

        $enrollID->save();

        return response()->json($lessons);
    }
}
