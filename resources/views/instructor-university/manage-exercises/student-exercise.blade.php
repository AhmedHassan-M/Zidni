@extends('layouts.instructor-master')

@section('title', 'Zidni View Exercises | Student Answers')


@section('links')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">

<style>

#quizQuestionsWrapper .quizQuestionsContainer:nth-child(1) .quizQuestionsFooterContainer {
    visibility: visible;
    opacity: 1;
}

</style>



@endsection



@section('content')



<!-- START MAIN CONTENT -->


<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Manage Exercises</h2>
                <p>This board give you access to student answers on exercises</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="#">View Exercises | Student Answers</a></li>
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
                                                <label for="quizzesName">Student Name</label>
                                                <input type="text" class="form-control" name="studentName" placeholder="" value="Kareem Saeed" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="courseName">Specialization</label>
                                                <input type="text" class="form-control" name="studentSpecialization" placeholder="" value="Fiqth (Level 2)" disabled>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="courseName">Course</label>
                                                <input type="text" class="form-control" name="studentSpecialization" placeholder="" value="Course Name" disabled>
                                            </div>
                                            
                                            <div class="form-group select-input-container">
                                                <label for="quizzesPassingScore">Student Score</label>
                                                <input type="text" class="form-control" name="studentScore" placeholder="" value="74%" disabled>
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
                                                    
                                                    <a class="popover-info" data-content="" rel="popover" data-placement="left" data-original-title="Student Score" data-trigger="hover">
                                                        
                                                        <i class="fas fa-info-circle"></i>

                                                    </a>

                                                    <input type="number" class="form-control quiz-questions-score" id="quizQuestionsScore_{{$x}}" name="quizQuestionsScore_{{$x}}" min="1" max="10" value="@if($x % 2 != 0){{10}}@else{{0}}@endif" required disabled>
                                                </div>

                                            </div>


                                            <div class="quizQuestionsAnswersContainer">


                                                <div class="quizQuestionsAnswersHeader">
                                                        <legend>Enter answers</legend>
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
                                                            <input type="text" class="form-control quiz-questions-answers-title student_answer correct" name="quizQuestionsAnswersTitle_{{$x}}[]" value="Because..." disabled />
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
                                                            <input type="text" class="form-control quiz-questions-answers-title student_answer wrong" name="quizQuestionsAnswersTitle_{{$x}}[]" value="The reason is..." disabled/>
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

                                            <div class="quizQuestionsFooterContainer">
                                                <p class="student_comment">Lorem Ipsum is an ancient language.</p>
                                            </div>

                                    </div>
                                    
                                    
                                    @endfor


                                    </div>



                                    <div class="quizSubmitContainer">


                                        <a id="quizQuestionsCounter"><i class="fas fa-question-circle"></i><span>1</span>Question</a>

                                        {{-- student total score is calculated on the client side --}}
                                        <a id="totalScoreCounter"><i class="fas fa-check-double"></i>Student Points: <span>0</span></a>

                                        {{-- quiz total score is **NOT** calculated on the client side --}}
                                        <a id="quizStudentScore"><i class="fas fa-check-double"></i>Total Points: <span>40</span></a>

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












@endsection




@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>
<script type="text/javascript" src="{{asset('admin/js/instructor/exercises/view-exercise.js')}}"></script>

@endsection