@extends('layouts.university-profile-master')

@section('title', trans("user-university.view-student-profile"))


@section('links')



@endsection


@section('contant')



<div class="university-container">

<div class="container">


    <div class="row">


        <div class="col-md-12">


            <div class="card university-page-container">

                <div class="university-page-header">

                    <h4>@yield('title')</h4>

                </div>


                <div class="university-page-container">


                    <div class="card university-student-card university-view-student-card">

                        <div class="university-student-card-header">
                            <img class="card-img-top lazyload" data-src="{{asset('images/university.jpg')}}"
                                src="{{asset('images/university.jpg')}}" alt="--" width="100%" height="150">

                            <div class="student-image-container">
                                <img class="student-image lazyload" data-src="{{asset('images/user.png')}}"
                                    src="{{asset('images/user.png')}}" alt="student image">
                            </div>

                        </div>


                        <div class="card-body">
                            <h5 class="card-title">{{ __('user-university.contact-information') }}

                                <a href="/university/edit-student-profile/{{$locale = App::getLocale()}}">

                                    <i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top"
                                        title="{{ __('user-university.edit-profile') }}"></i>


                                </a>


                            </h5>


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span>{{ __('user-university.e-mail') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.phone-number') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.timing') }} :
                                    </span><span>---</span></li>
                            </ul>





                            <h5 class="card-title">{{ __('user-university.personal-information') }} </h5>



                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span>{{ __('user-university.passport-number') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.name-ar') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.name-en') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.brith-year') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.brith-monthe') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.brith-day') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.marital-status') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.gender') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.country-of-nationality') }} :
                                    </span><span>---</span></li>
                            </ul>

                            <h5 class="card-title">{{ __('user-university.post-address') }}</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span>{{ __('user-university.street') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.mailbox') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.postal-code') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.neighborhood') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.city') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.country') }} :
                                    </span><span>---</span></li>
                            </ul>

                            <h5 class="card-title">{{ __('user-university.educational-qualification') }}</h5>


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span>{{ __('user-university.level') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item">
                                    <span>{{ __('user-university.general-rate-cumulative-average-of-subjects') }} :
                                    </span><span>---</span></li>
                                <li class="list-group-item"><span>{{ __('user-university.name-of-certificate') }} :
                                    </span><span>---</span>
                                </li>
                                <li class="list-group-item"><span>{{ __('user-university.study-specialization') }} :
                                    </span><span>---</span>
                                </li>
                                <li class="list-group-item"><span>{{ __('user-university.graduation-year') }} :
                                    </span><span>---</span></li>
                            </ul>


                            <h5 class="card-title">{{ __('user-university.practical-experience') }}</h5>


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span>{{ __('user-university.current-job') }} :
                                    </span><span>---</span></li>
                            </ul>

                            <h5 class="card-title">{{ __('user-university.specialization') }}</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span>{{ __('user-university.specialization') }} :
                                    </span><span>---</span></li>
                            </ul>


                            <h5 class="card-title">{{ __('user-university.endorsement') }}</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span>{{ __('user-university.endorsement') }} :
                                    </span><span>---</span></li>
                            </ul>







                        </div>
                    </div>






                </div>

            </div>



        </div>





    </div>





</div>

</div>








@endsection


@section('scripts')




@endsection