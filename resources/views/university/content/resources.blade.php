@extends('layouts.university-master')

@section('title',  trans("user-university.resources"))


@section('links')



@endsection


@section('contant')



<ul class="nav nav-pills mb-3 student-pills" id="studentResources" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-resources-tab" data-toggle="pill" href="#pills-resources-1" role="tab" aria-controls="pills-resources-1" aria-selected="true">{{ __('user-university.recordings-on-google') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-resources-tab" data-toggle="pill" href="#pills-resources-2" role="tab" aria-controls="pills-resources-2" aria-selected="false">{{ __('user-university.direct-meetings') }}</a>
    </li>
</ul>


<div class="tab-content student-resources" id="pills-tabContent">


    <div class="tab-pane fade show active" id="pills-resources-1" role="tabpanel" aria-labelledby="pills-resources-tab">


            <div class="list-group">

                    @for ($i = 1; $i < 20; $i++)

                        <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-microphone-alt"></i><span>Recording File {{$i}}</span></a>

                    @endfor

            </div>


    </div>
    <div class="tab-pane fade" id="pills-resources-2" role="tabpanel" aria-labelledby="pills-profile-tab">


            <div class="list-group">

                    @for ($i = 1; $i < 20; $i++)

                        <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-desktop"></i><span>Direct Meeting {{$i}}</span></a>

                    @endfor

            </div>



    </div>
</div>
  







@endsection


@section('scripts')




@endsection