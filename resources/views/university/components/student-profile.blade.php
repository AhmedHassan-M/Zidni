





<div class="card university-student-card">

    <div class="university-student-card-header">
            <img class="card-img-top lazyload" data-src="{{asset('images/university.jpg')}}" src="{{asset('images/university.jpg')}}" alt="--" width="100%" height="150">

            <div class="student-image-container">
                <img class="student-image lazyload" data-src="{{asset('images/user.png')}}" src="{{asset('images/user.png')}}" alt="student image">
            </div>

    </div>


    <?php $locale = App::getLocale() ?>

    <div class="card-body">
        <h5 class="card-title @if($locale === "en"){{"card-title-en"}}@endif">{{ __('user-university.personal-information') }}
            
                <a href="/university/edit-student-profile/{{$locale = App::getLocale()}}">
                
                    <i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="{{ __('user-university.edit-profile') }}"></i>

                
                </a>


                <a href="/university/view-student-profile/{{$locale = App::getLocale()}}">
                
                    <i class="fas fa-address-card" data-toggle="tooltip" data-placement="top" title="{{ __('user-university.view-profile') }}"></i>

                
                </a>
                
                        
        </h5>


        <ul class="list-group list-group-flush">
            <li class="list-group-item"><span>{{ __('user-university.name-ar') }} : </span><span>Test</span></li>
            <li class="list-group-item"><span>{{ __('user-university.name-en') }} : </span><span>Test</span></li>
            <li class="list-group-item"><span>{{ __('user-university.country-of-nationality') }} : </span><span>Test</span></li>
            <li class="list-group-item"><span>{{ __('user-university.country-of-residence') }} : </span><span>Test</span></li>
            <li class="list-group-item"><span>{{ __('user-university.e-mail') }} : </span><span>Test</span></li>
        </ul>


        <h5 class="card-title">{{ __('user-university.enrollment-status') }} </h5>


        <ul class="list-group list-group-flush">
            <li class="list-group-item"><span>{{ __('user-university.current-level') }} : </span><span>Test</span></li>
            <li class="list-group-item"><span>{{ __('user-university.university-code') }} : </span><span>0123</span></li>
            <li class="list-group-item"><span>{{ __('user-university.date-of-submission') }}  : </span><span>1/1/2019</span></li>
        </ul>

        <h5 class="card-title">{{ __('user-university.registration-status') }}</h5>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><span>{{ __('user-university.last-visit') }} : </span><span>1/1/2019</span></li>
            <li class="list-group-item"><span>{{ __('user-university.active-time') }} : </span><span>00:00:00</span></li>
            <li class="list-group-item"><span>{{ __('user-university.number-of-visits') }} : </span><span> <span class="label-span">100</span></span></li>
        </ul>


    </div>
</div>