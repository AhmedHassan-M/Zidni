@extends('layouts.master')

@section('title', 'Password Reset')

@section('links')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.24.1/sweetalert2.min.css">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">


<style>

    body{

        padding: 0 !important

    }

</style>

@endsection


<div class="password-reset-container">

        <div class="jumbotron jumbotron-fluid password-reset-header">
            <div class="container">
                <a href="/"><img src="images/logo.png" alt="Zidni Logo"></a>
                
            </div>
        </div>


        <div class="container">
            <div class="row">

                <form id="resetPasswordForm" class="resetPasswordForm" method="POST">
                    {{csrf_field()}}

                    <div class="resetPasswordText">

                        <h4>Password Reset</h4>

                        <p>Please check your email for password reset code</p>

                    </div>


                    <div class="form-group">
                        <label for="resetCode">Reset Code</label>
                        <input name="resetCode" type="text" class="form-control" id="resetCode" aria-describedby="resetCode" placeholder="Enter Your Reset Code">
                    </div>

                    <div class="form-group">
                        <label for="resetPassword">New Password</label>
                        <input name="resetPassword" type="password" class="form-control" id="resetPassword" placeholder="New Password">
                    </div>

                    <div class="form-group">
                        <label for="confirmResetPassword">Confirm New Password</label>
                        <input name="confirmResetPassword" type="password" class="form-control" id="confirmResetPassword" placeholder="Confirm New Password">
                    </div>


                    <div class="form-submit">

                        <button type="submit" class="btn btn-primary btn-lg btn-block">Change My password</button>

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









        @section('scripts')

        <script type="text/javascript" src="{{asset('js/vendor.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.24.1/sweetalert2.min.js"></script>
        <script type="text/javascript" src="{{asset('js/main-app.js')}}"></script>
        
        @endsection