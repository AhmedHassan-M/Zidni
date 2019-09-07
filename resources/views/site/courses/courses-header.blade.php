


<section id="masters-degree-container">




    <!--Start Page Header-->


    <div class="jumbotron jumbotron-fluid pages-header masters-degree-header">


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


                <p class="pages-header-info">{{$course->description}}</p>


                <p class="pages-header-students"><span>{{count($course->enroll)}} </span>Students Enrolled</p>
                @if(!empty($course->preview_link))
                <a href="{{$course->preview_link}}" data-lity>
                
                    <button type="button" class="btn preview-button"><i class="fas fa-play"></i> Watch Preview</button>

                </a>
                @endif


            </div>


        </div>
</div>


    <!--End Page Header-->



</div>





</section>