@extends('layouts.instructor-master')

@section('title', 'Zidni Edit Exercises')


@section('links')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">

<style>

.quizQuestionsFooterContainer:first-of-type .quizQuestionsDelete {
    visibility: hidden;
    opacity: 0;
}

#quizQuestionsWrapper .quizQuestionsContainer:nth-child(1) .quizQuestionsFooterContainer {
    visibility: hidden;
    opacity: 0;
}

</style>


@endsection



@section('content')



<!-- START MAIN CONTENT -->


<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Manage Edit Exercises</h2>
                <p>This board give you easy way to edit Exercise</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/edit-Quizzes">Manage Edit Exercises</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


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
                                            
                            <form method="POST" id="EditQuizzesForm">
                                    {{csrf_field()}}


                                    <div class="addQuizzesTopInputs col-md-12">

                                            <div class="form-group">
                                                <label for="editQuizzesName">Exercise Title</label>
                                                <input type="text" class="form-control" id="editQuizzesName" name="editQuizzesName" placeholder="" value="title">
                                            </div>


                                            <div class="form-group">
                                                <label for="courseName">Course</label>
                                                <select class="form-control form-select-active auto-save" id="courseName" name="courseName_1[]">
                                                    <option value="" disabled>Course Name</option>
                                                    <option value="1">Course1</option>
                                                    <option value="2">Course2</option>
                                                    <option value="3">Course3</option>
                                                </select>
                                            </div>


                                            <div class="form-group select-input-container">
                                                <label for="editQuizzesPassingScore">Passing Score</label>
                                                <select class="auto-save form-control form-select-active" id="editQuizzesPassingScore" name="editQuizzesPassingScore">
                                                    <option value="" disabled>Passing Score</option>
                                                    @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" @if($i === 4) {{"selected"}} @endif>{{$i * 10}}%</option>
                                                    @endfor
                                                </select>
                                            </div>
                                    </div>

                                    <div id="quizQuestionsWrapper" class="col-md-12">

                                        <input type="hidden" name="oldQuestionsNo" value="count">

                            

                                        @for($x = 0; $x < 4; $x++)
                                        <div class="quizQuestionsContainer" data-question="counter" data-simplebar>

                                            <div class="quizQuestionsHeaderContainer">

                                                <div class="form-group">
                                                    <label class="quiz-questions-label" for="quizQuestionsTitle_counter">Questions</label>
                                                    <input type="text" class="form-control quiz-questions-title" id="quizQuestionsTitle_counter" name="quizQuestionsTitle_counter" placeholder="Enter Question" value="Question Title" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="quiz-questions-label" for="quizQuestionsScore_counter">Score</label>
                                                    
                                                    <a class="popover-info" data-content="Give each question score from 1 to 10" rel="popover" data-placement="left" data-original-title="Question Score" data-trigger="hover">
                                                        
                                                        <i class="fas fa-info-circle"></i>

                                                    </a>

                                                    <input type="number" class="form-control quiz-questions-score" id="quizQuestionsScore_counter" name="quizQuestionsScore_counter" value="10" min="1" max="10" required>
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

                                                    
                                                    <input type="hidden" name="answersNo_counter" value="answer">
                                    

                                                    @for($i = 0; $i < 3; $i++)
                                                    <div class="form-check">

                                                        <div class="pretty p-icon p-round">
                                                            <input type="radio" class="form-check-input quiz-questions-correct-answers" name="quizQuestionsCorrectAnswers_{{$x}}[]" value="{{$i}}" @if($x === $i) {{'checked'}} @endif required>
                                                            <div class="state p-success">
                                                            <i class="icon fas fa-check"></i>
                                                            <label></label>
                                                            </div>
                                                        </div>

                                                    <input type="text" class="form-control quiz-questions-answers-title" name="quizQuestionsAnswersTitle_{{$x}}[]" value="Answer {{$x.$i}}" />
                                                        <a class="quizAnswerDelete"><i class="fas fa-trash"></i></a>

                                                    </div>
                                                    @endfor


                                                    </fieldset>

                                                    <a class="addMoreAnswers btn btn-primary">Add More Answers</a>

                                                </div>



    


                                            </div>

                                            <div class="quizQuestionsFooterContainer">

                                                <a class="quizQuestionsDelete"><i class="fas fa-trash"></i>Delete Question</a>

                                            </div>


                                    </div>
                                    @endfor
        
                                    </div>



                                    <div class="quizSubmitContainer">


                                        <a id="quizQuestionsCounter"><i class="fas fa-question-circle"></i><span>1</span>Question</a>

                                        <a id="totalScoreCounter"><i class="fas fa-check-double"></i><span>0</span>Points</a>

                                        <a class="addOtherQuestions btn btn-primary"><i class="fas fa-plus-circle"></i>Add Another Question</a>

                                        <button type="submit" class="btn btn-primary">Save Exercise</button>

                                    </div>



                                    <input id="quizQuestionsCounterInput" name="quizQuestionsCounterInput" type="hidden" value=""/>
                                    <input id="quizScoreCounterInput" name="quizScoreCounterInput" type="hidden" value=""/>

                
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>
<script type="text/javascript" src="{{asset('admin/js/instructor/exercises/edit-exercises.js')}}"></script>

<script>

// #quizQuestionsWrapper .quizQuestionsContainer:nth-child(1) .quizQuestionsFooterContainer
$(document).ready(function () {
    $('#quizQuestionsWrapper .quizQuestionsContainer').eq(0).find('.quizQuestionsFooterContainer').addClass('footer-hidden');
});



</script>

@endsection