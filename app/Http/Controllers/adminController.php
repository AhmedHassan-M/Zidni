<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Auth;
use App\User;
use Response;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Sub_category;
use App\ContactUs;
use App\Instructor;
use App\Course;
use App\Week;
use App\Lesson;
use App\Quiz;
use App\Question;
use App\Answer;
use App\Coursespec;
use App\Specialization;
use App\Master;
use App\Coursemaster;
use App\Specialprogress;
use App\Masterprogress;
use App\Subscribe;
use App\Enroll;
use App\Enrollmaster;
use App\Enrollspecialization;

class adminController extends Controller
{
    public function gethome()
    {	
    	if(Auth::user()->admin == 1){
            $activeUsers = Enroll::distinct()->get(['user_id']);
            $students = count($activeUsers);
            $activeCourses = Enroll::distinct()->get(['course_id']);
            $courses = Course::all();
            $masters = Master::all();
            $specializations = Specialization::all();
            $activeQuizzes = Course::distinct()->get(['quiz_id']);
            $quizzes = Quiz::all();
            $subscribers = Subscribe::all();

            $coursesActivity = array();
            for($i = 1 ; $i <= 12 ; $i++){
                $coursesEnroll = Enroll::whereMonth('created_at', $i)->get();
                $coursesActivity[] = count($coursesEnroll);
            }

            $mastersActivity = array();
            for($i = 1 ; $i <= 12 ; $i++){
                $mastersEnroll = Enrollmaster::whereMonth('created_at', $i)->get();
                $mastersActivity[] = count($mastersEnroll);
            }

            $specsActivity = array();
            for($i = 1 ; $i <= 12 ; $i++){
                $specsEnroll = Enrollspecialization::whereMonth('created_at', $i)->get();
                $specsActivity[] = count($specsEnroll);
            }

            $coursesNo = count($courses);
            $mastersNo = count($masters);
            $specializationsNo = count($specializations);

            $usersTracking = array();
            for($i = 1 ; $i <= 12 ; $i++){
                $students = User::where('admin' , 0)->whereMonth('created_at', $i)->get();
                $usersTracking[] = count($students);
            }

	    	return view('admin.index')->withStudents($students)->withCourses($courses)->withQuizzes($quizzes)->withSubscribers($subscribers)->withCoursesActivity($coursesActivity)->withMastersActivity($mastersActivity)->withSpecsActivity($specsActivity)->withCoursesNo($coursesNo)->withMastersNo($mastersNo)->withSpecializationsNo($specializationsNo)->withUsersTracking($usersTracking)->withActiveCourses($activeCourses);
		}
    }
    public function getusers()
    {	
    	if(Auth::user()->admin == 1){
    		$users = User::where('admin',0)->get();
	    	return view('admin.users.users',compact('users'));
		}
    }
    public function newCat(Request $request)
    {
        $cat = new Category;
        $cat->name = $request->adminsCategory;
        

        // $sub = new Sub_category;
        // $sub->name = $request->adminsSubCategory;
        // $sub->category_id = $cat->id;
        // $sub->save();
        $oldcat = Category::where('name',$request->adminsCategory)->get();
        if(count($oldcat) > 0){
            return response()->json('category already exist');
        }else{
            $cat->save();
            return response()->json('category added successfully');
        
        }
    }
    public function getAll_cat(Request $request)
    {
        
        $cat = Category::all();
        return view('admin.manage-categories.all-categories',compact('cat'));
    }

    ///////////// deletes

