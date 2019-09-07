@extends('layouts.master')

@section('title', 'Zidni Certificate')


@section('links')



@endsection


@section('contant')



<section class="get-certificate-container">

    <div class="container">


        <div class="row">


            <div class="col-md-12">



                <div id="main-certificate-container">


                        <div class="main-certificate-content">

                                <img src="{{asset('images/certificate-border.png')}}" class="main-certificate-content-border" alt="certificate-border">
        
                                <div class="main-certificate-content-border-2">
        
                                        <img src="{{asset('images/certificate-pattern-2.png')}}" alt="certificate-border-2">
        
                                </div>
        
        
                                <div class="main-certificate-content-border-3">
        
                                        <img src="{{asset('images/certificate-pattern-3.png')}}" alt="certificate-border-3">
                                        <img src="{{asset('images/logo.png')}}" alt="logo">
        
                                </div>
        
        
        
                                <div class="main-certificate-header">
        
                                        <h2>Certificate</h2>
                                        <span>of achievement</span>
                                        <h3>this certificate is proudly presented to</h3>
        
                                </div>
        
                                <div class="main-certificate-user-data">
        
                                        <h2>User Name</h2>
        
                                        <span></span>
        
                                        <h4>Course Name</h4>
                                </div>
        
        
                                <div class="main-certificate-footer">
        
                                    <div class="main-certificate-footer-date">
        
                                        <h3>10/10/2020</h3>
        
                                        <span></span>
        
                                        <h4>Date</h4>
        
                                    </div>
        
        
                                    <div class="main-certificate-footer-signature">
        
                                        <h3>signature</h3>
        
                                        <span></span>
        
                                        <h4>signature</h4>
        
                                    </div>
        
        
                                </div>
        
        
                            </div>
                

                </div>

                <div id="main-canvas-certificate-container" class="main-share-container"></div>

            </div>


            <div class="col-md-12">

                <div class="sharethis-inline-share-buttons"></div>

            </div>



        </div>


    </div>



</section>


@endsection


@section('scripts')

<script type="text/javascript" src="{{asset('js/certificate.js')}}"></script>

<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c123900423bba0012ec37aa&product=inline-share-buttons' async='async'></script>

@endsection