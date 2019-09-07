@extends('layouts.university-master')

@section('title', trans("user-university.academic-track"))


@section('links')



@endsection


@section('contant')



@for ($i = 1; $i < 5; $i++)

    <div class="card student-lesson-card mb-3">
            <div class="row no-gutters">
                <div class="col-md-1">
        
                    <div class="student-lesson-number">
        
                        <img class="lazyload" data-src="{{asset('images/logo.png')}}" src="{{asset('images/logo.png')}}" alt="logo">
        
                        <span>{{$i}}</span>
        
                    </div>
        
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('user-university.academic-info') }}</h5>

                        <div class="card-content">

                                <ul class="list-group">
                                    <li class="list-group-item"><span>{{ __('user-university.specialization') }} : </span><span>Test</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.year') }} : </span><span>2019/2020</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.academic-year') }} : </span><span>1</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.semester') }} : </span><span>1</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.semester-subjects') }} : </span><span>5</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.release-date') }} : </span><span>1/1/2019</span></li>
                                </ul>

                        </div>

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('user-university.student-info') }}</h5>
                        <div class="card-content card-student-info-content">

                                <ul class="list-group">
                                    <li class="list-group-item"><span>{{ __('user-university.student-name-ar') }} : </span><span>Test</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.student-name-en') }} : </span><span>Test</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.university-code') }} : </span><span>0123</span></li>
                                </ul>


                        </div>
                    </div>
                </div>
        
            </div>
            <div class="card-footer">   
                
                <small class="text-muted">{{ __('user-university.review-the-semester-degrees') }}</small>

                <a href="/university/academic-track/1" class="btn btn-secondary btn" target="_blank">{{ __('user-university.review-degrees') }}</a>
            </div>
    </div>


@endfor




@endsection


@section('scripts')




@endsection