
import 'waypoints/lib/jquery.waypoints.js';
import 'waypoints/lib/shortcuts/sticky.js';

import 'waypoints/lib/shortcuts/infinite.js';

import 'bootstrap-progressbar/bootstrap-progressbar.js';


import 'simplebar';


import PerfectScrollbar from 'perfect-scrollbar';

$(document).ready(function() {

    $('.home-slider').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        centerPadding: '60px',
        prevArrow: '<button type="button" class="slick-prev slider-prev icon">Previous</button>',
        nextArrow: '<button type="button" class="slick-next slider-nex icon">Next</button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });



    $('.my-activity-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        centerPadding: '30px',
        prevArrow: '<button type="button" class="slick-prev slider-prev icon">Previous</button>',
        nextArrow: '<button type="button" class="slick-next slider-nex icon">Next</button>',
        autoplay: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });






    function slickCarousel() {
        $('#top_categories_slider').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            centerPadding: '60px',
            prevArrow: '<button type="button" class="slick-prev slider-prev icon">Previous</button>',
            nextArrow: '<button type="button" class="slick-next slider-nex icon">Next</button>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


      }
      function destroyCarousel() {



        if ($('#top_categories_slider').hasClass('slick-initialized')) {
        
            $('#top_categories_slider').slick('destroy');

            $("#top_categories_slider .slider-card-container").remove();



        }      
      }






    $('#top-tabs-container a').on('click', function() {


        setTimeout(function() { $('.home-slider').slick('setPosition'); }, 200);


    })



    $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<div class="timer-item"><span class="counter-timer">%D</span><span class="type-timer">Days</span></div><div class="timer-item"><span class="counter-timer">%H</span><span class="type-timer">Hrs</span></div><div class="timer-item"><span class="counter-timer">%M</span><span class="type-timer">Mins</span></div><div class="timer-item"><span class="counter-timer">%S</span><span class="type-timer">Secs</span></div>'));
        });
    });



    $('.testimonial-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerPadding: '60px',
        arrows: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });



    const hash = window.location.hash;




    hash && $('.hash-controler .nav-item a[href="' + hash + '"]').tab('show');

    $('#master-tabs .nav-item a').click(function(e) {
        $(this).tab('show');
        const scrollmem = $('body').animate({ scrollTop: 300 }, 600);
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
    });


    $('#all-categories-tabs .nav-item a').click(function(e) {
        $(this).tab('show');
        const scrollmem = $('body').animate({ scrollTop: 150 }, 600);
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
    });








    const coursesNavigation = $("#courses-navbar-container");
    const stickyCourses = "sticky";
    const coursesHeader = $('#masters-degree-container').height();

    $(window).scroll(function() {


        if ($(this).scrollTop() > coursesHeader) {
            coursesNavigation.addClass(stickyCourses);
        } else {
            coursesNavigation.removeClass(stickyCourses);
        }


    });




    const allCategoriesTabs = $("#all-categories-tabs");

    const stickyCategoriesTabs = "sticky-categories";

    const allCategoriesHeader = $('.all-categories-header').height();

    $(window).scroll(function() {


        if ($(this).scrollTop() > allCategoriesHeader) {
            allCategoriesTabs.addClass(stickyCategoriesTabs);
        } else {
            allCategoriesTabs.removeClass(stickyCategoriesTabs);
        }


    });


    // const myCoursesTabs = $(".my-courses-tabs");

    // const myCoursesStickyClass = "sticky-my-courses";


    // const myCoursesHeader = $('.my-courses-header').height();

    // $(window).scroll(function() {


    //   if( $(this).scrollTop() > myCoursesHeader ) {
    //     myCoursesTabs.addClass(myCoursesStickyClass);
    //   } else {
    //     myCoursesTabs.removeClass(myCoursesStickyClass);
    //   }

    // });




    // var infinite = new Waypoint.Infinite({
    //   element: $('.infinite-container')[0],
    //   onBeforePageLoad: function () {
    //     $('.infinite-loading').show();
    //       console.log('before pageLoad ajax');
    //     },
    //     onAfterPageLoad: function ($items) {
    //       $('.infinite-loading').hide();
    //       console.log('after pageLoad ajax');


    //       $('[data-countdown]').each(function() {
    //         var $this = $(this), finalDate = $(this).data('countdown');
    //         $this.countdown(finalDate, function(event) {
    //           $this.html(event.strftime('<div class="timer-item"><span class="counter-timer">%D</span><span class="type-timer">Days</span></div><div class="timer-item"><span class="counter-timer">%H</span><span class="type-timer">Hrs</span></div><div class="timer-item"><span class="counter-timer">%M</span><span class="type-timer">Mins</span></div><div class="timer-item"><span class="counter-timer">%S</span><span class="type-timer">Secs</span></div>'));
    //         });
    //       });

    //     },
    // });



    // Scroll to top


    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('#scroll').addClass("scroll-revel");
        } else {
            $('#scroll').removeClass("scroll-revel");
        }
    });
    $('#scroll').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 300);
        return false;
    });




    $('.progress .progress-bar').progressbar({

        display_text: 'center',
        percent_format: function(percent) { return percent + '%' },
        amount_format: function(amount_part, amount_total) { return amount_part + ' / ' + amount_total; },
        done: function() {


            let progressValue = $('.progress-bar').attr('data-transitiongoal');

            if (progressValue === '100') {

                $('#get-certificate').removeAttr("disabled")

            }


        },

    });


    $('.progressbar-front-text').addClass('three-sec-ease-in-out icon');


    $('.progress-bar').append('<div class="progress-back-container three-sec-ease-in-out"><div class="progress-back"><span></span><i class="fas fa-sort-down"></i></div></div>');


    var icons = {
        header: "icon accordion-close",
        activeHeader: "icon accordion-open"
    };


    $('.main-lessons-container .active').parent().parent().parent().parent().addClass('active-week-content');

    $('.main-lessons-container .active').parent().parent().parent().parent().prev().addClass('active-week-header');

    let currentActiveWeek = $('.main-lessons-container .active').parent().parent().parent().parent().data('week');


    $("#accordion").accordion({

        collapsible: true,
        // multiple: true,
        icons: icons,
        animate: 150,
        heightStyle: "content",
        resize: function() {
            $("#accordion").accordion("refresh");
        },

    });

    console.log(currentActiveWeek);

    $("#accordion").accordion("option", "active", currentActiveWeek);


    $('#renderButton').on('click', function() {

        $('#week1 li:eq(3) a').tab('show')

    });


    $('#accordion .nav-item a').click(function(e) {
        $(this).tab('show');
        const scrollmem = $('body').animate({ scrollTop: 150 }, 600);
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
    });

    $('[data-toggle="tooltip"]').tooltip();


    // top cat section


    $(".top-categories-button").on("click", function (e) {


        e.preventDefault();

        $(".top-categories-button").removeClass("active");

        $(this).addClass("active");

        let clickedCategory = this.id

        console.log(clickedCategory);



        $.ajax({
            type: "POST",
            url: "/category/courses",
            data: {
                categoryID: clickedCategory
            },
            beforeSend: function () {

                $('.top_categories_slider_loading').css('display', 'flex');
                $("#top_categories_slider .slider-card-container").remove();



            },
            complete: function () {

                $('.top_categories_slider_loading').css('display', 'none');


            },

            success: function (responde) {

                destroyCarousel();

                console.log(responde.length);

            
                let i;

                for (i = 0; i < responde.length; i++) {

                    // responde.data.length


                    destroyCarousel();


                    console.log(responde[i].name);

                    let Courses = `
                        <div class="slider-card-container">
                
                            <a href="/course/${responde[i].id}">
                        
                            <div class="card">
                                <img class="card-img-top lazyload" data-src="/image/${responde[i].image}" src="/images/loading-1.jpg" width="100%" height="220">
            
                                <div class="card-img-info">
            
                                    <div>
                                        <img class="card-preview-icon" src="/images/play-button.svg" alt="preview">
                                    </div>
            
                                    <div>
                                        <p>Preview This Course</p>
            
                                    </div>
                                </div>
            
                                <div class="card-body">
                                    <h5 class="card-title">${responde[i].name}</h5>
                                    <p class="card-text">${responde[i].name}</p>
                                    <p class="card-text">${responde[i].duration}</p>
                                    <p class="card-text price">$${responde[i].price}</p>
                                </div>
                                </div>
                            
                            </a>
            
                    </div>
                `


                $('#top_categories_slider').append(Courses);


                $(".card .card-img-top").each(function(){
                    if($(this).attr("src") == '/image/null' || $(this).attr("data-src") == '/image/null')
                     {
                         $(this).attr("src", "/images/loading-1.jpg");
                         $(this).attr("data-src", "/images/loading-1.jpg") 

                     }
                });



                    

                }

                slickCarousel();

            },
            error: function (responde) {

                console.log("error");

            },


        });



    });


    $(".top-categories-button").eq(0).trigger("click");






    // my activety js



    

    $(".activity-categories-tabs-item").on("click", function (e) {


        e.preventDefault();

        $(".activity-categories-tabs-item").removeClass("active");

        $(".main-courses-activity-categories-container .activity-categories-item").remove();

        $(this).addClass("active");

        let clickedCategory = this.id


        $.ajax({
            type: "POST",
            url: "/category/courses",
            data: {
                categoryID: clickedCategory
            },
            beforeSend: function () {

                $('.top_categories_slider_loading').css('display', 'flex');

            },
            complete: function () {

                $('.top_categories_slider_loading').css('display', 'none');

            },

            success: function (responde) {
                //console.log(responde);
                let i;

                console.log(responde)

                for (i = 0; i < responde.length; i++) {

                    let Courses = `
                    <a href="/course/${responde[i].id}">

                    <div class="activity-categories-item">


                            <div class="activity-categories-item-img">

                                <img class="lazyload" data-src="/image/${responde[i].image}" src="{{asset('images/loading-1.jpg')}}" width="100%" height="150">

                                <div class="play-icon">

                                    <i class="far fa-play-circle"></i>

                                </div>


                            </div>

                            <div class="activity-categories-item-info">

                                    <h5>${responde[i].name}</h5>
                                    <p>${responde[i].description}</p>
                                    <div class="activity-categories-stat">

                                        <div class="activity-categories-stat-item">

                                            <i class="far fa-clock"></i>
                                            <p>${responde[i].duration}</p>

                                        </div>


                                        
                                        <div class="activity-categories-stat-item">

                                            <i class="fas fa-user-graduate"></i>
                                            <p>${responde[i].enroll_count} students enrolled</p>

                                        </div>


                                            
                                        <div class="activity-categories-stat-item">

                                            <i class="fas fa-dollar-sign"></i>
                                            <p>${responde[i].price}</p>

                                        </div>

                                    </div>

                            </div>



                    </div>

                    </a>

                `


                $('.main-courses-activity-categories-container').append(Courses);


                $(".activity-categories-item-img img").each(function(){
                    if($(this).attr("src") == '/image/null' || $(this).attr("data-src") == '/image/null')
                     {
                         $(this).attr("src", "/images/loading-1.jpg");
                         $(this).attr("data-src", "/images/loading-1.jpg") 

                     }
                });


                }

            },
            error: function (responde) {

                console.log("error");

            },


        });



    });


    $(".activity-categories-tabs-item").eq(0).trigger("click");



});


$(window).on('load', function() { // makes sure the whole site is loaded 
    $('#status').fadeOut(); // will first fade out the loading animation 
    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
    $('body').delay(350).css({ 'overflow': 'visible' });
});



$(window).on('load', function() { // makes sure the whole site is loaded 
    $('.courses-load-status-1').fadeOut(); // will first fade out the loading animation 
    $('.courses-load-status-0').fadeOut(); // will first fade out the loading animation 
    $('.courses-load-1').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
    $('.courses-load-0').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website. 
    $('body').delay(350).css({ 'overflow': 'visible' });
});




$(document).on('submit', '#subscribeForm', function(e) {



    e.preventDefault();



    let url = "/api/subscrib";
    let subscribeInput = $("#subscribeInput").val();
    $.ajax({
        type: "POST",
        url: url,
        data:
        {
            subscribeInput: subscribeInput,
        },
        success: function(data) {
            console.log(data);
            $("#subscribeInput").val("");

            swal({
                type: 'success',
                title: 'Thank you for subscribing to our newsletter',
                showCloseButton: false,
                showConfirmButton: false,
                timer: 3000
            })


        },
        error: function(data) {
            console.log('error');

        },

    });







});

