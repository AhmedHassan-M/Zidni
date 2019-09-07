<!-- STEPS -->
<?php $currentUser = Auth::user(); ?>
<section id="Steps" class="steps-section">

    <div class="steps-timeline">


        <a href="/join-the-university/1" class="active">
        
            <div class="steps-one">

                <div class="steps-img">
        
                    <i class="fas fa-user-graduate"></i>
        
                </div>
        
                <h3 class="steps-name">
                    Student Application 
                </h3>


            </div>
            
        </a>

        @if($currentUser->has('application')->exists())
            @if($currentUser->application->step >= 1)
                @if($currentUser->application->status == 1)
                <a href="/join-the-university/2">
                @endif
            @endif
        @endif


      <div class="steps-two">
        <div class="steps-img">

            <i class="far fa-copy"></i>

        </div>

        <h3 class="steps-name">
            Student Documents 
        </h3>
      </div>


        </a>

        @if($currentUser->has('application')->exists())
            @if($currentUser->application->step >= 2)
                @if($currentUser->application->status == 1)
                <a href="/join-the-university/3">
                @endif
            @endif
        @endif


      <div class="steps-three">
            <div class="steps-img">

                    <i class="far fa-credit-card"></i>    
            </div>
    
            <h3 class="steps-name">
                Payment 
            </h3>
      </div>


        </a>

    </div><!-- /.steps-timeline -->

  </section>