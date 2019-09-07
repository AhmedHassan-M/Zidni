@extends('layouts.master')

@section('title', 'Zidni Mission, Vision')


@section('links')



@endsection


@section('contant')



@include('site.content-pages.content-pages-header', ['pagetitle' => 'Mission, Vision'])






<section class="content-pages-container">


    <div class="container">
        @foreach($items as $item)
        <div class="col-md-12">
            {!! $item->value !!}
        </div>
        @endforeach
    </div>



</section>











@endsection


@section('scripts')



@endsection