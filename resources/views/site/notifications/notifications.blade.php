@extends('layouts.master')

@section('title', 'Zidni Notifications')


@section('links')



@endsection


@section('contant')



<section>




        <!--Start Page Header-->
    
    
        <div class="jumbotron jumbotron-fluid pages-header notifications-header">
    
    
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
                                <a href="#">All Notifications</a>
                            </li>
                        </ol>
                    </nav>
    
    
                    <h1 class="display-6 page-header-title">Notifications</h1>
    
                    
    
                </div>
    
    
            </div>
    </div>
    
    
        <!--End Page Header-->
    
    
    
    </div>
    
    
    
    
    
    </section>




<section class="all-notifications-container">

    <div class="container">


        <div class="row">


            <div class="col-md-12">


                <div class="all-notifications-content">

                        <div class="all-notifications-header">
                
                                <h4>Notifications</h4>
                                <p>All Notifications</p>
        
                        </div>


                        <div class="col-md-12">


                            <div class="all-notifications-data">

                                <ul>


                                {{-- For Demo Only --}}


                                @for ($i = 0; $i < 12; $i++)

                                        <li>


                                            <div class="notifications-container">
                              
                                                  <div class="notifications-img">
                              
                                                    <img src="http://placehold.it/100x100" alt="Notifications Image">
                              
                                                  </div>
                              
                                                  <div class="notifications-info">
                              
                                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam rerum aspernatur odio ipsa? Odio praesentium tenetur beatae suscipit, in maiores quos ab quod nesciunt soluta, obcaecati iusto sequi incidunt consequuntur.</p>
                              
                                                    <span>19/9/2019</span>
                              
                                                  </div>                              
                                            </div>



                                        </li>


                                @endfor



                                </ul>


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