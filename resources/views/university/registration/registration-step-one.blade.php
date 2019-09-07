@extends('layouts.master')

@section('title', 'Zidni All Live Sessions page 2')


@section('links')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">
<link href="https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css" rel="stylesheet">

@endsection


@section('contant')


@include('university.registration.registration-header')



@include('university.components.steps')

  @if($currentUser->has('application')->exists())

  @if($currentUser->application->step >= 1)

  <section class="new__student__traking__container">

    <div class="container">

            <div class="card">

                    <div class="top-card">

                            <img class="card-img-top lazyload" data-src="{{asset('images/university.jpg')}}" src="{{asset('images/gray.jpg')}}" width="100%" height="100">

                            <div class="top-card-content">

                                    <h2>thank you for applying to zidni university</h2>

                                    <p>You can track your application status from here</p>

                            </div>


                    </div>

                    <div class="card-body">


                            <ul class="timeline">


                                <li class="step-completed">
                                    <p class="timeline-date">@if(Auth::check()){{date("d/m/Y", strtotime($currentUser->application->created_at))}}@endif</p>
                                    <div class="timeline-content">
                                        <h4>Application Applied</h4>
                                        <p>your application was successfully submitted</p>
                                    </div>
                                </li>

                                @if($currentUser->application->step >= 1)
                                <li class="step-completed">
                                    <p class="timeline-date">{{date("d/m/Y", strtotime($currentUser->application->reviewed_at))}}</p>
                                @else
                                <li>
                                    <p class="timeline-date"></p>
                                @endif
                                    
                                    <div class="timeline-content">
                                        <h4>Application under review</h4>
                                        @if($currentUser->application->step == 2 && !empty($currentUser->application->details))
                                            <p>{{$currentUser->application->details}}</p>
                                        @else
                                            <p>your application is under review by the admissions department</p>
                                        @endif
                                    </div>
                                </li>


                                <li>
                                    <p class="timeline-date">1/1/2019</p>
                                    <div class="timeline-content">
                                        <h4>Payment</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                    </div>
                                </li>


                            </ul>


                    </div>


                  </div>
    
        </div>


    </section>

    @else
    <?php $application = $currentUser->application; ?>
    @include('layouts.application-form')

    @endif
    @else

    @include('layouts.application-form')

  
  @endif

@endsection


@section('scripts')


<script src="https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>


<!-- include FilePond library -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>


<script type="text/javascript" src="{{asset('js/university.js')}}"></script>



@endsection