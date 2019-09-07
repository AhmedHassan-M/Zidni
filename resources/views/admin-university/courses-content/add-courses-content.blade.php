@extends('layouts.admin-master')

@section('title', 'Zidni Add Course Content')


@section('links')


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />



@endsection



@section('content')



<!-- START MAIN CONTENT -->


<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Manage Zidni University Add Course Content</h2>
                <p>This board show Add Course Content for Zidni University</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Add Course Content</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="html-markup" class="card">
                <div class="card-header">
                    <h4 class="card-title">Zidni University Add Course Content</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">

                    
                    <div class="load-card-box"></div>


                    <div class="container">


                        <form class="university-form-style" id="addCourseForm">


                            <div class="form-group select-input-container">
                                    <label for="courseName">Select Course</label>
                                    <select class="form-control auto-save form-select-active" id="courseName" name="courseName">
                                        <option value="">Select Instructor</option>
                                        <option value="1">test</option>
                                        <option value="1">test</option>                                     
                                    </select>
                            </div>




                            <div class="form-group">
                                <label for="courseDescription">Course Description</label>
                                <textarea class="form-control" id="courseDescription"
                                    name="courseDescription" rows="5" placeholder="Course Description"></textarea>
                            </div>
    



                            <div class="form-group select-input-container">
                                    <label for="courseInstructor">Course Instructor</label>
                                    <select class="form-control auto-save form-select-active" id="courseInstructor" name="courseInstructor">
                                        <option value="">Select Instructor</option>
                                        <option value="1">test</option>
                                        <option value="1">test</option>                                     
                                    </select>
                            </div>


                            <div class="row">

                                <div class="col-md-6">

                                        <div class="form-group select-input-container">
                                                <label for="courseYear">Course Year</label>
                                                <select class="form-control auto-save form-select-active" id="courseYear" name="courseYear">
                                                    <option value="">Select Year</option>
                                                    <option value="1">test</option>
                                                    <option value="1">test</option>                                     
                                                </select>
                                        </div>

                                </div>


                                <div class="col-md-6">

                                        <div class="form-group select-input-container">
                                                <label for="courseSemester">Course Semester</label>
                                                <select class="form-control auto-save form-select-active" id="courseSemester" name="courseSemester">
                                                    <option value="">Select Semester</option>
                                                    <option value="1">test</option>
                                                    <option value="1">test</option>                                     
                                                </select>
                                        </div>
                                    
                                </div>


                            </div>



                            <div class="form-group select-input-container">
                                    <label for="courseDateAndTime">Course Date & Time</label>
                                    <select class="form-control auto-save form-select-active" id="courseDateAndTime" name="courseDateAndTime">
                                        <option value="">Select Date & Time</option>
                                        <option value="1">test</option>
                                        <option value="1">test</option>                                     
                                    </select>
                            </div>





                            <div class="form-submit"><button type="submit"
                                    class="btn btn-secondary btn-lg btn-block">Create Course</button>
                                
                                
                                </div>



                        </form>


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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript" src="{{asset('admin/js/pages-university/courses-content/add-courses-content.js')}}"></script>

@endsection