@extends('layouts.admin-master')

@section('title', 'Zidni Edit Specializations')


@section('links')

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Edit Specializations</h2>
                                        <p>This board give you easy way to Edit Specializations</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/all-courses">Edit Specializations</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="courses-summary" class="card">
                                        <div class="card-body">


                                            <!-- Nav tabs -->
                                            <ul id="edit-course-tabs" class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#info" role="tab">Basic Info</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#moreInfo" role="tab">More Info</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#courses" role="tab">Courses</a>
                                                </li>
                                            </ul>
                                                
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
                                            
                                            <form method="POST" id="EditSpecializationsForm" enctype="multipart/form-data">
                                                    {{csrf_field()}}


                                                <div id="edit-course-tabs-content" class="tab-content">

                                                    <div class="tab-pane active" id="info" role="tabpanel">

                                                        <div class="container step-one">

                                                                <div class="row">


                                                                <div class="form-group ">
                                                                        <label for="editSpecializationsName">Specializations Name</label>
                                                                        <input type="text" class="form-control validate" id="editSpecializationsName" value="{{$specialization->name}}" name="editSpecializationsName">
                                                                </div>
            
                                                                <div class="form-group">
                                                                    <label for="editSpecializationsShortDescription">Short Description</label>
                                                                    <textarea class="form-control validate" id="editSpecializationsShortDescription" name="editSpecializationsShortDescription" rows="5">{{$specialization->description}}</textarea>
                                                                </div>
            
            
                                                                <div class="form-group">
                                                                    <label for="editSpecializationsOverview">Overview</label>
                                                                    <textarea id="editSpecializationsOverview" name="editSpecializationsOverview">{{$specialization->overview}}</textarea>
                                                                </div>
            
            

            
            
                                                                <div class="form-group">

                                                                    <label for="courseImage">Uploud Specializations Image</label>
            
                                                                    <input type="file" id="courseImage" name="courseImage" class="dropify validate" data-height="400" data-max-file-size="1M" data-min-width="250" data-max-width="1000" data-min-height="250" data-max-height="1000" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="1M" data-default-file="/image/{{$specialization->image}}">
            
                                                                </div>

                            
                            
                                                                </div>


                                                        </div>





                                                    </div>
                                                    <div class="tab-pane" id="moreInfo" role="tabpanel">




                                                            <div class="row">

                                                                
                                                                <div class="col-md-12">



                                                                    <div class="form-group ">
                                                                        <label for="editSpecializationsPreviewVideo">Add preview video link</label>
                                                                        <input type="text" class="form-control validate" id="editSpecializationsPreviewVideo" placeholder="Youtube, vemio..." name="editSpecializationsPreviewVideo" value="{{$specialization->preview}}">
                                                                    </div>
                        
                        
                                                                    
                                                                    <div class="form-group ">
                                                                        <label for="editSpecializationsAddPrice">Add Price</label>
                                                                        <input type="text" class="form-control validate" id="editSpecializationsAddPrice" value="{{$specialization->price}}" name="editSpecializationsAddPrice">
                                                                    </div>
                        
                        
                                                                    <div class="form-group ">
                                                                        <label for="editSpecializationsTotalDuration">Total Duration</label>
                                                                        <input type="text" class="form-control validate" id="editSpecializationsTotalDuration" value="{{$specialization->duration}}" name="editSpecializationsTotalDuration">
                                                                    </div>
                        
                        
                                                                    <div class="form-group ">
                                                                        <label for="editSpecializationsAddLanguage">Language</label>
                                                                        <input type="text" class="form-control validate" id="editSpecializationsAddLanguage" name="editSpecializationsAddLanguage" value="{{$specialization->language}}">
                                                                    </div>
                        
                        
                        
                        
                                                                </div>


                                                            </div>





                                                    </div>
                                                    <div class="tab-pane" id="courses" role="tabpanel">
                                                        <?php
                                                            $selected = $specialization->courses;
                                                            $a = array();
                                                            foreach($selected as $select){
                                                                array_push($a,$select->id);
                                                            }
                                                            
                                                        ?>
                                                        <div class="container" id="addQuizContainer">

                                                                <div class="row">


                                                                    <div class="col-md-12">

                                                                        <div class="form-group multiple-style">
                                                                            <label for="editAddSpecializationsCourses">Add Courses To Master's Degree</label>
                                                                            
                                                                            <select id="editAddSpecializationsCourses" class="form-select-active validate" name="editAddSpecializationsCourses[]" multiple="multiple">
                                                                                @if(count($courses) > 0)
                                                                                <?php 
                                                                                $count = 0; 
                                                                                
                                                                                ?> 
                                                                                        @foreach($courses as $course)
                                                                                            @if(in_array ($course->id , $a))
                                                                                            <option value="{{$course->id}}" selected>{{$course->name}}</option>
                                                                                            <?php $count++; ?>
                                                                                            @else
                                                                                            <option value="{{$course->id}}">{{$course->name}}</option>
                                                                                            @endif
                                                                                        @endforeach

                                                                                        
                                                                                @endif
                                                                            </select>
                                
                                                                        </div>
                                
                                
                        
                        
                        
                                                                    </div>




                                                                </div>
                           

                                                        </div>



                                                    </div>

                                                </div>


                                                <div class="EditCoursesFormSubmit">

                                                    <button type="submit" class="btn btn-primary">SAVE CHANGES</button>

                                                </div>

                                            
                                            </form>


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
<script type="text/javascript" src="{{asset('admin/js/pages/editSpecializations.js')}}"></script>

@endsection