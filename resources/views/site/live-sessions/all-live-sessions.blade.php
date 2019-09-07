@extends('layouts.master')

@section('title', 'Zidni All Live Sessions')


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
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="#">All Live Sessions</a>
                        </li>
                    </ol>
                </nav>


                <div class="all-corses-main-title">


                    <h1 class="display-4 page-header-title">Upcoming Live Sessions</h1>



                </div>

            </div>


        </div>
    </div>


    <!--End Page Header-->



    {{-- Start all Courses --}}




    {{-- End all Courses --}}




    <section class="all-courses-container" id="all-live-sessions">



        <div class="container">


            <div class="row">


                <div class="col-md-12">

                        <h3>Our Live Sessions</h3>

                </div>



                <div class="row infinite-container">


                    @for ($i = 0; $i < 6; $i++)


                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 infinite-item">

                            <div class="card-style-one card-style-two">

                                    <a href="/live-sessions">
                                
                                    <div class="card">

                                        <div class="image-overlay-container">

                                            <img class="card-img-top lazyload" data-src="{{asset('images/demo-2.jpeg')}}" src="{{asset('images/demo-2-low.jpg')}}" width="100%" height="270">
                                            <div class="card-img-overlay"></div>

                                        </div>

                
                                        <div class="card-img-info">
                
                                            <div>
                                                <img class="card-preview-icon" src="{{asset('images/play-button.svg')}}" alt="preview">
                                            </div>
                
                                            <div>
                                                <p>Preview This Live</p>
                
                                            </div>
                                        </div>
                
                                        <div class="card-body">
                                        <h5 class="card-title">Sunnah Live Sessions</h5>
                                        <div class="live-timer-container">
      
                                                <div class="live-timer-header">
            
                                                    <h5>STARTS IN</h5>
            
                                                </div>
                
                                                <div class="live-timer" data-countdown="2018/12/12 00:30:59"></div>
            
                                          </div>
                                          <p class="card-text subscribers">125k Subscribers</p>
                                        </div>
                                    </div>
                                    
                                    </a>
                    
                            </div>


                    </div>



                    @endfor





                </div>

                
                <a class="infinite-more-link" href="/all-live-sessions-page2">Show More</a>


            </div>


        </div>


    </section>


@endsection


@section('scripts')



@endsection