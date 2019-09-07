<html>
    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>@yield('title')</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#01273f">
        <meta name="msapplication-TileColor" content="#01273f">
        <meta name="theme-color" content="#01273f">
      
          
        <meta name="description" content="Zidni Islamic Institute">
      
        <!-- Force IE 8/9/10 to use its latest rendering engine -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">



              
        <meta property="og:image:width" content="1418">
        <meta property="og:image:height" content="742">
        <meta property="og:description" content="An Accredited Branch of the Islamic University of Minnesota">
        <meta property="og:title" content="Zidni Islamic Institute">
        <meta property="og:url" content="https://zidniaccess.com/">
        <meta property="og:image" content="/og-image.jpg">
      
      
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@site_account">
        <meta name="twitter:creator" content="@individual_account">
        <meta name="twitter:url" content="https://zidniaccess.com/">
        <meta name="twitter:title" content="Zidni Islamic Institute">
        <meta name="twitter:description" content="An Accredited Branch of the Islamic University of Minnesota">
        <meta name="twitter:image" content="/og-image.jpg">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.24.1/sweetalert2.min.css">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">


        @yield('links')

    </head>
    <body>



        
        {{-- START NAVBAR --}}


<div class="wsmenucontainer clearfix">



        <div class="overlapblackbg"></div>
    
    
    
        <div class="wsmobileheader clearfix">
          <a id="wsnavtoggle" class="animated-arrow">
            <span></span>
          </a>
          <a href="/" class="smallogo">
            <img src="{{asset('images/zidni-logo-1.png')}}" alt="Zidni Logo" />
          </a>

        @if(Auth::guest())
          
            
        <a class="callusicon" data-toggle="modal" data-target="#registrationModal">

         

          <span class="mobile-user-icon">


            <img src="{{asset('images/user-icon-3.svg')}}" alt="user icon">
            
        
          </span>
        </a>
          
            


          @else

          @if(Auth::check())
            @if(Auth::user()->admin == 1)
              <a class="callusicon" href="/admin/profile">
                
            @elseif(Auth::user()->admin == 0)
              <a class="callusicon" href="/profile">
            
            @endif

          @else

            <a class="callusicon" data-toggle="modal" data-target="#registrationModal">
          @endif


            <span class="mobile-user-icon">


              <img src="{{asset('images/user-icon-3.svg')}}" alt="user icon">
              

            </span>
          </a>
            


          @endif




        </div>
    
    
        <div class="headerfull">
          <!--Main Menu HTML Code-->
          <div class="wsmain">
    
            <div class="smllogo">
              <a href="/">
                <img src="{{asset('images/zidni-logo-1.png')}}" alt="Zidni Logo" />

                
              </a>
            </div>
    
            <nav class="wsmenu clearfix">
              <ul class="mobile-sub wsmenu-list">
    
    
                <li>
                  <a href="#" class="navtext" id="main_mega_menu">
                    <span>Category</span>
                    <img src="{{asset('images/menu.svg')}}" class="main-menu-icon" alt="menu">
                  </a>
    
                  <div class="wsshoptabing wstfullmenubg01 clearfix" id="allcategories">
                    <div class="wsshoptabingwp clearfix">
    
    
                      <ul class="wstabitem mega_menu_categories clearfix">
    
                        <h3 class="categories-title">Categories</h3>


                        

                        <?php $x = 4; ?>



                        @foreach($categories as $category)
                          @if(count($category->courses) > 0)
                          <?php  
                            $courses_id = array();

                            foreach($category->courses as $key => $course){
                              $courses_id[] = $course->id;
                            }



                            $coursesMaster = \App\Coursemaster::whereIn('course_id' , $courses_id)->get();
                            $coursesSpec = \App\Coursespec::whereIn('course_id' , $courses_id)->get();
                          ?>

                          @if(count($coursesMaster) > 0 || count($coursesSpec) > 0 || count($category->courses) > 0)

                          <?php $x--; ?>


                            <li class="mega_menu_category_item" data-category="{{$category->id}}">
                              <a href="#{{$category->id}}">{{$category->name}}</a>
                            </li>


                            <li class="mobile_mega_menu_category_item" data-category="{{$category->id}}">
                              <a href="/all-categories">{{$category->name}}</a>
                            </li>

                          
                          @endif
                          @if($x == 0)
                            <?php break; ?>
                          @endif
                          @endif
                        @endforeach

                          <h4 class="more-categories-title">
                            
                            <a href="/all-categories">Show More Categories</a>
                          
                          </h4>
    
                      </ul>
    
                      <div class="wstabcontent clearfix">
    


                        {{-- 1 div --}}


                        @foreach($categories as $key => $category)

                        
                        @if(count($category->courses) > 0)

                        <?php  
                            $courses_id = array();
                            $t=time();
                            $currentMonth = date("n",$t);

                            foreach($category->courses as $key => $course){
                              $courses_id[] = $course->id;
                            }



                            $coursesMaster = \App\Coursemaster::whereIn('course_id' , $courses_id)->get();
                            $coursesSpec = \App\Coursespec::whereIn('course_id' , $courses_id)->get();
                          ?>

                          

                          <div id="{{$category->id}}" class="mega_menu_content_item clearfix">

                          @if(count($coursesMaster) > 0)
                          <ul id="mega_menu_masters_items" class="wstliststy02">
    
                              <h3 class="categories-title">Master's Degree</h3>
                              <?php $masterIds = array(); ?>
                              @foreach($category->courses as $key => $course)
                              <?php
                                $coursesMaster = \App\Coursemaster::where('course_id' , $course->id)->get();
                                foreach ($coursesMaster as $key => $coursesMasters) {
                                  if(!in_array($coursesMasters->master_id, $masterIds, true)){
                                    $masterIds[] = $coursesMasters->master_id;
                                  }
                                }
                                
                                //$masters = \App\Master::whereIn('id' , $coursesMaster)->limit(6)->get();
                              ?>

                                
                              @endforeach
                              <?php 
                                $masters = \App\Master::whereIn('id' , $masterIds)->limit(6)->get();
                                
                              ?>
                              @foreach($masters as $master)
                              <?php 
                                $date = strtotime($master->created_at);
                                $masterMonth = date("n",$date);
                                ?>
                              <li>
                                @if($currentMonth == $masterMonth || $currentMonth - $masterMonth == 1)
                                <a href="/masters-degree/{{$master->id}}">                                
                                  {{$master->name}}<span class="span-status">New</span>
                                </a>
                                @else
                                <a href="/masters-degree/{{$master->id}}">                                
                                  {{$master->name}}
                                </a>
                                @endif

                              </li>
                              @endforeach
                              
                          </ul>
                          @else
                          <ul id="mega_menu_masters_items" class="wstliststy02">
    
                              <h3 class="categories-title">Master's Degree</h3>
                              
                              <li>
                               
                                <a href="/all-masters-degree">                                
                                    See All Masters Degree
                                </a>

                              </li>
                              
                          </ul>
                          @endif

                          @if(count($coursesSpec) > 0)
                          <ul id="mega_menu_specializations_items wsshoplink-active" class="wstliststy02">

                              <h3 class="categories-title">Specializations</h3>

                              <?php $specIds = array(); ?>
                              @foreach($category->courses as $key => $course)
                              <?php
                                $coursesSpec = \App\Coursespec::where('course_id' , $course->id)->get();
                                foreach ($coursesSpec as $key => $coursesSpecs) {
                                  if(!in_array($coursesSpecs->specialization_id, $specIds, true)){
                                    $specIds[] = $coursesSpecs->specialization_id;
                                  }
                                }
                                
                              ?>
                              @endforeach

                              <?php 
                              $specs = \App\Specialization::whereIn('id' , $specIds)->limit(6)->get();
                              
                              ?>
                              @foreach($specs as $spec)
                                <?php 
                                $date = strtotime($spec->created_at);
                                $specMonth = date("n",$date);
                                ?>
                                <li>
                                  @if($currentMonth == $specMonth || $currentMonth - $specMonth == 1)
                                    <a href="/specialization/{{$spec->id}}"> 
                                      {{$spec->name}}<span class="span-status">New</span>
                                    </a>
                                  @else
                                    <a href="/specialization/{{$spec->id}}"> 
                                      {{$spec->name}}
                                    </a>
                                  @endif
                                </li>


                              @endforeach
                            
                              
 
                          </ul>
                          @else
                          <ul id="mega_menu_specializations_items wsshoplink-active" class="wstliststy02">

                              <h3 class="categories-title">Specializations</h3>
                              
                              <li>
                              
                                <a href="/all-specialization">                                
                                    See All Specializations
                                </a>

                              </li>
                              
                          </ul>
                          @endif

                          <ul id="mega_menu_specializations_items wsshoplink-active" class="wstliststy02">

                            <h3 class="categories-title">Courses</h3>
                            @foreach($category->courses as $course)
                              <?php 
                                $date = strtotime($course->created_at);
                                $courseMonth = date("n",$date);
                              ?>
                              <li>
                                  <a href="/course/{{$course->id}}"> 
                                    {{$course->name}}
                                    @if($currentMonth == $courseMonth || $currentMonth - $courseMonth == 1)
                                    <span class="span-status">New</span>
                                    @endif
                                  </a>
                              </li>
                            @endforeach
                          </ul>
    
                        </div>

                        
                        @endif
                        @endforeach

                      </div>
    
    
    
                    </div>
                  </div>
                </li>
    
    
    
    
                <li class="wssearchbar clearfix">
                  <form class="topmenusearch">
                    <div id="multiple-datasets">
                      <input class="typeahead" name="search" type="text" placeholder="Search for Degree, Specialization, courses">
                    </div>
                    <button class="btnstyle">
                      <i class="searchicon fa fa-search" aria-hidden="true"></i>
                    </button>
                  </form>
                </li>
    
    
    
    
                <!-- geust -->
                @if(Auth::guest())

                <li>
                  <a href="/instructor" class="navtext">
                    <span>Instructors</span>
                  </a>
                </li>


                <li>
                  <a href="/how-to-learn" class="navtext">
                    <span>How To Learn</span>
                  </a>
                </li>

    



                <li class="modalButtons">
                  <a href="#" class="navtext">
                    <button id="signinModalButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal">Sign In</button>
                  </a>
                </li>
    
                <li class="modalButtons">
                  <a href="" class="navtext">
                    <button id="signupModalButton" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#registrationModal">Sign Up</button>
                  </a>
                </li>


                @else
    
                <li>
                  <a href="/my-courses" class="navtext">
                    <span>My Courses</span>
                  </a>
                </li>

                <li>
                  <a href="/my-activity" class="navtext">
                    <span>My Activity</span>
                  </a>
                </li>


                <li class="modalButtons join__the__university">
                  <a href="/join-the-university/1" class="navtext">
                    <button id="" type="button" class="btn btn-secondary"><i class="fas fa-university"></i> Join Zidni University</button>
                  </a>
                </li>

                <li class="mobile-only">
                    <a href="/my-notifications" class="navtext">
                      <span>Notifications</span>
                      <span class="mobile-notifications-icon">

                        <span>4</span>

                      </span>
                    </a>
                </li>


                <li class="mobile-only">
                    <a href="/logout" class="navtext">
                      <span>Logout</span>
                    </a>
                </li>

        
    
                <li class="wsshopmyaccount notifications clearfix">
                  <a class="notifications-main-icon">
                    <i class="far fa-bell"></i>
                    <span class="notifications-conter"></span>
                  </a>
                  <ul class="wsmenu-submenu notifications-menu">
                    <li class="notifications-top">
    
                      <div>
    
                        <span>Notifications</span>
    
                      </div>
    

                      <div class="notifications-sittings">
    
                          <a href="/profile#my-notifications">

                            <i class="fas fa-cog"></i>

                          </a>
    
                      </div>


    
    
                    </li>
                    <li>
                      <div class="notifications-container">
    
                        <div class="notifications-img">
    
                          <img src="http://placehold.it/100x100" alt="Notifications Image">
    
                        </div>
    
                        <div class="notifications-info">
    
                          <p>Notifications about new lectures for enrolled courses</p>
    
                          <span>19/9/2019</span>
    
                        </div>
    
                        <div class="notifications-stat" data-tooltip="Mark as Read">
    
                                <input id="checkbox1" class="checkbox-custom" name="notificationsCheckbox" type="checkbox" value="checkbox" checked>
                                <label for="checkbox1" class="checkbox-custom-label"></label>
    
                        </div>
    
    
                      </div>
                    </li>
                    <li>
                      <div class="notifications-container">
    
                        <div class="notifications-img">
    
                          <img src="http://placehold.it/100x100" alt="Notifications Image">
    
                        </div>
    
                        <div class="notifications-info">
    
                          <p>Notifications about new lectures for enrolled courses</p>
    
                          <span>19/9/2019</span>
    
                        </div>
    
                        <div class="notifications-stat" data-tooltip="Mark as Read">
    
                                <input id="checkbox2" class="checkbox-custom" name="notificationsCheckbox" type="checkbox" value="checkbox" checked>
                                <label for="checkbox2" class="checkbox-custom-label"></label>
    
                        </div>
    
    
                      </div>
                    </li>
                    <li>
                      <div class="notifications-container">
    
                        <div class="notifications-img">
    
                          <img src="http://placehold.it/100x100" alt="Notifications Image">
    
                        </div>
    
                        <div class="notifications-info">
    
                          <p>Notifications about new lectures for enrolled courses</p>
    
                          <span>19/9/2019</span>
    
                        </div>
    
                        <div class="notifications-stat" data-tooltip="Mark as Read">
    
                            <input id="checkbox3" class="checkbox-custom" name="notificationsCheckbox" type="checkbox" value="checkbox" checked>
                            <label for="checkbox3" class="checkbox-custom-label"></label>
                        </div>
    
    
                      </div>
                    </li>

                                        <li>
                      <div class="notifications-container">
    
                        <div class="notifications-img">
    
                          <img src="http://placehold.it/100x100" alt="Notifications Image">
    
                        </div>
    
                        <div class="notifications-info">

                          

                          <p>Notifications about new lectures for enrolled courses</p>
    
                          <span>19/9/2019</span>
    
                        </div>
    
                        <div class="notifications-stat" data-tooltip="Mark as Read">
    
                            <input id="checkbox4" class="checkbox-custom" name="notificationsCheckbox" type="checkbox" value="checkbox" checked>
                            <label for="checkbox4" class="checkbox-custom-label"></label>
                        </div>
    
    
                      </div>
                    </li>
    
                    <li class="notifications-bottom">
    
                      <div>
    
                        <span><a id="markAllAsRead">Mark All As Read</a></span>
    
                      </div>
                      <div>
    
                        <span><a href="/my-notifications">See All</a></span>
    
                      </div>
    
    
                    </li>
    
                  </ul>
                </li>



    
    
                <li class="wsshopmyaccount account clearfix">
                  <div class="account-nav">
                    @if(empty(Auth::user()->photo))
                    <img class="main-user-image" src="/images/user.png" alt="User Image">
                    @else
                      <img class="main-user-image" src="/image/{{Auth::user()->photo}}" alt="User Image">
                    @endif
                      <div class="main-user-name">
                        HI {{Auth::user()->first_name}}
                        <i class="fa  fa-angle-down"></i>
                      </div>
    
                  </div>
    
                  <ul class="wsmenu-submenu account-menu">
    
                    <li>
                      @if(Auth::check())
                      
                        @if(Auth::user()->admin == 1)

                          <a class="account-profile-link" href="/admin/profile">

                        @elseif(Auth::user()->admin == 0)

                          <a class="account-profile-link" href="/profile">


                        

                            
                        @endif


                      @else


                        <a class="callusicon" data-toggle="modal" data-target="#registrationModal">

                      @endif

                      <div class="account-top">
    
                        <div class="account-img">
    
                            
                            @if(empty(Auth::user()->photo))
                            <img src="/images/user.png" alt="Notifications Image">
                            @else
                            <img src="/image/{{Auth::user()->photo}}" alt="Notifications Image">
                            @endif
                        </div>
    
                        <div class="account-info">
    
                          <p class="account-user-name">{{Auth::user()->full_name}}</p>
                          <p class="account-user-email">{{Auth::user()->email}}</p>

                        </div>
    
    
                      </div>
    
                    </a>
                          
                    </li>
                    @if(Auth::check())
                    @if(Auth::user()->admin == 0)
                    <li>
    
                      <div class="account-link">
    
                          <div class="account-link-icon">
    
                              <i class="far fa-envelope"></i>
    
                          </div>
                          
                          <a href="/profile#my-messages">My Messages</a>
                          
                      </div>
                      
                    </li>
                    @endif
                    @endif
    
                    <li>
    
                        <div class="account-link">
    
                            <div class="account-link-icon">
      
                                <i class="fas fa-history"></i>
    
    
      
                            </div>
                            <a href="/profile#my-purchase">Purchase History</a>
      
                        </div>
    
    
                      
                    </li>
    
                    <li>
    
    
                        <div class="account-link">
    
                            <div class="account-link-icon">
      
                                <i class="fas fa-sign-out-alt"></i>
      
                            </div>
                            <a href="/logout">Logout</a>
      
                        </div>
    
    
                    </li>
                  </ul>
                </li>
              @endif
                <!-- user -->
    
    
              </ul>
            </nav>
    
    
    
          </div>
          <!--Menu HTML Code-->
        </div>
    
