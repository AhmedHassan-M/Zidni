$("#all-categories-tabs .nav-link").on("click", function (e) {


    e.preventDefault();

    $("#all-categories-tabs .nav-link").removeClass("active");

    $(".select-category *").remove();

    $(this).addClass("active");

    let clickedCategory = this.id

    console.log(clickedCategory);


    $.ajax({
        type: "POST",
        url: "/api/selectCategory",
        data: {
            id: clickedCategory
        },
        beforeSend: function () {

            $('#all-categoty-preloader').css('display', 'flex');

        },
        complete: function () {

            $('#all-categoty-preloader').css('display', 'none');

        },

        success: function (responde) {

            let i;

            console.log(responde)

            for (i = 0; i < responde.length; i++) {

                let Courses = `
                <div class="col-lg-4 col-md-6">
                <div class="card-style-one">
                   <a href="/course/${responde[i].id}">
                      <div class="card">
                         <img class="card-img-top lazyload" data-src="/image/${responde[i].image}" src="/images/loading-1.jpg" width="100%" height="170">
                         <div class="card-img-info">
                            <div><img class="card-preview-icon" src="/images/play-button.svg" alt="preview"></div>
                            <div>
                               <p>Preview This Course</p>
                            </div>
                         </div>
                         <div class="card-body">
                            <h5 class="card-title">${responde[i].name}</h5>
                            <p class="card-text card-description">${responde[i].description}</p>
                            <p class="card-text">${responde[i].duration}</p>
                            <p class="card-text price">$ ${responde[i].price}</p>
                         </div>
                      </div>
                   </a>
                </div>
             </div>

            `


            $('.select-category').append(Courses);


            $(".card .card-img-top").each(function(){
                if($(this).attr("src") == '/image/null' || $(this).attr("data-src") == '/image/null')
                 {
                     $(this).attr("src", "/images/loading-1.jpg");
                     $(this).attr("data-src", "/images/loading-1.jpg") 

                 }
            });



            let numberOfcourses = $(".select-category .card-style-one").length

            $(".all-categories-count span").html(numberOfcourses);


            }

        },
        error: function (responde) {

            console.log("error");

        },


    });



});


$(".all-categories-courses-tab").trigger("click");


$('#all-categories-tabs li').click(function(){

    $(this).addClass('active');
    $(this).siblings().removeClass('active');

});
