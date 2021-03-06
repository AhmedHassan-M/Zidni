@extends('layouts.university-master')

@section('title', trans("user-university.upcomeing-activity"))




@section('links')


@endsection


@section('contant')



<div class="student-lesson-card-container">

@for ($i = 1; $i < 50; $i++)

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
                                <li class="list-group-item"><span>{{ __('user-university.start') }} : </span><span>Test</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.end') }} : </span><span>Test</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.release-date') }} : </span><span>Test</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.year') }} : </span><span>Test</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.semester') }}  : </span><span>1</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.instructor') }} : </span><span>Test</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.specialization') }} : </span><span>Test</span></li>
                            </ul>

                    </div>

                </div>
            </div>
            <div class="col-md-5">
                <div class="card-body">
                    <h5 class="card-title">{{ __('user-university.activity-content') }}</h5>
                    <div class="card-content card-activity-content">

                            <ul class="list-group">
                                <li class="list-group-item"><span>{{ __('user-university.title') }} : </span><span>Test</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.description') }} : </span><span>Lorem ipsum dolor sit amet con ad voluptates!</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.resources') }} : </span><span>Test</span></li>
                            </ul>


                    </div>
                </div>
            </div>
    
        </div>
        <div class="card-footer">
            <small class="text-muted">{{ __('user-university.activity-will-start-after') }} : 00:00:00</small>
            
            <a href="/admin/university/applicant-profile" class="btn btn-secondary btn" target="_blank">{{ __('user-university.start-activity') }}</a>
        </div>
    </div>
    


@endfor


</div>




@endsection


@section('scripts')


<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>


<script>





$('.student-lesson-card-container').infiniteScroll({
  path: '.pagination__next',
  append: '.student-lesson-card',
  history: false,
  scrollThreshold: false,
  status: '.page-load-status',
});



</script>

@endsection