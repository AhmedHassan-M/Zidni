
    {{-- START NAVBAR --}}


    <div class="wsmenucontainer clearfix">



            <div class="overlapblackbg"></div>
    
    
    
            <div class="wsmobileheader clearfix">
                <a id="wsnavtoggle" class="animated-arrow">
                    <span></span>
                </a>
                <a href="/" class="smallogo">
                    <img src="{{asset('images/zidni-logo-1.png')}}" alt="Zidni Logo" />
                </a>
    
                @if(Auth::guest())
    
    
                <a class="callusicon" data-toggle="modal" data-target="#registrationModal">
                    <span class="mobile-user-icon">
    
    
                        <img src="{{asset('images/user-icon-3.svg')}}" alt="user icon">
    
    
                    </span>
                </a>
    
    
    
    
                @else
    
                @if(Auth::check())
                @if(Auth::user()->admin == 1)
                <a class="callusicon" href="/admin/profile">
    
                    @elseif(Auth::user()->admin == 0)
                    <a class="callusicon" href="/profile">
    
                        @endif
    
                        @else
    
                        <a class="callusicon" data-toggle="modal" data-target="#registrationModal">
                            @endif
    
    
                            <span class="mobile-user-icon">
    
    
                                <img src="{{asset('images/user-icon-3.svg')}}" alt="user icon">
    
    
                            </span>
                        </a>
    
    
    
                        @endif
    
    
    
    
            </div>
    
    
            <div class="headerfull">
                <!--Main Menu HTML Code-->
                <div class="wsmain university-nav-container">
    
    
                    <div class="smllogo">
                        <a href="/" target="_blank">
                            <img src="{{asset('images/zidni-logo-1.png')}}" alt="Zidni Logo" />
                        </a>
                    </div>
    
                    
    
                    
    
    
                    <nav class="wsmenu clearfix">
                        <ul class="mobile-sub wsmenu-list @if($locale === "en"){{"wsmenu-list-en"}}@endif">
    
                                
                            <li>
                            <a href="/university/{{$locale = App::getLocale()}}" class="navtext">
                                    <span>{{ __('user-university.home') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="/university/academic-track/{{$locale = App::getLocale()}}" class="navtext">
                                    <span>{{ __('user-university.academic-track') }}</span>
                                </a>
                            </li>
    
                            <li>
                                <a href="/university/calendar/{{$locale = App::getLocale()}}" class="navtext">
                                    <span>{{ __('user-university.calendar') }}</span>
                                </a>
                            </li>
    
                            <li class="wsshopmyaccount account clearfix university-nav-dropdown">
                                <div class="account-nav">
                                    <div class="main-user-name">
                                            {{ __('user-university.content') }}
                                        <i class="fa  fa-angle-down"></i>
                                    </div>
                                </div>
    
                                <ul class="wsmenu-submenu account-menu">
    
                                    <li>
    
                                        <div class="account-link">
                                            <a href="/university/courses/{{$locale = App::getLocale()}}" class="navtext">{{ __('user-university.courses') }}</a>
                                        </div>
    
    
                                        <div class="account-link">
                                            <a href="/university/resources/{{$locale = App::getLocale()}}" class="navtext">{{ __('user-university.resources') }}</a>
                                        </div>
    
    
                                    </li>
                                </ul>
                            </li>
    
    
    
                            <li>
                                <a href="/university/previous-courses/{{$locale = App::getLocale()}}" class="navtext">
                                    <span>{{ __('user-university.previous-courses') }}</span>
                                </a>
                            </li>
    
    
    
                            <li class="wsshopmyaccount account clearfix university-nav-dropdown">
                                <div class="account-nav">
                                    <div class="main-user-name">
                                            {{ __('user-university.learning-activities') }} 
                                        <i class="fa  fa-angle-down"></i>
                                    </div>
                                </div>
    
                                <ul class="wsmenu-submenu account-menu">
    
                                    <li>
    
                                        <div class="account-link">
    
                                            <a href="/university/academic-advising/{{$locale = App::getLocale()}}" class="navtext">{{ __('user-university.academic-advising') }}</a>
    
                                        </div>
    
                                        <div class="account-link">
    
                                            <a href="/university/latest-assignments/{{$locale = App::getLocale()}}" class="navtext">{{ __('user-university.latest-assignments') }}</a>
    
                                        </div>
    
                                        <div class="account-link">
    
                                            <a href="/university/following-meetings/{{$locale = App::getLocale()}}" class="navtext">{{ __('user-university.following-meetings') }}</a>
    
                                        </div>
    
                                        <div class="account-link">
    
                                            <a href="/university/achievement-indicators/{{$locale = App::getLocale()}}" class="navtext">{{ __('user-university.achievement-indicators') }}</a>
    
                                        </div>
    
    
    
    
                                    </li>
                                </ul>
                            </li>
    
    
                            <li>
                                <a href="/university/examinations/{{$locale = App::getLocale()}}" class="navtext">
                                    <span>{{ __('user-university.examinations') }}</span>
                                </a>
                            </li>
    
                            <li>
                                <a href="/university/forum/{{$locale = App::getLocale()}}" class="navtext">
                                    <span>{{ __('user-university.forum') }}</span>
                                </a>
                            </li>
    
                            <li>
                                <a href="/university/payment/{{$locale = App::getLocale()}}" class="navtext">
                                    <span>{{ __('user-university.payment') }}</span>
                                </a>
                            </li>
    
    
    
                            <li class="wsshopmyaccount account clearfix university-nav-dropdown">
                                <div class="account-nav">
                                    <div class="main-user-name">
                                        {{ __('user-university.more') }}
                                        <i class="fa  fa-angle-down"></i>
                                    </div>
                                </div>
    
                                <ul class="wsmenu-submenu account-menu">
    
                                    <li>
    
                                        <div class="account-link">
    
                                            <a href="/university/technical-support/{{$locale = App::getLocale()}}" class="navtext">{{ __('user-university.technical-support') }}</a>
    
                                        </div>
    
    
                                        <div class="account-link">
    
                                            <a href="/logout">{{ __('user-university.logout') }}</a>
    
                                        </div>
    
    
    
                                    </li>
                                </ul>
                            </li>
    
    
                            <li class="wsshopmyaccount account clearfix university-nav-dropdown">
                                <div class="account-nav">
                                    <div class="main-user-name">
                                        {{ __('user-university.language') }}
                                        <i class="fa  fa-angle-down"></i>
                                    </div>
                                </div>
    
                                <ul class="wsmenu-submenu account-menu">
    
                                    <li>
    
                                        <div class="account-link">
    
                                            <a href="/university/ar" class="navtext">عربي</a>
    
                                        </div>
    
    
                                        <div class="account-link">
    
                                            <a href="/university/en">English</a>
    
                                        </div>
    
    
    
                                    </li>
                                </ul>
                            </li>
                            
    
    
    
                            <li class="mobile-only">
                                <a href="/logout" class="navtext">
                                    <span>{{ __('user-university.logout') }}</span>
                                </a>
                            </li>
    
    
    
    
    
    
    
                    </nav>
    
    
    
    
    
    
    
    
                </div>
                <!--Menu HTML Code-->
            </div>
    
        </div>
    