    public function deleteUsers(Request $request)
    {
        //if(Auth::user()->admin == 1){
            $user = User::find($request->id);
            $user->delete();
            foreach($user->enroll as $enroll){
                $enroll->delete();
            }
            return response()->json('true');
            //return returnJsonResponse(true, 'user delete successfully ..', $user);
        //}
    }
    public function deleteCategory(Request $request)
    {
        $cat = Category::find($request->id);
        $cat->delete();
        $cat->courses()->delete();
        return response()->json('cat deleted done');
            
    }
    public function allContactUs()
    {
        $allContacts = ContactUs::latest()->get();
        return view('admin.inbox.inbox')->withAllContacts($allContacts); 
    }
    public function deleteContact(Request $request){
        $id = $request->id;
        $contact = ContactUs::find($id);
        $contact->delete();

        return response()->json('Contact deleted successfully');
    }
    public function addCategory(Request $request){
        $cat = new Category;
        $cat->name = $request->adminsCategory;
        $cat->creator = Auth::user()->id;

        // $sub = new Sub_category;
        // $sub->name = $request->adminsSubCategory;
        // $sub->category_id = $cat->id;
        // $sub->save();
        $oldcat = Category::where('name',$request->adminsCategory)->get();
        if(count($oldcat) > 0){
            return response()->json('category already exist');
        }else{
            $cat->save();
            return response()->json('category added successfully');
        
        }
    }
    public function addInstructor(Request $request){
        //$instructor = new Instructor;
        $fullName = $request->fullname;
        $overview = $request->overview;
        //$photo = $request->photo;
        $facebook = $request->fb;
        $twitter = $request->twit;
        $linkedIn = $request->ln;

        $instructor = new Instructor;
        $instructor->full_name = $fullName;
        $instructor->overview = $overview;
        $instructor->facebook = $facebook;
        $instructor->twitter = $twitter;
        $instructor->linkedin = $linkedIn;

        if($request->hasFile('photo')){
                // Get file name with the extension
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
                // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just Ext
            $extension = $request->file('photo')->getClientOriginalExtension();
                // File name to store
            $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
                // upload image
            // $path = $request->file('slider1')->storeAs('image', $fileNameToStore);
            $file = $request->photo;
            $file->move('image',$fileNameToStore );
                

            $instructor->photo = $fileNameToStore;
        }

        $instructor->save();
        return response()->json('success');
    }
    
    public function editInstructor($id) {
        $instructor = Instructor::find($id);
        return view('admin.manage-instructors.edit-instructors')->withInstructor($instructor);
    }

    public function updateInstructor(Request $request , $id)
    {
        //$instructor = new Instructor;
        $fullName = $request->fullname;
        $overview = $request->overview;
        //$photo = $request->photo;
        $facebook = $request->fb;
        $twitter = $request->twit;
        $linkedIn = $request->ln;

        $instructor = Instructor::find($id);
        $instructor->full_name = $fullName;
        $instructor->overview = $overview;
        $instructor->facebook = $facebook;
        $instructor->twitter = $twitter;
        $instructor->linkedin = $linkedIn;

        if($request->hasFile('photo')){

            if($instructor->photo != NULL){
                if(is_file('image/'.$instructor->photo)) {
                    // Delete Image
                    unlink('image/'.$instructor->photo);
                }
            }

                // Get file name with the extension
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
                // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just Ext
            $extension = $request->file('photo')->getClientOriginalExtension();
                // File name to store
            $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
                // upload image
            // $path = $request->file('slider1')->storeAs('image', $fileNameToStore);
            $file = $request->photo;
            $file->move('image',$fileNameToStore );
                

            $instructor->photo = $fileNameToStore;
        }

        $instructor->save();

        return response()->json('success');
    }

