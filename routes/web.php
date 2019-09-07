<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'contentController@index')->name('login');

// Top categories section

Route::post('/category/courses', 'contentController@topCategoryCourses');

// navbar categories

Route::post('/select-navbar-category', 'contentController@selectNavbarCategory');

Route::post('/', 'RegisterLogin@RLogin');
Route::get('/profile', 'contentController@profile')->middleware('auth');
Route::post('profile', 'userController@profiles');
Route::get('/password-reset', function () {

    return view('site.passwordReset.password-reset');
});
Route::post('/forget_user', 'userController@forgetpsw'); 
Route::post('/forget_user_step2', 'userController@forgetStep2');
Route::post('/login', 'RegisterLogin@RLogin');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

// Facebook Login
Route::get ( '/redirect/{service}', 'SocialAuthController@redirect');
// Facebook redirect callback url
Route::get ( '/callback/{service}', 'SocialAuthController@callback' );


// 404 page

Route::get('/404', function () {
    return view('errors.404');
});



// Master's Degree //


Route::get('/masters-degree/{i}', 'contentController@getMasterDegree');


Route::get('/all-masters-degree', 'contentController@getAllMasters');


Route::get('/all-masters-page2', function () {
    return view('site.masters-degree.all-masters-page2');
});



// specialization //


Route::get('/specialization/{i}', 'contentController@getSpecialization');

// enroll specialization
Route::get('/specialization/enroll-now/{i}','enrollController@enrollSpecialization');


Route::get('/all-specialization', 'contentController@allSpecializations');

// enroll master degree
Route::get('/master/enroll-now/{i}','enrollController@enrollMasterDegree');


// Route::get('/all-specialization-page2', function () {
//     return view('site.specialization.all-specialization-page2');
// });




// masters & specialization course list

Route::get('/specialization/courses-list/{i}', 'contentController@getSpecializationCourses');

Route::get('/specialization/course-content/{s}/{i}/{l}', 'contentController@getSpecializationLesson');

Route::get('/specialization/course-content/{s}/{i}', 'contentController@getSpecializationCourseContent');

Route::get('/master-degree/courses-list/{i}', 'contentController@getMasterCourses');

Route::get('/master-degree/course-content/{m}/{i}', 'contentController@getMasterCourseContent');

Route::get('/master-degree/course-content/{m}/{i}/{l}', 'contentController@getMasterLesson');


// Courses //


Route::get('/course/{i}', 'contentController@getCourse');




Route::get('/courses/course-content/{i}', 'contentController@getCourseContent');
Route::get('/courses/course-content/{i}/{z}', 'contentController@getLessonContent');


// Course Enrollment
Route::get('/course/enroll-now/{i}', 'enrollController@enrollCourse');








// live-sessions //


Route::get('/live-sessions', function () {

    return view('site.live-sessions.live-sessions-index');

    return view('site.live-sessions.live-sessions-header');
    
});


Route::get('/all-live-sessions', function () {
    return view('site.live-sessions.all-live-sessions');
});


Route::get('/all-live-sessions-page2', function () {
    return view('site.live-sessions.all-live-sessions-page2');
});


// All Categories //


Route::get('/all-categories', 'contentController@getAllCategories');

// Instructor

Route::get('/instructor', 'contentController@allInstructors');


// Contact Us

Route::get('/contact-us', function () {

    return view('site.contact-us.contact-us');

});

Route::post('/contact-us', 'userController@contactDataSave');


// My Courses

Route::get('/my-courses', 'contentController@getMyCourses');

// Progress

Route::post('/update-progress', 'enrollController@updateProgress');

// Specialization progress

Route::post('/update-progress/specialization', 'enrollController@updateSpecializationProgress');

// Master-degree progress

Route::post('/update-progress/master-degree', 'enrollController@updateMasterProgress');

// Answer Quiz Questions

Route::post('/answer-quiz', 'enrollController@answerQuestions');
Route::post('/answer-specialization-quiz', 'enrollController@answerSpecializationCourseQuestions');
Route::post('/answer-master-quiz', 'enrollController@answerMasterCourseQuestions');

