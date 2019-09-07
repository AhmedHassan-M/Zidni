@extends('layouts.master')

@section('title', 'Zidni Courses')


@section('links')



@endsection


@section('contant')



@include('site.courses.courses-header')






<section class="preload-content">


    <!-- Preloader -->
    <div id="preloader">
            <div id="status">&nbsp;</div>
    </div>
              
    
    
            <nav class="navbar navbar-light bg-light courses-navbar" id="courses-navbar-container">
                    <div class="container kill-padding">
        
                            <ul class="nav nav-pills hash-controler" id="master-tabs" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link active" id="pills-overview-tab" data-toggle="pill" href="#overview" role="tab" aria-controls="pills-overview" aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="pills-instructors-tab" data-toggle="pill" href="#instructors" role="tab" aria-controls="pills-instructors" aria-selected="false">Instructors</a>
                                    </li>
                            </ul>
                
                
                            <ul class="nav">
                
                                <li class="nav-item">
                                    @if(Auth::guest())
                                        <button id="signinModalButton" type="button" class="btn enroll-button btn-secondary" data-toggle="modal" data-target="#registrationModal">Enroll Now</button>
                                    @elseif(Auth::check())
                                        @if(count($alreadyEnrolled) == 0)
                                        <button onclick="enrollNow({{$course->id}})" type="button" class="btn enroll-button btn-secondary ">Enroll Now</button>
                                        @elseif(count($alreadyEnrolled) > 0)
                                            @if($alreadyEnrolled[0]->progress == 0)
                                            <button onclick="start({{$course->id}})" type="button" class="btn enroll-button btn-secondary ">Start Course</button>
                                            @elseif($alreadyEnrolled[0]->progress > 0)
                                            <button onclick="start({{$course->id}})" type="button" class="btn enroll-button btn-secondary ">Continue Course</button>
                                            @elseif($alreadyEnrolled[0]->progress == 100)
                                            <button onclick="start({{$course->id}})" type="button" class="btn enroll-button btn-secondary ">Get Certificate</button>
                                            @endif
                                        @endif
                                    @endif
                
                                </li>
                
                            </ul>
        
            
                        </div>
        
        
        
        
            </nav>
        
        
        
        
        
        
        
              <div class="tab-content" id="pills-tabContent">
        
                {{--Overview Tab--}}
        
        
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="pills-overview-tab">
        
        
        
                        <div class="container">
        
                                <div class="row">
        
                                    <div class="col-md-8">
        
                                        <div class="overview-container">
        
                                            <div class="overview-info-container">
                                                {!!$course->overview!!}
                                            </div>
        
        
                                        </div>
        
                                    </div>
        
                                    <div class="col-md-4">
        
                                        <div class="overview-card">
        
                                                <div class="card">
                                                        <div class="card-header">
                                                            AT A GLANCE
                                                        </div>
                                                        <div class="card-body">
        
                                                            <div class="card-info-item">
                                                                    <img class="card-icon" src="{{asset('fonts/price-icon.svg')}}"/> 
                                                                    @if(empty($course->price) || $course->price == 0)
                                                                    <p class="card-text">Free</p>
                                                                    @else
                                                                    <p class="card-text">${{$course->price}}</p>
                                                                    @endif
                                                            </div>
        
                                                            <div class="card-info-item">
        
                                                                    <img class="card-icon" src="{{asset('fonts/time-icon.svg')}}"/>
                                                                    @if(!empty($course->duration))
                                                                    <p class="card-text">{{$course->duration}} Months</p>
                                                                    @endif
                                                            </div>
        
                                                            <div class="card-info-item">
        
                                                                    <img class="card-icon" src="{{asset('fonts/lan-icon.svg')}}"/>
                                                                    <p class="card-text">{{$course->lng}}</p>
        
                                                            </div>
        
                                                          
        
                                                        </div>
                                                      </div>
        
                                        </div>
        
                                    </div>
        
                                </div>
        
                        </div>
        
                    
                    
        
        
        
        
        
                </div>
        
        
                {{--Overview instructors--}}
        
                <div class="tab-pane fade" id="instructors" role="tabpanel" aria-labelledby="pills-instructors-tab">
        
        
        
        
                        <div class="container">
        
                                <div class="row">
        
                                    <div class="col-md-12">
        
                                        <div class="instructors-container">
        
                                            @if($course->instructor)
        
                                            <div class="instructors-info-container">
        
        
                                                    <div class="instructors-info-img">
            
                                                        @if(empty($course->instructor->photo))
                                                            <img class="lazyload" data-src="{{asset('images/user.png')}}" src="{{asset('images/user.png')}}" width="100%" height="350">
                                                        @else
                                                            <img class="lazyload" data-src="{{asset('image/'.$course->instructor->photo)}}" src="{{asset('image/'.$course->instructor->photo)}}" width="100%" height="350">
                                                        @endif
            
            
                                                    </div>
            
                                                    <div class="instructors-info-description">
            
            
                                                        <h5 class="instructors-name">{{$course->instructor->full_name}}</h5>
            
            
                                                        <p class="instructors-overview">{{$course->instructor->overview}}</p>
            
                                                        <div class="instructors-social-media">
            
                                                            <a href="{{$course->instructor->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>
                                                            <a href="{{$course->instructor->twitter}}" target="_blank"><i class="fab fa-twitter-square"></i></a>
                                                            <a href="{{$course->instructor->linkedin}}" target="_blank"><i class="fab fa-linkedin"></i></a>
            
            
                                                        </div>
            
            
                                                    </div>
            
            
                                                </div>
    
                                            @endif
                                        </div>
        
                                    </div>
        
                                </div>
        
                        </div>
        
        
        
        
        
                </div>
        
    
    </section>
    
    
    




@endsection


@section('scripts')
<script>
    function enrollNow(id){
        window.location.href = "/course/enroll-now/"+id;
    }
    function start(id){
        window.location.href = "/courses/course-content/"+id;
    }
</script>


@endsection