</div>


        {{-- END Registration --}}  



        <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered registrationModal__container" role="document">
            
            
            
            
            
                  <div class="modal-content">
            
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="fas fa-times"></i>
                    </button>
            
                    <div class="registrationModal__logo">
            
                      <img src="{{asset('images/zidni-logo-1.png')}}" alt="Zidni Logo">
                      
                    </div>
            
            
                    <div class="registrationModal__tabs">
            
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li id="signinPill" class="nav-item">
                          <a class="nav-link active" id="pills-signin-tab" data-toggle="pill" href="#pills-signin" role="tab" aria-controls="pills-signin"
                            aria-selected="true">Sign In</a>
                        </li>
                        <li id="signupPill" class="nav-item">
                          <a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup"
                            aria-selected="false">Sign Up</a>
                        </li>
                      </ul>
                    </div>
            
            
                    <div class="registrationModal__contant">
                      <div class="modal-body">
            
                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-signin" role="tabpanel" aria-labelledby="pills-signin-tab">
            
            
                            <div id="all-signin-data">
            
                              <div class="social-login-button">
            
                                <a href="redirect/facebook" type="button" class="btn btn-facebook btn-lg btn-block">
                                  <i class="fab fa-facebook"></i>Login with Facebook</a>
            
                              </div>
            
                              <div class="or-divider">
                                <h6>Or</h6>
                              </div>
            
                             
            
                              <div class="signin-form-container">
            
                                <form id="signinForm" class="signin-form" method="POST">
                                  {{csrf_field()}}
                                  <input type="hidden" name="login" value="login">
                                  <div class="form-group">
        
                                    <label for="signinEmail">Email address</label>
                                    <input name="signinEmail" type="email" class="form-control" id="signinEmail" aria-describedby="signinEmailHelp" placeholder="Enter Your E-Mail" autocomplete="username email">
                                  </div>
            
            
            
                                  <div class="form-group">
            
                                    <div>
            
                                      <label for="signinPassword">Password</label>
                                      <span id="showPassword">Show password</span>
            
                                    </div>
            
            
                                    <input name="signinPassword" type="password" class="form-control" id="signinPassword" placeholder="Password" autocomplete="current-password">
            
                                    <div class="forget-password-link">
            
                                      <a>Forgot Password?</a>
            
                                    </div>
            
                                  </div>
            
            
            
            
                                  <div class="form-submit">
            
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
            
                                    <div class="ajax-loading loader loader--style2" title="1">
                                      <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                        <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                          <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"
                                          />
                                        </path>
                                      </svg>
                                    </div>
            
            
                                  </div>
            
            
            
            
            
                                </form>
            
            
            
            
                              </div>
            
            
            
            
                            </div>
            
            
            
            
                            <div class="forget-password-container">
            
            
                              <form id="forget-password-signin" class="forget-password-signin" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="forget" value="forget">
                                <div class="forget-password-text">
            
                                  <h4>
                                    <a id="forget-password-back">
                                      <i class="fas fa-angle-left"></i>
                                    </a>Reset Your Password</h4>
            
                                  <p>Please provide the email address you used when you signed up for your Zidni account</p>
            
                                  <p>We will send you an email with a code to reset your password.</p>
            
                                </div>
            
                                <div class="form-group">
                                  <label for="forgetPasswordEmail">EMAIL</label> 
                                  <input name="forgetPasswordEmail" type="email" class="form-control" id="forgetPasswordEmail" aria-describedby="forgetPasswordEmail"
                                    placeholder="Enter Your E-Mail">
                                </div>
            
                                <div class="form-submit">
            
                                  <button type="submit" class="btn btn-primary btn-lg btn-block">Send Email</button>
            
                                  <div class="ajax-loading loader loader--style2" title="1">
                                    <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                      width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                      <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                        <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"
                                        />
                                      </path>
                                    </svg>
                                  </div>
            
            
                                </div>
            
                              </form>
            
            
            
                            </div>
            
            
            
            
            
                          </div>
            
            
            
                          <div class="tab-pane fade" id="pills-signup" role="tabpane2" aria-labelledby="pills-signup-tab">
            
                            <div class="social-login-button">
            
                              <a href="redirect/facebook" type="button" class="btn btn-facebook btn-lg btn-block">
                                <i class="fab fa-facebook"></i>Signup with Facebook</a>
            
                            </div>
            
                            <div class="or-divider">
                              <h6>Or</h6>
                            </div>
            
            
                            <div class="signup-form-container">
            
                              <form id="signupForm" class="signup-form">
                              
                                <div class="form-group">
                                  <label for="signupName">FULL NAME</label>
                                  <input name="signupName" type="text" class="form-control" id="signupName" aria-describedby="signupNameHelp" placeholder="Enter Your Full Name">
                                </div>
            
            
                                <div class="form-group">
                                  <label for="signupEmail">E-Mail address</label>
                                  <input name="signupEmail" type="email" class="form-control" id="signupEmail" aria-describedby="signupEmailHelp" placeholder="Enter Your E-Mail">
                                </div>
            
            
            
                                <div class="form-group">
                                  <label for="signupPassword">Password</label>
                                  <input name="signupPassword" type="password" class="form-control" id="signupPassword" placeholder="Password" >
                                </div>
            
                                <div class="form-submit">
            
                                  <button type="submit" class="btn btn-primary btn-lg btn-block">SignUp</button>
            
                                  <div class="ajax-loading loader loader--style2" title="1">
                                    <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                      width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                      <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                        <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"
                                        />
                                      </path>
                                    </svg>
                                  </div>
            
            
                                </div>
            
            
            
            
            
                              </form>
            
            
                            </div>
            
            
                          </div>
                        </div>
            
            
                      </div>
                    </div>
            
            
            
            
                  </div>
                </div>
          </div>

        {{-- END Registration --}}  


            @yield('contant')