// My Activity


Route::get('/my-activity', 'contentController@getMyActivity');


// Certificate



Route::get('/get-certificate/{type}/{i}', 'contentController@getCertificate')->middleware('getcertificate');


// shate 


Route::get('/share-certificate', function () {

    return view('site.get-certificate.share-certificate');

});


// notifications


Route::get('/my-notifications', function () {

    return view('site.notifications.notifications');

});



// All Content Pages


Route::get('/mission-vision', function () {

    return view('site.content-pages.mission-vision');

    return view('site.content-pages.content-pages-header');


});


Route::get('/about-us', function () {

    return view('site.content-pages.about-us');

    return view('site.content-pages.content-pages-header');


});


Route::get('/agreement', function () {

    return view('site.content-pages.agreement');

    return view('site.content-pages.content-pages-header');


});



Route::get('/board-of-advisor', function () {

    return view('site.content-pages.board-of-advisor');

    return view('site.content-pages.content-pages-header');


});



Route::get('/faq', function () {

    return view('site.content-pages.faq');

    return view('site.content-pages.content-pages-header');


});


Route::get('/help', function () {

    return view('site.content-pages.help');

    return view('site.content-pages.content-pages-header');


});


Route::get('/how-to-learn', function () {

    return view('site.content-pages.how-to-learn');

    return view('site.content-pages.content-pages-header');

});



Route::get('/polices', function () {

    return view('site.content-pages.polices');

    return view('site.content-pages.content-pages-header');


});



///////////////////////////////////// admin dash board  ////////////////////////////////////////


Route::get('/admin/home','adminController@gethome');



Route::get('/admin/all-users', 'adminController@getusers')->middleware('auth');

Route::get('/admin/login', function () {
    return view('admin.login.login');
});

Route::get('/admin/inbox', 'adminController@allContactUs');


Route::get('/admin/all-admins', function () {
    return view('admin.manage-admins.all-admins');
});


Route::get('/admin/add-admins', function () {
    return view('admin.manage-admins.add-admins');
});



Route::get('/admin/all-roles', function () {
    return view('admin.manage-roles.all-roles');
});


Route::get('/admin/add-roles', function () {
    return view('admin.manage-roles.add-roles');
});

Route::get('/admin/all-categories', function () {
    return view('admin.manage-roles.add-roles');
});


Route::get('/admin/all-categories', 'adminController@getAll_cat');

Route::get('/admin/add-categories', function () {
    return view('admin.manage-categories.add-categories');
});


Route::post('/admin/add-categories', 'adminController@addCategory');

// Courses


Route::get('/admin/all-courses', 'adminController@allCourses');


Route::get('/admin/add-courses', 'adminController@getAddCourses');
Route::post('/admin/add-courses', 'adminController@postAddCourses');

Route::get('/admin/edit-courses/{i}', 'adminController@editCourse');
Route::post('/admin/edit-courses/{i}', 'adminController@updateCourse');


// Masters




Route::get('/admin/all-masters', 'adminController@allMasters');


Route::get('/admin/add-masters', 'adminController@getAddMaster');
Route::post('/admin/add-masters', 'adminController@AddMaster');

Route::get('/admin/edit-master/{i}', 'adminController@editMaster');
Route::post('/admin/edit-master/{i}', 'adminController@updateMaster');

// Specializations


Route::get('/admin/all-specializations', 'adminController@getAllSpecialization');

Route::get('/admin/add-specializations', 'adminController@getAddSpecialization');

Route::post('/admin/add-specializations', 'adminController@addSpecialization');

Route::get('/admin/edit-specialization/{i}', 'adminController@EditSpecialization');

Route::post('/admin/edit-specialization/{i}', 'adminController@updateSpecialization');


// Quizs


Route::get('/admin/all-quizzes', 'adminController@getAllQuizzes');


Route::get('/admin/add-quizzes', 'adminController@getAddQuiz');
Route::post('/admin/add-quizzes', 'adminController@AddQuiz');


