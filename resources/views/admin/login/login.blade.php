@extends('layouts.admin-login')

@section('title', 'Zidni Login')


@section('links')



@endsection



@section('content')


<div class="login-page-container">

    <div class="admin-login-overlay"></div>

    <div class="card ">
        <div class="card-header">
            <i class="fas fa-lock"></i> Login
        </div>
        <div class="card-body">


            <div id="all-admin-signin-data">



                    <form id="adminSigninForm" class="admin-signin-form" method="POST">

                            {{csrf_field()}}
                            <input type="hidden" name="admin_zidni_logan" value="606">

                            
                            <div class="form-group">
                                <label for="adminSigninEmail">Email address</label>
                                <input name="adminSigninEmail" type="email" class="form-control" id="adminSigninEmail" aria-describedby="adminSigninEmail" placeholder="Enter Your E-Mail">
                            </div>
        
        
        
                            <div class="form-group">
        
                                <div>
        
                                    <label for="adminSigninPassword">Password</label>
                                    <span id="adminShowPassword">Show password</span>
        
                                </div>
        
        
                                <input name="adminSigninPassword" type="password" class="form-control" id="adminSigninPassword" placeholder="Password">
        
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



            
            <div class="forget-password-container">


                <form id="forget-password-admin-signin" class="forget-password-signin">

                  <div class="forget-password-text">

                    <h4>
                      <a id="forget-password-back">
                        <i class="fas fa-angle-left"></i>
                      </a>Reset Your Password</h4>

                    <p>Please provide the email address you used when you signed up for your Zidni account</p>

                    <p>We will send you an email with a code to reset your password.</p>

                  </div>

                  <div class="form-group">
                    <label for="adminForgetPasswordEmail">EMAIL</label>
                    <input name="adminForgetPasswordEmail" type="email" class="form-control" id="adminForgetPasswordEmail" aria-describedby="adminForgetPasswordEmail"
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
        <div class="card-footer text-muted">
            <p>© 2018 Copyright | All Rights Reserved </p>
            <p>Developed by WsilaDev</p>
        </div>
    </div>


</div>


@endsection




@section('scripts')


@endsection