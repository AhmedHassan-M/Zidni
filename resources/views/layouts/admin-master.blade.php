<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <meta name="theme-color" content="#4285f4">

    <meta name="description" content="A description of the page">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/sc-1.4.4/sl-1.2.5/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.24.1/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.11/css/perfect-scrollbar.min.css">

    <link href="{{ asset('/admin/css/admin-app.css') }}" rel="stylesheet">


    {{-- <link href="{{ asset('/admin/css/admin-app-ar.css') }}" rel="stylesheet"> --}}



    @yield('links')

</head>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns"
    class="vertical-layout vertical-menu 2-columns fixed-navbar">



    <!-- START NAVBAR-FIXED-TOP -->

    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top">
        <div class="navbar-wrapper">



            <!-- START NAV IMG -->
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                    <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                    <li class="nav-item branding-container">
                        <a href="/admin/home" class="navbar-brand nav-link">
                            <img alt="branding logo" src="{{asset('/images/logo.png')}}"
                                data-expand="{{asset('/images/logo.png')}}"
                                data-collapse="{{asset('/images/logo.png')}}" class="brand-logo">
                        </a>
                    </li>
                    <li class="nav-item hidden-md-up float-xs-right">
                        <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container">

                            <i class="fas fa-user"></i>

                        </a>
                    </li>
                </ul>
            </div>
            <!-- END NAV IMG -->


            <div class="navbar-container content container-fluid">
                <div id="navbar-mobile" class="collapse navbar-toggleable-sm">

                    <!-- START TOGGLE & EXPAND -->
                    <ul class="nav navbar-nav">
                        <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                    <!-- END TOGGLE & EXPAND -->




                    <ul class="nav navbar-nav float-xs-right">


                        <li class="nav-item zidni-site-icon">

                            <a href="/" target="_blank">
                                <p> <img src="{{asset('/images/zidni-home.svg')}}" alt="Home"> Go To Zidni Website</p>
                            </a>

                        </li>



                        <!-- START NOTIF -->
                        <?php
                                if(Auth::check()){
                                    $notification_number = 0;
                                    foreach($count as $counts){
                                        if($counts->user_id = Auth::user()->id){
                                            $notification_number = $counts->number;
                                        }
                                    }
                                }
                            ?>

                        <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown"
                                class="nav-link nav-link-label"><i
                                    class="far fa-bell notification-icon"></i>@if($notification_number > 0)<span
                                    class="tag tag-pill tag-default tag-danger tag-default tag-up">
                                    {{$notification_number}} </span> @endif </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span>
                                    </h6>
                                </li>
                                <li class="list-group scrollable-container">

                                    @if(count($adminNotifications) < 6) @foreach($adminNotifications as
                                        $adminNotification) <a href="{{$adminNotification->link}}"
                                        class="list-group-item">
                                        <div class="media">
                                            <div class="media-left"><span
                                                    class="avatar avatar-sm avatar-online rounded-circle">
                                                    @if($adminNotification->title == "Contact-Us Message")

                                                    <i class="fas fa-envelope"></i>

                                                    @elseif($adminNotification->title == "Registration")

                                                    <i class="fas fa-user"></i>

                                                    @elseif($adminNotification->title == "Course Enrollment")

                                                    <i class="fas fa-user-graduate"></i>

                                                    @elseif($adminNotification->title == "Specialization Enrollment")

                                                    <i class="fas fa-user-graduate"></i>

                                                    @elseif($adminNotification->title == "Master-Degree Enrollment")

                                                    <i class="fas fa-user-graduate"></i>

                                                    @endif
                                                </span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">{{$adminNotification->title}}</h6>
                                                <p class="notification-text font-small-3 text-muted">
                                                    {{$adminNotification->text}}</p>
                                            </div>
                                        </div>
                                        </a>
                                        @endforeach
                                        @else
                                        @for($i = 0 ; $i < 6 ; $i++) <a href="{{$adminNotifications[$i]->link}}"
                                            class="list-group-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <span class="avatar avatar-sm avatar-online rounded-circle">

                                                        @if($adminNotifications[$i]->title == " Registration")

                                                        <i class="fas fa-user"></i>


                                                        @elseif($adminNotifications[$i]->title == "Contact-Us Message")


                                                        <i class="fas fa-envelope"></i>



                                                        @elseif($adminNotifications[$i]->title == "Course Enrollment")


                                                        <i class="fas fa-user-graduate"></i>

                                                        @elseif($adminNotifications[$i]->title == "Specialization
                                                        Enrollment")


                                                        <i class="fas fa-user-graduate"></i>

                                                        @elseif($adminNotifications[$i]->title == "Master-Degree
                                                        Enrollment")


                                                        <i class="fas fa-user-graduate"></i>

                                                        @endif


                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">{{$adminNotifications[$i]->title}}</h6>
                                                    <p class="notification-text font-small-3 text-muted">
                                                        {{$adminNotifications[$i]->text}}</p>
                                                </div>
                                            </div>
                                            </a>
                                            @endfor
                                            @endif
                                </li>
                                <li class="dropdown-menu-footer"><a href="/admin/all-notification"
                                        class="dropdown-item text-muted text-xs-center">Read All Notifications</a></li>
                            </ul>
                        </li>



                        <!-- END NOTIF -->


                        <!-- START ACCOUNT -->
                        <li class="dropdown dropdown-user nav-item">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link icon">
                                <span class="avatar avatar-online">
                                    @if(empty(Auth::user()->image))
                                    <img src="{{asset('/images/user.png')}}" alt="avatar">
                                    @else
                                    <img src="image/{{Auth::user()->photo}}" alt="avatar">
                                    @endif
                                </span>
                                <span class="user-name">{{Auth::user()->full_name}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="/admin/profile" class="dropdown-item"><i class="fas fa-user-circle"></i> My
                                    Profile</a>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#announcement"><i
                                        class="fas fa-bullhorn"></i> Send Announcement</a>
                                <a href="/logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </li>
                        <!-- END ACCOUNT -->

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- END NAVBAR-FIXED-TOP -->


    <!-- START MAIN MENU -->

    <div data-scroll-to-active="false" class="main-menu menu-fixed menu-light menu-accordion menu-shadow">

        <!-- main menu content-->



        <ul class="nav nav-tabs admin-switch-container" role="tablist">
            <li class="nav-item">
                
                <a id="moocMenu" class="nav-link" data-toggle="tab" href="#mooc" role="tab"><i class="fas fa-chalkboard-teacher"></i><span> Mooc</span></a>
            </li>
            <li class="nav-item">
                <a id="universityMenu" class="nav-link" data-toggle="tab" href="#university" role="tab"><i class="fas fa-university"></i><span> University</span></a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane" id="mooc" role="tabpanel">



                    <div class="main-menu-content ps-container ps-theme-light ps-active-y">
                            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                
                
                                <li class="nav-item dashboard-item"><a href="/admin/home"><i class="fas fa-tachometer-alt"></i><span
                                            class="menu-title">Dashboard</span></a></li>
                
                
                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-graduation-cap"></i><span
                                            class="menu-title">Manage Masters Degree</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/all-masters" class="menu-item">All masters degree</a>
                                        </li>
                                        <li><a href="/admin/add-masters" class="menu-item">Add new masters degree</a>
                                        </li>
                                    </ul>
                                </li>
                
                
                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-graduation-cap"></i><span
                                            class="menu-title">Manage Specializations</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/all-specializations" class="menu-item">All Specializations</a>
                                        </li>
                                        <li><a href="/admin/add-specializations" class="menu-item">Add new Specializations</a>
                                        </li>
                                    </ul>
                                </li>
                
                
                
                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-desktop"></i><span
                                            class="menu-title">Manage Courses</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/all-courses" class="menu-item">All Courses</a>
                                        </li>
                                        <li><a href="/admin/add-courses" class="menu-item">Add new courses</a>
                                        </li>
                                    </ul>
                                </li>
                
                
                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-video"></i><span class="menu-title">Manage
                                            Live sessions</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/new-live-sessions" class="menu-item">Create New Live session</a></li>
                                    </ul>
                                </li>
                
                
                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-question-circle"></i><span
                                            class="menu-title">Manage Quizzes</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/all-quizzes" class="menu-item">All Quizzes</a></li>
                                        <li><a href="/admin/add-quizzes" class="menu-item">Add New Quize</a></li>
                
                                    </ul>
                                </li>
                
                
                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-th"></i><span class="menu-title">Manage
                                            Categories</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/all-categories" class="menu-item">All Categories</a>
                
                                        </li>
                                        <li><a href="/admin/add-categories" class="menu-item">Add new Category</a>
                                        </li>
                                    </ul>
                                </li>
                
                
                
                                <li class=" nav-item"><a href="/admin/all-users"><i class="fas fa-users"></i><span
                                            class="menu-title">Manage website users</span></a></li>
                
                
                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-chalkboard-teacher"></i><span
                                            class="menu-title">Manage instructors</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/all-instructors" class="menu-item">All instructors</a>
                                        </li>
                                        <li><a href="/admin/add-instructors" class="menu-item">Add new instructors</a>
                                        </li>
                                    </ul>
                                </li>
                
                
                
                                <li class="nav-item"><a class="icon" ref="#"><i class="far fa-edit"></i><span class="menu-title">Manage Content</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/vision-mission" class="menu-item">Vision, Mission</a>
                                        </li>
                                        <li><a href="/admin/how-to-learn" class="menu-item">How to learn</a>
                                        </li>
                
                                        <li><a href="/admin/agreement" class="menu-item">Agreement</a>
                                        </li>
                
                
                                        <li><a href="/admin/board-of-advisor" class="menu-item">Board Of advisor</a>
                                        </li>
                
                
                
                                        <li><a href="/admin/instructors" class="menu-item">Instructors</a>
                                        </li>
                
                                        <li><a href="/admin/police" class="menu-item">Police</a>
                                        </li>
                
                
                                        <li><a href="/admin/about-us" class="menu-item">About Us</a>
                                        </li>
                
                
                                        <li><a href="/admin/faq" class="menu-item">FAQ</a>
                                        </li>
                
                
                                        <li><a href="/admin/help" class="menu-item">Help</a>
                                        </li>
                
                
                                    </ul>
                                </li>
                
                
                                <li class=" nav-item"><a href="/admin/inbox"><i class="far fa-envelope"></i><span class="menu-title">Our
                                            Contact inbox</span></a></li>
                
                
                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-user-circle"></i><span
                                            class="menu-title">Manage Admins</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/all-admins" class="menu-item">All Admins</a>
                                        </li>
                                        <li><a href="/admin/add-admins" class="menu-item">Add new Admin</a>
                                        </li>
                                    </ul>
                                </li>
                
                
                
                                {{-- <li class="nav-item"><a class="icon"ref="#"><i class="fas fa-shield-alt"></i><span class="menu-title">Manage Roles</span></a>
                                        <ul class="menu-content">
                                            <li><a href="/admin/all-roles" class="menu-item">All Roles</a>
                                            </li>
                                            <li><a href="/admin/add-roles" class="menu-item">Add new Role</a>
                                            </li>
                                        </ul>
                                    </li> --}}
                
                
                
                
                                <li class=" nav-item"><a href="/admin/sales-report"><i class="fas fa-file-invoice"></i><span
                                            class="menu-title">Sales Report</span></a></li>
                
                
                                <li class=" nav-item"><a href="/admin/subscribe-inbox"><i class="fas fa-inbox"></i><span
                                            class="menu-title">Subscribe Inbox</span></a></li>
                
                
                                <div class="menu-footer">
                
                                    <p>© 2018 Copyright | All Rights Reserved</p>
                                    <p>Developed by WsilaDev</p>
                
                                </div>
                
                            </ul>
                    </div>


                
            </div>
            <div class="tab-pane" id="university" role="tabpanel">




                    <div class="main-menu-content ps-container ps-theme-light ps-active-y">
                            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                
                
                                <li class="nav-item dashboard-item"><a href="/admin/university/home"><i class="fas fa-tachometer-alt"></i><span
                                            class="menu-title">Dashboard</span></a></li>
                
                
                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-users"></i><span
                                            class="menu-title">Manage Applicant</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/university/all-applicant" class="menu-item">All Applicant</a>
                                        </li>

                                        <li><a href="/admin/university/accepted-applicant" class="menu-item">Accepted Applicant</a>
                                        </li>

                                        <li><a href="/admin/university/rejected-applicant" class="menu-item">Rejected Applicant</a>
                                        </li>

                                    </ul>
                                </li>


                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-graduation-cap"></i><span
                                            class="menu-title">Manage Specialization</span></a>
                                            <ul class="menu-content">
                                                <li><a href="/admin/university/all-specialization" class="menu-item">All Specialization</a>
                                                </li>

                                                <li><a href="/admin/university/add-specialization" class="menu-item">Add Specialization</a>
                                                </li>
                                            </ul>
                                </li>



                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-graduation-cap"></i><span class="menu-title">Manage Registration Years</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/university/current-year" class="menu-item">Current Year</a>
                                        </li>

                                        <li><a href="/admin/university/upcoming-year" class="menu-item">Upcoming Year</a>
                                        </li>

                                        <li><a href="/admin/university/past-years" class="menu-item">Past Years</a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-clock"></i><span
                                    class="menu-title">Manage Date & Time</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/university/all-date-time" class="menu-item">All Date & Time</a>
                                        </li>

                                        <li><a href="/admin/university/add-date-time" class="menu-item">Add Date & Time</a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-user-friends"></i><span class="menu-title">Manage Forum</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/university/forum-categories" class="menu-item">Categories</a>
                                        </li>
                                        <li><a href="/admin/university/forum-threads" class="menu-item">Threads</a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-book-open"></i><span
                                    class="menu-title">Manage Courses</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/university/all-courses" class="menu-item">All Courses</a>
                                        </li>
                                        <li><a href="/admin/university/add-courses" class="menu-item">Add Courses</a>
                                        </li>
                                        <li><a href="/admin/university/all-rating" class="menu-item">Courses Ratings</a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-chalkboard-teacher"></i><span
                                    class="menu-title">Manage Lessons</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/university/all-lessons" class="menu-item">All Lessons</a>
                                        </li>
                                        <li><a href="/admin/university/add-lessons" class="menu-item">Add Lessons</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-question-circle"></i><span
                                            class="menu-title">Manage Exercises</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/university/all-exercises" class="menu-item">All Exercises</a></li>
                                        <li><a href="/admin/university/add-exercises" class="menu-item">Add New Exercise</a></li>
                
                                    </ul>
                                </li>

                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-chalkboard-teacher"></i><span
                                    class="menu-title">Courses Content</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/university/all-courses-content" class="menu-item">All Courses Content</a>
                                        </li>
                                        <li><a href="/admin/university/add-courses-content" class="menu-item">Add Courses Content</a>
                                        </li>
                                    </ul>
                                </li>
        

                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-chalkboard-teacher"></i><span
                                    class="menu-title">Manage Instructors</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/university/all-instructors" class="menu-item">All Instructors</a>
                                        </li>
                                        <li><a href="/admin/university/add-instructor" class="menu-item">Add Instructor</a>
                                        </li>
                                    </ul>
                                </li>
        

                                
                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-users"></i><span
                                    class="menu-title">Manage Students</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/admin/university/all-students" class="menu-item">All Students</a>
                                        </li>
                                        <li><a href="/admin/university/add-student" class="menu-item">Add Student</a>
                                        </li>
                                    </ul>
                                </li>
        

                                
                
                
                                <div class="menu-footer">
                
                                    <p>© 2019 Copyright | All Rights Reserved</p>
                                    <p>Developed by WasilaDev</p>
                
                                </div>
                
                            </ul>
                    </div>




            </div>
        </div>





        <!-- /main menu content-->

    </div>

    <!-- END MAIN MENU -->



    <!-- Modal -->
    <div class="modal fade" id="announcement" tabindex="-1" role="dialog" aria-labelledby="announcement"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Admin Announcement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form id="AnnouncementForm">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="announcementTitle">Title</label>
                            <input type="text" class="form-control" id="announcementTitle" name="announcementTitle"
                                placeholder="">
                        </div>


                        <div class="form-group">
                            <label for="announcementText">Announcement</label>
                            <textarea class="form-control" name="announcementText" id="announcementText"
                                rows="5"></textarea>
                        </div>

                        <div class="form-submit">

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Publish Announcement</button>

                            <div class="ajax-loading loader loader--style2" title="1">
                                <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px"
                                    height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                                    xml:space="preserve">
                                    <path fill="#000"
                                        d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                        <animateTransform attributeType="xml" attributeName="transform" type="rotate"
                                            from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite" />
                                    </path>
                                </svg>
                            </div>


                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>




    @yield('content')



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.24.1/sweetalert2.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.11/js/perfect-scrollbar.jquery.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js">
    </script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/sc-1.4.4/sl-1.2.5/datatables.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
    <script type="text/javascript" src="{{asset('/admin/js/admin-vendor.js')}}"></script>
    <script type="text/javascript" src="{{asset('/admin/js/main-admin.js')}}"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>


    <script>


    function activeMenu(){

            let getActiveMenu = localStorage.getItem('activeMenu');
            if (getActiveMenu == "moocMenu") {
                $('.admin-switch-container #moocMenu').tab('show');
            } else if (getActiveMenu == "universityMenu") {
                $('.admin-switch-container #universityMenu').tab('show');
            } else {
                console.log('dk');
            }

    }
    
    $('.admin-switch-container .nav-link').click(function (e) {

        e.preventDefault()
        $(this).tab('show')

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        let setActiveMenu = $(this).attr('id');
        localStorage.setItem('activeMenu', setActiveMenu);

        activeMenu();

    });


    $(document).ready(function() {

        activeMenu();

    });


    
    
    </script>

    @yield('scripts')


</body>

</html>