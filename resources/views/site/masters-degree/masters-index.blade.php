@extends('layouts.master')

@section('title', 'Zidni Master Degree')


@section('links')



@endsection


@section('contant')



@include('site.masters-degree.masters-header')




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
                                    <li class="nav-item">
                                    <a class="nav-link" id="pills-degree-courses-tab" data-toggle="pill" href="#degree-courses" role="tab" aria-controls="pills-degree-courses" aria-selected="false">Degree Courses</a>
                                    </li>
                            </ul>
                
                
                            <ul class="nav">
                
                                <li class="nav-item">
                
                                        @if(Auth::guest())
                                                <button id="signinModalButton" type="button" class="btn enroll-button btn-secondary" data-toggle="modal" data-target="#registrationModal">Enroll Now</button>
                                        @elseif(Auth::check())
                                                @if(count($alreadyEnrolled) == 0)
                                                        <button onclick="enrollNow({{$master->id}})" type="button" class="btn enroll-button btn-secondary ">Enroll Now</button>
                                                @elseif(count($alreadyEnrolled) > 0)
                                                    @if($alreadyEnrolled[0]->progress == 0)
                                                    <button onclick="enrollNow({{$master->id}})" type="button" class="btn enroll-button btn-secondary ">Start Now</button>
                                                    @elseif($alreadyEnrolled[0]->progress > 0)
                                                    <button onclick="enrollNow({{$master->id}})" type="button" class="btn enroll-button btn-secondary ">Continue</button>
                                                    @elseif($alreadyEnrolled[0]->progress == 100)
                                                    <button onclick="enrollNow({{$master->id}})" type="button" class="btn enroll-button btn-secondary ">Get Certificate</button>
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
        
                                                        {!!$master->overview!!}
        
        
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
                                                                    <p class="card-text">${{$master->price}}</p>
        
                                                            </div>
        
                                                            <div class="card-info-item">
        
                                                                    <img class="card-icon" src="{{asset('fonts/time-icon.svg')}}"/>
                                                                    <p class="card-text">{{$master->duration}}</p>
        
                                                            </div>
        
                                                            <div class="card-info-item">
        
                                                                    <img class="card-icon" src="{{asset('fonts/lan-icon.svg')}}"/>
                                                                    <p class="card-text">{{$master->language}}</p>
        
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
        
                                                        @foreach($instructors as $instructor)
                                                        <div class="instructors-info-container">
                    
                    
                                                            <div class="instructors-info-img">
                    
                    
                                                                    <img class="lazyload" data-src="image/{{$instructor->photo}}" src="{{asset('images/gray.jpg')}}" width="100%" height="350">
                    
                    
                    
                                                            </div>
                    
                    
                    
                                                            <div class="instructors-info-description">
                    
                    
                                                                <h5 class="instructors-name">{{$instructor->full_name}}</h5>
                    
                    
                                                                <p class="instructors-overview">{{$instructor->overview}}</p>
                    
                                                                <div class="instructors-social-media">
                    
                                                                    <a href="{{$instructor->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>
                                                                    <a href="{{$instructor->twitter}}" target="_blank"><i class="fab fa-twitter-square"></i></a>
                                                                    <a href="{{$instructor->linkedin}}" target="_blank"><i class="fab fa-linkedin"></i></a>
                    
                    
                                                                </div>
                    
                    
                                                            </div>
                    
                    
                                                        </div>
                                                        @endforeach
        
                                        </div>
        
                                    </div>
        
                                </div>
        
                        </div>
        
        
        
        
        
                </div>
        
        
                {{--degree-courses instructors--}}
        
                <div class="tab-pane fade" id="degree-courses" role="tabpanel" aria-labelledby="pills-degree-courses-tab">
        
        
        
                        <div class="container">
        
                            <div class="row">
        
                                        <?php $courseNo = 1; ?>
                                        @foreach($master->courses as $course)
            
                                        <div class="col-md-6">
            
                                            <div class="degree-courses-container">
            
            
                                                    <div class="card">
                                                            <div class="card-header">
                                                              <span>Course {{$courseNo}}</span>
                                                            </div>
                                                            <div class="card-body">
                                                              <h5 class="card-title">{{$course->name}}</h5>
            
            
                                                                <div class="degree-courses-icons">
            
                                                                        <div class="card-info-item">
                                                                                <img class="card-icon" src="{{asset('fonts/price-icon.svg')}}"/> 
                                                                                <p class="card-text">${{$course->price}}</p>
                    
                                                                        </div>
                    
                                                                        <div class="card-info-item">
                    
                                                                                <img class="card-icon" src="{{asset('fonts/time-icon.svg')}}"/>
                                                                                <p class="card-text">{{$course->duration}}</p>
                    
                                                                        </div>
                    
                                                                        <div class="card-info-item">
                    
                                                                                <img class="card-icon" src="{{asset('fonts/lan-icon.svg')}}"/>
                                                                                <p class="card-text">{{$course->lng}}</p>
                    
                                                                        </div>
            
            
                                                                </div>
            
            
                                                                <h6>About the Course</h6>
            
                                                                <p class="card-text">{{$course->description}}</p>
            
                                                                <div class="take-only-coures">
            
                                                                    <p>You Can Choose to Take this Course Only.. <a href="/course/{{$course->id}}" target="_blank">Learn more</a></p>
            
            
                                                                </div>
                                                            </div>
                                                    </div>
            
            
            
                                            </div>
            
                                        </div>
                                        <?php $courseNo++; ?>
                                        @endforeach
        
                                   
        
                            </div>
                        </div>
        
        
                </div>
    
    
    </section>
    
    
    



@endsection


@section('scripts')

<script>
    function enrollNow(id){
        window.location.href = "/master/enroll-now/"+id;
    }
</script>


@endsection