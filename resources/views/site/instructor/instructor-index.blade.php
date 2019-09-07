@extends('layouts.master')

@section('title', 'Zidni Instructor')


@section('links')



@endsection


@section('contant')



@include('site.instructor.instructor-header')

<section class="all-instructor-container" id="all-instructor">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <h3 class="all-instructor-title">Behind the Courses</h3>

            </div>


            <div class="col-md-12">
        
                    <div class="instructors-container">


                            {{-- For Demo Only --}}


                        @foreach ($instructors as $instructor)



                        <div class="instructors-info-container">


                            <div class="instructors-info-img">


                                <img class=" lazyloaded" data-src="//localhost:3000/images/demo-1.jpeg" src="image/{{$instructor->photo}}" width="100%" height="350">



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



</section>











@endsection


@section('scripts')



@endsection