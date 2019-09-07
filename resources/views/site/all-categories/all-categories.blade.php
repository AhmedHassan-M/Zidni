@extends('layouts.master')

@section('title', 'Zidni All Categories')


@section('links')



@endsection


@section('contant')


    <!--Start Page Header-->


    <div class="jumbotron jumbotron-fluid pages-header all-categories-header">


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
                            <a href="#">All Categories</a>
                        </li>
                    </ol>
                </nav>


                <h1 class="display-6 page-header-title">All Courses</h1>
                
            </div>


        </div>
    </div>


<!--End Page Header-->





<div class="preload-content">


    <!-- Preloader -->
    <div id="preloader">
            <div id="status">&nbsp;</div>
    </div>
              

    <section id="all-categories">

        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <ul id="all-categories-tabs">

                                    <li class="nav-item">                        
                                        
                                        <h5 class="all-categories-count"><span>0 </span>Courses</h5>


                                    </li>

                                    <li class="nav-item active">
                                            <a class="nav-link all-categories-courses-tab" id="">All Courses</a>
                                    </li>

                                    @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                    <li class="nav-item">
                                        <a class="nav-link" id="{{$category->id}}">{{$category->name}}</a>
                                    </li>
                                    @endforeach
                                    @endif
                                    
                            </ul>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">


                            <!-- Preloader -->
                        <div id="all-categoty-preloader">
                                <div id="all-categoty-status">&nbsp;</div>
                        </div>



                        <div class="row select-category">


                        </div>

                </div>
            </div>


        </div>


    </section>




</div>





@endsection


@section('scripts')

@endsection