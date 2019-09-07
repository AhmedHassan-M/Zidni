@extends('layouts.master')

@section('title', 'Zidni My Activity')


@section('links')



@endsection


@section('contant')



    <section class="my-activity-container">

        <div class="container">

            <div class="row">

    
                {{-- left side bar --}}


                <div class="col-lg-4 col-md-12">

                    
                    <div class="latest-activity-container">


                        <div class="latest-activity-title small-title">

                            <h4>Latest Activity</h4>

                        </div>
                        @if($last != NULL)
                        <div class="latest-activity-courses">
                            @if($type == 'course')
                            <a href="/courses/course-content/{{$enroll->course_id}}/{{$courseLastLesson}}">
                            @elseif($type == 'master')
                            @if($masterLastCourse != 0)
                            <a href="/master-degree/course-content/{{$enrollMaster->master_id}}/{{$masterLastCourse}}/{{$masterLastLesson}}">
                            @else
                            <a href="/master-degree/courses-list/{{$enrollMaster->master_id}}">
                            @endif
                            @elseif($type == 'specialization')
                            @if($specLastCourse != 0)
                            <a href="/specialization/course-content/{{$enrollSpec->specialization_id}}/{{$specLastCourse}}/{{$specLastLesson}}">
                            @else
                            <a href="/specialization/courses-list/{{$enrollSpec->specialization_id}}">
                            @endif
                            @endif

                                <div class="latest-activity-item">

                                    
                                        <div class="latest-activity-item-img">
                                            @if(empty($last->image))
                                            <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                            @else
                                            <img class="lazyload" data-src="/image/{{$last->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                            @endif

                                            <div class="play-icon">

                                                <i class="far fa-play-circle"></i>

                                            </div>


                                        </div>

                                        <div class="latest-activity-item-title">

                                                <h5>{{$last->name}}</h5>

                                        </div>


                                </div>

                            </a>


                        </div>
                        @else

                        {{-- No activities yet --}}

                        @endif

                    </div>



                    <div class="latest-activity-container">


                            <div class="latest-activity-title small-title">
    
                                <h4>Continue Watching</h4>

                                <a href="/my-courses">See All</a>

    
                            </div>
    
                            <div class="latest-activity-courses">


                                {{-- For Demo Only --}}


                                @if($latestCourseActivity > $latestMasterActivity && $latestCourseActivity > $latestSpecActivity && $latestMasterActivity > $latestSpecActivity)
                                @if(!empty($enroll) && !empty($enrollContinueWatch))
                                @if($enrollContinueWatch->last_lesson == 0)
                                <a href="/courses/course-content/{{$enrollContinueWatch->course_id}}">
                                @else
                                <a href="/courses/course-content/{{$enrollContinueWatch->course_id}}/{{$enrollContinueWatch->last_lesson}}">
                                @endif
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
                                                @if(empty($courses->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$courses->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$courses->name}}</h5>
                                                    <p>{{(int)$enrollContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a> 
                                @endif
                                @if(!empty($enrollMaster) && !empty($enrollMasterContinueWatch))
                                <a href="/master-degree/courses-list/{{$masters->id}}">
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
                                                
                                                @if(empty($masters->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$masters->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
                                                
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$masters->name}}</h5>
                                                    <p>{{(int)$enrollMasterContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a>
                                @endif
                                @if(!empty($enrollSpec) && !empty($enrollSpecContinueWatch))
                                <a href="/specialization/courses-list/{{$specializations->id}}">
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
    
                                                @if(empty($specializations->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$specializations->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
                                                
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$specializations->name}}</h5>
                                                    <p>{{(int)$enrollSpecContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a>
                                @endif
                                @elseif($latestMasterActivity > $latestCourseActivity && $latestMasterActivity > $latestSpecActivity && $latestCourseActivity > $latestSpecActivity)
                                @if(!empty($enrollMaster) && !empty($enrollMasterContinueWatch))
                                <a href="/master-degree/courses-list/{{$masters->id}}">
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
    
                                                @if(empty($masters->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$masters->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$masters->name}}</h5>
                                                    <p>{{(int)$enrollMasterContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a> 
                                @endif  
                                @if(!empty($enroll) && !empty($enrollContinueWatch))
                                @if($enrollContinueWatch->last_lesson == 0)
                                <a href="/courses/course-content/{{$enrollContinueWatch->course_id}}">
                                @else
                                <a href="/courses/course-content/{{$enrollContinueWatch->course_id}}/{{$enrollContinueWatch->last_lesson}}">
                                @endif
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
    
                                                @if(empty($courses->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$courses->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$courses->name}}</h5>
                                                    <p>{{(int)$enrollContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a> 
                                @endif
                                @if(!empty($enrollSpec) && !empty($enrollSpecContinueWatch))
                                <a href="/specialization/courses-list/{{$specializations->id}}">
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
    
                                                @if(empty($specializations->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$specializations->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$specializations->name}}</h5>
                                                    <p>{{(int)$enrollSpecContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a>
                                @endif
                                @elseif($latestSpecActivity > $latestCourseActivity && $latestSpecActivity > $latestMasterActivity && $latestCourseActivity > $latestMasterActivity)
                                @if(!empty($enrollSpec) && !empty($enrollSpecContinueWatch))
                                <a href="/specialization/courses-list/{{$specializations->id}}">
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
    
                                                @if(empty($specializations->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$specializations->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$specializations->name}}</h5>
                                                    <p>{{(int)$enrollSpecContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a>
                                @endif
                                @if(!empty($enroll) && !empty($enrollContinueWatch))
                                @if($enrollContinueWatch->last_lesson == 0)
                                <a href="/courses/course-content/{{$enrollContinueWatch->course_id}}">
                                @else
                                <a href="/courses/course-content/{{$enrollContinueWatch->course_id}}/{{$enrollContinueWatch->last_lesson}}">
                                @endif
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
    
                                                @if(empty($courses->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$courses->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$courses->name}}</h5>
                                                    <p>{{(int)$enrollContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a> 
                                @endif
                                @if(!empty($enrollMaster) && !empty($enrollMasterContinueWatch))
                                <a href="/master-degree/courses-list/{{$masters->id}}">
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
    
                                                @if(empty($masters->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$masters->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$masters->name}}</h5>
                                                    <p>{{(int)$enrollMasterContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a> 
                                @endif
                                @else
                                @if(!empty($enroll) && !empty($enrollContinueWatch))
                                @if($enrollContinueWatch->last_lesson == 0)
                                <a href="/courses/course-content/{{$enrollContinueWatch->course_id}}">
                                @else
                                <a href="/courses/course-content/{{$enrollContinueWatch->course_id}}/{{$enrollContinueWatch->last_lesson}}">
                                @endif
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
    
                                                @if(empty($courses->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$courses->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$courses->name}}</h5>
                                                    <p>{{(int)$enrollContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a> 
                                @endif
                                @if(!empty($enrollSpec) && !empty($enrollSpecContinueWatch))
                                <a href="/specialization/courses-list/{{$specializations->id}}">
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
    
                                                @if(empty($specializations->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$specializations->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$specializations->name}}</h5>
                                                    <p>{{(int)$enrollSpecContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a>
                                @endif
                                @if(!empty($enrollMaster) && !empty($enrollMasterContinueWatch))
                                <a href="/master-degree/courses-list/{{$masters->id}}">
    
                                    <div class="latest-activity-item">
    
                                        
                                            <div class="latest-activity-item-img">
    
                                                @if(empty($masters->image))
                                                <img class="lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @else
                                                <img class="lazyload" data-src="/image/{{$masters->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="100">
                                                @endif
    
                                                <div class="play-icon">
    
                                                    <i class="far fa-play-circle"></i>
    
                                                </div>
    
    
                                            </div>
    
                                            <div class="latest-activity-item-title">
    
                                                    <h5>{{$masters->name}}</h5>
                                                    <p>{{(int)$enrollMasterContinueWatch->progress}}% Complete</p>

                                            </div>
    
    
                                    </div>
    
                                </a> 
                                @endif
                                @endif


                                

                                

                                
    



    
                            </div>
    
    
                        </div>
    

                </div>

                {{-- right side bar --}}


                <div class="col-lg-8 col-md-12">

                    <div class="show-courses-container">

                            <div class="small-title">

                                <h4>Upcoming live Sessions</h4>
    
                            </div>


                            {{-- live silder --}}


                            <div class="container slider-container">
      
                                
                                <div class="comeing-soon-overlay">

                                    <h3>Coming Soon</h3>

                                </div>


                                    <div class="my-activity-slider">
                            
                            
                            
                                        <div class="slider-card-container">
                            
                                            <a href="/live-sessions">
                                          
                                              <div class="card">
                                                  <img class="card-img-top lazyload" data-src="{{asset('images/demo-4.jpeg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="220">
                            
                                                  <div class="card-img-info">
                            
                                                      <div>
                                                          <img class="card-preview-icon" src="{{asset('images/play-button.svg')}}" alt="preview">
                                                      </div>
                            
                                                      <div>
                                                          <p>Preview This Live</p>
                                                      </div>
                                                  </div>
                            
                                                  <div class="card-body">
                                                    <h5 class="card-title">Talking about Sunnah</h5>
                                                    <div class="live-timer-container">
                      
                                                          <div class="live-timer-header">
                      
                                                              <h5>STARTS IN</h5>
                      
                                                          </div>
                          
                                                          <div class="live-timer" data-countdown="2019/01/01 12:30:59"></div>
                      
                                                    </div>
                                                    <p class="card-text price">125k Subscribers</p>
                                                  </div>
                                                </div>
                                              
                                              </a>
                                
                                        </div>
                      
                                        
                            
                            
                                     
                                    </div>
                                
                            </div>


                            {{-- tabs section --}}

                            <div class="activity-other-courses">


                                    <ul class="nav nav-pills" id="activity-other-courses-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-categories-tab" data-toggle="pill" href="#pills-categories" role="tab" aria-controls="pills-categories" aria-selected="true">Categories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-specialization-tab" data-toggle="pill" href="#pills-specialization" role="tab" aria-controls="pills-specialization" aria-selected="false">Our Specialization</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-masters-tab" data-toggle="pill" href="#pills-masters" role="tab" aria-controls="pills-masters" aria-selected="false">Our Master's Degree</a>
                                        </li>
                                    </ul>


                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="pills-categories" role="tabpanel" aria-labelledby="pills-categories-tab">

                                            {{-- categories tab --}}


                                            <div class="activity-categories">


                                                    <ul id="activity-categories-tabs">

                                                        @foreach($topCategories as $topCategory)
                                                        <li class="activity-categories-tabs-item nav-link" id="{{$topCategory->id}}">{{$topCategory->name}}</li>
                                                        @endforeach

                                                    </ul>


                                                    <div class="activity-categories-items-container main-courses-activity-categories-container slider-container">

                                                        <div class="top_categories_slider_loading"></div>


                                                    </div>




                                            </div>



                                        </div>
                                        <div class="tab-pane fade" id="pills-specialization" role="tabpanel" aria-labelledby="pills-specialization-tab">



                                                <div class="activity-categories-items-container">

                                                        
                                                    {{-- For Demo Only --}}


                                                    @foreach ($ourSpecializations as $ourSpecialization)


                                                    <a href="/specialization/{{$ourSpecialization->id}}">

                                                    <div class="activity-categories-item">


                                                            <div class="activity-categories-item-img">
                                                                @if(empty($ourSpecialization->image))
                                                                <img class="lazyload" data-src="{{asset('images/demo-1.jpeg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="150">
                                                                @else
                                                                <img class="lazyload" data-src="/image/{{$ourSpecialization->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="150">
                                                                @endif

                                                                <div class="play-icon">
                    
                                                                    <i class="far fa-play-circle"></i>
                    
                                                                </div>
                    
                    
                                                            </div>
                    
                                                            <div class="activity-categories-item-info">
                    
                                                                    <h5>{{$ourSpecialization->name}}</h5>
                                                                    <p>{{$ourSpecialization->description}}</p>
                                                                    <div class="activity-categories-stat">

                                                                        <div class="activity-categories-stat-item">

                                                                            <i class="far fa-clock"></i>
                                                                            <p>{{$ourSpecialization->duration}}</p>

                                                                        </div>


                                                                        
                                                                        <div class="activity-categories-stat-item">

                                                                            <i class="fas fa-user-graduate"></i>
                                                                            <p>{{count($ourSpecialization->enroll)}} students enrolled</p>

                                                                        </div>


                                                                            
                                                                        <div class="activity-categories-stat-item">

                                                                            <i class="fas fa-dollar-sign"></i>
                                                                            <p>{{$ourSpecialization->price}}$</p>

                                                                        </div>

                                                                    </div>
                
                                                            </div>



                                                    </div>

                                                    </a>


                                                    @endforeach


                                                </div>


                                        </div>
                                        <div class="tab-pane fade" id="pills-masters" role="tabpanel" aria-labelledby="pills-masters-tab">

                                            

                                                <div class="activity-categories-items-container">
                                                        {{-- For Demo Only --}}


                                                        @foreach ($ourMasters as $ourMaster)


                                                        <a href="/masters-degree/{{$ourMaster->id}}">

                                                        <div class="activity-categories-item">


                                                                <div class="activity-categories-item-img">
                                                                    @if(empty($ourMaster->image))
                                                                    <img class="lazyload" data-src="{{asset('images/demo-2.jpeg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="150">
                                                                    @else
                                                                    <img class="lazyload" data-src="/image/{{$ourMaster->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="150">
                                                                    @endif
                                                                    
                        
                                                                    <div class="play-icon">
                        
                                                                        <i class="far fa-play-circle"></i>
                        
                                                                    </div>
                        
                        
                                                                </div>
                        
                                                                <div class="activity-categories-item-info">
                        
                                                                        <h5>{{$ourMaster->name}}</h5>
                                                                        <p>{{$ourMaster->description}}</p>
                                                                        <div class="activity-categories-stat">

                                                                            <div class="activity-categories-stat-item">

                                                                                <i class="far fa-clock"></i>
                                                                                <p>{{$ourMaster->duration}}</p>

                                                                            </div>


                                                                            
                                                                            <div class="activity-categories-stat-item">

                                                                                <i class="fas fa-user-graduate"></i>
                                                                                <p>{{count($ourMaster->enroll)}} students enrolled</p>

                                                                            </div>


                                                                                
                                                                            <div class="activity-categories-stat-item">

                                                                                <i class="fas fa-dollar-sign"></i>
                                                                                <p>{{$ourMaster->price}}$</p>

                                                                            </div>

                                                                        </div>
                    
                                                                </div>



                                                        </div>

                                                        </a>


                                                        @endforeach
                                                        
                                                    </div>



                                        </div>




                            </div>

                                


                    </div>

                </div>


            </div>


        </div>



    </section>

    
@endsection


@section('scripts')


@endsection