    public function allInstructors(){
        $instructors = Instructor::all();
        return view('admin.manage-instructors.all-instructors')->withInstructors($instructors);
    }
    public function deleteInstructor(Request $request){
        $id = $request->id;
        $instructor = Instructor::find($id);

        if($instructor->photo != NULL){
            if(is_file('image/'.$instructor->photo)) {
                // Delete Image
                unlink('image/'.$instructor->photo);
            }
        }
        

        $instructor->delete();
        $instructor->courses()->delete();

        return response()->json('instructor has been deleted successfully');
    }
    public function getAddCourses(){
        $instructors = Instructor::all();
        $quizzes = Quiz::latest()->get();
        return view('admin.manage-courses.add-courses')->withInstructors($instructors)->withQuizzes($quizzes);
    }
    public function postAddCourses(Request $request){
        //{"_token":"a9ZKjqmzcLgnQmaUqcBEnbST57h2zjzP0c4yQSzX","courseName":"test","selectCategory":"5","shortDescription":"Short Description","Overview":"<p><span style=\"color: rgb(65, 65, 65); background-color: rgb(243, 243, 243);\">Overview<\/span><\/p>","files":null,"selectInstructor":"5","previewVideo":"https:\/\/stackoverflow.com\/","addPrice":"US$ 20.00","totalDuration":"2","addLanguage":"en","weekName_1":"week 1","LessonName_1":["lesson 1","lesson 2"],"LessonLink_1":["https:\/\/stackoverflow.com\/","https:\/\/stackoverflow.com\/"],"weekName_2":"week 2","LessonName_2":["lesson 11","lesson 22"],"LessonLink_2":["https:\/\/stackoverflow.com\/","https:\/\/stackoverflow.com\/"],"addCourseQuiz":"1"}
        /*$input = $request->all();
        return $input;*/
        $name = Course::where('name', $request->courseName)->get();

        if(count($name) > 0){
            return redirect('/admin/add-courses')->with('failure','The course you try to add is already available'); 
        }else{
            $course = new Course;
            $course->category_id = $request->selectCategory;
            $course->instructor_id = $request->selectInstructor;
            $course->name = $request->courseName;
            $course->description = $request->shortDescription;
            $course->overview = $request->Overview;
            $course->preview_link = $request->previewVideo;

            $price = $request->addPrice;

            $course->price = $price;
            $course->duration = $request->totalDuration;
            $course->lng = $request->addLanguage;
            $course->quiz_id = $request->addCourseQuiz;

            if($request->hasFile('courseImage')){
                    // Get file name with the extension
                $fileNameWithExt = $request->file('courseImage')->getClientOriginalName();
                    // Get just file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    // Get just Ext
                $extension = $request->file('courseImage')->getClientOriginalExtension();
                    // File name to store
                $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
                    // upload image
                // $path = $request->file('slider1')->storeAs('image', $fileNameToStore);
                $file = $request->courseImage;
                $file->move('image',$fileNameToStore );
                    

                $course->image = $fileNameToStore;
            }

            $course->save();

            $count = $request->formWeekCounter;

            for($i = 1 ; $i <= $count ; $i++){
                $weekName = "weekName_".$i;
                if($request->$weekName){
                    $week = new Week;
                    $week->course_id = $course->id;
                    $week->name = $request->$weekName;

                    $week->save();

                    $lessonNameId = "LessonName_".$i;
                    $lessonLinkId = "LessonLink_".$i;

                    $lessonsName = $request->$lessonNameId;
                    $lessonsLink = $request->$lessonLinkId;
                    
                    for($x = 0 ; $x < count($lessonsName) ; $x++){
                        $lesson = new Lesson;
                        $lesson->week_id = $week->id;
                        $lesson->name = $lessonsName[$x];
                        $srcLessonLink = substr($lessonsLink[$x],0,8).'player.'.substr($lessonsLink[$x],8,10).'video/'.substr($lessonsLink[$x],18,30);
                        $lesson->link = $srcLessonLink;

                        $lesson->save();
                    }
                }
                
            }

            return redirect('/admin/add-courses')->with('success','The course has been added successfully'); 
        }
        
    }
    public function allCourses(){
        $courses = Course::latest()->get();
        return view('admin.manage-courses.all-courses')->withCourses($courses);
    }
    public function deleteCourse(Request $request){
        $id = $request->id;

        $course = Course::find($id);
        $course->delete();

        $weeks = Week::where('course_id',$course->id)->get();
        $weeksID = Week::where('course_id',$course->id)->select('id')->get();

        foreach($weeks as $week){
            $week->delete();
        }

        $lessons = Lesson::wherein('week_id',$weeksID)->get();

        foreach($lessons as $lesson){
            $lesson->delete();
        }
        
        foreach($course->enroll as $enroll){
            $enroll->delete();
        }

        $courses_specs = Coursespec::where('course_id',$course->id)->get();
        foreach($courses_specs as $courses_spec){
            $courses_spec->delete();
        }

        $specialProgress = Specialprogress::where('course_id',$course->id)->get();
        foreach($specialProgress as $specialProgres){
            $specialProgres->delete();
        }

        $courses_masters = Coursemaster::where('course_id',$course->id)->get();
        foreach($courses_masters as $courses_master){
            $courses_master->delete();
        }

        $masterProgress = Masterprogress::where('course_id',$course->id)->get();
        foreach($masterProgress as $masterProgres){
            $masterProgres->delete();
        }

        return response()->json('success');
    }
    public function editCourse($id){
        $course = Course::find($id);
        $instructors = Instructor::all();
        $quizzes = Quiz::latest()->get();
        $quiz = Quiz::find($course->quiz_id);
        
        return view('admin.manage-courses.edit-courses')->withCourse($course)->withInstructors($instructors)->withQuizzes($quizzes)->withQuiz($quiz);
    }
    public function updateCourse(Request $request, $id){
        // $all = $request->all();
        // return $all;

        $course = Course::find($id);

        $course->category_id = $request->selectCategory;
        $course->instructor_id = $request->selectInstructor;
        if($course->name != $request->courseName){
            $validate = Course::where('name',$request->courseName)->get();
            if(count($validate) == 0){
                $course->name = $request->courseName;
            }else{
                return redirect('/admin/edit-courses/'.$id)->with('failure','The course you try to add is already available'); 
            }
        }
        $course->description = $request->shortDescription;
        $course->overview = $request->Overview;
        $course->preview_link = $request->previewVideo;

        $price = $request->addPrice;

        $course->price = $price;
        $course->duration = $request->totalDuration;
        $course->lng = $request->addLanguage;
        $course->quiz_id = $request->addCourseQuiz;

        if($request->hasFile('courseImage')){
                // Get file name with the extension
            $fileNameWithExt = $request->file('courseImage')->getClientOriginalName();
                // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just Ext
            $extension = $request->file('courseImage')->getClientOriginalExtension();
                // File name to store
            $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
                // upload image
            // $path = $request->file('slider1')->storeAs('image', $fileNameToStore);
            $file = $request->courseImage;
            $file->move('image',$fileNameToStore );
                

            $course->image = $fileNameToStore;
        }

        $course->save();

        $weekNo = $request->weekNo;
        $allAddedWeeks = $request->formWeekCounter;

        if($weekNo > 0){
            $weeks = $course->weeks;
            //return $weeks;
            for($i = 1 ; $i <= $weekNo ; $i++){ 
                $weekName = "weekName_".$i;
                if($request->$weekName){
                    $weeks[$i - 1]->name = $request->$weekName;
                    $weeks[$i - 1]->save();

                    $lessonNameId = "LessonName_".$i;
                    $lessonLinkId = "LessonLink_".$i;

                    $lessonsName = $request->$lessonNameId;
                    $lessonsLink = $request->$lessonLinkId;
                    
                    $lessonIndex = "lessonsNo_".$i;
                    $lessonsNo = $request->$lessonIndex;

                    $lessons = Lesson::where('week_id',$weeks[$i - 1]->id)->get();
                    
                    if(count($lessons) > 0){
                        if($request->$lessonNameId){
                            for($x = 0 ; $x < $lessonsNo ; $x++){
                                $lessons[$x]->name = $lessonsName[$x];
                                if($lessons[$x]->link != $lessonsLink[$x]){
                                    if(substr($lessonsLink[$x],8,9) == 'vimeo.com'){
                                        $srcLessonLink = substr($lessonsLink[$x],0,8).'player.'.substr($lessonsLink[$x],8,10).'video/'.substr($lessonsLink[$x],18,30);
                                        $lessons[$x]->link = $srcLessonLink;
                                    }
                                }
                                $lessons[$x]->save();
                            }
                            // $a = 0;
                            // foreach ($lessonsName as $item) {
                            //     $a++;
                            // }
                            $a = count($lessonsName);
                            for($b = $lessonsNo ; $b < $a ; $b++){
                                $newLessons = new Lesson;
                                $newLessons->name = $lessonsName[$b];
                                $srcLessonLink = substr($lessonsLink[$b],0,8).'player.'.substr($lessonsLink[$b],8,10).'video/'.substr($lessonsLink[$b],18,30);
                                $newLessons->link = $srcLessonLink;
                                $newLessons->week_id = $weeks[$i - 1]->id;
                                $newLessons->save();
                            }
                        }
                    }
                    
                }
            }
            
        }

        for($z = $weekNo + 1 ; $z <= $allAddedWeeks ; $z++){
            $newWeekName = "weekName_".$z;

            if($request->$newWeekName){
                $newWeek = new Week;
                $newWeek->course_id = $course->id;
                $newWeek->name = $request->$newWeekName;

                $newWeek->save();

                $newLessonNameId = "LessonName_".$z;
                $newLessonLinkId = "LessonLink_".$z;

                if($request->$newLessonNameId){
                    $newLessonsName = $request->$newLessonNameId;
                    $newLessonsLink = $request->$newLessonLinkId;
                    for($n = 0 ; $n < count($newLessonsName) ; $n++){

                        $newLesson = new Lesson;
                        $newLesson->week_id = $newWeek->id;
                        $newLesson->name = $newLessonsName[$n];
                        $srcLessonLink = substr($newLessonsLink[$n],0,8).'player.'.substr($newLessonsLink[$n],8,10).'video/'.substr($newLessonsLink[$n],18,30);
                        $newLesson->link = $srcLessonLink;

                        $newLesson->save();
                    }
                }
            }
        }
        return redirect('/admin/edit-courses/'.$id)->with('success','The course has been updated successfully'); 
    }
    public function getAddQuiz()
    {
        return view('admin.manage-quizzes.add-quizzes');
    }
    public function AddQuiz(Request $request)
    {
        //return $request->all();

        $quiz = new Quiz;
        $quiz->title = $request->quizzesName;
        $quiz->passing_score = $request->quizzesPassingScore;
        $quiz->final_score = $request->quizScoreCounterInput;
        $quiz->save();

        $count = $request->quizQuestionsCounterInput;

        for($i = 1 ; $i <= $count ; $i++){
            $questionReqName = "quizQuestionsTitle_".$i;
            $scoreReqName = "quizQuestionsScore_".$i;

            if($request->$questionReqName){
                $question = new Question;
                $question->question = $request->$questionReqName;
                $question->score = $request->$scoreReqName;
                $question->quiz_id = $quiz->id;

                $question->save();

                $answerReqName = "quizQuestionsAnswersTitle_".$i;

                $correctAnsNo = "quizQuestionsCorrectAnswers_".$i;
                $correctAns = $request->$correctAnsNo;
                //$lessonLinkId = "LessonLink_".$i;

                $answerText = $request->$answerReqName;
                //$lessonsLink = $request->$lessonLinkId;
                for($x = 0 ; $x < count($answerText) ; $x++){
                    $answer = new Answer;
                    $answer->question_id = $question->id;
                    $answer->answer = $answerText[$x];

                    if($x == $correctAns[0]){
                        $answer->correct = 1;
                    }

                    $answer->save();
                }
            }
        }

        return redirect('/admin/add-quizzes')->with('success','The quiz has been added successfully'); 
    }