Route::get('/admin/edit-quizzes/{i}', 'adminController@editQuiz');
Route::post('/admin/edit-quizzes/{i}', 'adminController@updateQuiz');


// instructors


Route::get('/admin/all-instructors', 'adminController@allInstructors');


Route::get('/admin/add-instructors', function () {
    return view('admin.manage-instructors.add-instructors');
});

Route::post('/admin/add-instructors', 'adminController@addInstructor');


Route::get('/admin/edit-instructor/{i}', 'adminController@editInstructor')->middleware('auth');
Route::post('/admin/edit-instructor/{i}', 'adminController@updateInstructor');


// live sessions



Route::get('/admin/new-live-sessions', function () {
    return view('admin.manage-live-sessions.new-live-sessions');
});



// SalesReport


Route::get('/admin/sales-report', function () {
    return view('admin.sales-report.sales-report');
});


// Subscribe Inbox

Route::get('/admin/subscribe-inbox', function () {
    return view('admin.subscribe-inbox.subscribe-inbox');
});


// profile

Route::get('/admin/profile', function () {
    return view('admin.profile.profile');
});
Route::post('/admin/profile', 'adminController@updateAdminProfile');
Route::post('/admin/change-email', 'adminController@updateAdminEmail');
Route::post('/admin/profile-pic', 'adminController@updateAdminProfilePicture');

// Notification

Route::get('/admin/all-notification', 'contentController@allAdminNotifications');


//manage- Content Pages
Route::get('/admin/vision-mission','contentController@vision_mission');
Route::post('/admin/vision-mission','contentController@vision_mission_process');

Route::get('/admin/how-to-learn','contentController@how_to_learn');
Route::post('/admin/how-to-learn','contentController@how_to_learn_process');

Route::get('/admin/agreement','contentController@Agreement');
Route::post('/admin/agreement','contentController@Agreement_process');

Route::get('/admin/board-of-advisor','contentController@board_of_advisor');
Route::post('/admin/board-of-advisor','contentController@board_of_advisor_process');

// Route::get('/admin/instructors','contentController@instructors');
// Route::post('/admin/instructors','contentController@instructors_process');

Route::get('/admin/police','contentController@police');
Route::post('/admin/police','contentController@police_process');

Route::get('/admin/about-us','contentController@AboutUs');
Route::post('/admin/about-us','contentController@AboutUs_process');

Route::get('/admin/faq','contentController@faq');
Route::post('/admin/faq','contentController@faq_process');


Route::get('/admin/help','contentController@help');
Route::post('/admin/help','contentController@help_process');

//Admin Notifications
Route::post('/reset-admin-notifications','notificationsController@resetAdminNotifications');

Route::post('/fetch-new-notifications','notificationsController@fetchNewNotifications');


// All Content Pages
Route::get('/mission-vision', function () {
    $items = App\Content::where('type','visionMission')->get();
    return view('site.content-pages.mission-vision',['items'=>$items]);
});

Route::get('/about-us', function () {
    $items = App\Content::where('type','AboutUs')->get();
    return view('site.content-pages.about-us',['items'=>$items]);
});

Route::get('/agreement', function () {
    $items = App\Content::where('type','Agreement')->get();
    return view('site.content-pages.agreement',['items'=>$items]);
});

Route::get('/board-of-advisor', function () {
    $items = App\Content::where('type','BoardOfAdvisor')->get();
    return view('site.content-pages.board-of-advisor',['items'=>$items]);
});

Route::get('/faq', function () {
    $items = App\Content::where('type','FAQ')->get();
    return view('site.content-pages.faq',['items'=>$items]);
});

Route::get('/help', function () {
    $items = App\Content::where('type','help')->get();
    return view('site.content-pages.help',['items'=>$items]);
});

Route::get('/how-to-learn', function () {
    $items = App\Content::where('type','howToLearn')->get();
    return view('site.content-pages.how-to-learn',['items'=>$items]);
});

