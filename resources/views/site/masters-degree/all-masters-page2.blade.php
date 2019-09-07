
<div class="row infinite-container">


        @for ($i = 0; $i < 6; $i++)


        <div class="col-md-6 col-sm-12 infinite-item">

                <div class="card-style-one card-style-two">

                        <a href="/masters-degree">
                    
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
                                    <p>Preview This Course</p>
    
                                </div>
                            </div>
    
                            <div class="card-body">
                            <h5 class="card-title">Sunnah Master's Degree</h5>

                                <div class="card-description-container">

                                        <p class="card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit odio repellat odit autem eaque aut nisi dolores ea distinctio incidunt commodi, officiis earum enim ab quia numquam sint et quas....</p>
                                        

                                </div>


                            <p class="card-text price">$300,125</p>
                            <p class="card-text">18 - 36 months</p>
                            </div>
                        </div>
                        
                        </a>
        
                </div>


        </div>



        @endfor





    </div>











