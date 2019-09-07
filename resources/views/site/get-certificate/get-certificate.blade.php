@extends('layouts.master')

@section('title', 'Zidni Certificate')


@section('links')



@endsection


@section('contant')




<section>




        <!--Start Page Header-->
    
    
        <div class="jumbotron jumbotron-fluid pages-header certificate-header">
    
    
            <img class="pages-header-img lazyload" data-src="{{asset('images/demo-3.jpeg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="300">
    
    
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
                            <li class="breadcrumb-item" aria-current="page">
                                
                                <a href="#">Sunnah Specialization</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">Certificate</a>
                            </li>
                        </ol>
                    </nav>
    
    
                    <h1 class="display-6 page-header-title">Congratulations {{$recipient->full_name}}</h1>
    
                    
    
                </div>
    
    
            </div>
    </div>
    
    
        <!--End Page Header-->
    
    
    
    </div>
    
    
    
    
    
    </section>




<section class="get-certificate-container">

    <div class="container">


        <div class="row">


            <div class="col-md-3">

                <div class="certificate-recipient">


                    <div class="certificate-recipient-buttons">

                            <a href="#certificate-image" data-lity><button id="download-certificate-button" type="button" class="btn btn-light">Download <i class="fas fa-download"></i></button></a>
                            <a href="#certificate-share" data-lity><button id="share-certificate-button" type="button" class="btn btn-light">Share <i class="fas fa-share-square"></i></button></a>

                    </div>


                    <div class="certificate-recipient-name">

                            <h4>Certificate Recipient :</h4>

                            <div class="certificate-recipient-name-info">
                                @if(!empty($Recipient->photo))
                                <img src="/image/{{$Recipient->photo}}" alt="Profile Image" class="rounded-circle">
                                @elseif(!empty($Recipient->social_photo))
                                <img src="{{$Recipient->social_photo}}" alt="Profile Image" class="rounded-circle">
                                @else
                                <img src="{{asset('images/user.png')}}" alt="Profile Image" class="rounded-circle">
                                @endif
                                <h5>{{$recipient->full_name}}</h5>

                            </div>


                    </div>

                </div>


                <div class="certificate-course card-style-one">

                        <h4>About the Course :</h4>

                        <div class="card">
                            @if(empty($course->image))
                            <img class="card-img-top lazyload" data-src="{{asset('images/demo-4.jpeg')}}" src="{{asset('images/gray.jpg')}}" width="100%" height="220">
                            @else
                            <img class="card-img-top lazyload" data-src="/image/{{$course->image}}" src="{{asset('images/gray.jpg')}}" width="100%" height="220">
                            @endif
                
                            <div class="card-body">
                                
                                <h5 class="card-title">{{$course->name}}</h5>
                                @if($t == 'course')
                                <p class="card-text">{{$instructor->full_name}}</p>
                                @elseif($t == 'specialization')
                                <p class="card-text">{{count($specCourses)}} Courses</p>
                                @elseif($t == "master-degree")
                                <p class="card-text">{{count($masterCourses)}} Courses</p>
                                @endif
                                <p class="card-text">{{$course->duration}}</p>
                                <p class="card-text price">${{$course->price}}</p>
                            </div>
                        </div>



                </div>


            </div>


            <div class="col-md-9">



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
        
                                        <h2>{{$recipient->full_name}}</h2>
        
                                        <span></span>
        
                                        <h4>{{$course->name}}</h4>
                                </div>
        
        
                                <div class="main-certificate-footer">
        
                                    <div class="main-certificate-footer-date">
                                        <?php $date = strtotime($enroll->certificate_date); ?>
                                        <h3>{{date("d/m/Y",$date)}}</h3>
        
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


                {{-- <div id="main-certificate-container-test">

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



                </div> --}}






                <div id="main-canvas-certificate-container"></div>


                <div class="certificate-info-container">
                    @if($t == 'course')
                    <p>This certificate above verifies that {{$recipient->full_name}} successfully completed the course "{{$course->name}}" on {{date("F d, Y",$date)}} as taught by {{$instructor->full_name}} on zidni institute. The certificate indicates the entire Course was completed as validated by the student.</p>
                    @elseif($t == 'specialization')
                    <p>This certificate above verifies that {{$recipient->full_name}} successfully completed the specialization "{{$course->name}}" on {{date("F d, Y",$date)}} as taught by @foreach($unique_instructors as $key => $unique_instructor) {{$unique_instructor}} @if($key + 1 < count($unique_instructors)) & @endif @endforeach on zidni institute. The certificate indicates the entire Course was completed as validated by the student.</p>
                    @elseif($t == "master-degree")
                    <p>This certificate above verifies that {{$recipient->full_name}} successfully completed the specialization "{{$course->name}}" on {{date("F d, Y",$date)}} as taught by @foreach($unique_instructors as $key => $unique_instructor) {{$unique_instructor}} @if($key + 1 < count($unique_instructors)) & @endif @endforeach on zidni institute. The certificate indicates the entire Course was completed as validated by the student.</p>
                    @endif
                </div>



            </div>



        </div>


    </div>



</section>




<div id="certificate-image" class="lity-hide"></div>



<div id="certificate-share" class="lity-hide"></div>





@endsection


@section('scripts')

<script type="text/javascript" src="{{asset('js/certificate.js')}}"></script>


@endsection