{{-- START Footer --}}  


  <footer>

        <div class="footer-container">
    
          <div class="footer-top">
    
            <div class="footer-more-one">
    
              <h4 class="footer-more-one-title">MORE</h4>
    
              <div class="footer-more-one-links">
    
    
                <ul>
                  <li><a href="/mission-vision">Mission, Vision</a></li>
                  <li><a href="/how-to-learn">How to learn</a></li>
                  <li><a href="/agreement">Agreement</a></li>
                  <li><a href="/board-of-advisor">Board of advisor</a></li>
                  <li><a href="/instructor">Instructors</a></li>
                </ul>
    
              </div>
    
            </div>
    
            <div class="footer-more-two">
    
              <div class="footer-more-two-links">
    
    
                <ul>
                  <li><a href="/about-us">About us</a></li>
                  <li><a href="/polices">Polices</a></li>
                  <li><a href="/faq">FAQ</a></li>
                </ul>
    
              </div>
    
            </div>
    
    
    
    
            <div class="footer-support">
    
              <h4 class="footer-support-title">SUPPORT</h4>
    
    
              <div class="footer-support-links">
    
    
                <ul>
                  <li><a href="/contact-us">Contact Us</a></li>
                  <li><a href="/help">Help</a></li>
                </ul>
    
              </div>
    
            </div>
    
    
    
    
            <div class="footer-follow">
    
              <h4 class="footer-follow-title">FOLLOW US</h4>
    
    
              <div class="footer-follow-links">
    
    
                <ul>
                  <li>
    
                    <i class="fab fa-facebook-f"></i>
    
                  </li>
                  <li>
    
                    <i class="fab fa-twitter"></i>
    
                  </li>
                  <li>
    
                    <i class="fab fa-linkedin-in"></i>
    
                  </li>
                </ul>
    
              </div>
    
            </div>
    
    
            <div class="footer-subscribe">
    
              <h4 class="footer-subscribe-title">SUBSCRIBE NOW</h4>
    
    
              <div class="footer-subscribe-links">
    
    
                <form id="subscribeForm">
    
                  <div class="subscribe-input-container">
                  {{ csrf_field()}}
                      <input type="email" class="form-control" id="subscribeInput" placeholder="E-Mail" name="subscribeInput" required>
    
                      <span class="input-group-btn">
                          <button type="submit" class="btn subscribe-send">
                              <i class="fas fa-arrow-right"></i>
                          </button>
                      </span>
    
                  </div>
    
                </form>
    
              </div>
    
            </div>
    
    
          </div>
    
          <span class="footer-devider"></span>
    
          <div class="footer-bottom">
    
    
            <div class="footer-bottom-logo">
    
    
              <img src="{{asset('images/zidni-logo-1.png')}}" alt="Zidni logo">
    
    
            </div>
    
    
            <div class="footer-bottom-about">
    
              <h5>ABOUT US</h5>
    
              <p>Zidni Islamic Institute is a non-profit organization that teaches the Islamic Sciences according to the methodology
                of orthodox Sunni Islam, Ahl al-Sunnah Wa al-Jamāʿah.</p>
    
    
            </div>
    
    
          </div>
    
          <div class="copyright">
    
            <p>© 2018 Zidni Islamic Institute. All rights reserved. Developed By <a class="wasilaDev" href="http://wasiladev.com/" target="_blank">WasilaDev</a></p>
    
    
          </div>
    
    
        </div>
    
    
  </footer>

    

  <div class="development-mode-container">

    <span>development mode V2.01</span>
    <br/>
    <span>Zidni university  V0.01</span>

  </div>



  <a id="scroll"><span></span></a>
    
{{-- END Footer --}}  


<script type="text/javascript" src="{{asset('js/vendor.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.24.1/sweetalert2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.js"></script>
<script src="https://player.vimeo.com/api/player.js"></script>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<script type="text/javascript" src="{{asset('js/main-app.js')}}"></script>
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