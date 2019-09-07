@extends('layouts.master')


@section('title', 'Profile')



@section('links')

@endsection



@section('contant')

    <!--Start Page Header-->


    <div class="jumbotron jumbotron-fluid pages-header profile-page-header">


            <img class="pages-header-img lazyload" data-src="{{asset('images/demo-3.jpeg')}}" src="{{asset('images/gray.jpg')}}" width="100%" height="300">



            <div class="pages-header-overlay"></div>
    
            <div class="container">
    
                <div class="pages-header-container">
    
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">Student Profile</a>
                            </li>
                        </ol>
                    </nav>
    
    
                    <h1 class="display-4">{{Auth::user()->full_name}}</h1>
    
    
                </div>
    
    
        </div>
    </div>
    
    
        <!--End Page Header-->
    
    
        <!-- Start Profile tabs -->


        <div class="preload-content">


            <!-- Preloader -->
            <div id="preloader">
                    <div id="status">&nbsp;</div>
            </div>


        <section id="user-profile-container">


                <div class="container">
    
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                
                
                
                                <div id="main-profile-tabs">
                
                
                                    <div class="profile-tabs-img">
                                        @if(Auth::user() == NULL)
                                        <img src="http://placehold.it/150x150" alt="Profile Image">
                                        @else
                                        <img src="/image/{{Auth::user()->photo}}" alt="Profile Image">
                                        @endif
                                    </div>
                
                
                                    <div class="profile-tabs-name">
                                        <h3>{{Auth::user()->full_name}}</h3>
                                    </div>
                
                
                                    <div id="profile-page-links" class="nav flex-column nav-pills hash-controler" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                
                                        <a href="/" class="nav-link">Back to Homepage</a>
                
                                        <a class="nav-link active" id="v-pills-account-tab" data-toggle="pill" href="#my-account" role="tab" aria-controls="v-pills-account"
                                            aria-selected="true">My Account</a>
                
                
                
                                        <a class="nav-link" id="v-pills-photo-tab" data-toggle="pill" href="#my-photo" role="tab" aria-controls="v-pills-photo"
                                            aria-selected="false">My Photo</a>
                
                
                
                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#my-messages" role="tab" aria-controls="v-pills-messages"
                                            aria-selected="false">My Messages</a>
                
                
                                        <a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="#my-purchase" role="tab" aria-controls="v-pills-purchase"
                                            aria-selected="false">Purchase History</a>


                                        <a class="nav-link" id="v-pills-notifications-tab" data-toggle="pill" href="#my-notifications" role="tab" aria-controls="v-pills-notifications"
                                            aria-selected="false">Notifications</a>

                                        
                                        <a href="/logout" class="nav-link">Logout</a>





                                    </div>
                
                
                                </div>
                
                
                
                
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="tab-content" id="v-pills-tabContent">
                
                                   {{-- MY ACCOUNT TAB --}}
                
                                    <div class="tab-pane fade show active" id="my-account" role="tabpanel" aria-labelledby="v-pills-account-tab">
                
                
                                        <div class="tabs-content-container">
                
                
                                            <div class="tabs-content-header">
                
                                                <h4>My Account</h4>
                                                <p>Add information about yourself to share on your profile.</p>
                
                                            </div>
                
                
                
                                            <div class="account-form">
                
                                                <form id="editAccountForm" method="POST">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="id" value="{{Auth::user()->id}}" id="user_id">
                                                    <div class="form-group">
                                                        <label for="editAccountFristName">Frist Name</label>
                                                        <input type="text" class="form-control" id="editAccountFristName" placeholder="Frist Name" value="{{Auth::user()->first_name}}" name="editAccountFristName">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="editAccountLastName">Last Name</label>
                                                        <input type="text" class="form-control" id="editAccountLastName" placeholder="Last Name" value="{{Auth::user()->last_name}}" name="editAccountLastName">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="editAccountEmail">Email</label>
                
                
                                                        <div class="email-change-container">
                
                                                            <input type="email" class="form-control" id="editAccountEmail" placeholder="Email" value="{{Auth::user()->email}}" name="editAccountEmail"
                                                                disabled>
                
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#editEmailModal">
                                                                    <i class="far fa-edit"></i>
                                                                </button>
                                                            </span>
                
                                                        </div>
                
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label for="editAccountCurrentPassword">Current Password</label>
                                                        <input type="password" class="form-control" id="editAccountCurrentPassword" placeholder="Current Password" name="editAccountCurrentPassword">
                                                        <div id="msgs"></div>
                                                    </div>
                
                
                                                    <div class="form-group">
                
                                                        <label for="editAccountNewPassword">New Password</label>
                                                        <input type="password" class="form-control" id="editAccountNewPassword" placeholder="New Password" name="editAccountNewPassword">
                
                                                    </div>
                
                
                                                    <div class="form-group">
                                                        <label for="editAccountConfirmPassword">Confirm Password</label>
                                                        <input type="password" class="form-control" id="editAccountConfirmPassword" placeholder="Confirm Password" name="editAccountConfirmPassword">
                                                    </div>
                
                                                    <div class="form-submit">
                
                                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Save Change</button>
                
                                                        <div class="ajax-loading loader loader--style2" title="1">
                                                            <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                                                                xml:space="preserve">
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
                
                
                                    {{-- MY PHOTO TAB --}}
                
                
                                    <div class="tab-pane fade" id="my-photo" role="tabpanel" aria-labelledby="v-pills-photo-tab">
                
                                        <div class="tabs-content-container">
                
                
                
                                            <div class="tabs-content-header">
                
                                                <h4>My Photo</h4>
                                                <p>Add a nice photo of yourself for your profile.</p>
                
                                            </div>
                
                                        <form method="POST" enctype="multipart/form-data">
                                          {{csrf_field()}}
                                          <input type="hidden" name="profile_photo" value="profile_photo">
                                            <section id="image-upload-container">


                                                    @if(Auth::user() == NULL)

                                                    <input type="file" name="photo" class="dropify" data-default-file="./images/user.png" data-height="400" data-max-file-size="2M" data-min-width="200"
                                                    data-max-width="6000" data-min-height="200" data-max-height="1000" data-show-remove="false"
                                                    data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="2M"
                                                    />


                                                    @else

                                                    <input type="file" name="photo" class="dropify" data-default-file="/image/{{Auth::user()->photo}}" data-height="400" data-max-file-size="2M" data-min-width="200"
                                                    data-max-width="6000" data-min-height="200" data-max-height="1000" data-show-remove="false"
                                                    data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="2M"
                                                    />


                                                    @endif


                

                
                                            </section>
                                            <div class="save_profile_photo">
            
                                                <button class="btn btn-primary btn-lg btn-block">Save Photo</button>
            
                                            </div>
            
                                        </form>
                
                                        </div>
                
                
                
                
                
                                    </div>


                                    {{-- MY MESSAGES TAB --}}


                                    <div class="tab-pane fade" id="my-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                
                                        <div class="tabs-content-container">
                
                
                
                                            <div class="tabs-content-header">
                
                                                <h4>My Message</h4>
                                                <p>These Important Announcements from Zidni Admin</p>
                
                                            </div>
                
                
                                            <div class="tabs-messages-header">
                
                                                <div class="tabs-messages-img">
                
                                                    <img src="./images/logo.png" alt="Zidni Logo">
                
                                                </div>
                
                                                <div class="tabs-messages-top">
                
                                                    <h5>Zidni Admin</h5>
                                                    <p>You have 7 unread messages.</p>
                                                </div>
                
                                            </div>
                
                
                
                                            <section id="messages-container">

                                                @foreach($announcements as $announcement)
                
                
                                                <div class="message-item">
                                                    <?php $unix = strtotime($announcement->created_at); ?>
                                                    <span class="message-time"><i class="far fa-clock"></i>{{date('d/m/Y', $unix)}}</span>
                                                    <h3>{{$announcement->title}}</h3>
                                                    <p class="message-content">{!!$announcement->text!!}</p>
                
                                                </div>
                
                
                                                @endforeach
                
                
                                            </section>
                
                
                
                                        </div>
                
                
                
                                    </div>


                                    {{-- MY PURCHASE TAB --}}


                                    <div class="tab-pane fade" id="my-purchase" role="tabpanel" aria-labelledby="v-pills-purchase-tab">


                                            <div class="tabs-content-container">
                
                
                
                                                    <div class="tabs-content-header">
                        
                                                        <h4>Purchase History</h4>
                                                        <p>This is a list of your purchased courses</p>
                        
                                                    </div>



                                                    <div class="purchase-table">

                                                            <div class="table-responsive-sm">
                                                                <table class="table table-hover">


                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Purchase History</th>
                                                                                <th scope="col">Date</th>
                                                                                <th scope="col">Total Price</th>
                                                                                <th scope="col">Payment Type</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            {{-- For Demo Only --}}


                                                                            @for ($i = 0; $i < 6; $i++)


                                                                            <tr>
                                                                                <td class="purchase-history-item-container">

                                                                                    <div class="purchase-history-item">
                                                    
                                                                                        
                                                                                        <div class="purchase-history-item-img">
                                                
                                                                                            <img class="lazyload" data-src="{{asset('images/demo-3.jpeg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                            
                                                                                        </div>
                                                
                                                                                        <div class="purchase-history-item-title">
                                                
                                                                                                <h5>Fiqh level 2</h5>
                                            
                                                                                        </div>
                                                    
                                                    
                                                                                    </div>
                                                    
                                                                                </td>
                                                                                <td><p>Feb. 1, 2018</p></td>
                                                                                <td><p>$9.99</p></td>
                                                                                <td><p>$9.99 Paypal</p></td>
                                                                            </tr>
        



                                                                            @endfor

                                                                        </tbody>
        
        
                                                                </table>
                                                            </div>
        
        
                                                    </div>


                                            </div>






                                    </div>



                                    {{-- MY Notifications TAB --}}

                                    <div class="tab-pane fade" id="my-notifications" role="tabpanel" aria-labelledby="v-pills-notifications-tab">



                                            <div class="tabs-content-container">
                
                
                
                                                    <div class="tabs-content-header">
                        
                                                        <h4>Notifications</h4>
                                                        <p>Turn promotional notifications from Zidni on or off</p>
                        
                                                    </div>



                                                    <div class="notifications-control-container">

                                                        <div class="small-title">

                                                            <h4>I want to receive:</h4>

                                                        </div>


                                                        <form id="notificationsForm">


                                                            <div class="form-group">

                                                                <div class="pretty p-icon p-pulse">
                                                                    <input type="radio" id="sendMeNotifications" name="notificationsControl" value="1" checked />
                                                                    <div class="state p-success">
                                                                        <i class="icon fas fa-check"></i>
                                                                        <label for="sendMeNotifications">Notifications about new lectures ،live classes ، instructor answers ، grades published</label>
                                                                    </div>
                                                                </div>
                                 
                                                            </div>


                                                            <div class="form-group">

                                                                <div class="pretty p-icon p-pulse">
                                                                    <input type="radio" id="dontSendMeNotifications" name="notificationsControl" value="0" />
                                                                    <div class="state p-success">
                                                                        <i class="icon fas fa-check"></i>
                                                                        <label for="dontSendMeNotifications">Don't Send Me any Notification</label>
                                                                    </div>
                                                                </div>
                                     
                                                            </div>

                                                            <div class="form-submit">
                
                                                                <button type="submit" class="btn btn-primary btn-lg btn-block">Save Change</button>
                        
                                                                <div class="ajax-loading loader loader--style2" title="1">
                                                                    <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                        width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                                                                        xml:space="preserve">
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


        </section>


        
        </div>
    

    
        <!-- End Profile tabs -->



        <!-- Edit Email Modal -->
       
        <div class="modal fade" id="editEmailModal" tabindex="-1" role="dialog" aria-labelledby="editEmailModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Change Your Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fas fa-times"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="changeEmailForm" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{Auth::user()->id}}" id="user_ids">
                            <div class="form-group">
                                <label for="changeEmailNew">Email</label>
                                <input type="email" class="form-control" id="changeEmailNew" name="changeEmailNew" ria-describedby="changeEmailNew" placeholder="Change Email">
                            </div>
                            <div class="form-group">
                                <label for="changeEmailPassword">Password</label>
                                <input type="password" class="form-control" id="changeEmailPassword" name="changeEmailPassword" placeholder="Password">
                            </div>
    
                            <div class="form-group">
                                <p class="warning-text">
                                    For your security, if you change your email address your saved credit card information will be deleted.</p>
                            </div>
    
    
    
    
                            <div class="form-submit">
    
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Change Email</button>
    
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
    
        <!-- Edit Email Modal -->


    

@endsection



@section('scripts')

<script type="text/javascript" src="{{asset('js/profile-bundel.js')}}"></script>

@endsection