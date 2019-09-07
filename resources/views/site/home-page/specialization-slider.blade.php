
<section id="specialization-slider">


        <div class="container">
      
            <div class="slider-header">
      
                <div class="slider-header-title">
            
                    <h3>Popular Specialization</h3>
            
                </div>
            
            
                <div class="slider-header-more">

                    <a href="/all-specialization">
                    
                        <button type="button" class="btn">See All</button>
            

                    </a>
            

                </div>
                
            
              </div>
      
        </div>
            
      
          <div class="container slider-container">
      
      
              <div class="home-slider">
      
                @foreach($specializations as $specialization)
      
                  <div class="slider-card-container">
      
                      <a href="/specialization/{{$specialization->id}}">
                    
                        <div class="card">
                            @if(empty($specialization->image))
                            <img class="card-img-top lazyload" data-src="/image/{{$specialization->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="220">
                            @else
                            <img class="card-img-top lazyload" data-src="/image/{{$specialization->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="220">
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
                              <h5 class="card-title">{{$specialization->name}}</h5>
                              <p class="card-text">{{count($specialization->courses)}} Courses</p>
                              <p class="card-text">{{$specialization->duration}}</p>
                              <p class="card-text price">${{$specialization->price}}</p>
                            </div>
                          </div>
                        
                        </a>
          
                  </div>
      
                @endforeach
                  
               
              </div>
          
          </div>
          
      
      
      </section>
      
    