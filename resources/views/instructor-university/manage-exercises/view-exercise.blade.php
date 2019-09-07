@extends('layouts.instructor-master')

@section('title', 'Zidni View Exercises')


@section('links')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">



@endsection



@section('content')



<!-- START MAIN CONTENT -->


<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Manage Exercises</h2>
                <p>This board give you easy way to view exercises</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="#">View Exercises</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body" id="viewExercise">


            <!-- HTML Markup -->
            <section id="AddQuizzesContainer" class="card">
                <div class="card-body collapse in">


                    <div class="container">


                        <div class="row">
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
                                                
                            <div id="AddQuizzesForm">

                                    <div class="addQuizzesTopInputs col-md-12">
                        
                                            <div class="form-group">
                                                <label for="quizzesName">Exercise Title</label>
                                                <input type="text" class="form-control" id="quizzesName" name="quizzesName" placeholder="" value="Exercise Title" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="courseName">Course</label>
                                                <select class="form-control form-select-active auto-save" id="courseName" name="courseName[]" disabled>
                                                    <option value="" disabled>Course Name</option>
                                                    <option value="1">Course1</option>
                                                    <option value="2" selected>Course2</option>
                                                    <option value="3">Course3</option>
                                                </select>
                                            </div>

                                            <div class="form-group select-input-container">
                                                <label for="quizzesPassingScore">Passing Score</label>
                                                <select class="auto-save form-control form-select-active" id="quizzesPassingScore" name="quizzesPassingScore" disabled>
                                                    <option value="" disabled>Passing Score</option>
                                                    @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" @if($i === 4) {{"selected"}} @endif>{{$i * 10}}%</option>
                                                    @endfor
                                                </select>
                                            </div>
                                    </div>

                                    <div id="quizQuestionsWrapper" class="col-md-12">


                                        @for($x = 0; $x < 4; $x++)

                                        <div class="quizQuestionsContainer" data-simplebar>

                                            <div class="quizQuestionsHeaderContainer">

                                                <div class="form-group">
                                                    <label class="quiz-questions-label" for="quizQuestionsTitle_{{$x}}">Questions</label>
                                                    <input type="text" class="form-control quiz-questions-title" id="quizQuestionsTitle_{{$x}}" name="quizQuestionsTitle_{{$x}}" placeholder="Enter Question" value="Why?" required disabled>
                                                </div>

                                                <div class="form-group quiz-score-container">
                                                    <label class="quiz-questions-label" for="quizQuestionsScore_{{$x}}">Score</label>
                                                    
                                                    <a class="popover-info" data-content="Give each question score from 1 to 10" rel="popover" data-placement="left" data-original-title="Question Score" data-trigger="hover">
                                                        
                                                        <i class="fas fa-info-circle"></i>

                                                    </a>

                                                    <input type="number" class="form-control quiz-questions-score" id="quizQuestionsScore_{{$x}}" name="quizQuestionsScore_{{$x}}" min="1" max="10" value="10" required disabled>
                                                </div>

                                            </div>


                                            <div class="quizQuestionsAnswersContainer">


                                                <div class="quizQuestionsAnswersHeader">
                                                        <legend>Enter answers</legend>
                                                        <a class="popover-info" data-content="Enter question's answers and check the correct answer" rel="popover" data-placement="left" data-original-title="Question Answers" data-trigger="hover">
                                                        
                                                            <i class="fas fa-info-circle"></i>
    
                                                        </a>
                                                </div>



                                                <div class="form-group">
                                                    <fieldset class="form-group">


                                                        <div class="form-check">
                                                            <div class="pretty p-icon p-round">
                                                                <input type="radio" class="form-check-input quiz-questions-correct-answers" name="quizQuestionsCorrectAnswers_{{$x}}[]" value="0" required @if($x === 0) {{'checked'}} @endif disabled>
                                                                <div class="state p-success o1">
                                                                <i class="icon fas fa-check"></i>
                                                                <label></label>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control quiz-questions-answers-title" name="quizQuestionsAnswersTitle_{{$x}}[]" value="Because..." disabled />
                                                        </div>
                                                        
                                                        <div class="form-check">
                                                            <div class="pretty p-icon p-round">
                                                                <input type="radio" class="form-check-input quiz-questions-correct-answers" name="quizQuestionsCorrectAnswers_{{$x}}[]" value="1" required @if($x === 1) {{'checked'}} @endif disabled>
                                                                <div class="state p-success o1">
                                                                    <i class="icon fas fa-check"></i>
                                                                    <label></label>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control quiz-questions-answers-title" name="quizQuestionsAnswersTitle_{{$x}}[]" value="Due to..." disabled />
                                                        </div>

                                                        <div class="form-check">
                                                            <div class="pretty p-icon p-round">
                                                                <input type="radio" class="form-check-input quiz-questions-correct-answers" name="quizQuestionsCorrectAnswers_{{$x}}[]" value="2" required @if($x === 2) {{'checked'}} @endif disabled>
                                                                <div class="state p-success o1">
                                                                    <i class="icon fas fa-check"></i>
                                                                    <label></label>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control quiz-questions-answers-title" name="quizQuestionsAnswersTitle_{{$x}}[]" value="The reason is..." disabled/>
                                                        </div>

                                                        <div class="form-check">
                                                            <div class="pretty p-icon p-round">
                                                                <input type="radio" class="form-check-input quiz-questions-correct-answers" name="quizQuestionsCorrectAnswers_{{$x}}[]" value="3" required @if($x === 3) {{'checked'}} @endif disabled>
                                                                <div class="state p-success o1">
                                                                    <i class="icon fas fa-check"></i>
                                                                    <label></label>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control quiz-questions-answers-title" name="quizQuestionsAnswersTitle_{{$x}}[]" value="Never Mind." disabled />
                                                        </div>




                                                    </fieldset>

                                                </div>
                                            </div>

                                    </div>
                                    
                                    
                                    @endfor


                                    </div>



                                    <div class="quizSubmitContainer">


                                        <a id="quizQuestionsCounter"><i class="fas fa-question-circle"></i><span>1</span>Question</a>

                                        <a id="totalScoreCounter"><i class="fas fa-check-double"></i><span>0</span>Points</a>

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentsModal">Students</button>

                                        <a href="/instructor/edit-exercises" class="btn btn-primary edit-btn">Edit Exercise</a>

                                    </div>


                                    <input id="quizQuestionsCounterInput" name="quizQuestionsCounterInput" type="hidden" value=""/>
                                    <input id="quizScoreCounterInput" name="quizScoreCounterInput" type="hidden" value=""/>


                
                                </div>



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


<!-- Students Modal -->
<div class="modal fade" id="studentsModal" tabindex="-1" role="dialog" aria-labelledby="studentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalTitle">Students List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-unstyled students_list">
                    @for($i = 0; $i < 10; $i++)
                    <li class="single_student">
                        <a href="/instructor/view-exercise/student-answers" class="student_link">
                            <span>Student Name </span><span>(#{{$i * 5 + 50}}875)</span>
                        </a>
                    </li>
                    @endfor
                    @for($i = 0; $i < 40; $i++)
                    <li class="single_student">
                        <p class="student_link student_disabled">
                                <span>Student Name </span><span>(#{{$i * 5 + 50}}875)</span>
                        </p>
                    </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</div>












@endsection




@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>
<script type="text/javascript" src="{{asset('admin/js/instructor/exercises/view-exercise.js')}}"></script>

@endsection