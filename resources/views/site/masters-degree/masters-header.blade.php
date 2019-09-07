


<section id="masters-degree-container">




    <!--Start Page Header-->


    <div class="jumbotron jumbotron-fluid pages-header masters-degree-header">


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
                            <a href="">{{$master->name}}</a>
                        </li>
                    </ol>
                </nav>


                <h1 class="display-6 page-header-title">{{$master->name}}</h1>


                <p class="pages-header-info">{{$master->descrption}}</p>


                <p class="pages-header-students"><span>4,259 </span>Students Enrolled</p>

                <a href="{{$master->preview}}" data-lity>
                
                    <button type="button" class="btn preview-button"><i class="fas fa-play"></i> Watch Preview</button>

                </a>
                


            </div>


        </div>
</div>


    <!--End Page Header-->



</div>





</section>

