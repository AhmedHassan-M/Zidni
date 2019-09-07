@extends('layouts.university-master')

@section('title', trans("user-university.courses"))


@section('links')



@endsection


@section('contant')



<ul class="nav nav-pills mb-3 student-pills" id="studentCourses" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-courses-tab" data-toggle="pill" href="#pills-courses-1" role="tab" aria-controls="pills-courses-1" aria-selected="true">{{ __('user-university.first-level') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-courses-tab" data-toggle="pill" href="#pills-courses-2" role="tab" aria-controls="pills-courses-2" aria-selected="false">{{ __('user-university.second-level') }}</a>
    </li>
</ul>


<div class="tab-content" id="pills-tabContent">


    <div class="tab-pane fade show active" id="pills-courses-1" role="tabpanel" aria-labelledby="pills-courses-tab">

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
                                            </ul>
            
                                    </div>
            
                                </div>
                            </div>


                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('user-university.course-actions') }}</h5>
                                    <div class="card-content card-student-info-content courses-actions-list">
            
                                            <ul class="list-group">
                                                <li class="list-group-item"><span>{{ __('user-university.course-announcements') }} : </span><span>Test</span></li>
                                                <li class="list-group-item"><span>{{ __('user-university.schedule-of-live-meetings') }} : </span><span>Test</span></li>
                                                <li class="list-group-item"><span>{{ __('user-university.the-next-meetings') }} : </span><span>0123</span></li>
                                                <li class="list-group-item"><span>{{ __('user-university.study-plan') }} : </span><span>0123</span></li>                                            
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
                                <a href="/university/academic-track/1" class="btn btn-secondary btn" target="_blank">{{ __('user-university.latest-assignments') }}</a>
                                {{-- localize ya kareem :'D --}}
                                <a href="/university/course_material/en" class="btn btn-secondary btn" target="_blank">{{ __('user-university.course-content') }}</a>
                            </div>

                        </div>
                </div>
        
        
            @endfor

    </div>
    <div class="tab-pane fade" id="pills-courses-2" role="tabpanel" aria-labelledby="pills-profile-tab">

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
                                            </ul>
            
                                    </div>
            
                                </div>
                            </div>


                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('user-university.course-actions') }}</h5>
                                    <div class="card-content card-student-info-content courses-actions-list">
            
                                            <ul class="list-group">
                                                <li class="list-group-item"><span>{{ __('user-university.course-announcements') }} : </span><span>Test</span></li>
                                                <li class="list-group-item"><span>{{ __('user-university.schedule-of-live-meetings') }} : </span><span>Test</span></li>
                                                <li class="list-group-item"><span>{{ __('user-university.the-next-meetings') }} : </span><span>0123</span></li>
                                                <li class="list-group-item"><span>{{ __('user-university.study-plan') }} : </span><span>0123</span></li>                                            
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
                                <a href="/university/academic-track/1" class="btn btn-secondary btn" target="_blank">{{ __('user-university.latest-assignments') }}</a>
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