Route::get('/polices', function () {
    $items = App\Content::where('type','police')->get();
    return view('site.content-pages.polices',['items'=>$items]);
});

Route::get('/admin/subscribe-inbox','contentController@getsubscrib');


// announcements

Route::post('/admin/send-announcement','contentController@sendAnnouncements');













/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|

    Zidni University

|
*/



Route::get('/join-the-university/1', 'University\manageApplication@applicationFirstStep');


Route::get('/join-the-university/2', 'University\manageApplication@applicationSecondStep');
Route::post('/student/update-documents', 'University\manageApplication@uploadDocuments');


Route::get('/join-the-university/3', 'University\manageApplication@applicationThirdStep');


Route::post('/join-the-university/1','University\manageApplication@Apply');









Route::get('/university/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('university.index');
});



Route::get('/university/academic-track/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('university.academic-track');
});



Route::get('/university/calendar/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.student-calendar');
});




Route::get('/university/courses/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.content.courses');
});


Route::get('/university/course_material/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.content.course_material');
});


Route::get('/university/resources/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.content.resources');
});


Route::get('/university/previous-courses/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.previous-courses');
});


Route::get('/university/academic-advising/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.learning-activities.academic-advising');
});



Route::get('/university/achievement-indicators/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.learning-activities.achievement-indicators');
});


Route::get('/university/following-meetings/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.learning-activities.following-meetings');
});


Route::get('/university/latest-assignments/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.learning-activities.latest-assignments');
});



Route::get('/university/examinations/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.examinations.examinations');
});



Route::get('/university/forum/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.forum.forum');
});


Route::get('/university/payment/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('university.payment.payment');
});

Route::get('/university/technical-support/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('university.technical-support.technical-support');
});


Route::get('/university/view-student-profile/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('university.profile.view-student-profile');
});



