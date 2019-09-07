@extends('layouts.university-master')

@section('title', trans("user-university.course-material"))


@section('links')



@endsection


@section('contant')

  
<div class="accordion" id="lessonsAccordion">
    @for ($i = 0; $i < 5; $i++)
    <div class="card">
        <div class="card-header" id="lesson_{{$i}}">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse_{{$i}}" aria-expanded="true" aria-controls="collapse_{{$i}}">
                    Lesson {{$i + 1}}
                </button>
            </h2>
        </div>

        <div id="collapse_{{$i}}" class="collapse" aria-labelledby="lesson_{{$i}}" data-parent="#lessonsAccordion">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab_{{$i}}" role="tablist">
                        <a class="nav-item nav-link active" id="nav-objectives_{{$i}}-tab" data-toggle="tab" href="#nav-objectives_{{$i}}" role="tab" aria-controls="nav-objectives_{{$i}}" aria-selected="true">Objectives</a>
                        <a class="nav-item nav-link" id="nav-lesson_elements_{{$i}}-tab" data-toggle="tab" href="#nav-lesson_elements_{{$i}}" role="tab" aria-controls="nav-lesson_elements_{{$i}}" aria-selected="false">Lesson Elements</a>
                        <a class="nav-item nav-link" id="nav-enrichments_{{$i}}-tab" data-toggle="tab" href="#nav-enrichments_{{$i}}" role="tab" aria-controls="nav-enrichments_{{$i}}" aria-selected="false">Enrichments</a>
                        <a class="nav-item nav-link" id="nav-voice_{{$i}}-tab" data-toggle="tab" href="#nav-voice_{{$i}}" role="tab" aria-controls="nav-voice_{{$i}}" aria-selected="false">Voice Annotation</a>
                        <a class="nav-item nav-link" id="nav-educational_outputs_{{$i}}-tab" data-toggle="tab" href="#nav-educational_outputs_{{$i}}" role="tab" aria-controls="nav-educational_outputs_{{$i}}" aria-selected="false">Educational Outputs</a>
                        <a class="nav-item nav-link" id="nav-exercises_{{$i}}-tab" data-toggle="tab" href="#nav-exercises_{{$i}}" role="tab" aria-controls="nav-exercises_{{$i}}" aria-selected="false">Exercises</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent_{{$i}}">
                    <div class="tab-pane fade show active" id="nav-objectives_{{$i}}" role="tabpanel" aria-labelledby="nav-objectives_{{$i}}-tab">
                        Home
                    </div>
                    <div class="tab-pane fade" id="nav-lesson_elements_{{$i}}" role="tabpanel" aria-labelledby="nav-lesson_elements_{{$i}}-tab">
                        Lesson Objectives
                    </div>
                    <div class="tab-pane fade" id="nav-enrichments_{{$i}}" role="tabpanel" aria-labelledby="nav-enrichments_{{$i}}-tab">
                        Enrichments
                    </div>
                    <div class="tab-pane fade" id="nav-voice_{{$i}}" role="tabpanel" aria-labelledby="nav-voice_{{$i}}-tab">
                        Voice Annotation
                    </div>
                    <div class="tab-pane fade" id="nav-educational_outputs_{{$i}}" role="tabpanel" aria-labelledby="nav-educational_outputs_{{$i}}-tab">
                        Educational Outputs
                    </div>
                    <div class="tab-pane fade" id="nav-exercises_{{$i}}" role="tabpanel" aria-labelledby="nav-exercises_{{$i}}-tab">
                        Exercises
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endfor
</div>



@include('university.rating.rating')



@endsection


@section('scripts')


<script src="{{asset('/js/university/course_material.js')}}"></script>


@endsection