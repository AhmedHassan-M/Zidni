@extends('layouts.admin-master')

@section('title', 'Zidni Edit Courses')


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
                                        <h2 class="content-header-title">Edit {{$course->name}} Course</h2>
                                        <p>This board give you easy way to Edit Courses</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a>Edit Course {{$course->name}}</a></li>
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
                                                <a class="nav-link courseLessonsNavContainer" data-toggle="tab" href="#lessons" role="tab">Course Lessons</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#quiz" role="tab">Course Quiz</a>
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
                                                            
                                            <form method="POST" id="EditCoursesForm" enctype="multipart/form-data">
                                                    {{csrf_field()}}

                                                <div id="edit-course-tabs-content" class="tab-content">

                                                    <div class="tab-pane active" id="info" role="tabpanel">

                                                        <div class="container step-one">

                                                                <div class="row">


                                                                        <div class="col-md-12">
                            
                            
                                                                                <div class="form-group ">
                                                                                        <label for="courseName">Course Name</label>
                                                                                <input type="text" class="auto-save form-control validate" id="courseName" aria-describedby="emailHelp" placeholder="Course Name" name="courseName" value="{{$course->name}}">
                                                                                </div>
                            
                            
                                                                                <div class="form-group select-input-container">
                                                                                    <label for="selectCategory">Select Category</label>
                                                                                    <select class="auto-save form-control form-select-active validate" id="selectCategory" name="selectCategory">
                                                                                        @if($course->category)
                                                                                        <option value="{{$course->category->id}}">{{$course->category->name}}</option>
                                                                                        @else
                                                                                        <option>Select A Category</option>
                                                                                        @endif
                                                                                        @if(count($categories) > 0)
                                                                                            @foreach($categories as $category)
                                                                                                @if($course->category)
                                                                                                    @if($category->id != $course->category->id)
                                                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                                                    @endif
                                                                                                @else
                                                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                            
                            
                                                                                <div class="form-group">
                                                                                    <label for="shortDescription">Short Description</label>
                                                                                    <textarea class="auto-save form-control validate" id="shortDescription" name="shortDescription" rows="5">{{$course->description}}</textarea>
                                                                                </div>
                            
                            
                                                                                <div class="form-group">
                                                                                        <label for="Overview">Overview</label>
                                                                                        <textarea id="Overview" name="Overview">{{$course->overview}}</textarea>
                                                                                </div>


                                                                                <div class="form-group">

                                                                                    <label for="courseImage">Uploud Course Image</label>

                                                                                    {{-- data-default-file is current image  --}}
                                                                                    @if(empty($course->image))
                                                                                    <input type="file" id="courseImage" name="courseImage" class="dropify" data-height="400" data-max-file-size="1M" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="1M">
                                                                                    @else
                                                                                    <input type="file" id="courseImage" name="courseImage" class="dropify" data-height="400" data-max-file-size="1M" data-min-width="250" data-max-width="1000" data-min-height="250" data-max-height="1000" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="1M" data-default-file="/image/{{$course->image}}">
                                                                                    @endif

                                                                                </div>
                            
                            
                            
                            
                                                                                <div class="form-group select-input-container">
                                                                                        <label for="selectInstructor">Select Instructor</label>
                                                                                        <select class="form-control auto-save form-select-active validate" id="selectInstructor" name="selectInstructor">
                                                                                            @if($course->instructor)
                                                                                                <option value="{{$course->instructor->id}}">{{$course->instructor->full_name}}</option>
                                                                                            @else
                                                                                            <option>Select An Instructor</option>
                                                                                            @endif
                                                                                            @if(count($instructors) > 0)
                                                                                                @foreach($instructors as $instructor)
                                                                                                    @if($course->instructor)
                                                                                                        @if($instructor->id != $course->instructor->id)
                                                                                                        <option value="{{$instructor->id}}">{{$instructor->full_name}}</option>
                                                                                                        @endif
                                                                                                    @else
                                                                                                        <option value="{{$instructor->id}}">{{$instructor->full_name}}</option>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </select>
                                                                                </div>
                            
                            
                                                                                <div class="form-group ">
                                                                                    <label for="previewVideo">Add preview video link</label>
                                                                                    <input type="text" class="auto-save form-control validate" id="previewVideo" placeholder="Youtube, vemio..." name="previewVideo" value="{{$course->preview_link}}">
                                                                                </div>
                            
                            
                                                                                <div class="form-group ">
                                                                                    <label for="previewVideo">Add Price</label>
                                                                                    <input type="text" class="auto-save form-control validate" id="addPrice" name="addPrice" value="{{$course->price}}">
                                                                                </div>
                            
                            
                                                                                <div class="form-group ">
                                                                                    <label for="totalDuration">Total Duration</label>
                                                                                    <input type="text" class="auto-save form-control validate" id="totalDuration" name="totalDuration" value="{{$course->duration}}">
                                                                                </div>
                            
                            
                                                                                <div class="form-group ">
                                                                                    <label for="addLanguage">Language</label>
                                                                                    <input type="text" class="auto-save form-control validate" id="addLanguage" name="addLanguage" value="{{$course->lng}}">
                                                                                </div>
                            
                            
                            
                            
                            
                            
                                                                        </div>
                            
                            
                            
                            
                            
                                                                    </div>


                                                        </div>





                                                    </div>
                                                    <div class="tab-pane" id="lessons" role="tabpanel">




                                                            <div class="row">

                                                                <input type="hidden" name="weekNo" value="{{count($course->weeks)}}">



                                                                    <div id="accordion">
                                                                            <?php $counter = 1; ?>
                                                                            @foreach($course->weeks as $week)
                                                                            
                                                                            <div class="card week-card" data-week="{{$counter}}">
                                                                                <div class="card-header" id="week_header_{{$counter}}">
                                                                                    <h5 class="mb-0">
                                                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#week_target_{{$counter}}" aria-expanded="false" aria-controls="week_target_{{$counter}}">
                                                                                        
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
                                                                                <div id="week_target_{{$counter}}" class="week-content collapse" aria-labelledby="week_header_{{$counter}}" data-parent="#accordion">
                                                                                    <div class="card-body">
                        
                                                                                            <?php $lessons = DB::table('lessons')->where('week_id',$week->id)->get(); ?>
                                                                                            <input type="hidden" name="lessonsNo_{{$counter}}" value="{{count($lessons)}}">
                                                                                            <div class="weekNameContainer">
                        
                                                                                                <div class="form-group">
                                                                                                    <label for="weekName">Week Name</label>
                                                                                                    <input type="text" class="form-control week-name-title" name="weekName_{{$counter}}" value="{{$week->name}}"/>
                                                                                                </div>
                        
                        
                                                                                            </div>
                                                                                            @if(count($lessons) > 0)
                                                                                            <div class="weekLessonContainer">
                                                                                                <div class="form-group">
                                                                                                    <label for="LessonName">Lesson Name</label>
                                                                                                    <input type="text" class="form-control week-lesson-name" name="LessonName_{{$counter}}[]" value="{{$lessons[0]->name}}" />
                                                                                                </div>
                                                                                                <div class="form-group ">
                                                                                                    <label for="LessonLink">Lesson link</label>
                                                                                                    <input type="text" class="form-control week-lesson-link" name="LessonLink_{{$counter}}[]" value="{{$lessons[0]->link}}"/>
                                                                                                </div> <a class="previewInputLink" target="_blank"><i class="fas fa-eye"></i></a>  <a class="deleteInputRow"><i class="far fa-trash-alt"></i></a>
                                                                                            </div>
                                                                                            @endif
                                                                                            <div class="weekLessonWrapper">
                                                                                            @if(count($lessons) > 0)
                                                                                                @foreach($lessons as $k => $lesson)
                                                                                                    <?php if ($k < 1) continue; ?>
                                                                                                 
                                                                                                


                                                                                                    <div class="weekLessonContainer"><div class="form-group"> <label for="LessonName">Lesson Name</label> <input type="text" class="form-control week-lesson-name" name="LessonName_{{$counter}}[]" value="{{$lesson->name}}" /></div><div class="form-group "> <label for="LessonLink">Lesson link</label> <input type="text" class="form-control week-lesson-link" name="LessonLink_{{$counter}}[]" value="{{$lesson->link}}" /></div> <a class="previewInputLink" target="_blank"><i class="fas fa-eye"></i></a> <a class="deleteInputRow"><i class="far fa-trash-alt"></i></a></div>


                                                                                                
                                                                                                @endforeach
                                                                                            @endif
                                                                                            </div>
                        
                                                                                            <div class="addOtherLessonsContainer">
                        
                                                                                                <div class="form-group">
                                                                                                    <a class="addOtherLessons_{{$counter}} addOtherLessonsButton">Add Lessons</a>
                                                                                                </div>
                        
                                                                                            </div>
                        
                        
                        
                        
                        
                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php $counter++; ?>
                                                                            @endforeach



                                                                    </div>
                            
                            
                                                                    <div class="col-md-12">
                            
                                                                        <div class="addMoreWeeksContainer">
                            
                                                                                <a class="addMoreWeeks">ADD OTHER WEEK</a>
                            
                                                                        </div>
                            
                            
                            
                                                                    </div>

                                                                    </div>





                                                    </div>
                                                    <div class="tab-pane" id="quiz" role="tabpanel">



                                                        <div class="container" id="addQuizContainer">

                                                                <div class="row">


                                                                        <div class="col-md-12">
                            
                            
                                                                            <div class="form-group">
                                                                                <label for="addCourseQuiz">Add Course Quiz</label>
                                                                                
                                                                                <select id="addCourseQuiz" class="form-select-active" name="addCourseQuiz">
                                                                                    @if(!empty($quiz))
                                                                                        @foreach($quizzes as $quizze)
                                                                                            @if($quizze->id == $course->quiz_id)
                                                                                            <option selected value="{{$quizze->id}}">{{$quizze->title}}</option>
                                                                                            @elseif($quizze->id != $course->quiz_id)
                                                                                            <option value="{{$quizze->id}}">{{$quizze->title}}</option>
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


                                                <input id="formWeekCounter" name="formWeekCounter" type="hidden" value=""/>



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
<script type="text/javascript" src="{{asset('admin/js/pages/editCoursesPage.js')}}"></script>

@endsection