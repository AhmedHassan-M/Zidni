@extends('layouts.master')

@section('title', 'Zidni Course Content')


@section('links')



@endsection


@section('contant')



<section id="course-content-header-container">




        <!--Start Page Header-->
    
    
        <div class="jumbotron jumbotron-fluid pages-header course-content-header">
    
    
            <img class="pages-header-img lazyload" data-src="{{asset('images/demo-3.jpeg')}}" src="{{asset('images/gray.jpg')}}" width="100%" height="300">
    

            <div class="pages-header-overlay"></div>
    
            <div class="container">
    
                <div class="pages-header-container">
    
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
    
                            <li class="breadcrumb-item">
                            <a href="/all-categories#categories-test">
                                @if($course->category)
                                        {{$course->category->name}}
                                @endif
                            </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="">{{$course->name}}</a>
                            </li>
                        </ol>
                    </nav>
    
    
                    <h1 class="display-6 page-header-title">{{$course->name}}</h1>


                </div>
    
    
            </div>
    </div>
    
    
        <!--End Page Header-->
    
    
    
    </div>
    
    
    
    
    
    </section>


    {{--Start progressBar --}}

    <section id="progressbar-section">


        <div class="container">

                <div class="row">

                        <div class="col-md-10">
        
        
                            <div class="progress-container">
        
                                    <div class="progress-title">
        
                                            <h5>Overall All Progress</h5>
        
                                        </div>
                    
                                        @if(count($enroll) > 0)
                                        <div class="progress">
                                            <div class="progress-bar three-sec-ease-in-out" role="progressbar" data-transitiongoal="{{$enroll[0]->progress}}"></div>
                                        </div>
                                        @endif
        
                            </div>
        
        
                    
        
                        </div>
        
                        @if(count($enroll) > 0)
                        <div class="col-md-2">
        
        
                            <div class="get-certificate-button">
                                @if($enroll[0]->quiz == 1)
                                <button onclick="window.location.href = '/get-certificate/course/{{$enroll[0]->id}}';" id="get-certificate" class="btn btn-secondary get-certificate">Get The Certificate</button>
                                @elseif($enroll[0]->quiz == 0)
                                <button id="get-certificate" class="btn btn-secondary get-certificate" disabled="disabled">Get The Certificate</button>
                                @endif
                            </div>
        
        
        
                        </div>
                        @endif
        
                    </div>

        </div>



    </section>

            {{--End progressBar --}}
            <input type="hidden" id="current-lesson" value="{{$lesson->id}}">



    <section>


            {{-- <div id="preloader">
                    <div id="status">&nbsp;</div>
            </div> --}}


            <section class="course-content-container">



                    <div class="container">


                        {{--Start Course Content--}}


                        <section id="course-content-section">

                        <div class="row flexflep">


                                <div class="col-md-4">


                                    {{-- Start DropDown Menu --}}


                                    <div class="courses-preload-content courses-preload-content-0">


                                        <!-- Preloader -->
                                        <div class="courses-load courses-load-0">
                                                <div class="courses-load-status courses-load-status-0">&nbsp;</div>
                                        </div>


                                        <div id="accordion">
                                        

                                                {{-- For Demo Only --}}
                                                <?php   
                                                        $count = 0; 
                                                        $index = 0; 
                                                        if(count($enroll) > 0){
                                                                $finished = $enroll[0]->finished;
                                                                if($finished == NULL){
                                                                        $status = NULL;
                                                                }else{
                                                                        $status = str_split($finished);
                                                                }
                                                        } 
                                                        
                                                ?>

                                                @foreach ($course->weeks as $weeks)


                                                <h3>Week {{ $weeks->name }}</h3>
                                                <div data-week="{{$count}}" class="">


                                                        <ul class="main-lessons-container" data-simplebar>


                                                                @foreach ($weeks->lesson as $lessons)

                                                                                {{-- courses-lesson-done class for completed lessone only --}}


                                                                                @if($lessons->id == $lesson->id)
                                                                                        @if(is_array ($status))
                                                                                                @if($status[$index] == 1)
                                                                                                        <a class="active courses-lesson-links courses-lesson-done" href="/courses/course-content/{{$course->id}}/{{$lessons->id}}"><li class="main-lessons-item">
                                                                                                @elseif($status[$index] == 0)
                                                                                                        <a class="active courses-lesson-links" href="/courses/course-content/{{$course->id}}/{{$lessons->id}}"><li class="main-lessons-item">
                                                                                                @endif
                                                                                        @else
                                                                                                <a class="active courses-lesson-links" href="/courses/course-content/{{$course->id}}/{{$lessons->id}}"><li class="main-lessons-item">
                                                                                        @endif
                                                                                @else
                                                                                        @if(is_array ($status))
                                                                                                @if($status[$index] == 1)
                                                                                                        <a class="courses-lesson-links courses-lesson-done" href="/courses/course-content/{{$course->id}}/{{$lessons->id}}"><li class="main-lessons-item">
                                                                                                @elseif($status[$index] == 0)
                                                                                                        <a class="courses-lesson-links" href="/courses/course-content/{{$course->id}}/{{$lessons->id}}"><li class="main-lessons-item">
                                                                                                @endif
                                                                                        @else
                                                                                        <a class="courses-lesson-links" href="/courses/course-content/{{$course->id}}/{{$lessons->id}}"><li class="main-lessons-item">
                                                                                        @endif
                                                                                @endif

                                                                                <div class="main-lessons-item-name">

                                                                                        <span>{{$lessons->name}}</span>

                                                                                </div>

                                                                                <div class="main-lessons-item-status">
                                                                                        <svg class="checkmark done" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>
                                                                                </div>

                                                                        </li></a>

                                                                <?php $index++; ?>
                                                                @endforeach

                                                        </ul>



                                                </div>

                                                <?php $count++; ?>
                                                @endforeach



