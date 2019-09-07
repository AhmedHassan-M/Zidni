@extends('layouts.admin-master')

@section('title', 'Zidni Edit Course')


@section('links')


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .dataTables_scrollHeadInner, .dataTable{
        width: 100% !important;
    }
</style>

@endsection



@section('content')



<!-- START MAIN CONTENT -->


<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Manage Zidni University Edit Course</h2>
                <p>This board show Edit Course for Zidni University</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Edit Course</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="html-markup" class="card">
                <div class="card-header">
                    <h4 class="card-title">Zidni University Edit Course</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <ul class="nav nav-tabs tabs-style" id="nav-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-material-tab" data-toggle="tab" href="#nav-material" role="tab" aria-controls="nav-material" aria-selected="false">Material</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-exams-tab" data-toggle="tab" href="#nav-exams" role="tab" aria-controls="nav-exams" aria-selected="false">Exams</a></li>
                </ul>   
                
                
                <div class="tab-content">
                <div class="card-body collapse in tab-pane fade active" id="nav-general">

                    <div class="load-card-box"></div>

                    <div class="container">

                        <form class="university-form-style" id="editCourseForm">

                            <div class="form-group ">
                                <label for="courseName">Course Name</label>
                                <input type="text" autocomplete="off" class="form-control" name="courseName" id="courseName" placeholder="Course Name">
                            </div>


                            <div class="form-group">
                                <label for="summernote">Course Description</label>
                                <textarea class="form-control" id="summernote"></textarea>
                            </div>

                            <div class="form-group select-input-container">
                                    <label for="courseInstructor">Course Instructor</label>
                                    <select class="form-control auto-save form-select-active" id="courseInstructor" name="courseInstructor">
                                        <option value="">Instructor</option>
                                        <option value="1">Instructor 1</option>
                                        <option value="1">Instructor 2</option>                                     
                                        <option value="1">Instructor 3</option>                                     
                                    </select>
                            </div>
                            
                            <div class="form-group select-input-container">
                                    <label for="specialization">Specialization</label>
                                    <select class="form-control auto-save form-select-active" id="specialization" name="specialization_select">
                                        <option value="">Specialization</option>
                                        <option value="1">Specialization 1</option>
                                        <option value="2">Specialization 2</option>                                     
                                        <option value="3">Specialization 3</option>                                     
                                    </select>
                            </div>

                            <div class="form-group select-input-container">
                                    <label for="level">Specialization Level</label>
                                    <select class="form-control auto-save form-select-active" id="level" name="specialization_level" disabled>
                                        <option value="">Level</option>                                    
                                    </select>
                            </div>

                            <div class="form-group ">
                                <label for="price">Price</label>
                                <input type="text" autocomplete="off" class="form-control" name="price" id="price" placeholder="Course Price">
                            </div>

                            <div class="form-submit">
                                <button type="submit" class="btn btn-secondary btn-lg btn-block">Update Course</button>
                            </div>

                        </form>
                    </div>
                </div>
                
                <div id="nav-material" class="tab-pane fade">

                    <ul class="nav nav-pills tabs-style pills-style" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="add-btn" data-toggle="tab" href="#lesson" role="tab" aria-controls="tab" aria-selected="true">Add Lesson</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="all-btn" data-toggle="tab" href="#all-lessons" role="tab" aria-controls="tab" aria-selected="false">All Lessons</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        
                        <div class="card-body collapse in tab-pane active" id="lesson">
                        
                            <div class="load-card-box"></div>


                            <div class="container">


                                <form class="university-form-style" id="addLessonsForm">



                                    <div class="form-group ">
                                        <label for="lessonName">Lesson Name</label>
                                        <input type="text" autocomplete="off" class="form-control" name="lessonName" id="lessonName" placeholder="Lesson Name">
                                    </div>



                                    <div class="form-group">
                                        <label for="lessonDescription">Lesson Description</label>
                                        <textarea class="form-control" id="lessonDescription"
                                            name="lessonDescription" rows="5" placeholder="Lesson Description"></textarea>
                                    </div>



                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs lesson-content-container tabs-style" role="tablist">
                                            <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#objectives" role="tab">Objectives</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#lessonElements" role="tab">Lesson Elements</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#excuses" role="tab">Excuses</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#voiceAnnotation" role="tab">Voice Annotation</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#educationalOutputs" role="tab">Educational Outputs</a>
                                            </li>



                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#exercises" role="tab">Exercises</a>
                                            </li>

                                            
                                            
                                        </ul>
                                        
                                        <!-- Tab panes -->
                                        <div class="tab-content lesson-tabs-container">
                                            <div class="tab-pane active" id="objectives" role="tabpanel">

                                                    <div class="form-group rich-text-editor-container">

                                                            <label for="test">Cognitive Objectives</label>
                                                            <textarea class="active-rich-text-editor" id="cognitiveObjectives" name="cognitiveObjectives"></textarea>

                                                    </div>

                                                    <div class="form-group rich-text-editor-container">

                                                            <label for="test">Skills Objectives</label>
                                                            <textarea class="active-rich-text-editor" id="skillsObjectives" name="skillsObjectives"></textarea>

                                                    </div>


                                                    <div class="form-group rich-text-editor-container">

                                                            <label for="test">Emotional Objectives</label>
                                                            <textarea class="active-rich-text-editor" id="emotionalObjectives" name="emotionalObjectives"></textarea>

                                                    </div>

                                            </div>
                                            <div class="tab-pane" id="lessonElements" role="tabpanel">


                                                <div class="lesson-element-container">



                                                        <div id="lessonElementsContainer" role="tablist" aria-multiselectable="true">


                                                                <div class="card lesson-card" data-lesson="1">


                                                                    <div class="card-header" role="tab" id="lessonElement_1">
                                                                        <h5 class="mb-0">
                                                                            <button class="btn btn-link" data-toggle="collapse" data-parent="#lessonElementsContainer" href="#element_1"
                                                                                    aria-expanded="true" aria-controls="element_1">



                                                                            <div class="icon-week-status">
                                
                                                                                    <i class="fas fa-plus"></i>
                                                                                    <i class="fas fa-minus"></i>
                                
                                                                            </div>
                                                                                                        
                                                                                <span>Element</span>
                                
                                                                            </button>
                                
                                                                        </h5>
                                                                    </div>
                                
                                                                    <div id="element_1" class="collapse show in" role="tabpanel"
                                                                        aria-labelledby="lessonElement_1">


                                                                        <div class="card-block">
                                
                                                                                <div class="form-group">
                                                                                    <label for="lessonElementName_1">Element Name</label>
                                                                                    <input type="text" autocomplete="off" class="form-control" name="lessonElementName_1" id="lessonElementName_1" placeholder="Element Name">
                                                                                </div>
                                
                                                                                <div class="form-group rich-text-editor-container">
                                                                                    <label for="test">Element Content</label>
                                                                                    <textarea class="active-rich-text-editor" id="lessonElementContent_1" name="lessonElementContent_1"></textarea>
                                                                                </div>
                                                                        </div>
                                                                    </div>

                                                                </div>   
                                                        </div>
                                                        <div class="add-year-button"> 

                                                            <button class="btn btn-primary" id="addElement">Add New Element</button>
                        
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="excuses" role="tabpanel">


                                                <div class="form-group rich-text-editor-container">

                                                    <label for="test">Concepts</label>
                                                    <textarea class="active-rich-text-editor" id="concepts" name="concepts"></textarea>

                                                </div>



                                                <div class="form-group rich-text-editor-container">

                                                    <label for="test">Note That</label>
                                                    <textarea class="active-rich-text-editor" id="noteThat" name="noteThat"></textarea>

                                                </div>


                                                <div class="form-group rich-text-editor-container">

                                                    <label for="test">Whatch out</label>
                                                    <textarea class="active-rich-text-editor" id="whatchOut" name="whatchOut"></textarea>

                                                </div>


                                                <div class="form-group rich-text-editor-container">

                                                    <label for="test">Abstract</label>
                                                    <textarea class="active-rich-text-editor" id="abstract" name="abstract"></textarea>

                                                </div>





                                            </div>
                                            <div class="tab-pane" id="voiceAnnotation" role="tabpanel">




                                                <div class="lesson-element-container">



                                                    <div id="lessonVoiceContainer" role="tablist" aria-multiselectable="true">

                                                            <div class="card voice-card" data-voice="1">


                                                                <div class="card-header" role="tab" id="voiceElement_1">
                                                                    <h5 class="mb-0">
                                                                        <button class="btn btn-link" data-toggle="collapse" data-parent="#lessonVoiceContainer" href="#voice_1"
                                                                                aria-expanded="true" aria-controls="voice_1">



                                                                        <div class="icon-week-status">
                            
                                                                                <i class="fas fa-plus"></i>
                                                                                <i class="fas fa-minus"></i>
                            
                                                                        </div>
                                                                                                    
                                                                            <span>Voice Element</span>
                            
                                                                        </button>
                            
                                                                    </h5>
                                                                </div>


                            
                                                                <div id="voice_1" class="collapse show in" role="tabpanel"
                                                                    aria-labelledby="voiceElement_1">


                                                                    <div class="card-block">
                                                


                                                                            <div class="form-group">

                                                                                <label for="courseImage">Voice File</label>

                                                                                <input type="file" id="lessonVoiceFile_1" name="lessonVoiceFile_1" class="dropify_1" data-height="100" data-max-file-size="30M" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="mp3 mp4 ogg wav">

                                                                            </div>


                                                                            <div class="form-group rich-text-editor-container">
                                                                                <label for="test">Voice Content</label>
                                                                                <textarea class="active-rich-text-editor" id="lessonVoiceContent_1" name="lessonVoiceContent_1"></textarea>
                                                                            </div>
                                
                            
                                                                    </div>


                                                                    
                                                                </div>

                                                            </div>

                                                    </div>



                                                    <div class="add-year-button"> 

                                                        <button class="btn btn-primary" id="addVoice">Add New Voice Element</button>
                    
                                                    </div>

                                            </div>


                                            </div>
                                            <div class="tab-pane" id="educationalOutputs" role="tabpanel">...</div>

                                            <div class="tab-pane" id="exercises" role="tabpanel">
                                                
                                                <!--Start-->
                                                <div id="exerciseElementContainer" role="tablist" aria-multiselectable="true">
                                                    <div class="card" data-exercise="1">
                                                        <div class="card-header" role="tab" id="exerciseElement_1">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-parent="#exerciseElementContainer" href="#exercise_1"
                                                                        aria-expanded="true" aria-controls="exercise_1">
                                                                    <div class="icon-week-status">

                                                                            <i class="fas fa-plus"></i>
                                                                            <i class="fas fa-minus"></i>

                                                                    </div>
                                                                                                
                                                                    <span>Add Exercise</span>

                                                                </button>

                                                            </h5>
                                                        </div>

                                                        <div id="exercise_1" class="collapse show in exercise-container" role="tabpanel"
                                                            aria-labelledby="exercise_1">
                                                            <div class="card-block">

                                                                <div class="form-group">
                                                                    <label for="exerciseName">Exercise</label>
                                                                    <select class="form-control form-select-active auto-save" id="exerciseName" name="exerciseName_1[]">
                                                                        <option value="">Exercise Name</option>
                                                                        <option value="1">exercise1</option>
                                                                        <option value="2">exercise2</option>
                                                                        <option value="3">exercise3</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>(Start - End)</label>
                                                                    <input type="text" class="form-control daterange_1" placeholder="Select Start & End Date" name="exercise_Start_End" value=""/>
                                                                </div>
                                                                <div class="form-submit">
                                                                    <button class='btn btn-lg btn-secondary btn-block' id="addExercise">Add Exercise</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End-->
                                                <div class="card-body collapse in" id="allExercisesTableContainer">

                                                    <table id="allExercisesTable" class="table hover" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Exercise Name</th>
                                                                <th>Start - End</th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @for ($i = 0; $i < 4; $i++)
                                                            <tr id="{{$i}}">
                                                                <td class="icon"></td>
                                                                <td>
                                                                    Exercise{{$i}}
                                                                </td>
                                                                <td>08/25/2019-08/28/2019</td>
                                                                <td class="options-container">

                                                                    <a id="{{$i}}" class="delete-instructors hide-options"><span><i class="far fa-trash-alt"></i></span></a>
                                                                
                                                                </td>

                                                            </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>

                                    <div class="form-submit"><button type="submit"
                                            class="btn btn-secondary btn-lg btn-block">Create Lesson</button></div>

                                </form>
                            </div>

                        </div>
                        </div>
                        <div class="tab-pane fade" id="all-lessons">
                            <div class="card-body collapse in" id="allLessonsTableContainer">


                                <table id="allLessonsTable" class="table hover" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>ID</th>
                                                <th>Day</th>
                                                <th>Start From</th>
                                                <th>End At</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @for ($i = 0; $i < 50; $i++)
                                                <tr id="{{$i}}">
                                                    <td class="icon"></td>
                                                    <td>{{$i}}</td>
                                                    <td>test</td>
                                                    <td>10:00 AM</td>
                                                    <td>11:00 AM</td>
                                                    <td  class="options-container">
                                                        
                                                        
                                                        <a class="edit-course hide-options" data-toggle="modal" href="#update-modal" data-placement="left" title="Edit Lesson"><span><i class="far fa-edit"></i></span></a>

                                                        
                                                        <a id="" class="delete-user hide-options" data-toggle="tooltip" data-placement="left" title="Delete Lesson"><span><i class="far fa-trash-alt"></i></span></a>
                                                    
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>

                                
                            </div>
                        </div>
                        
                        
                </div>
            </div>
            <div id="nav-exams" class="tab-pane fade">
                <h1>Test</h1>
            </div>
            </section>

            <!--/update modal -->
            <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalTitle">Lesson Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                             <div class="container">


                            <form class="university-form-style" id="editLessonsForm">

                                <input type="hidden" name="lessonID" value="" id="lessonId">

                                <div class="form-group ">
                                    <label for="lessonName1">Lesson Name</label>
                                    <input type="text" autocomplete="off" class="form-control" name="edit-lessonName" id="lessonName1" placeholder="Lesson Name">
                                </div>



                                <div class="form-group">
                                    <label for="lessonDescription1">Lesson Description</label>
                                    <textarea class="form-control" id="lessonDescription1"
                                        name="edit-lessonDescription" rows="5" placeholder="Lesson Description"></textarea>
                                </div>



                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs lesson-content-container" role="tablist">
                                        <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#objectives1" role="tab">Objectives</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#lessonElements1" role="tab">Lesson Elements</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#excuses1" role="tab">Excuses</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#voiceAnnotation1" role="tab">Voice Annotation</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#educationalOutputs1" role="tab">Educational Outputs</a>
                                        </li>

                                        
                                        
                                    </ul>
                                    
                                    <!-- Tab panes -->
                                    <div class="tab-content lesson-tabs-container">
                                        <div class="tab-pane active" id="objectives1" role="tabpanel">

                                                <div class="form-group rich-text-editor-container">

                                                        <label for="test">Cognitive Objectives</label>
                                                        <textarea class="active-rich-text-editor" id="cognitiveObjectives1" name="edit-cognitiveObjectives"></textarea>

                                                </div>

                                                <div class="form-group rich-text-editor-container">

                                                        <label for="test">Skills Objectives</label>
                                                        <textarea class="active-rich-text-editor" id="skillsObjectives1" name="edit-skillsObjectives"></textarea>

                                                </div>


                                                <div class="form-group rich-text-editor-container">

                                                        <label for="test">Emotional Objectives</label>
                                                        <textarea class="active-rich-text-editor" id="emotionalObjectives1" name="edit-emotionalObjectives"></textarea>

                                                </div>

                                        </div>
                                        <div class="tab-pane" id="lessonElements1" role="tabpanel">


                                            <div class="lesson-element-container">



                                                    <div id="lessonElementsContainer1" role="tablist" aria-multiselectable="true">


                                                            <div class="card lesson-card" data-lesson="1">


                                                                <div class="card-header" role="tab" id="lessonElement_11">
                                                                    <h5 class="mb-0">
                                                                        <button class="btn btn-link" data-toggle="collapse" data-parent="#lessonElementsContainer1" href="#element_11"
                                                                                aria-expanded="true" aria-controls="element_11">



                                                                        <div class="icon-week-status">
                            
                                                                                <i class="fas fa-plus"></i>
                                                                                <i class="fas fa-minus"></i>
                            
                                                                        </div>
                                                                                                    
                                                                            <span>Element</span>
                            
                                                                        </button>
                            
                                                                    </h5>
                                                                </div>
                            
                                                                <div id="element_11" class="collapse show in" role="tabpanel"
                                                                    aria-labelledby="lessonElement_11">


                                                                    <div class="card-block">
                            
                                                                            <div class="form-group">
                                                                                <label for="lessonElementName_11">Element Name</label>
                                                                                <input type="text" autocomplete="off" class="form-control" name="edit-lessonElementName_1" id="lessonElementName_11" placeholder="Element Name">
                                                                            </div>
                            
                                                                            <div class="form-group rich-text-editor-container">
                                                                                <label for="test">Element Content</label>
                                                                                <textarea class="active-rich-text-editor" id="lessonElementContent_11" name="edit-lessonElementContent_1"></textarea>
                                                                            </div>
                                                                    </div>
                                                                </div>

                                                            </div>   
                                                    </div>
                                                    <div class="add-year-button"> 

                                                        <button class="btn btn-primary" id="addElement1">Add New Element</button>
                    
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="excuses1" role="tabpanel">


                                            <div class="form-group rich-text-editor-container">

                                                <label for="test">Concepts</label>
                                                <textarea class="active-rich-text-editor" id="concepts1" name="edit-concepts"></textarea>

                                            </div>



                                            <div class="form-group rich-text-editor-container">

                                                <label for="test">Note That</label>
                                                <textarea class="active-rich-text-editor" id="noteThat1" name="edit-noteThat"></textarea>

                                            </div>


                                            <div class="form-group rich-text-editor-container">

                                                <label for="test">Whatch out</label>
                                                <textarea class="active-rich-text-editor" id="whatchOut1" name="edit-whatchOut"></textarea>

                                            </div>


                                            <div class="form-group rich-text-editor-container">

                                                <label for="test">Abstract</label>
                                                <textarea class="active-rich-text-editor" id="abstract1" name="edit-abstract"></textarea>

                                            </div>





                                        </div>
                                        <div class="tab-pane" id="voiceAnnotation1" role="tabpanel">




                                            <div class="lesson-element-container">



                                                <div id="lessonVoiceContainer1" role="tablist" aria-multiselectable="true">

                                                        <div class="card voice-card" data-voice="1">


                                                            <div class="card-header" role="tab" id="voiceElement_11">
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link" data-toggle="collapse" data-parent="#lessonVoiceContainer1" href="#voice_11"
                                                                            aria-expanded="true" aria-controls="voice_11">



                                                                    <div class="icon-week-status">
                        
                                                                            <i class="fas fa-plus"></i>
                                                                            <i class="fas fa-minus"></i>
                        
                                                                    </div>
                                                                                                
                                                                        <span>Voice Element</span>
                        
                                                                    </button>
                        
                                                                </h5>
                                                            </div>


                        
                                                            <div id="voice_11" class="collapse show in" role="tabpanel"
                                                                aria-labelledby="voiceElement_11">


                                                                <div class="card-block">
                                            


                                                                        <div class="form-group">

                                                                            <label for="courseImage">Voice File</label>

                                                                            <input type="file" id="lessonVoiceFile_11" name="edit-lessonVoiceFile_1" class="dropify_1" data-height="100" data-max-file-size="30M" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="mp3 mp4 ogg wav">

                                                                        </div>


                                                                        <div class="form-group rich-text-editor-container">
                                                                            <label for="test">Voice Content</label>
                                                                            <textarea class="active-rich-text-editor" id="lessonVoiceContent_11" name="edit-lessonVoiceContent_1"></textarea>
                                                                        </div>
                            
                        
                                                                </div>


                                                                
                                                            </div>

                                                        </div>

                                                </div>



                                                <div class="add-year-button"> 

                                                    <button class="btn btn-primary" id="addVoice1">Add New Voice Element</button>
                
                                                </div>

                                        </div>


                                        </div>
                                        <div class="tab-pane" id="educationalOutputs" role="tabpanel">...</div>

                                    </div>

                                <div class="form-submit"><button type="submit"
                                        class="btn btn-secondary btn-lg btn-block">Update Lesson</button></div>

                            </form>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/ HTML Markup -->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<!-- END MAIN CONTENT -->




@endsection




@section('scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript" src="{{asset('admin/js/pages-university/courses/edit-courses.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pages-university/courses/add-courses.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pages-university/lessons/add-lessons.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pages-university/lessons/all-lessons.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pages-university/lessons/edit-lessons.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pages-university/exercises/editExercises.js')}}"></script>

@endsection