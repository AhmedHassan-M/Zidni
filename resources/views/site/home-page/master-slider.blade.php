
<section id="masters-degree-slider">


        <div class="container">
      
            <div class="slider-header">
      
                <div class="slider-header-title">
            
                    <h3>Popular Master's Degree</h3>
            
                </div>
            
            
                <div class="slider-header-more">

                    <a href="/all-masters-degree">

                        <button type="button" class="btn">See All</button>

                    </a>
        
            
                </div>
                
            
              </div>
      
        </div>
            
      
          <div class="container slider-container">
      
      
              <div class="home-slider">
      
      
                @foreach($masters as $master)
                  <div class="slider-card-container">
      
                      <a href="/masters-degree/{{$master->id}}">
                    
                        <div class="card">
                            <img class="card-img-top lazyload" data-src="/image/{{$master->image}}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="220">
      
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
                              <p class="card-text">{{count($master->courses)}} Courses</p>
                              <p class="card-text">{{$master->duration}}</p>
                              <p class="card-text price">${{$master->price}}</p>
                            </div>
                          </div>
                        
                        </a>
          
                  </div>
      
                @endforeach
                  
               
              </div>
          
          </div>
          
      
      
      </section>
      
      