Route::get('/university/edit-student-profile/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('university.profile.edit-student-profile');
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|

    Admin Zidin University

|
*/



// HOME PAGE


Route::get('/admin/university/home', function () {

    return view('admin-university.index');

});



// APPLICANTS


Route::get('/admin/university/all-applicant', 'University\manageApplication@allApplications');

Route::post('/admin/university/delete-applicant', 'University\manageApplication@deleteApplication');

Route::get('/admin/university/accepted-applicant', 'University\manageApplication@allAcceptedApplications');


Route::get('/admin/university/rejected-applicant', 'University\manageApplication@allRejectedApplications');


Route::get('/admin/university/applicant-profile/{i}', 'University\manageApplication@applicantProfile');
Route::post('/admin/university/applicant-profile/{i}', 'University\manageApplication@updateApplicantStatus');


// SPECIALIZATIONS


Route::get('/admin/university/all-specialization', 'University\manageSpecialization@allSpecializations');


Route::get('/admin/university/add-specialization', 'University\manageSpecialization@addSpecialization');

Route::post('/admin/delete/university-specialization' , 'University\manageSpecialization@deleteSpecialization');
Route::post('/admin/university/add-specialization', 'University\manageSpecialization@createSpecialization');


Route::get('/admin/university/edit-specialization/{i}', 'University\manageSpecialization@editSpecialization');
Route::post('/admin/university/edit-specialization/{i}', 'University\manageSpecialization@updateSpecialization');

// REGISTRATION YEARS

Route::get('/admin/university/current-year', 'University\manageAcademicYear@editCurrentYear');
Route::post('/admin/university/current-year', 'University\manageAcademicYear@updateCurrentYear');

Route::get('/admin/university/upcoming-year', 'University\manageAcademicYear@addUpcomingYear');
Route::post('/admin/university/upcoming-year', 'University\manageAcademicYear@createUpcomingYear');

Route::get('/admin/university/past-years', function () {

    return view('admin-university.registration-year.past-years');

});


// MANAGE FORUM

Route::get('/admin/university/forum-categories', function () {

    return view('admin-university.forum.forum-categories');

});

Route::get('/admin/university/forum-threads', function () {

    return view('admin-university.forum.forum-threads');

});


// INSTRUCTORS

Route::get('/admin/university/all-instructors', function () {

    return view('admin-university.manage-instructors.all-instructors');

});

Route::get('/admin/university/add-instructor', function () {

    return view('admin-university.manage-instructors.add-instructors');

});

Route::get('/admin/university/edit-instructor', function () {

    return view('admin-university.manage-instructors.edit-instructors');

});



// STUDENTS

Route::get('/admin/university/all-students', function () {

    return view('admin-university.manage-students.all-students');

});

Route::get('/admin/university/add-student', function () {

    return view('admin-university.manage-students.add-student');

});

Route::get('/admin/university/student-profile', function () {

    return view('admin-university.manage-students.student-profile');

});

Route::get('/admin/university/edit-student', function () {

    return view('admin-university.manage-students.edit-student');

});




// DATE&TIME


Route::get('/admin/university/all-date-time', function () {

    return view('admin-university.date-time.all-date-time');

});


Route::get('/admin/university/add-date-time', function () {

    return view('admin-university.date-time.add-date-time');

});


Route::get('/admin/university/edit-date-time', function () {

    return view('admin-university.date-time.edit-date-time');

});



// COURSES


Route::get('/admin/university/all-courses', 'University\manageSubject@allSubjects');
Route::post('/admin/university/delete-course', 'University\manageSubject@deleteSubject');

Route::get('/admin/university/add-courses', function () {

    return view('admin-university.courses.add-courses');

});
Route::post('/admin/university/add-courses', 'University\manageSubject@createSubject');

Route::get('/admin/university/edit-courses', function () {

    return view('admin-university.courses.edit-courses');

});



// RATING


Route::get('/admin/university/all-rating', 'University\manageSubject@allRatings');



// COURSES CONTENT




Route::get('/admin/university/all-courses-content', function () {

    return view('admin-university.courses-content.all-courses-content');

});



Route::get('/admin/university/add-courses-content', function () {

    return view('admin-university.courses-content.add-courses-content');

});


Route::get('/admin/university/edit-courses-content', function () {

    return view('admin-university.courses-content.edit-courses-content');

});







// LESSONS



Route::get('/admin/university/all-lessons', function () {

    return view('admin-university.lessons.all-lessons');

});



Route::get('/admin/university/add-lessons', function () {

    return view('admin-university.lessons.add-lessons');

});


Route::get('/admin/university/edit-lessons', function () {

    return view('admin-university.lessons.edit-lessons');

});


//Exercises

Route::get('/admin/university/add-exercises', function () {

    return view('admin-university.manage-exercises.add-exercises');

});

Route::get('/admin/university/all-exercises', function () {

    return view('admin-university.manage-exercises.all-exercises');

});

Route::get('/admin/university/edit-exercises', function () {

    return view('admin-university.manage-exercises.edit-exercises');

});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|

    INSTRUCTOR Zidin University

|
*/



Route::get('/instructor/login', function () {

    return view('instructor-university.login.login');

});


Route::get('/instructor/home', function () {

    return view('instructor-university.index');

});

Route::get('/instructor/all-exercises', function () {

    return view('instructor-university.manage-exercises.all-exercises');

});


Route::get('/instructor/add-exercises', function () {

    return view('instructor-university.manage-exercises.add-exercises');

});


Route::get('/instructor/edit-exercises', function () {

    return view('instructor-university.manage-exercises.edit-exercises');

});


Route::get('/instructor/view-exercise', function () {

    return view('instructor-university.manage-exercises.view-exercise');

});


Route::get('/instructor/view-exercise/student-answers', function () {

    return view('instructor-university.manage-exercises.student-exercise');

});


// Course Material

Route::get('/instructor/courses', function () {

    return view('instructor-university.manage-material.allCourses');

});

Route::get('/instructor/courses-edit', function () {

    return view('instructor-university.manage-material.editCourses');

});

//Profile

Route::get('/instructor/profile', function () {

    return view('instructor-university.profile.profile');

});
