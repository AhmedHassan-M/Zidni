@extends('layouts.master')

@section('title', 'Zidni All Master Degree')


@section('links')



@endsection


@section('contant')






    <!--Start Page Header-->


    <div class="jumbotron jumbotron-fluid pages-header all-courses-header">


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
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="/specialization/{{$specialization->id}}">Specialization</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="">{{$specialization->name}}</a>
                        </li>
                    </ol>
                </nav>


                <div class="all-corses-main-title">


                    <h1 class="display-4 page-header-title">{{$specialization->name}}</h1>



                </div>

            </div>


        </div>
    </div>


    <!--End Page Header-->



    {{-- Start all Courses --}}




    {{-- End all Courses --}}


    <section id="progressbar-section">


        <div class="container">

                <div class="row">

                        <div class="col-md-10">
        
        
                            <div class="progress-container">
        
                                    <div class="progress-title">
        
                                            <h5>{{$specialization->name}} Specialization Overall All Progress</h5>
        
                                        </div>
                                        @if(count($enroll) > 0)
                                            <div class="progress">
                                                <div class="progress-bar three-sec-ease-in-out" role="progressbar" data-transitiongoal="{{$enroll[0]->progress}}"></div>
                                            </div> 
                                        @endif       
                            </div>
        
        
                    
        
                        </div>
        
        
                        <div class="col-md-2">
        
        
                            <div class="get-certificate-button">
                                @if(count($enroll) > 0)
                                @if($enroll[0]->progress < 100)
                                <button id="get-certificate" class="btn btn-secondary get-certificate" disabled="disabled">Get The Certificate</button>
                                @elseif($enroll[0]->progress >= 100)
                                <a href="/get-certificate/specialization/{{$enroll[0]->id}}" id="get-certificate" class="btn btn-secondary get-certificate">Get The Certificate</a>
                                @endif
                                @endif
                            </div>
        
        
        
                        </div>
        
                    </div>

        </div>



    </section>




    <section class="all-master-courses-list">



        <div class="container">
        
        
            <div class="row">
            
            
                <div class="col-md-12">




                            {{-- For Demo Only --}}


                        @foreach ($courses as $course)


                         <div class="my-courses-item">


                            <div class="my-courses-item-image">

                                @if(empty($course->image))
                                    <img class="pages-header-img lazyload" data-src="{{asset('images/loading-1.jpg')}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="250">
                                @else
                                    <img class="pages-header-img lazyload" data-src="/image/{{$course->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="250">
                                @endif

                            </div>


                            <div class="my-courses-item-progressbar">


                                <h4>{{$course->name}}</h4>

                                <div class="courses-list-overview">{!!$course->overview!!}</div>
                                    
                                    
                                    @if(count($savedCourses) > 0)
                                    @foreach($savedCourses as $savedCourse)
                                    @if($savedCourse->course_id == $course->id)
                                    <div class="progress">
                                        <div class="progress-bar three-sec-ease-in-out" role="progressbar" data-transitiongoal="{{$savedCourse->progress}}"></div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif



                                <div class="my-courses-item-button">

                                    <button onclick="window.location.href = '/specialization/course-content/'+{{$specialization->id}}+'/'+{{$course->id}};" type="button" class="btn btn-primary go-to-course-button">Go to Course</button>

                                </div>


                            </div>
                            


                        </div>


                        @endforeach


                       


                
                </div>
            
            
            </div>
        
        </div>



    </section>


@endsection


@section('scripts')



@endsection