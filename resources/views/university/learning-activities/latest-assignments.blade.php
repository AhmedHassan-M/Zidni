@extends('layouts.university-master')

@section('title', trans("user-university.latest-assignments"))


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
                        <h5 class="card-title">{{ __('user-university.activity-info') }}</h5>

                        <div class="card-content">

                                <ul class="list-group">
                                    <li class="list-group-item"><span>{{ __('user-university.start') }} : </span><span>---</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.end') }} : </span><span>---</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.specialization') }} : </span><span>1</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.year') }} : </span><span>1</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.semester') }} : </span><span>1</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.instructor') }} : </span><span>5</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.release-date') }} : </span><span>1/1/2019</span></li>
                                </ul>

                        </div>

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('user-university.assignments.content') }}</h5>
                        <div class="card-content card-student-info-content">

                                <ul class="list-group">
                                    <li class="list-group-item"><span>{{ __('user-university.title') }} : </span><span>Test</span></li>
                                    <li class="list-group-item"><span>{{ __('user-university.description') }} : </span><span>Test</span></li>
                                </ul>


                        </div>
                    </div>
                </div>
        
            </div>
            <div class="card-footer">   
                
                <small class="text-muted">{{ __('user-university.activity-will-start-after') }} : 00:00:00</small>

                <a href="/university/academic-track/1" class="btn btn-secondary btn" target="_blank">{{ __('user-university.join-the-meeting') }}</a>
            </div>
    </div>


@endfor




@endsection


@section('scripts')




@endsection