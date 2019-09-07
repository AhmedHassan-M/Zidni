@extends('layouts.admin-master')

@section('title', 'Zidni Vision-Mission')


@section('links')

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">

@endsection



@section('content')



    <!-- START MAIN CONTENT -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">Manage Vision Mission</h2>
                    <p>This board give you easy way to edit Vision Mission</p>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="/admin/vision-mission">Manage Vision Mission</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">


                <!-- HTML Markup -->
                <section id="html-markup" class="content-edit-container">
                    <div class="card-body collapse in">


                            <div class="container">


                                <div class="col-md-12">

                                    <form id="visionMissionForm" action="/admin/vision-mission" method="POST">
                                        {{ csrf_field()}}
                                        <div class="form-group">
                                            <textarea id="visionMission" name="visionMission" class="content-text-editor">{!! $items->value!!}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary submit-content">Apply Changes</button>
                                        </div>


                                    </form>


                                </div>


                            </div>


                    </div>
                </section>
                <!--/ HTML Markup -->
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- END MAIN CONTENT -->



@endsection




@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script type="text/javascript" src="{{asset('admin/js/pages/contentPages.js')}}"></script>


@endsection