    public function getAllQuizzes()
    {
        $quizzes = Quiz::latest()->get();
        return view('admin.manage-quizzes.all-quizzes')->withQuizzes($quizzes);
    }

    public function deleteQuiz(Request $request){
        $id = $request->id;
        $quiz = Quiz::find($id);
        $quiz->delete();

        if($quiz->question){
            $questions = $quiz->question;
            foreach($questions as $question){
                $question->delete();

                if($question->answer){
                    $answers = $question->answer;
                    foreach($answers as $answer){
                        $answer->delete();
                    }
                }
            }

            
        }

        return response()->json('success');
    }
    public function editQuiz(Request $request,$id)
    {
        $quiz = Quiz::find($id);
        $questions = $quiz->question;
        return view('admin.manage-quizzes.edit-quizzes')->withQuiz($quiz)->withQuestions($questions);
    }
    public function updateQuiz(Request $request , $id){
        //return $request->all();
        $quiz = Quiz::find($id);

        $quiz->title = $request->editQuizzesName;
        $quiz->passing_score = $request->editQuizzesPassingScore;
        $quiz->final_score = $request->quizScoreCounterInput;

        $quiz->save();

        $count = $request->oldQuestionsNo;
        $question = $quiz->question;

            for($i = 1 ; $i <= $count ; $i++){ 
                $questionReqName = "quizQuestionsTitle_".$i;
                $scoreReqName = "quizQuestionsScore_".$i;

                if($request->$questionReqName){
                    
                    $question[$i - 1]->question = $request->$questionReqName;
                    $question[$i - 1]->score = $request->$scoreReqName;

                    $question[$i - 1]->save();

                    $answerReqName = "quizQuestionsAnswersTitle_".$i;

                    $correctAnsNo = "quizQuestionsCorrectAnswers_".$i;
                    $correctAns = $request->$correctAnsNo;
                    //$lessonLinkId = "LessonLink_".$i;

                    $answerText = $request->$answerReqName;

                    $answers = $question[$i - 1]->answer;

                    $answerIndex = "answersNo_".$i;
                    $answersNo = $request->$answerIndex;
                    
                    for($x = 0 ; $x < $answersNo ; $x++){
                        $answers[$x]->answer = $answerText[$x];
    
                        if($x == $correctAns[0]){
                            $answers[$x]->correct = 1;
                        }
    
                        $answers[$x]->save();
                    }

                    $a = count($answerText);

                    for($b = $answersNo ; $b < $a ; $b++){
                        $newAnswers = new Answer;
                        $newAnswers->answer = $answerText[$b];
                        $newAnswers->question_id = $question[$i - 1]->id;

                        if($b == $correctAns[0]){
                            $newAnswers->correct = 1;
                        }
                        
                        $newAnswers->save();
                    }
                    
                }
            }

            $allQuestions = $request->quizQuestionsCounterInput;

            for($z = $count + 1 ; $z <= $allQuestions ; $z++){
                $newQuestionReqName = "quizQuestionsTitle_".$z;
                $newQuestionScoreReqName = "quizQuestionsScore_".$z;
    
                if($request->$newQuestionReqName){
                    $newQuestion = new Question;
                    $newQuestion->question = $request->$newQuestionReqName;
                    $newQuestion->score = $request->$newQuestionScoreReqName;
                    $newQuestion->quiz_id = $quiz->id;
    
                    $newQuestion->save();
    
                    $answerReqName = "quizQuestionsAnswersTitle_".$i;

                    $correctAnsNo = "quizQuestionsCorrectAnswers_".$i;
                    $correctAns = $request->$correctAnsNo;

                    $answerText = $request->$answerReqName;
    
                    for($d = 0 ; $d < count($answerText) ; $d++){
                        $newAnswer = new Answer;
                        $newAnswer->question_id = $newQuestion->id;
                        $newAnswer->answer = $answerText[$d];
    
                        if($d == $correctAns[0]){
                            $newAnswer->correct = 1;
                        }
    
                        $newAnswer->save();
                    }
                }
            }
        return redirect('/admin/edit-quizzes/'.$id)->with('success','The quiz has been updated successfully'); 
    }
    public function getAddSpecialization()
    {
        $courses = Course::latest()->get();
        return view('admin.manage-specializations.add-specializations')->withCourses($courses);
    }
    public function addSpecialization(Request $request)
    {
        $spec = new Specialization;
        $spec->name = $request->specializationsName;
        $spec->description = $request->specializationsShortDescription;
        $spec->overview = $request->specializationsOverview;
        
        if($request->hasFile('courseImage')){
                // Get file name with the extension
            $fileNameWithExt = $request->file('courseImage')->getClientOriginalName();
                // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just Ext
            $extension = $request->file('courseImage')->getClientOriginalExtension();
                // File name to store
            $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
                // upload image
            // $path = $request->file('slider1')->storeAs('image', $fileNameToStore);
            $file = $request->courseImage;
            $file->move('image',$fileNameToStore );
                

            $spec->image = $fileNameToStore;
        }

        $spec->preview = $request->specializationsPreviewVideo;
        $spec->price = $request->specializationsAddPrice;
        $spec->duration = $request->specializationsTotalDuration;
        $spec->language = $request->specializationsAddLanguage;
        $spec->save();

        $count = count($request->addSpecializationsCourses);
        $courses_id = $request->addSpecializationsCourses;

        for($i = 0 ; $i < $count ; $i++){
            $Courses = new Coursespec;
            $Courses->course_id = $courses_id[$i];
            $Courses->specialization_id = $spec->id;
            $Courses->save();
        }

        return redirect('/admin/add-specializations')->with('success','The specialization has been added successfully'); 
    }
    public function getAllSpecialization()
    {
        $specializations = Specialization::latest()->get();
        return view('admin.manage-specializations.all-specializations')->withSpecializations($specializations);
    }
    public function deleteSpecialization(Request $request)
    {
        //return response()->json($request->id);
        $id = $request->id;
        $spec = Specialization::find($id);
        $spec->delete();

        if($spec->image != NULL){
            // Delete Image
            unlink('image/'.$spec->image);
        }

        $spec->courses()->detach();

        return response()->json('success');
    }
    public function getAddMaster()
    {
        $courses = Course::latest()->get();
        return view('admin.manage-masters.add-masters')->withCourses($courses);
    }
    public function AddMaster(Request $request)
    {
        $master = new Master;
        $master->name = $request->masterName;
        $master->description = $request->masterShortDescription;
        $master->overview = $request->masterOverview;
        
        if($request->hasFile('courseImage')){
                // Get file name with the extension
            $fileNameWithExt = $request->file('courseImage')->getClientOriginalName();
                // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just Ext
            $extension = $request->file('courseImage')->getClientOriginalExtension();
                // File name to store
            $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
                // upload image
            // $path = $request->file('slider1')->storeAs('image', $fileNameToStore);
            $file = $request->courseImage;
            $file->move('image',$fileNameToStore );
                

            $master->image = $fileNameToStore;
        }

        $master->preview = $request->masterPreviewVideo;
        $master->price = $request->masterAddPrice;
        $master->duration = $request->masterTotalDuration;
        $master->language = $request->masterAddLanguage;
        $master->save();

        $count = count($request->addMasterCourses);
        $courses_id = $request->addMasterCourses;

        for($i = 0 ; $i < $count ; $i++){
            $Courses = new Coursemaster;
            $Courses->course_id = $courses_id[$i];
            $Courses->master_id = $master->id;
            $Courses->save();
        }

        return redirect('/admin/add-masters')->with('success','The Master Degree has been added successfully'); 
    }
    public function allMasters()
    {
        $masters = Master::latest()->get();
        return view('admin.manage-masters.all-masters')->withMasters($masters);
    }
    public function deleteMaster(Request $request)
    {
        $id = $request->id;
        $master = Master::find($id);
        $master->delete();

        if($master->image != NULL){
            // Delete Image
            unlink('image/'.$master->image);
        }

        $master->courses()->detach();

        return response()->json('success');
    }
    public function EditSpecialization($id){
        $specialization = Specialization::find($id);
        $courses = Course::latest()->get();
        return view('admin.manage-specializations.edit-specializations')->withSpecialization($specialization)->withCourses($courses);
    }
    public function updateSpecialization(Request $request,$id)
    {
        $spec = Specialization::find($id);
        $spec->name = $request->editSpecializationsName;
        $spec->description = $request->editSpecializationsShortDescription;
        $spec->overview = $request->editSpecializationsOverview;
        
        if($request->hasFile('courseImage')){
                // Get file name with the extension
            $fileNameWithExt = $request->file('courseImage')->getClientOriginalName();
                // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just Ext
            $extension = $request->file('courseImage')->getClientOriginalExtension();
                // File name to store
            $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
                // upload image
            // $path = $request->file('slider1')->storeAs('image', $fileNameToStore);
            $file = $request->courseImage;
            $file->move('image',$fileNameToStore );
                

            $spec->image = $fileNameToStore;
        }

        $spec->preview = $request->editSpecializationsPreviewVideo;
        $spec->price = $request->editSpecializationsAddPrice;
        $spec->duration = $request->editSpecializationsTotalDuration;
        $spec->language = $request->editSpecializationsAddLanguage;
        $spec->save();

        $selectedCourses = $request->editAddSpecializationsCourses;
        $spec->courses()->sync($selectedCourses);

        return redirect('/admin/edit-specialization/'.$id)->with('success','The specialization has been updated successfully'); 
    }
    public function editMaster($id)
    {
        $master = Master::find($id);
        $courses = Course::latest()->get();
        return view('admin.manage-masters.edit-masters')->withMaster($master)->withCourses($courses);
    }
    public function updateMaster(Request $request,$id)
    {
        $master = Master::find($id);
        $master->name = $request->editMasterName;
        $master->description = $request->editMasterShortDescription;
        $master->overview = $request->editMasterOverview;
        
        if($request->hasFile('courseImage')){
                // Get file name with the extension
            $fileNameWithExt = $request->file('courseImage')->getClientOriginalName();
                // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just Ext
            $extension = $request->file('courseImage')->getClientOriginalExtension();
                // File name to store
            $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
                // upload image
            // $path = $request->file('slider1')->storeAs('image', $fileNameToStore);
            $file = $request->courseImage;
            $file->move('image',$fileNameToStore );
                

            $master->image = $fileNameToStore;
        }

        $master->preview = $request->editMasterPreviewVideo;
        $master->price = $request->editMasterAddPrice;
        $master->duration = $request->editMasterTotalDuration;
        $master->language = $request->editMasterAddLanguage;
        $master->save();

        $selectedCourses = $request->editAddMasterCourses;
        $master->courses()->sync($selectedCourses);

        return redirect('/admin/edit-master/'.$id)->with('success','The Master Degree has been updated successfully'); 
    }
    public function updateAdminProfile(Request $request)
    {
        $name = $request->adminAccountName;
        $currentPassword = $request->adminAccountCurrentPassword;
        $newPassword = $request->adminAccountNewPassword;
        $confirmPassword = $request->adminAccountConfirmPassword;

        $admin = User::find(Auth::user()->id);
        $admin->full_name = $name;
        $Names = explode(" ", $name);
        if(count($Names) > 0){
            $firstName = $Names[0];
            $admin->first_name = $firstName;
        }
        if(count($Names) > 1){
            $lastName = $Names[1];
            $admin->last_name = $lastName;
        }

        if(!empty($currentPassword)){
            if(Auth::attempt(['email' => $admin->email, 'password' => $currentPassword])){
                if($newPassword == $confirmPassword){
                    $admin->password = bcrypt($confirmPassword);
                }
            }else{
                return response()->json('failure');
            }
        }

        $admin->save();
        return response()->json('success');
        
    }
    public function updateAdminEmail(Request $request)
    {
        $newEmail = $request->adminChangeEmailNew;
        $password = $request->adminChangeEmailPassword;

        $admin = User::find(Auth::user()->id);
        if(!empty($newEmail)){
            if(Auth::attempt(['email' => $admin->email, 'password' => $password])){
                
                $admin->email = $newEmail;
                
            }else{
                return response()->json('failure');
            }
        }
        $admin->save();
        return response()->json('success');
    }
    public function updateAdminProfilePicture(Request $request)
    {
        $admin = User::find(Auth::user()->id);

        if($request->hasFile('photo')){
                // Get file name with the extension
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
                // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just Ext
            $extension = $request->file('photo')->getClientOriginalExtension();
                // File name to store
            $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
                // upload image
            // $path = $request->file('slider1')->storeAs('image', $fileNameToStore);
            $file = $request->photo;
            $file->move('image',$fileNameToStore );
                
            if($admin->photo != NULL){
                // Delete Image
                if(is_file('image/'.$admin->photo)) {
                    unlink('image/'.$admin->photo);
                }
            }

            $admin->photo = $fileNameToStore;
        }

        $admin->save();

        return redirect('/admin/profile');
 
 
    }

    public function test (Request $test1) {

        return $test1->all();
    
    }




}

