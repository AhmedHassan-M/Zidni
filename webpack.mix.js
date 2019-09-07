let mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/assets/js/vendor.js", "public/js/vendor.js")
    .js("resources/assets/js/views/main-app.js", "public/js/main-app.js")
    .js(
        "resources/assets/js/views/profile-bundel.js",
        "public/js/profile-bundel.js"
    )
    .js(
        "resources/assets/js/components/main-courses.js",
        "public/js/main-courses.js"
    )
    .js(
        "resources/assets/js/components/main-specialization.js",
        "public/js/main-specialization.js"
    )
    .js(
        "resources/assets/js/components/main-master.js",
        "public/js/main-master.js"
    )

    .js(
        "resources/assets/js/components/certificate.js",
        "public/js/certificate.js"
    )

    // university

    .js(
        "resources/assets/js/components/university.js",
        "public/js/university.js"
    )
    .js(
        "resources/assets/js/views/main-university.js",
        "public/js/main-university.js"
    )

    /* Admin js */
    .js(
        "resources/assets-admin/js/admin-vendor.js",
        "public/admin/js/admin-vendor.js"
    )
    .js(
        "resources/assets-admin/js/views/main-admin.js",
        "public/admin/js/main-admin.js"
    )
    .js(
        "resources/assets-admin/js/views/main-instructor.js",
        "public/admin/js/main-instructor.js"
    )

    /* Admin Pages Js */

    .js(
        "resources/assets-admin/js/pages/home-page/home-page.js",
        "public/admin/js/pages/home-page.js"
    )

    .js(
        "resources/assets-admin/js/pages/userPage.js",
        "public/admin/js/pages/userPage.js"
    )

    .js(
        "resources/assets-admin/js/pages/inboxPage.js",
        "public/admin/js/pages/inboxPage.js"
    )

    .js(
        "resources/assets-admin/js/pages/allAdminsPage.js",
        "public/admin/js/pages/allAdminsPage.js"
    )

    .js(
        "resources/assets-admin/js/pages/addAdminsPage.js",
        "public/admin/js/pages/addAdminsPage.js"
    )

    .js(
        "resources/assets-admin/js/pages/allRolesPage.js",
        "public/admin/js/pages/allRolesPage.js"
    )

    .js(
        "resources/assets-admin/js/pages/addRolesPage.js",
        "public/admin/js/pages/addRolesPage.js"
    )

    .js(
        "resources/assets-admin/js/pages/allCategoriesPage.js",
        "public/admin/js/pages/allCategoriesPage.js"
    )

    .js(
        "resources/assets-admin/js/pages/addCategoriesPage.js",
        "public/admin/js/pages/addCategoriesPage.js"
    )

    // Courses

    .js(
        "resources/assets-admin/js/pages/allCoursesPage.js",
        "public/admin/js/pages/allCoursesPage.js"
    )

    .js(
        "resources/assets-admin/js/pages/addCoursesPage.js",
        "public/admin/js/pages/addCoursesPage.js"
    )

    .js(
        "resources/assets-admin/js/pages/editCoursesPage.js",
        "public/admin/js/pages/editCoursesPage.js"
    )

    // Masters

    .js(
        "resources/assets-admin/js/pages/manage-masters/allMastersPage.js",
        "public/admin/js/pages/allMastersPage.js"
    )

    .js(
        "resources/assets-admin/js/pages/manage-masters/addMastersPage.js",
        "public/admin/js/pages/addMastersPage.js"
    )

    .js(
        "resources/assets-admin/js/pages/manage-masters/editMastersPage.js",
        "public/admin/js/pages/editMastersPage.js"
    )

    //Specializations

    .js(
        "resources/assets-admin/js/pages/manage-specializations/allSpecializations.js",
        "public/admin/js/pages/allSpecializations.js"
    )

    .js(
        "resources/assets-admin/js/pages/manage-specializations/addSpecializations.js",
        "public/admin/js/pages/addSpecializations.js"
    )

    .js(
        "resources/assets-admin/js/pages/manage-specializations/editSpecializations.js",
        "public/admin/js/pages/editSpecializations.js"
    )

    // Quizzes

    .js(
        "resources/assets-admin/js/pages/manage-quizzes/allQuizzes.js",
        "public/admin/js/pages/allQuizzes.js"
    )

    .js(
        "resources/assets-admin/js/pages/manage-quizzes/addQuizzes.js",
        "public/admin/js/pages/addQuizzes.js"
    )

    .js(
        "resources/assets-admin/js/pages/manage-quizzes/editQuizzes.js",
        "public/admin/js/pages/editQuizzes.js"
    )

    // instructors

    .js(
        "resources/assets-admin/js/pages/manage-instructors/allInstructors.js",
        "public/admin/js/pages/allInstructors.js"
    )

    .js(
        "resources/assets-admin/js/pages/manage-instructors/addInstructors.js",
        "public/admin/js/pages/addInstructors.js"
    )

    .js(
        "resources/assets-admin/js/pages/manage-instructors/editInstructors.js",
        "public/admin/js/pages/editInstructors.js"
    )

    // Content Pages

    .js(
        "resources/assets-admin/js/pages/contentPages.js",
        "public/admin/js/pages/contentPages.js"
    )

    // New live sessions

    .js(
        "resources/assets-admin/js/pages/manage-live-sessions/newLiveSessions.js",
        "public/admin/js/pages/newLiveSessions.js"
    )

    // Sales report

    .js(
        "resources/assets-admin/js/pages/salesReportPage.js",
        "public/admin/js/pages/salesReportPage.js"
    )

    // Subscribe Inbox

    .js(
        "resources/assets-admin/js/pages/subscribeInboxPage.js",
        "public/admin/js/pages/subscribeInboxPage.js"
    )

    // Profile

    .js(
        "resources/assets-admin/js/pages/profilePage.js",
        "public/admin/js/pages/profilePage.js"
    )

    // --------------------------- UNIVERSITY JS  ------------------------------

    // APPLICANTS

    .js(
        "resources/assets-admin/js/pages-university/applicant/all-applicant.js",
        "public/admin/js/pages-university/applicant/all-applicant.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/applicant/accepted-applicant.js",
        "public/admin/js/pages-university/applicant/accepted-applicant.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/applicant/rejected-applicant.js",
        "public/admin/js/pages-university/applicant/rejected-applicant.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/applicant/applicant-profile.js",
        "public/admin/js/pages-university/applicant/applicant-profile.js"
    )

    // specialization

    .js(
        "resources/assets-admin/js/pages-university/specialization/all-specialization.js",
        "public/admin/js/pages-university/specialization/all-specialization.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/specialization/add-specialization.js",
        "public/admin/js/pages-university/specialization/add-specialization.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/specialization/edit-specialization.js",
        "public/admin/js/pages-university/specialization/edit-specialization.js"
    )

    // COURSES

    .js(
        "resources/assets-admin/js/pages-university/courses/all-courses.js",
        "public/admin/js/pages-university/courses/all-courses.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/courses/add-courses.js",
        "public/admin/js/pages-university/courses/add-courses.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/courses/edit-courses.js",
        "public/admin/js/pages-university/courses/edit-courses.js"
    )

    // DATEANDTIME

    .js(
        "resources/assets-admin/js/pages-university/date-time/all-date-time.js",
        "public/admin/js/pages-university/date-time/all-date-time.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/date-time/add-date-time.js",
        "public/admin/js/pages-university/date-time/add-date-time.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/date-time/edit-date-time.js",
        "public/admin/js/pages-university/date-time/edit-date-time.js"
    )

    // RATING

    .js(
        "resources/assets-admin/js/pages-university/rating/all-rating.js",
        "public/admin/js/pages-university/rating/all-rating.js"
    )

    // COURSES CONTENT

    .js(
        "resources/assets-admin/js/pages-university/courses-content/all-courses-content.js",
        "public/admin/js/pages-university/courses-content/all-courses-content.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/courses-content/add-courses-content.js",
        "public/admin/js/pages-university/courses-content/add-courses-content.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/courses-content/edit-courses-content.js",
        "public/admin/js/pages-university/courses-content/edit-courses-content.js"
    )

    // LESSONS

    .js(
        "resources/assets-admin/js/pages-university/lessons/all-lessons.js",
        "public/admin/js/pages-university/lessons/all-lessons.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/lessons/add-lessons.js",
        "public/admin/js/pages-university/lessons/add-lessons.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/lessons/edit-lessons.js",
        "public/admin/js/pages-university/lessons/edit-lessons.js"
    )

    .sass("resources/assets/sass/app.scss", "public/css")
    .sass(
        "resources/assets/sass/arabic/ar-university.scss",
        "public/css/ar-university.css"
    )

    //Exercises
    .js(
        "resources/assets-admin/js/pages-university/exercises/addExercises.js",
        "public/admin/js/pages-university/exercises/addExercises.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/exercises/allExercises.js",
        "public/admin/js/pages-university/exercises/allExercises.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/exercises/editExercises.js",
        "public/admin/js/pages-university/exercises/editExercises.js"
    )

    .js(
        "resources/assets-admin/js/pages-university/exercises/edit-Exercises.js",
        "public/admin/js/pages-university/exercises/edit-Exercises.js"
    )
    // REGISTRATION YEAR

    .js(
        "resources/assets-admin/js/pages-university/registration-year/current-year.js",
        "public/admin/js/pages-university/registration-year/current-year.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/registration-year/upcoming-year.js",
        "public/admin/js/pages-university/registration-year/upcoming-year.js"
    )
    .js(
        "resources/assets-admin/js/pages-university/registration-year/past-years.js",
        "public/admin/js/pages-university/registration-year/past-years.js"
    )

    // MANAGE INSTRUCTORS

    .js(
        "resources/assets-admin/js/pages-university/manage-instructors/allInstructors.js",
        "public/admin/js/pages-university/manage-instructors/allInstructors.js"
    )

    .js(
        "resources/assets-admin/js/pages-university/manage-instructors/addInstructors.js",
        "public/admin/js/pages-university/manage-instructors/addInstructors.js"
    )

    .js(
        "resources/assets-admin/js/pages-university/manage-instructors/editInstructors.js",
        "public/admin/js/pages-university/manage-instructors/editInstructors.js"
    )

    // MANAGE STUDENTS

    .js(
        "resources/assets-admin/js/pages-university/manage-student/all-students.js",
        "public/admin/js/pages-university/manage-student/all-students.js"
    )

    .js(
        "resources/assets-admin/js/pages-university/manage-student/student-profile.js",
        "public/admin/js/pages-university/manage-student/student-profile.js"
    )

    .js(
        "resources/assets-admin/js/pages-university/manage-student/add-student.js",
        "public/admin/js/pages-university/manage-student/add-student.js"
    )

    // FORUM

    .js(
        "resources/assets-admin/js/pages-university/forum/forum-categories.js",
        "public/admin/js/pages-university/forum/forum-categories.js"
    )

    .js(
        "resources/assets-admin/js/pages-university/forum/forum-threads.js",
        "public/admin/js/pages-university/forum/forum-threads.js"
    )

    /* INSTUCTOR JS */

    // COURSES
    .js(
        "resources/assets-admin/js/instructor/courses/all-courses.js",
        "public/admin/js/instructor/courses/all-courses.js"
    )

    .js(
        "resources/assets-admin/js/instructor/courses/edit-courses.js",
        "public/admin/js/instructor/courses/edit-courses.js"
    )

    // EXERCISES
    .js(
        "resources/assets-admin/js/instructor/exercises/all-exercises.js",
        "public/admin/js/instructor/exercises/all-exercises.js"
    )

    .js(
        "resources/assets-admin/js/instructor/exercises/add-exercise.js",
        "public/admin/js/instructor/exercises/add-exercise.js"
    )

    .js(
        "resources/assets-admin/js/instructor/exercises/edit-exercises.js",
        "public/admin/js/instructor/exercises/edit-exercises.js"
    )

    .js(
        "resources/assets-admin/js/instructor/exercises/view-exercise.js",
        "public/admin/js/instructor/exercises/view-exercise.js"
    )


    // NEW STUDENT UNIVERSITY 

    .js(
        "resources/assets/js/components/university/course_material.js",
        "public/js/university/course_material.js"
    )

    /* Admin css */
    .sass(
        "resources/assets-admin/sass/admin-app.scss",
        "public/admin/css/admin-app.css"
    )

    .sass(
        "resources/assets-admin/sass/admin-app-ar.scss",
        "public/admin/css/admin-app-ar.css"
    );

mix.browserSync("http://localhost:8000");
