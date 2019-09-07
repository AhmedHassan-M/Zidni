@extends('layouts.university-master')

@section('title', trans("user-university.previous-courses"))


@section('links')



@endsection


@section('contant')


<ul class="nav nav-pills mb-3 student-pills" id="studentPreviousCourses" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-previous-courses-tab" data-toggle="pill" href="#pills-previous-courses-1" role="tab" aria-controls="pills-previous-courses-1" aria-selected="true">{{ __('user-university.first-semester') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-previous-courses-tab" data-toggle="pill" href="#pills-previous-courses-2" role="tab" aria-controls="pills-previous-courses-2" aria-selected="false">{{ __('user-university.second-semester') }}</a>
    </li>
</ul>


<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-previous-courses-1" role="tabpanel" aria-labelledby="pills-previous-courses-tab">


            @for ($i = 1; $i < 5; $i++)

                <div class="card student-lesson-card student-courses-card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-1">
                    
                                <div class="student-lesson-number">
                    
                                    <img class="lazyload" data-src="{{asset('images/logo.png')}}" src="{{asset('images/logo.png')}}" alt="logo">
                    
                                    <span>{{$i}}</span>
                    
                                </div>
                    
                            </div>


                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('user-university.course-info') }}</h5>
            
                                    <div class="card-content">
            
                                            <ul class="list-group">
                                                    <li class="list-group-item"><span>{{ __('user-university.course-name') }} : </span><span>Test</span></li>
                                                    <li class="list-group-item"><span>{{ __('user-university.course-code') }} : </span><span>012345</span></li>
                                                    <li class="list-group-item"><span>{{ __('user-university.course-instructor') }} : </span><span>Test</span></li>
                                                    <li class="list-group-item"><span>{{ __('user-university.semester') }} : </span><span>Test</span></li>
                                            </ul>
            
                                    </div>
            
                                </div>
                            </div>


                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('user-university.course-description') }}</h5>
                                    <div class="card-content card-student-info-content"> 
            
                                            <ul class="list-group">
                                                <li class="list-group-item"><span>{{ __('user-university.description') }} : </span><span>Test</span></li>                                       
                                            </ul>
            
            
                                    </div>
                                </div>
                            </div>
                    
                        </div>


                        
                        <div class="card-footer">   
                            
                            <div>

                                    <button data-toggle="modal" data-target="#raitingModal" class="instructor-review">{{ __('user-university.review-the-course') }}</button>

                            </div>

                            
                            <div class="course-actions">
                                <a href="/university/academic-track/1" class="btn btn-secondary btn" target="_blank">{{ __('user-university.course-content') }}</a>
                            </div>

                        </div>
                </div>
        
        
            @endfor


    </div>
    <div class="tab-pane fade" id="pills-previous-courses-2" role="tabpanel" aria-labelledby="pills-profile-tab">




            @for ($i = 1; $i < 5; $i++)

                <div class="card student-lesson-card student-courses-card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-1">
                    
                                <div class="student-lesson-number">
                    
                                    <img class="lazyload" data-src="{{asset('images/logo.png')}}" src="{{asset('images/logo.png')}}" alt="logo">
                    
                                    <span>{{$i}}</span>
                    
                                </div>
                    
                            </div>


                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('user-university.course-info') }}</h5>
            
                                    <div class="card-content">
            
                                            <ul class="list-group">
                                                    <li class="list-group-item"><span>{{ __('user-university.course-name') }} : </span><span>Test</span></li>
                                                    <li class="list-group-item"><span>{{ __('user-university.course-code') }} : </span><span>012345</span></li>
                                                    <li class="list-group-item"><span>{{ __('user-university.course-instructor') }} : </span><span>Test</span></li>
                                                    <li class="list-group-item"><span>{{ __('user-university.semester') }} : </span><span>Test</span></li>
                                            </ul>
            
                                    </div>
            
                                </div>
                            </div>


                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('user-university.course-description') }}</h5>
                                    <div class="card-content card-student-info-content"> 
            
                                            <ul class="list-group">
                                                <li class="list-group-item"><span>{{ __('user-university.description') }} : </span><span>Test</span></li>                                       
                                            </ul>
            
            
                                    </div>
                                </div>
                            </div>
                    
                        </div>


                        
                        <div class="card-footer">   
                            
                            <div>

                                    <button data-toggle="modal" data-target="#raitingModal" class="instructor-review">{{ __('user-university.review-the-course') }}</button>

                            </div>

                            
                            <div class="course-actions">
                                <a href="/university/academic-track/1" class="btn btn-secondary btn" target="_blank">{{ __('user-university.course-content') }}</a>
                            </div>

                        </div>
                </div>
        
        
            @endfor




    </div>
</div>

@include('university.rating.rating')


@endsection


@section('scripts')




@endsection