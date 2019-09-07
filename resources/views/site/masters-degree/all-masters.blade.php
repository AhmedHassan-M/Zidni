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
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="#">All Master's Degree</a>
                        </li>
                    </ol>
                </nav>


                <div class="all-corses-main-title">


                    <h1 class="display-4 page-header-title">Earn Your Master's Degree</h1>



                </div>

            </div>


        </div>
    </div>


    <!--End Page Header-->



    {{-- Start all Courses --}}




    {{-- End all Courses --}}




    <section class="all-courses-container" id="all-master-degree">



        <div class="container">


            <div class="row">


                <div class="col-md-12">

                        <h3>Our Master's Degree</h3>

                </div>


                @foreach ($masters as $master)


                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                        <div class="card-style-one card-style-two">

                                <a href="/masters-degree/{{$master->id}}">
                            
                                <div class="card">

                                    <div class="image-overlay-container">

                                        <img class="card-img-top lazyload" data-src="image/{{$master->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="270">
                                        <div class="card-img-overlay"></div>

                                    </div>

            
                                    <div class="card-img-info">
            
                                        <div>
                                            <img class="card-preview-icon" src="{{asset('images/play-button.svg')}}" alt="preview">
                                        </div>
            
                                        <div>
                                            <p>Preview This Course</p>
            
                                        </div>
                                    </div>
            
                                    <div class="card-body">
                                    <h5 class="card-title">{{$master->name}}</h5>

                                        <div class="card-description-container">

                                                <p class="card-description">{{$master->description}}</p>
                                                

                                        </div>


                                    <p class="card-text price">${{$master->price}}</p>
                                    <p class="card-text">{{$master->duration}}</p>
                                    </div>
                                </div>
                                
                                </a>
                
                        </div>


                </div>



                @endforeach

        

            </div>


        </div>


    </section>


@endsection


@section('scripts')



@endsection