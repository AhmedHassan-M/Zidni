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
                        <a href="/instructor/home" class="navbar-brand nav-link">
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
                                <span class="user-name">Instructor</span>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="/instructor/profile" class="dropdown-item"><i class="fas fa-user-circle"></i> My
                                    Profile</a>
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


                    <div class="main-menu-content ps-container ps-theme-light ps-active-y">
                            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                
                
                                <li class="nav-item dashboard-item">
                                    <a href="/instructor/home">
                                        <i class="fas fa-tachometer-alt"></i>
                                        <span class="menu-title">Dashboard</span>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="/instructor/courses">
                                        <i class="fas fa-book-open"></i>
                                        <span class="menu-title">My Courses</span>
                                    </a>
                                </li>


                                <li class="nav-item"><a class="icon" ref="#"><i class="fas fa-book-open"></i><span
                                    class="menu-title">Manage Exercises</span></a>
                                    <ul class="menu-content">
                                        <li><a href="/instructor/all-exercises" class="menu-item">All Exercises</a>
                                        </li>
                                        <li><a href="/instructor/add-exercises" class="menu-item">Add Exercise</a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="nav-item">
                                    <a href="#">
                                        <i class="fas fa-book-open"></i>
                                        <span class="menu-title">Final Exams</span>
                                    </a>
                                </li>

        
                
                
                                <div class="menu-footer">
                
                                    <p>© 2019 Copyright | All Rights Reserved</p>
                                    <p>Developed by WasilaDev</p>
                
                                </div>
                
                            </ul>
                    </div>


        
    </div>

    <!-- END MAIN MENU -->





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
    <script type="text/javascript" src="{{asset('/admin/js/main-instructor.js')}}"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>




    @yield('scripts')


</body>

</html>