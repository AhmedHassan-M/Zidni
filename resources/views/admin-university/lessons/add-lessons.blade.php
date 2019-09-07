@extends('layouts.admin-master')

@section('title', 'Zidni Add Lessons')


@section('links')


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">



@endsection



@section('content')



<!-- START MAIN CONTENT -->


<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Manage Zidni University Add Lessons</h2>
                <p>This board show Add Lessons for Zidni University</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Add Lessons</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="html-markup" class="card">
                <div class="card-header">
                    <h4 class="card-title">Zidni University Add Lessons</h4>
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
                            <ul class="nav nav-tabs lesson-content-container" role="tablist">
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

                                    <div class="tab-pane" id="exercises" role="tabpanel">...</div>


                                    
                                </div>







                            




                            <div class="form-submit"><button type="submit"
                                    class="btn btn-secondary btn-lg btn-block">Create Lesson</button></div>



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

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<!-- <script type="text/javascript" src="{{asset('admin/js/pages-university/lessons/add-lessons.js')}}"></script> -->

@endsection