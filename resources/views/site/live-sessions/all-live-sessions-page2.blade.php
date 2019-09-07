@extends('layouts.master')

@section('title', 'Zidni All Live Sessions page 2')


@section('links')



@endsection


@section('contant')




    <section class="all-courses-container" id="all-live-sessions">



        <div class="container">


            <div class="row">


                <div class="col-md-12">

                        <h3>Our Live Sessions</h3>

                </div>



                <div class="row infinite-container">


                    @for ($i = 0; $i < 6; $i++)


                    <div class="col-md-4 col-sm-6 infinite-item">

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



            </div>


        </div>


    </section>


@endsection


@section('scripts')



@endsection