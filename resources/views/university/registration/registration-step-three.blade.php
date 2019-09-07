@extends('layouts.master')

@section('title', 'Zidni All Live Sessions page 2')


@section('links')

<link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">

@endsection


@section('contant')


@include('university.registration.registration-header')




  <!-- STEPS -->
  @include('university.components.steps')





@endsection


@section('scripts')



@endsection