
import '../other/step-form-wizard.min';
import Cookies from '../other/cookie';


$(document).ready(function () {




  // Vid JS

  let pathArray = window.location.pathname.split('/');

  let currentCourse = pathArray[3];

  let currentLesson = pathArray[4];

  console.log("current course :", currentCourse);

  console.log("current Lesson :", currentLesson)


  var iframe = document.querySelector('iframe');
  var player = new Vimeo.Player(iframe);




        player.on('ended', function() {
        //console.log(1000);
        var lessonNo = $('.courses-lesson-links').length;
        var currentLesson = $('#current-lesson').val();
        let pathArray = window.location.pathname.split('/');

        let currentCourse = pathArray[4];
        let currentSpecial = pathArray[3];

        console.log("current course :", currentCourse);

        $.ajax({
          type:'POST',
          url:'/update-progress/specialization',
          data:{
              no:lessonNo,currentLess:currentLesson,currentCour:currentCourse,specialization:currentSpecial
          },
          success:function (data) {

            $(".redirect_counter-container").css('display', 'flex');

            let time = 5; 
            let elementClicked = false;


            $("#redirect_counter_cancel").click(function(){
                elementClicked = true;
            });


            function redirect(){

                let counter = setTimeout(redirect, 1000);// function will fired for every one second
                let id = 0;

                $("#redirect_counter_time").html(time);


                time --; // the the time decrease, from 7 to 0


                if(time == 0){
                    // if time is zero redirect
                    clearTimeout(counter);

                    let id = 0;

                    for(var i = 0 ; i < data.length ; i++){
                      if(data[data.length - 1].id == currentLesson){
      
                          $(".redirect_counter-container").css('display', 'none');
      
                          break;
                      
                      } 
      
                      if(data[i].id > currentLesson){
                          id = data[i].id;
                          window.location.replace("/specialization/course-content/"+currentSpecial+"/"+currentCourse+"/"+id);
                      }
                    }
                }else if(elementClicked == true) {
                    
                    time = null;
                    $(".redirect_counter-container").css('display', 'none');

                }


            }


            // remember to call function redirect 
            redirect();

          },
          error:function(){
              console.log('error');
          }
     });


    });
        


  player.on('play', function (data) {
    console.log('played the video!', data);
    console.log(data.duration);
    console.log(data.percent * 100);
    console.log(data.seconds);

    player.getVideoId().then(function(id) {

      const currentid = id.toString();

      console.log(currentid);


      const cookiesTest = Cookies.get(currentid);


      console.log(cookiesTest);


        player.setCurrentTime(cookiesTest);

    })



  });


  player.play();


  player.on('timeupdate', function (data) {


    const progressVid = $('.progress .progress-bar-vid');

    progressVid.attr('data-transitiongoal', data.percent * 100).progressbar({display_text: false});

    player.getVideoId().then(function(id) {

        Cookies.set(id, data.seconds, { expires: 730 });


    }).catch(function(error) {
        // an error occurred
    });




  });



  player.on('ended', function () {

    player.getVideoId().then(function(id) {

      const endcurrentid = id.toString();


      const endcookiesTest = Cookies.remove(endcurrentid);



    })


  });




  player.setColor('#f1dd7e');





  player.getVideoTitle().then(function (title) {
    console.log('title:', title);
  });











  player.getDuration().then(function (duration) {

    function secondsTimeSpanToHMS(s) {
      var h = Math.floor(s / 3600); //Get whole hours
      s -= h * 3600;
      var m = Math.floor(s / 60); //Get remaining minutes
      s -= m * 60;
      return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds
    }

    console.log(secondsTimeSpanToHMS(duration));

  }).catch(function (error) {


  });





  // setTimeout(function () {
  //   player.play();
  // }, 10);


  // $(window).blur(function(e) {
  //   setTimeout(function() {
  //     player.pause();
  //   },10);

  // });
  // $(window).focus(function(e) {

  //   setTimeout(function() {
  //     player.play();
  //   },10);

  // });



  $("#activeQuizTab").one("click", function () {
    player.destroy();

    $('html,body').scrollTop($('body').animate({ scrollTop: 150 }, 600));
  });











    // QUIZ JS



    let quizForm
    const mainQuizForm = $("#specializationQuizForm");


    $("#activeQuizTab").one("click", function () {
        $(".course-video").hide();
        $(".course-info").hide();

        $(".course-qiuz-container").show();


        quizForm.refresh();

    });




    mainQuizForm.on('sf-loaded', function () {
        $('.load-box').css({ height: 'auto', overflow: 'auto' })
        $('.load-text-box').fadeOut(200);
        $('.load-wizard-box').css({ display: 'none', visibility: 'visible' }).fadeIn(500);
    });


    mainQuizForm.validate({

        errorElement: 'p',
        errorLabelContainer: '.quiz-error-message'


    });


    jQuery.extend(jQuery.validator.messages, {
        required: "Please answer this question to continue.",
    });


    const finishQuizButton = $('<input class="finish-btn sf-right sf-btn" type="submit" value="Result"/>');
    const nextQuizButton = $('<a class="next-btn sf-right sf-btn" href="#">Next Question</a>');
    const prevQuizButton = $('<a class="prev-btn sf-left sf-btn" href="#">Previous Question</a>');


    quizForm = mainQuizForm.stepFormWizard({
        height: 'auto',
        theme: 'sea',
        linkNav: false,
        showNavNumbers: false,
        showNav: false,
        transition: 'slide',
        duration: 300,
        finishBtn: finishQuizButton,
        nextBtn: nextQuizButton,
        prevBtn: prevQuizButton,
        stepNameElement: 'h3',
        onNext: function () {

            var valid = mainQuizForm.valid();

            quizForm.refresh();
            return valid;



        },
        onSlideChanged: function () {

            let currentQustionNumber = quizForm.getActualStep();

            $('.current-qustion-count').html(currentQustionNumber + 1);

        }


    });


    // 

    //submit function of course Quiz
    /*mainQuizForm.on('sf-finish', function (e, from, data) {

        var valid = mainQuizForm.valid();


        let selectedAnswers = $('input:checked').serialize();


        e.preventDefault();

        let quizForm = $('#mainQuizForm');

        $.ajax({

            type: "POST",
            url: "/answer-quiz",
            data: quizForm.serialize(),
            dataType: 'json',
            beforeSend: function () {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function () {

                $('.ajax-loading').css('display', 'none');


            },

            success: function (data) {
                console.log(data);
                var finalScore = $('#user-score-result').html();
                var resultPer = (data / finalScore) * 100;
                var roundedResult = Math.round(resultPer);
                $('#user-score-result').html(roundedResult);

                $("#pass-quiz-icon").hide();
                $("#fail-quiz-icon").hide();


                $("#quiz-result-button-pass").hide();
                $("#quiz-result-button-fail").hide();




                if (resultPer >= finalScore) {

                    $("#pass-quiz-icon").show();

                    $(".quiz-result-status-message").html("Congratulation");
                    $(".quiz-result-status-result").html("You Passed");

                    $("#quiz-result-button-pass").show();




                } else {

                    $("#fail-quiz-icon").show();

                    $(".quiz-result-status-message").html("Unfortunately");
                    $(".quiz-result-status-result").html("You need to take this course again");

                    $("#quiz-result-button-fail").show();


                }




            },
            error: function (data) {


            },

        });

        if (valid) {

            e.preventDefault();
            alert(selectedAnswers);

            $('.course-qiuz-container').hide();
            $('.quiz-result-container').show();

        } else {

            return false;

        }



    });*/

    //submit function of specialization course quiz
    mainQuizForm.on('sf-finish', function (e, from, data) {

        var valid = mainQuizForm.valid();


        let selectedAnswers = $('input:checked').serialize();


        e.preventDefault();

        let quizForm = $('#specializationQuizForm');

        $.ajax({

            type: "POST",
            url: "/answer-specialization-quiz",
            data: quizForm.serialize(),
            dataType: 'json',
            beforeSend: function () {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function () {

                $('.ajax-loading').css('display', 'none');


            },

            success: function (data) {
                console.log(data);
                var finalScore = $('#user-score-result').html();
                var resultPer = (data / finalScore) * 100;
                var roundedResult = Math.round(resultPer);
                $('#user-score-result').html(roundedResult);

                $("#pass-quiz-icon").hide();
                $("#fail-quiz-icon").hide();


                $("#quiz-result-button-pass").hide();
                $("#quiz-result-button-fail").hide();




                if (resultPer >= finalScore) {

                    $("#pass-quiz-icon").show();

                    $(".quiz-result-status-message").html("Congratulation");
                    $(".quiz-result-status-result").html("You Passed");

                    $("#quiz-result-button-pass").show();




                } else {

                    $("#fail-quiz-icon").show();

                    $(".quiz-result-status-message").html("Unfortunately");
                    $(".quiz-result-status-result").html("You need to take this quiz again");

                    $("#quiz-result-button-fail").show();


                }




            },
            error: function (data) {


            },

        });

        if (valid) {

            e.preventDefault();
            alert(selectedAnswers);

            $('.course-qiuz-container').hide();
            $('.quiz-result-container').show();

        } else {

            return false;

        }



    });



    const numberOfQustions = $('#mainQuizForm .sf-step').length;


    $('.all-qustion-count').html(numberOfQustions);


    let currentQustionNumber = quizForm.getActualStep();


    $('.current-qustion-count').html(currentQustionNumber + 1);



    $("#mainQuizForm input[type=radio]").change(function () {

        setTimeout(function () {

            quizForm.next()

        }, 500);


    });







});