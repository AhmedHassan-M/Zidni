@extends('layouts.admin-master')

@section('title', 'Zidni Add Specializations')


@section('links')

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<style>

    .modal {
        position: fixed;
        top: 60%;
    }


    .modal-backdrop {
        display: none;
    }



.modal-backdrop.in {
    opacity: .5;
    display: none;
}

</style>

@endsection



@section('content')



<!-- START MAIN CONTENT -->


<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Add New Specializations</h2>
                <p>This board give you easy access to add Specializationse</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/add-masters">Add Specializations</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="AddSpecializationsContainer" class="card">
                <div class="card-body collapse in">

                        <div class="load-box">


                        <div class="load-text-box">
                            <div class="circles-loader">
                                <div class="cssspinner"></div>
                            </div>
                        </div>

                        <div class="load-wizard-box">
                            @if(session()->has('failure'))
                                <div class="alert alert-danger">
                                    {{ session()->get('failure') }}
                                </div>
                            @endif
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                                            
                            <form method="POST" id="AddSpecializationsForm" enctype="multipart/form-data">
                                    {{csrf_field()}}    
                                    
                                    <fieldset class="step-one">
                                        <legend>Add Basic Info</legend>
                                        <div class="row">


                                            <div class="col-md-12">


                                                    <div class="form-group ">
                                                            <label for="specializationsName">Specialization Name</label>
                                                            <input type="text" class="form-control" id="specializationsName" placeholder="Master Name" name="specializationsName">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="specializationsShortDescription">Short Description</label>
                                                        <textarea class="form-control" id="specializationsShortDescription" name="specializationsShortDescription" rows="5"></textarea>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="specializationsOverview">Overview</label>
                                                        <textarea id="specializationsOverview" name="specializationsOverview"></textarea>
                                                    </div>


                                                    <div class="form-group">

                                                        <label for="courseImage">Uploud Specialization Image</label>

                                                        <input type="file" id="courseImage" name="courseImage" class="dropify" data-height="400" data-max-file-size="1M" data-min-width="250" data-max-width="1000" data-min-height="250" data-max-height="1000" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="1M">

                                                    </div>


                                                </div>



                                        </div>
                                    </fieldset>

                                    <fieldset class="step-two">
                                        <legend>Add more info</legend>


                                        <div class="col-md-12">



                                            <div class="form-group ">
                                                <label for="specializationsPreviewVideo">Add preview video link</label>
                                                <input type="text" class=" form-control" id="specializationsPreviewVideo" placeholder="Youtube, vemio..." name="specializationsPreviewVideo">
                                            </div>


                                            
                                            <div class="form-group ">
                                                <label for="specializationsAddPrice">Add Price</label>
                                                <input type="text" class=" form-control" id="specializationsAddPrice" value="" name="specializationsAddPrice">
                                            </div>


                                            <div class="form-group ">
                                                <label for="specializationsTotalDuration">Total Duration</label>
                                                <input type="text" class=" form-control" id="specializationsTotalDuration" name="specializationsTotalDuration">
                                            </div>


                                            <div class="form-group ">
                                                <label for="specializationsAddLanguage">Language</label>
                                                <input type="text" class=" form-control" id="specializationsAddLanguage" name="specializationsAddLanguage">
                                            </div>




                                        </div>



                                    </fieldset>
                                    
                                    <fieldset id="addSpecializationsContainer">
                                        <legend>Add Courses</legend>


                                        <div class="row">


                                            <div class="col-md-12">


                                                <div class="form-group multiple-style">
                                                    <label for="addSpecializationsCourses">Add Courses To Specialization</label>
                                                    
                                                    <select id="addSpecializationsCourses" class="form-select-active" name="addSpecializationsCourses[]" multiple="multiple">
                                                        @if(count($courses) > 0)
                                                            @foreach($courses as $course)
                                                                <option value="{{$course->id}}">{{$course->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
        
                                                </div>
        
        



                                            </div>


                                        </div>




                                    </fieldset>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script type="text/javascript" src="{{asset('admin/js/pages/addSpecializations.js')}}"></script>

@endsection