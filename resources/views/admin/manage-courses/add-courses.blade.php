@extends('layouts.admin-master')

@section('title', 'Zidni Add Courses')


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
                <h2 class="content-header-title">Manage Courses</h2>
                <p>This board give you easy access to Manage Courses</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/all-courses">Manage Courses</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="AddCoursesContainer" class="card">
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
                                            
                            <form method="POST" id="AddCoursesForm" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <fieldset class="step-one">
                                        <legend>Add Basic Info</legend>
                                        <div class="row">


                                            <div class="col-md-12">


                                                    <div class="form-group ">
                                                            <label for="courseName">Course Name</label>
                                                            <input type="text" class="auto-save form-control" id="courseName" aria-describedby="emailHelp" placeholder="Course Name" name="courseName">
                                                    </div>


                                                    <div class="form-group select-input-container">
                                                        <label for="selectCategory">Select Category</label>
                                                        <select class="auto-save form-control form-select-active" id="selectCategory" name="selectCategory">
                                                            <option value="">Select Category</option>
                                                            @if(count($categories) > 0)
                                                            @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="shortDescription">Short Description</label>
                                                        <textarea class="auto-save form-control" id="shortDescription" name="shortDescription" rows="5"></textarea>
                                                    </div>


                                                    <div class="form-group">
                                                            <label for="Overview">Overview</label>
                                                            <textarea id="Overview" name="Overview"></textarea>
                                                    </div>


                                                    <div class="form-group">

                                                        <label for="courseImage">Uploud Course Image</label>

                                                        <input type="file" id="courseImage" name="courseImage" class="dropify" data-height="400" data-max-file-size="1M" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="1M">

                                                    </div>




                                                    <div class="form-group select-input-container">
                                                            <label for="selectInstructor">Select Instructor</label>
                                                            <select class="form-control auto-save form-select-active" id="selectInstructor" name="selectInstructor">
                                                                <option value="">Select Instructor</option>
                                                                @if(count($instructors))
                                                                @foreach($instructors as $instructor)
                                                                <option value="{{$instructor->id}}">{{$instructor->full_name}}</option>
                                                                @endforeach
                                                                @endif
                                                                
                                                            </select>
                                                    </div>


                                                    <div class="form-group ">
                                                        <label for="previewVideo">Add preview video link</label>
                                                        <input type="text" class="auto-save form-control" id="previewVideo" placeholder="Youtube, vemio..." name="previewVideo">
                                                    </div>


                                                    <div class="form-group ">
                                                        <label for="previewVideo">Add Price</label>
                                                        <input type="text" class="auto-save form-control" id="addPrice" value="" name="addPrice">
                                                    </div>


                                                    <div class="form-group ">
                                                        <label for="totalDuration">Total Duration</label>
                                                        <input type="text" class="auto-save form-control" id="totalDuration" name="totalDuration">
                                                    </div>


                                                    <div class="form-group ">
                                                        <label for="addLanguage">Language</label>
                                                        <input type="text" class="auto-save form-control" id="addLanguage" name="addLanguage">
                                                    </div>






                                            </div>





                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Add Course Lessons</legend>
                                        <div class="row">





                                        <div id="accordion">

                                                <div class="card week-card">
                                                        <div class="card-header" id="week_header_1">
                                                            <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#week_target_1" aria-expanded="false" aria-controls="week_target_1">
                                                                <div class="icon-week-status">

                                                                        <i class="fas fa-plus"></i>
                                                                        <i class="fas fa-minus"></i>

                                                                </div>
                                                                    
                                                                <span>Week Title</span>

                                                            </button>
                                                            <p class="week-error-container" data-toggle="tooltip" data-placement="top" title="Please Complete This Week"><i class="fas fa-exclamation-triangle"></i></p>
                                                            <a class="deleteWeekButton"><i class="fas fa-trash"></i></a>
                                                            </h5>


                                                        </div>
                                                        <div id="week_target_1" class="week-content collapse" aria-labelledby="week_header_1" data-parent="#accordion">
                                                            <div class="card-body">



                                                                    <div class="weekNameContainer">

                                                                        <div class="form-group">
                                                                            <label for="weekName">Week Name</label>
                                                                            <input type="text" class="form-control week-name-title" name="weekName_1">
                                                                        </div>


                                                                    </div>

                                                                    <div class="weekLessonContainer">
                                                                            <div class="form-group">
                                                                                <label for="LessonName">Lesson Name</label>
                                                                                <input type="text" class="form-control week-lesson-name" name="LessonName_1[]"/>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label for="LessonLink">Lesson link</label>
                                                                                <input type="text" class="form-control week-lesson-link" name="LessonLink_1[]"/>
                                                                            </div> <a class="previewInputLink" target="_blank"><i class="fas fa-eye"></i></a>  <a class="deleteInputRow"><i class="far fa-trash-alt"></i></a>
                                                                    </div>


                                                                    <div class="weekLessonWrapper"></div>




                                                                    <div class="addOtherLessonsContainer">

                                                                        <div class="form-group">
                                                                            <a class="addOtherLessons_1 addOtherLessonsButton">Add Lessons</a>
                                                                        </div>

                                                                    </div>






                                                            </div>
                                                        </div>
                                                        </div>



                                        </div>


                                        <div class="col-md-12">

                                            <div class="addMoreWeeksContainer">

                                                    <a class="addMoreWeeks">ADD OTHER WEEK</a>

                                            </div>



                                        </div>






                                            <noscript>
                                                <input class="nocsript-finish-btn sf-right nocsript-sf-btn" type="submit" value="Publish course"/>
                                            </noscript>
                                        </div>
                                    </fieldset>
                                    <fieldset id="addQuizContainer">
                                        <legend>Add Course Quiz</legend>


                                        <div class="row">


                                            <div class="col-md-12">


                                                <div class="form-group">
                                                    <label for="addCourseQuiz">Add Course Quiz</label>
                                                    
                                                    <select id="addCourseQuiz" class="form-select-active" name="addCourseQuiz">
                                                        <option>Select Course Quiz</option>
                                                        @if(count($quizzes) >= 5)
                                                            @for($i = 0 ; $i < 5 ; $i++)
                                                                <option value="{{$quizzes[$i]->id}}">{{$quizzes[$i]->title}}</option>
                                                            @endfor
                                                        @else
                                                            @foreach($quizzes as $quiz)
                                                                <option value="{{$quiz->id}}">{{$quiz->title}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
        
                                                </div>
        
        



                                            </div>


                                        </div>




                                    </fieldset>

                                    <input id="formWeekCounter" name="formWeekCounter" type="hidden" value=""/>

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
<script type="text/javascript" src="{{asset('admin/js/pages/addCoursesPage.js')}}"></script>

@endsection