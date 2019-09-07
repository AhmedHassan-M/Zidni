@extends('layouts.master')

@section('title', 'Zidni')


@section('links')



@endsection


@section('contant')


  <!--START HERO SECTION-->

  <div class="jumbotron jumbotron-fluid main-hero-section">

    <div class="main-hero-img">

        <img class="lazyload" data-src="{{asset('images/hero-background.png')}}" src="{{asset('images/hero-background-low.jpg')}}" alt="Zidni">

        
    </div>



    <div class="hero-overlay"></div>
      <div class="container hero-text">
        <h1 class="display-4">Classical Islamic Education</h1>
        <p class="lead">An Accredited Branch of the Islamic University of Minnesota</p>
        <a href="/all-categories"><button type="button" class="btn btn-secondary btn-lg">START LEARNING</button></a>
      </div>
    </div>
  
<!--END HERO SECTION-->

@if(count($masters) > 0 && count($specializations) > 0)
@include('site.home-page.courses-types')
@endif

@if(count($masters) > 0)
@include('site.home-page.master-slider')
@endif

@if(count($specializations) > 0)
@include('site.home-page.specialization-slider')
@endif

{{-- @include('site.home-page.live-slider') --}}

@if($coursesCount > 0)
@include('site.home-page.top-categories')
@endif



@include('site.home-page.testimonial')


@include('site.home-page.authorize')



@endsection


@section('scripts')




@endsection