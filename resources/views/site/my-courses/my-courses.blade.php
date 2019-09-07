@extends('layouts.master')

@section('title', 'Zidni My Courses')


@section('links')



@endsection


@section('contant')




<section>




        <!--Start Page Header-->
    
    
        <div class="jumbotron jumbotron-fluid pages-header my-courses-header">
    
    
            <img class="pages-header-img lazyload" data-src="{{asset('images/demo-3.jpeg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="300">
    
    
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
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">My Courses</a>
                            </li>
                        </ol>
                    </nav>
    
    
                    <h1 class="display-6 page-header-title">My Courses</h1>
    
                    
    
                </div>
    
    
            </div>
    </div>
    
    
        <!--End Page Header-->
    

    
    
    </section>



    <section class="my-courses-wrraper">

    <section class="my-courses-container">

        <div class="container">

            <div class="row">

    
                <div class="col-lg-3 col-md-12">


                        <div class="nav flex-column nav-pills my-courses-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            {{-- master's --}}
                            <a class="nav-link active" id="v-pills-master-tab" data-toggle="pill" href="#v-pills-master" role="tab" aria-controls="v-pills-master" aria-selected="true">My Master Degree</a>

                            {{-- specializations --}}
                            <a class="nav-link" id="v-pills-specializations-tab" data-toggle="pill" href="#v-pills-specializations" role="tab" aria-controls="v-pills-specializations" aria-selected="false">My Specializations</a>

                            {{-- courses --}}
                            <a class="nav-link" id="v-pills-courses-tab" data-toggle="pill" href="#v-pills-courses" role="tab" aria-controls="v-pills-courses" aria-selected="false">My Courses</a>

                            {{-- Live
                            <a class="nav-link" id="v-pills-live-tab" data-toggle="pill" href="#v-pills-live" role="tab" aria-controls="v-pills-live" aria-selected="false">My Live Sessions</a> --}}
                        </div>


                </div>


                <div class="col-lg-9 col-md-12">


                        <div class="tab-content my-courses-tabs-content" id="v-pills-tabContent">

                            {{-- master's --}}

                            <div class="tab-pane fade show active" id="v-pills-master" role="tabpanel" aria-labelledby="v-pills-master-tab">

                                    <ul class="nav nav-pills my-courses-master-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-current-master-tab" data-toggle="pill" href="#pills-current-master" role="tab" aria-controls="pills-current-master" aria-selected="true">Current Master Degree</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-ended-master-tab" data-toggle="pill" href="#pills-ended-master" role="tab" aria-controls="pills-ended-master" aria-selected="false">Ended Master Degree</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="pills-current-master" role="tabpanel" aria-labelledby="pills-current-master">

                                        @if(count($enrolledMasterCurrent) == 0)
                                        <div class="empty-tab-container">

                                            <div class="empty-tab-title">

                                                <h4>You Don't Have Master's Degree</h4>

                                            </div>

                                            <div class="empty-tab-button">

                                                <a href="/all-masters-degree" class="btn btn-primary empty-tab-button-style">Go To Master's Degree</a>

                                            </div>

                                        </div>

                                        @else
                                        @foreach($enrolledMasterCurrent as $enrolledMasterCurrents)

                                            <div class="my-courses-item">


                                                <div class="my-courses-item-image">
                                                        @if(empty($enrolledMasterCurrents->Master->image))
                                                        <img class="pages-header-img lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="200">
                                                        @else
                                                        <img class="pages-header-img lazyload" data-src="image/{{$enrolledMasterCurrents->Master->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="200">
                                                        @endif
                                                </div>


                                                <div class="my-courses-item-progressbar">


                                                        <h4>{{$enrolledMasterCurrents->Master->name}}</h4>


                                                        <div class="progress">
                                                            <div class="progress-bar three-sec-ease-in-out" role="progressbar" data-transitiongoal="{{$enrolledMasterCurrents->progress}}"></div>
                                                        </div>



                                                        <div class="my-courses-item-button">

                                                            <button onclick="window.location.href = '/master-degree/courses-list/{{$enrolledMasterCurrents->Master->id}}'" type="button" class="btn btn-primary go-to-course-button">Go to Course</button>

                                                        </div>


                                                </div>
                                                


                                            </div>
                                        @endforeach
                                        @endif


                                        </div>
                                        <div class="tab-pane fade" id="pills-ended-master" role="tabpanel" aria-labelledby="pills-ended-master-tab">

                                        @if(count($enrolledMasterFinished) == 0)
                                        <div class="empty-tab-container">

                                            <div class="empty-tab-title">

                                                <h4>You Don't Have Master's Degree</h4>

                                            </div>

                                            <div class="empty-tab-button">

                                                <a href="/all-masters-degree" class="btn btn-primary empty-tab-button-style">Master's Degree</a>

                                            </div>

                                        </div>
                                        
                                        @else
                                        @foreach($enrolledMasterFinished as $enrolledMasterFinish)

                                                <div class="my-courses-item">


                                                        <div class="my-courses-item-image">
        
                                                        <img class="pages-header-img lazyload" data-src="image/{{$enrolledMasterFinish->Master->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="200">
        
                                                        </div>
        
        
                                                        <div class="my-courses-item-progressbar">
        
        
                                                                <h4>{{$enrolledMasterFinish->Master->name}}</h4>
        
        
                                                                <div class="progress">
                                                                    <div class="progress-bar three-sec-ease-in-out" role="progressbar" data-transitiongoal="{{$enrolledMasterFinish->progress}}"></div>
                                                                </div>
        
        
        
                                                                <div class="my-courses-item-button">
        
                                                                    <button onclick="window.location.href = '/master-degree/courses-list/{{$enrolledMasterFinish->Master->id}}'" type="button" class="btn btn-primary get-certificate">Get the Certificate</button>
        
                                                                </div>
        
        
                                                        </div>
                                                        
        
        
                                                    </div>
                                        @endforeach
                                        @endif

                                        </div>
                                    </div>

                            </div>


                            {{-- specializations --}}

                            <div class="tab-pane fade" id="v-pills-specializations" role="tabpanel" aria-labelledby="v-pills-specializations-tab">


                                    <div class="tab-pane fade show active" id="v-pills-specializations" role="tabpanel" aria-labelledby="v-pills-specializations-tab">


                                            <ul class="nav nav-pills my-courses-master-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-current-specializations-tab" data-toggle="pill" href="#pills-current-specializations" role="tab" aria-controls="pills-current-specializations" aria-selected="true">Current Specializations</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-ended-specializations-tab" data-toggle="pill" href="#pills-ended-specializations" role="tab" aria-controls="pills-ended-specializations" aria-selected="false">Ended Specializations</a>
                                                </li>
                                            </ul>


                                    </div>



                                    <div class="tab-content">

                                            <div class="tab-pane fade show active" id="pills-current-specializations" role="tabpanel" aria-labelledby="pills-current-specializations">

                                                {{-- only if the tab is empty --}}
                                            @if(count($enrolledSpecializationCurrent) == 0)
                                                <div class="empty-tab-container">

                                                    <div class="empty-tab-title">

                                                        <h4>You Don't Have Specializations</h4>

                                                    </div>

                                                    <div class="empty-tab-button">

                                                        <a href="/all-specialization" class="btn btn-primary empty-tab-button-style">Go To Specializations</a>

                                                    </div>

                                                </div>
                                            @else
                                            @foreach($enrolledSpecializationCurrent as $enrolledSpecializationCurrents)
                                                <div class="my-courses-item">


                                                        <div class="my-courses-item-image">
        
                                                                <img class="pages-header-img lazyload" data-src="/image/{{$enrolledSpecializationCurrents->Specialization->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="200">
        
                                                        </div>
        
        
                                                        <div class="my-courses-item-progressbar">
        
        
                                                            <h4>{{$enrolledSpecializationCurrents->Specialization->name}}</h4>
        
        
                                                                <div class="progress">
                                                                    <div class="progress-bar three-sec-ease-in-out" role="progressbar" data-transitiongoal="{{$enrolledSpecializationCurrents->progress}}"></div>
                                                                </div>
        
        
        
                                                                <div class="my-courses-item-button">
        
                                                                    <button onclick="window.location.href = '/specialization/courses-list/{{$enrolledSpecializationCurrents->Specialization->id}}'" type="button" class="btn btn-primary go-to-course-button">Go to Course</button>
        
                                                                </div>
        
        
                                                        </div>
                                                        
        
        
                                                </div>
                                            @endforeach
                                            @endif    
                                            </div>


                                            
                                            <div class="tab-pane fade" id="pills-ended-specializations" role="tabpanel" aria-labelledby="pills-ended-specializations">

                                                {{-- only if the tab is empty --}}
                                            @if(count($enrolledSpecializationFinished) == 0)
                                                <div class="empty-tab-container">

                                                        <div class="empty-tab-title">
    
                                                            <h4>You Don't Have Specializations</h4>
    
                                                        </div>
    
                                                        <div class="empty-tab-button">
    
                                                            <a href="/all-specialization" class="btn btn-primary empty-tab-button-style">Go To Specializations</a>
    
                                                        </div>
    
                                                    </div>
                                            @else
                                            @foreach($enrolledSpecializationFinished as $enrolledSpecializationFinish)
                                                <div class="my-courses-item">


                                                        <div class="my-courses-item-image">
        
                                                        <img class="pages-header-img lazyload" data-src="image/{{$enrolledSpecializationFinish->Specialization->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="200">
        
                                                        </div>
        
        
                                                        <div class="my-courses-item-progressbar">
        
        
                                                            <h4>{{$enrolledSpecializationFinish->Specialization->name}}</h4>
        
        
                                                                <div class="progress">
                                                                    <div class="progress-bar three-sec-ease-in-out" role="progressbar" data-transitiongoal="{{$enrolledSpecializationFinish->progress}}"></div>
                                                                </div>
        
        
        
                                                                <div class="my-courses-item-button">
        
                                                                    <button onclick="window.location.href = '/specialization/courses-list/{{$enrolledSpecializationFinish->Specialization->id}}'" type="button" class="btn btn-primary go-to-course-button">Go to Course</button>
        
                                                                </div>
        
        
                                                        </div>
                                                        
        
        
                                                </div>
                                            @endforeach
                                            @endif
                                            </div>
                                            

                                    </div>







                            </div>



                            {{-- courses --}}
                            <div class="tab-pane fade" id="v-pills-courses" role="tabpanel" aria-labelledby="v-pills-courses-tab">




                                    <div class="tab-pane fade show active" id="v-pills-courses" role="tabpanel" aria-labelledby="v-pills-courses-tab">


                                            <ul class="nav nav-pills my-courses-master-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-current-courses-tab" data-toggle="pill" href="#pills-current-courses" role="tab" aria-controls="pills-current-courses" aria-selected="true">Current Courses</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-ended-courses-tab" data-toggle="pill" href="#pills-ended-courses" role="tab" aria-controls="pills-ended-courses" aria-selected="false">Ended Courses</a>
                                                </li>
                                            </ul>


                                    </div>



                                    <div class="tab-content">

                                            <div class="tab-pane fade show active" id="pills-current-courses" role="tabpanel" aria-labelledby="pills-current-courses">

                                                


                                                @if(count($enrolledCurrent) > 0)
                                                @foreach($enrolledCurrent as $Current)
                                                    
                                                <div class="my-courses-item">


                                                    <div class="my-courses-item-image">
                                                            @if(empty($Current->course->image))
                                                            <img class="pages-header-img lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="200">
                                                            @else
                                                            <img class="pages-header-img lazyload" data-src="/image/{{$Current->course->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="200">
                                                            @endif
                                                    </div>


                                                    <div class="my-courses-item-progressbar">


                                                        <h4>{{$Current->course->name}}</h4>


                                                            <div class="progress">
                                                                <div class="progress-bar three-sec-ease-in-out" role="progressbar" data-transitiongoal="{{$Current->progress}}"></div>
                                                            </div>



                                                            <div class="my-courses-item-button">

                                                                <button onclick="continueCourse({{$Current->course->id}})" type="button" class="btn btn-primary go-to-course-button">Go to Course</button>

                                                            </div>


                                                    </div>
                                                    


                                                </div>
                                                @endforeach
                                                @else
                                                    {{-- only if the tab is empty --}}
                                                    

                                                    <div class="empty-tab-container">

                                                        <div class="empty-tab-title">

                                                            <h4>You Don't Have Courses</h4>

                                                        </div>

                                                        <div class="empty-tab-button">

                                                            <a href="/all-categories" class="btn btn-primary empty-tab-button-style">Go To Courses</a>

                                                        </div>

                                                    </div>
                                                @endif
                                                
                                            </div>



                                            <div class="tab-pane fade" id="pills-ended-courses" role="tabpanel" aria-labelledby="pills-ended-courses">

                                                @if(count($enrolledFinished) > 0)
                                                @foreach($enrolledFinished as $Finished)
                                                <div class="my-courses-item">


                                                    <div class="my-courses-item-image">
                                                            @if(empty($Current->course->image))
                                                            <img class="pages-header-img lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="200">
                                                            @else
                                                            <img class="pages-header-img lazyload" data-src="/image/{{$Current->course->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="200">
                                                            @endif
                                                    </div>
    
    
                                                    <div class="my-courses-item-progressbar">
    
    
                                                        <h4>{{$Finished->course->name}}</h4>
    
    
                                                            <div class="progress">
                                                                <div class="progress-bar three-sec-ease-in-out" role="progressbar" data-transitiongoal="100"></div>
                                                            </div>
    
    
    
                                                            <div class="my-courses-item-button">
    
                                                                <button onclick="continueCourse({{$Finished->course->id}})" type="button" class="btn btn-primary go-to-course-button">Go to Course</button>
    
                                                            </div>
    
    
                                                    </div>
                                                    
    
    
                                                </div>
                                                @endforeach
                                                @else
                                                {{-- only if the tab is empty --}}

                                                <div class="empty-tab-container">

                                                        <div class="empty-tab-title">
    
                                                            <h4>You Don't Have Courses</h4>
    
                                                        </div>
    
                                                        <div class="empty-tab-button">
    
                                                            <a href="/all-categories" class="btn btn-primary empty-tab-button-style">Go To Courses</a>
    
                                                        </div>
    
                                                    </div>

                                            </div>
                                            @endif


                                    </div>






                            </div>

                        </div>



                        
                        {{-- <div class="tab-pane fade" id="v-pills-live" role="tabpanel" aria-labelledby="v-pills-live-tab">




                            <div class="tab-pane fade show active" id="v-pills-live" role="tabpanel" aria-labelledby="v-pills-live-tab">


                                    <ul class="nav nav-pills my-courses-master-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-current-live-tab" data-toggle="pill" href="#pills-current-live" role="tab" aria-controls="pills-current-live" aria-selected="true">Current Live Sessions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-ended-live-tab" data-toggle="pill" href="#pills-ended-live" role="tab" aria-controls="pills-ended-live" aria-selected="false">Ended Live Sessions</a>
                                        </li>
                                    </ul>


                            </div>



                            <div class="tab-content">

                                    <div class="tab-pane fade show active" id="pills-current-live" role="tabpanel" aria-labelledby="pills-current-live">


                                        <div class="empty-tab-container">

                                            <div class="empty-tab-title">

                                                <h4>You Don't Have Live Sessions</h4>

                                            </div>

                                            <div class="empty-tab-button">

                                                <button type="button" class="btn btn-primary empty-tab-button-style">Go To Live Sessions</button>

                                            </div>

                                        </div>
                                        
                                    </div>



                                    <div class="tab-pane fade" id="pills-ended-live" role="tabpanel" aria-labelledby="pills-ended-live">


                                        <div class="empty-tab-container">

                                                <div class="empty-tab-title">

                                                    <h4>You Don't Have Live Sessions</h4>

                                                </div>

                                                <div class="empty-tab-button">

                                                    <button type="button" class="btn btn-primary empty-tab-button-style">Go To Live Sessions</button>

                                                </div>

                                        </div>

                                    </div>


                            </div>


                        </div> --}}


                </div>

            </div>


        </div>



    </section>



    <section class="recommended-courses-container">

            <div class="container">


                    <div class="row">

                            <div class="col-md-12">

                                    <div class="recommended-courses">


                                        <div class="recommended-courses-title">


                                            <h4>Recommended Courses for you</h4>


                                        </div>

                                        <div class="container slider-container">
      
                                                <div class="home-slider">
                                        
                                                    @foreach($recommendedCourses as $recommendedCourse)

                                        
                                                    <div class="slider-card-container">
                                        
                                                        <a href="/course/{{$recommendedCourse->id}}">
                                                      
                                                          <div class="card">
                                                              @if(empty($recommendedCourse->image))
                                                              <img class="card-img-top lazyload" data-src="{{asset('images/demo-4.jpeg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="220">
                                                              @else
                                                              <img class="card-img-top lazyload" data-src="/image/{{$recommendedCourse->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="220">
                                                              @endif
                                                              <div class="card-img-info">
                                        
                                                                  <div>
                                                                      <img class="card-preview-icon" src="{{asset('images/play-button.svg')}}" alt="preview">
                                                                  </div>
                                        
                                                                  <div>
                                                                      <p>Preview This Course</p>
                                        
                                                                  </div>
                                                              </div>
                                        
                                                              <div class="card-body">
                                                                <h5 class="card-title">{{$recommendedCourse->name}}</h5>
                                                                <p class="card-text">{{count($recommendedCourse->enroll)}} Students Enrolled</p>
                                                                <p class="card-text">{{$recommendedCourse->duration}}</p>
                                                                <p class="card-text price">{{$recommendedCourse->price}}$</p>
                                                              </div>
                                                            </div>
                                                          
                                                          </a>
                                            
                                                    </div>
                                        
                                                    @endforeach

                                        
                                                </div>
                                        </div>




                                    </div>
      

                                        

                            </div>
        

                    </div>


            </div>

        
            

    </section>

    
    </section>

    
@endsection


@section('scripts')



{{-- <script>


    var sticky = new Waypoint.Sticky({
        element: $('.my-courses-tabs')[0]
    });


    $('.my-courses-container').waypoint(function(direction) {

        if(direction === 'down'){

        $('.my-courses-tabs').removeClass("stuck").addClass("stuck-stop");  

        } else if (direction === 'up'){

        $('.my-courses-tabs').addClass("stuck").removeClass("stuck-stop");  ;  
        }

        }, {
        offset: 'bottom-in-view'
    });


</script> --}}
<script>
    function continueCourse(id){
        window.location.href = "/courses/course-content/"+id;
    }
</script>

@endsection