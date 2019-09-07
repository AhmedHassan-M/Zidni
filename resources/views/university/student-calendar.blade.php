@extends('layouts.university-master')

@section('title', trans("user-university.student-calendar"))


@section('links')



@endsection


@section('contant')


<ul class="nav nav-pills mb-3 student-pills" id="studentCalendar" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-semester-tab" data-toggle="pill" href="#pills-semester-1" role="tab" aria-controls="pills-semester-1" aria-selected="true">{{ __('user-university.first-semester') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-semester-tab" data-toggle="pill" href="#pills-semester-2" role="tab" aria-controls="pills-semester-2" aria-selected="false">{{ __('user-university.second-semester') }}</a>
    </li>

</ul>


<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-semester-1" role="tabpanel" aria-labelledby="pills-semester-tab">Calendar</div>
    <div class="tab-pane fade" id="pills-semester-2" role="tabpanel" aria-labelledby="pills-profile-tab">Calendar</div>
</div>



@endsection


@section('scripts')




@endsection