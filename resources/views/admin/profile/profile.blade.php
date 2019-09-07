@extends('layouts.admin-master')

@section('title', 'Zidni Admin Profile')


@section('links')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>


@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Profile</h2>
                                        <p>This board give you easy way to Edit your profile</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                    <li class="breadcrumb-item active"><a href="/admin/profile">Profile</a></li>
                                                </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                                    <div class="container">


                                        <div class="row">


                                            <div class="col-md-12">


                                                <div class="profile-top">

                                                    <div class="profile-img">
                                                        @if(empty(Auth::user()->photo))
                                                        <img src="{{asset('images/user.png')}}" alt="avatar">
                                                        @else
                                                        <img src="/image/{{Auth::user()->photo}}" alt="avatar">
                                                        @endif

                                                    </div>

                                                    <div class="profile-info">

                                                        <h5>{{Auth::user()->full_name}}</h5>

                                                        <p>{{Auth::user()->email}}</p>

                                                        @if(Auth::user()->admin == 1)
                                                        <p>Super Admin</p>
                                                        @endif

                                                    </div>

                                                </div>


                                            </div>


                                            <div class="col-md-12">

                                                <!-- Nav tabs -->
                                                <ul id="profile-tabs" class="nav nav-tabs" role="tablist">
                                                        <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#account" role="tab">Account</a>
                                                        </li>
                                                        <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#photo" role="tab">Photo</a>
                                                        </li>
                                                        <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#notifications" role="tab">Notifications</a>
                                                        </li>
                                                </ul>

                                            </div>

                                            <div class="col-md-12">

                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="account" role="tabpanel">


                                                            <div class="tabs-content-container">




                                                            <div class="tabs-content-header">
                                
                                                                <h4>My Account</h4>
                                                                <p>Add information about yourself to share on your profile.</p>
                                
                                                            </div>


                                                            <form id="editAdminAccountForm">
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="adminAccountName">Admin Name</label>
                                                                        <input type="text" class="form-control" id="adminAccountName" value="{{Auth::user()->full_name}}" name="adminAccountName">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="adminAccountEmail">Email</label>
                                
                                
                                                                        <div class="email-change-container">
                                
                                                                            <input type="email" class="form-control" id="adminAccountEmail" placeholder="Email" value="{{Auth::user()->email}}" name="adminAccountEmail"
                                                                                disabled>
                                
                                                                            <span class="input-group-btn">
                                                                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#editEmailModal">
                                                                                    <i class="far fa-edit"></i>
                                                                                </button>
                                                                            </span>
                                
                                                                        </div>
                                
                                                                    </div>
                                
                                                                    <div class="form-group">
                                                                        <label for="adminAccountCurrentPassword">Current Password</label>
                                                                        <input type="password" class="form-control" id="adminAccountCurrentPassword" placeholder="Current Password" name="adminAccountCurrentPassword">
                                                                        <div id="msgs"></div>
                                                                    </div>
                                
                                
                                                                    <div class="form-group">
                                
                                                                        <label for="adminAccountNewPassword">New Password</label>
                                                                        <input type="password" class="form-control" id="adminAccountNewPassword" placeholder="New Password" name="adminAccountNewPassword">
                                
                                                                    </div>
                                
                                
                                                                    <div class="form-group">
                                                                        <label for="adminAccountConfirmPassword">Confirm Password</label>
                                                                        <input type="password" class="form-control" id="adminAccountConfirmPassword" placeholder="Confirm Password" name="adminAccountConfirmPassword">
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
                                                    <div class="tab-pane" id="photo" role="tabpanel">



                                                        <div class="tabs-content-container">
                
                
                
                                                            <div class="tabs-content-header">
                                
                                                                <h4>My Photo</h4>
                                                                <p>Add a nice photo of yourself for your profile.</p>
                                
                                                            </div>
                                
                                                        <form action="/admin/profile-pic" method="POST" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <section id="image-upload-container">
                                                                @if(empty(Auth::user()->photo))
                                                                    <input type="file" name="photo" class="dropify" data-height="400" data-max-file-size="2M" data-min-width="200"
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
                            
                                                                <button class="btn btn-primary btn-lg btn-block" type="submit">Save Photo</button>
                            
                                                            </div>
                            
                                                        </form>
                                
                                                        </div>
                                
                                
                        
                                                    </div>
                                                    <div class="tab-pane" id="notifications" role="tabpanel">




                                                            <div class="tabs-content-container">
                
                
                
                                                                    <div class="tabs-content-header">
                                        
                                                                        <h4>Notifications</h4>
                                                                        <p>Turn promotional notifications from Zidni on or off</p>
                                        
                                                                    </div>
                
                
                
                                                                    <div class="notifications-control-container">
                
                                                                        <div class="small-title">
                
                                                                            <h4>I want to receive:</h4>
                
                                                                        </div>
                
                
                                                                        <form id="adminNotificationsForm">
                
                
                                                                            <div class="form-group">
                
                                                                                <div class="pretty p-icon p-pulse">
                                                                                    <input type="radio" id="adminSendMeNotifications" name="notificationsControl" value="1" checked />
                                                                                    <div class="state p-success">
                                                                                        <i class="icon fas fa-check"></i>
                                                                                        <label for="adminSendMeNotifications">Notifications about new lectures ،live classes ، instructor answers ، grades published</label>
                                                                                    </div>
                                                                                </div>
                                                 
                                                                            </div>
                
                
                                                                            <div class="form-group">
                
                                                                                <div class="pretty p-icon p-pulse">
                                                                                    <input type="radio" id="adminDontSendMeNotifications" name="notificationsControl" value="0" />
                                                                                    <div class="state p-success">
                                                                                        <i class="icon fas fa-check"></i>
                                                                                        <label for="adminDontSendMeNotifications">Don't Send Me any Notification</label>
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


                                </div>
                            </div>
                        </div>
                        <!-- ////////////////////////////////////////////////////////////////////////////-->
                    
                    
                        <!-- END MAIN CONTENT -->



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
                            <form id="adminChangeEmailForm">
                                <div class="form-group">
                                    <label for="adminChangeEmailNew">Email</label>
                                    <input type="email" class="form-control" id="adminChangeEmailNew" name="adminChangeEmailNew" ria-describedby="changeEmailNew" placeholder="Change Email">
                                </div>
                                <div class="form-group">
                                    <label for="adminChangeEmailPassword">Password</label>
                                    <input type="password" class="form-control" id="adminChangeEmailPassword" name="adminChangeEmailPassword" placeholder="Password">
                                    <div id="email"></div>
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script type="text/javascript" src="{{asset('admin/js/pages/profilePage.js')}}"></script>

@endsection