{{-- ui-state-disabled for disabled quiz --}}
                                                @if(count($enroll) > 0)
                                                @if($enroll[0]->progress == 100)
                                                <h3 class="quiz-tab">Course Quiz</h3>
                                                <div class="quiz-tab-content">

                                                        <ul class="main-lessons-container">


                                                                <a id="activeQuizTab">


                                                                        <li class="main-lessons-item quiz-done">


                                                                                        <div class="main-lessons-item-name">

                                                                                                <span>Start Quiz</span>


                                                                                        </div>

                                                                                        <div class="main-lessons-item-time">
                                                                                                <svg class="checkmark done" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>
                                                                                        </div>


                                                                        </li>

                                                                </a>


                                                        </ul>

                                                </div>
                                                @else

                                                <h3 class="quiz-tab ui-state-disabled">Course Quiz</h3>
                                                <div class="quiz-tab-content">

                                                        <ul class="main-lessons-container">


                                                                <a>


                                                                        <li class="main-lessons-item">


                                                                                        <div class="main-lessons-item-name">

                                                                                                <span>Start Quiz</span>


                                                                                        </div>

                                                                                        <div class="main-lessons-item-time">

                                                                                                <span>10Q</span>
                                                                                                <svg class="checkmark done" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>


                                                                                        </div>


                                                                        </li>

                                                                </a>


                                                        </ul>

                                                </div>
                                                @endif
                                                @endif

                                        </div>

             
                                        
                                    </div>



                                    {{-- End DropDown Menu --}}







                                </div>

                                <div class="col-md-8">


                                        <div class="course-video">
                                                <iframe src="{{$lesson->link}}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay"></iframe>

                                                <div id="redirect_counter" class="redirect_counter-container">

                                                        <h2>Next Lesson In</h2>

                                                        <span id="redirect_counter_time"></span>

                                                        <button id="redirect_counter_cancel" type="button" class="btn btn-primary btn-lg">Cancel</button>

                
                                                </div>

                                        </div>




                                        <div class="progress progress-vid">
                                                <div class="progress-bar-vid" role="progressbar"></div>
                                        </div>



                                        <div class="courses-preload-content courses-preload-content-1">


                                                <!-- Preloader -->
                                                <div class="courses-load courses-load-1">
                                                        <div class="courses-load-status courses-load-status-1">&nbsp;</div>
                                                </div>


                                                <div class="course-info">


                                                        <ul class="nav nav-pills" role="tablist" id="course-info-tabs">
                                                                <li class="nav-item">
                                                                        <a class="nav-link active" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="true">Overview</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                        <a class="nav-link" id="pills-instructor-tab" data-toggle="pill" href="#pills-instructor" role="tab" aria-controls="pills-instructor" aria-selected="false">Instructor</a>
                                                                </li>
                                                        </ul>
                                                        <div class="tab-content" id="course-info-tabs-content">
                                                                <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">

                                                                        <div class="course-overview-container">

                                                                        <p>{!!$course->overview!!}</p>


                                                                        </div>


                                                                </div>
                                                                <div class="tab-pane fade" id="pills-instructor" role="tabpanel" aria-labelledby="pills-instructor-tab">
                                                                        
                                                                                <div class="instructors-container">
                                                                
                                                                                        @if($course->instructor)
                                                                
                                                                                                <div class="instructors-info-container">
                                                                
                                                                
                                                                                                                <div class="instructors-info-img">
                                                                        
                                                                        
                                                                                                                        <img class="lazyload" data-src="{{asset('image/'.$course->instructor->photo)}}" src="{{asset('image/'.$course->instructor->photo)}}" width="100%" height="350">
                                                                        
                                                                        
                                                                        
                                                                                                                </div>
                                                                        
                                                                                                                <div class="instructors-info-description">
                                                                        
                                                                        
                                                                                                                <h5 class="instructors-name">{{$course->instructor->full_name}}</h5>
                                                                        
                                                                        
                                                                                                                <p class="instructors-overview">{{$course->instructor->overview}}</p>
                                                                        
                                                                                                                <div class="instructors-social-media">
                                                                        
                                                                                                                        <a href="{{$course->instructor->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>
                                                                                                                        <a href="{{$course->instructor->twitter}}" target="_blank"><i class="fab fa-twitter-square"></i></a>
                                                                                                                        <a href="{{$course->instructor->linkedin}}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                                                        
                                                                        
                                                                                                                </div>
                                                                        
                                                                        
                                                                                                                </div>
                                                                        
                                                                        
                                                                                                        </div>
                                                                
                                                                                                        @endif
                                                                                                </div>
        


                                                        </div>
                                                </div>




                                        </div>


                                        </div>




                                        @if(count($enroll) > 0)
                                        @if($enroll[0]->progress == 100)
                                        <div class="course-qiuz-container">

                                                <div class="load-box">

                                                        <div class="load-text-box">
                                                                <div class="circles-loader">
                                                                        <div class="cssspinner"></div>
                                                                </div>
                                                        </div>


                                                        <div class="load-wizard-box">
                                                                <?php  
                                                                        $count = 1;        
                                                                ?>

                                                                <form id="mainQuizForm">
                                                                        
                                                                        @foreach($quizzes as $quiz)
                                                                        @if($quiz->id == $course->quiz_id)

                                                                        <?php $questions = $quiz->question; ?>
                                                                        <input type="hidden" name="questionNo" value="{{count($questions)}}">
                                                                        <input type="hidden" name="enrollID" value="{{$enroll[0]->id}}">
                                                                        @foreach($questions as $question)
                                                                        <fieldset class="quiz-item">

                                                                                

                                                                                <h3 class="quiz-question-title">{{$question->question}}</h3>
                                                                                <input type="hidden" name="questionid{{$count}}" value="{{$question->id}}">
                                                                                

                                                                                <div class="quiz-answer-container">
                                                                                        @foreach($question->answer as $answer)
                                                                                        <div class="quiz-answer-item">
                                                                                                        <div class="pretty p-icon p-round p-pulse">
                                                                                                        <input type="radio" name="quizTest{{$count}}" class="required" value="{{$answer->correct}}"/>
                                                                                                                <div class="state p-success">
                                                                                                                        <i class="icon fa fa-check"></i>
                                                                                                                        <label>{{$answer->answer}}</label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                                
                                                                                        </div>
                                                                                        @endforeach

                                                                                </div>


                                                                                <div class="quiz-error-message"></div>


                                                                                <div class="quiz-counter">

                                                                                        <ul class="quiz-counter-items">
                                                                                                <li class="current-qustion-count">1</li>
                                                                                                <span>/</span>
                                                                                                <li class="all-qustion-count">2</li>
                                                                                        </ul>

                                                                                </div>



                                                                                        
                                                                        </fieldset>
                                                                        <?php 
                                                                                $count++;
                                                                        ?>
                                                                        @endforeach
                                                                        @endif
                                                                        @endforeach

                                                                        {{-- <fieldset class="quiz-item">

                                                                                <h3 class="quiz-question-title">2 + 2 =</h3>


                                                                                <div class="quiz-answer-container">

                                                                                        <div class="quiz-answer-item">
                                                                                                        <div class="pretty p-icon p-round p-pulse">
                                                                                                        <input type="radio" name="quizTest2" class="required" value="0"/>
                                                                                                                <div class="state p-success">
                                                                                                                        <i class="icon fa fa-check"></i>
                                                                                                                        <label>Allow</label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                                
                                                                                        </div>
                                                                                        <div class="quiz-answer-item">
                                                                                                        <div class="pretty p-icon p-round p-pulse">
                                                                                                        <input type="radio" name="quizTest2" class="required" value="1"/>
                                                                                                                <div class="state p-success">
                                                                                                                        <i class="icon fa fa-check"></i>
                                                                                                                        <label>Allow</label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                        </div>
                                                                                        <div class="quiz-answer-item">
                                                                                                        <div class="pretty p-icon p-round p-pulse">
                                                                                                        <input type="radio" name="quizTest2" class="required" value="2"/>
                                                                                                                <div class="state p-success">
                                                                                                                        <i class="icon fa fa-check"></i>
                                                                                                                        <label>Allow</label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                                
                                                                                        </div>
                                                                                        <div class="quiz-answer-item">
                                                                                                        <div class="pretty p-icon p-round p-pulse">
                                                                                                        <input type="radio" name="quizTest2" class="required" value="3"/>
                                                                                                                <div class="state p-success">
                                                                                                                        <i class="icon fa fa-check"></i>
                                                                                                                        <label>Allow</label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                        </div>
                                                                                        <div class="quiz-answer-item">
                                                                                                        <div class="pretty p-icon p-round p-pulse">
                                                                                                        <input type="radio" name="quizTest2" class="required" value="4"/>
                                                                                                                <div class="state p-success">
                                                                                                                        <i class="icon fa fa-check"></i>
                                                                                                                        <label>Allow</label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                        </div>
                                                                                </div>
                                                                                

                                                                                <div class="quiz-error-message"></div>

                                                                                
                                                                                <div class="quiz-counter">

                                                                                        <ul class="quiz-counter-items">
                                                                                                <li class="current-qustion-count">1</li>
                                                                                                <span>/</span>
                                                                                                <li class="all-qustion-count">2</li>
                                                                                        </ul>

                                                                                </div>


                                                                        </fieldset>

                                                                        <fieldset class="quiz-item">

                                                                                <h3 class="quiz-question-title">2 + 2 =</h3>


                                                                                <div class="quiz-answer-container">

                                                                                        <div class="quiz-answer-item">
                                                                                                        <div class="pretty p-icon p-round p-pulse">
                                                                                                        <input type="radio" name="quizTest3" class="required" value="0"/>
                                                                                                                <div class="state p-success">
                                                                                                                        <i class="icon fa fa-check"></i>
                                                                                                                        <label>Allow</label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                                
                                                                                        </div>
                                                                                        <div class="quiz-answer-item">
                                                                                                        <div class="pretty p-icon p-round p-pulse">
                                                                                                        <input type="radio" name="quizTest3" class="required" value="1"/>
                                                                                                                <div class="state p-success">
                                                                                                                        <i class="icon fa fa-check"></i>
                                                                                                                        <label>Allow</label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                        </div>

                                                                                        <div class="quiz-answer-item">
                                                                                                        <div class="pretty p-icon p-round p-pulse">
                                                                                                        <input type="radio" name="quizTest3" class="required" value="2"/>
                                                                                                                <div class="state p-success">
                                                                                                                        <i class="icon fa fa-check"></i>
                                                                                                                        <label>Allow</label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                        </div>


                                                                                </div>


                                                                                <div class="quiz-error-message"></div>



                                                                                <div class="quiz-counter">

                                                                                        <ul class="quiz-counter-items">
                                                                                                <li class="current-qustion-count">1</li>
                                                                                                <span>/</span>
                                                                                                <li class="all-qustion-count">2</li>
                                                                                        </ul>

                                                                                </div>

                        
                                                                        </fieldset> --}}

                                                                </form>





                                                        </div>

                                                </div>



                                



                                        </div>
                                        @endif
                                        @endif


                                        <div class="quiz-result-container">

                                                <div class="quiz-result-img">

                                                        <img id="pass-quiz-icon" src="{{asset('images/pass.png')}}" alt="pass" />
                                                        <img id="fail-quiz-icon" src="{{asset('images/fail.png')}}" alt="fail" />

                                                </div>


                                                <div class="quiz-result-status">

                                                        <h2 class="quiz-result-status-message"></h2>

                                                        <h5 class="quiz-result-status-result"></h5>

                                                </div>

                                                @if(count($enroll) > 0)
                                                <div class="quiz-result-numbers">

                                                        <h5>Quiz Result</h5>

                                                        @foreach($quizzes as $quiz)
                                                        @if($quiz->id == $course->quiz_id)
                                                        <h4>Your Score: <span id="user-score-result">{{$quiz->final_score}}</span>%</h4>
                                                        <h4>Passing Score: <span id="admin-score-result">{{round(($quiz->passing_score/$quiz->final_score) * 100)}}</span>%</h4>
                                                        @endif
                                                        @endforeach

                                                </div>
                                                @endif


                                                <div class="quiz-result-button">

                                                        <button id="quiz-result-button-pass" type="button" class="btn btn-primary btn-lg"><a href="/get-certificate/course/{{$enroll[0]->id}}">Get Certificate</a></button>
                                                        <button id="quiz-result-button-fail" type="button" class="btn btn-primary btn-lg"><a>Go Back To Course</a></button>

                                                </div>

                                        </div>



                                </div>

                                            
                        </div>



                    </section>

                        {{--End Course Content--}}

            
                    </div>
            
            
                </section>


    </section>            


@endsection


@section('scripts')


<script type="text/javascript" src="{{asset('js/main-courses.js')}}"></script>


@endsection