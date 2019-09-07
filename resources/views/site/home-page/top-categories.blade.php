


<section id="top-categories-section">


        <div class="container">
      
            <div class="top-categories-header">
      
                <div class="top-categories-title">
            
                    <h3>Browse Our Top Categories</h3>
            
                </div>
            
            
                <div class="top-categories-tabs">

                        <div class="btn-group" role="group" aria-label="Top Categories">
                            
                            <button id="all" type="button" class="btn btn-secondary top-categories-button active">All</button>

                            @foreach($topCategories as $topCategory)
                              @if(count($topCategory->courses) > 0)
                                <button id="{{$topCategory->id}}" type="button" class="btn btn-secondary top-categories-button active">{{$topCategory->name}}</button>
                              @endif
                            @endforeach

                        </div>

            
                </div>
                
            
              </div>
      
        </div>
            
      
          <div class="container slider-container">
    
                <div class="top_categories_slider_loading"></div>

    
                <div id="top_categories_slider">

                </div>
                


      
    
          </div>

          <div class="all-categories-button">

            <a href="/all-categories">

                    <button type="button" class="btn btn-primary btn-lg">View All Categories</button>

            </a>

          </div>

          
          
      
      
      </section>
      
      
    
    
    
    
    
    
    
    