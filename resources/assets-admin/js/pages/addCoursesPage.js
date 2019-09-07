

import '../other/step-form-wizard.min';
import '../other/savy.min';


$(document).ready(function () {

    let stepsForm
    const AddCoursesForm = $("#AddCoursesForm");
    const summernoteElement = $('#Overview');

    $('.auto-save').savy('load');


    // $('#addPrice').priceFormat();


    AddCoursesForm.on('sf-loaded', function () {
        $('.load-box').css({ height: 'auto', overflow: 'auto' })
        $('.load-text-box').fadeOut(200);
        $('.load-wizard-box').css({ display: 'none', visibility: 'visible' }).fadeIn(500);
    });


    // This will set `ignore` for all validation calls
    jQuery.validator.setDefaults({
    // This will ignore all hidden elements alongside `contenteditable` elements
    // that have no `name` attribute
    ignore: ":hidden, [contenteditable='true']:not([name])"


    });



    // dropify image

    $('.dropify').dropify({




        messages: {
            'default': 'Drag and drop a Course image here or click',
            'replace': 'Drag and drop or click to replace Course image',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.',
            'test':    'Your image should be at minimum 250x250 pixels and maximum 1000x1000 pixels'
            
        },
        tpl: {
            wrap:            '<div class="dropify-wrapper"></div>',
            loader:          '<div class="dropify-loader"></div>',
            message:         '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
            preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p><p class="dropify-infos-message">{{ test }}</p></div></div></div>',
            filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
            clearButton:     '<button type="button" class="dropify-clear">{{ remove }}</button>',
            errorLine:       '<p class="dropify-error">{{ error }}</p>',
            errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
        },
        error: {
            'fileSize': 'The file size is too big ( {{ value }} max ).',
            'minWidth': 'The image width is too small ( {{ value }} px min ).',
            'maxWidth': 'The image width is too big ( {{ value }} px max ).',
            'minHeight': 'The image height is too small ( {{ value }} px min ).',
            'maxHeight': 'The image height is too big ( {{ value }}px max ).',
            'imageFormat': 'The image format is not allowed ( {{ value }} only ).'
        }



    
    });



    AddCoursesForm.validate({

        rules: {
            courseName: {
                required: true,
                minlength: 3,
                maxlength: 30

            },
            selectCategory: {

                required: true,

            },
            shortDescription: {

                required: true,
                minlength: 3,
                maxlength: 300
            },
            selectInstructor: {

                required: true,

            },
            courseImage: {

                required: true,

            },
            addLanguage: {
                required: true,
            },
            'lessonName[]': {
                required: true
            },

        },
        messages: {
            courseName: {
                required: "Course name is required"
            },
            selectCategory: {
                required: "Category is required"
            },
            shortDescription: {
                required: "Short description is required"
            },
            selectInstructor: {

                required: "Instructor is required"

            },
            courseImage:{

                required: "Course image is required"


            },
            addLanguage: {

                required: "Language is required",

            }

        },


    });

    summernoteElement.summernote({

        tabsize: 2,
        height: 400,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'hr']],

        ],
        disableResizeEditor: true
    });

    $('.note-statusbar').hide();


    const finishCoursesForm = $('<input class="finish-btn sf-right sf-btn" type="submit" value="PUBLISH COURSE"/>')

    stepsForm = AddCoursesForm.stepFormWizard({
        height: 'auto',
        theme: 'sun',
        showNavNumbers: true,
        transition: 'fade',
        finishBtn: finishCoursesForm,
        onNext: function () {


            var valid = AddCoursesForm.valid();

            if (summernoteElement.summernote('isEmpty')) {

                swal({


                    type: 'error',
                    title: 'Please type the overview for this course',
                    showConfirmButton: false,
                    timer: 3000


                });

                stepsForm.refresh();

                return false;

            } else {


                stepsForm.refresh();
                return valid;


            }


        },
        onFinish: function () {


            var valid = AddCoursesForm.valid();
            // if use height: 'auto' call refresh metod after validation, because validation can change content

            
            $('.auto-save').savy('destroy');

            return valid;
            stepsForm.refresh();


        }
    });


    AddCoursesForm.on('sf-step-before', function(e, from, to, data) {

        let validweeks = AddCoursesForm.valid();

        if(from === 1) {

            $('.week-card input').each(function() {

                let inputStatus = $(this).val().length

                let allInputs = $( ".week-card input" ).map( function() {
    
                
                    if ($(this).val().length === 0) {
        
                        $(this).addClass('error');
                        $(this).removeClass('valid');
        
                    } else {
            
                        $(this).addClass('valid');
                        $(this).removeClass('error');
            
                    }
        
        
                    let empty = $(this).closest('.week-card').find("input").filter(function() {
                        return this.value === "";
                    });
        
        
                    if(empty.length) {
        
                        $(this).closest('.week-card').find('.card-header').addClass('week-error');
                        $(this).closest('.week-card').find('.card-header').removeClass('week-valid');
                    
                    } else {
        
                        $(this).closest('.week-card').find('.card-header').addClass('week-valid');
                        $(this).closest('.week-card').find('.card-header').removeClass('week-error');
        
                    }
        
        
                });


            
                if (inputStatus === 0) {

                    let notValidInput = $(this);

                    $(this).addClass('error');
                    $(this).removeClass('valid');


                        swal({


                            type: 'error',
                            title: 'Please Complete All Weeks',
                            showConfirmButton: false,
                            timer: 3000


                        });
                    

                    e.preventDefault();

                
                } else {

                    $(this).addClass('valid');
                    $(this).removeClass('error');

                    return validweeks;


                }
            });

        }


    });

    

    $("#formWeekCounter").val(1);




    var $template = $(".week-card");

    let cardHeader = 1;
    let dataTarget = 1;
    let ariaControls = 1;
    let weekContentId = 1;
    let ariaLabelledby = 1;
    let weekCounterText = 1;


    // form inputs


    let weekTitle = 1;
    let weekLessonName = 1;
    let weekLessonLink = 1;

    let addMoreLesson = 1;


    //limit the weeks


    let numberOfWeeks = 1;


    let maxNumberOfWeeks = 12; //Input fields increment limitation

    // Start Append


    const weeksWrapper = $('.weekLessonWrapper');


    $("#formWeekCounter").val(1);



    $(".addMoreWeeks").on("click", function () {


        //Check maximum number of input fields
        // if(numberOfWeeks < maxNumberOfWeeks){ 



            numberOfWeeks++; //Increment field counter


        
            var $newPanel = $template.clone();

            $newPanel.find(".card-header").attr("id", "week_header_" + (++cardHeader))
            $newPanel.find(".btn-link").attr("data-target", "#week_target_" + (++dataTarget))
            $newPanel.find(".btn-link").attr("aria-controls", "week_target_" + (++ariaControls))
            // $newPanel.find(".btn-link").text("Week #" + (++weekCounterText));
            $newPanel.find(".week-content").attr("id", "week_target_" + (++weekContentId))
            $newPanel.find(".week-content").attr("aria-labelledby", "week_header_" + (++ariaLabelledby))
    
    
            //form inputs append
    
            $newPanel.find(".week-name-title").attr("name", "weekName_" + (++weekTitle))
            $newPanel.find(".week-lesson-name").attr("name", "LessonName_" + (++weekLessonName) + "[]")
            $newPanel.find(".week-lesson-link").attr("name", "LessonLink_" + (++weekLessonLink) + "[]")

            $newPanel.find(".card-header button span").text('Week Title');


            //form inputs femove values


            $newPanel.find(".week-name-title").val('')
            $newPanel.find(".week-lesson-name").val('')
            $newPanel.find(".week-lesson-link").val('')


            // remove validation

            $newPanel.find(".week-name-title").removeClass('valid');
            $newPanel.find(".week-name-title").removeClass('error');

            $newPanel.find(".week-lesson-name").removeClass('valid');
            $newPanel.find(".week-lesson-name").removeClass('error');

            $newPanel.find(".week-lesson-link").removeClass('valid');
            $newPanel.find(".week-lesson-link").removeClass('error');


    
            // remove weekLessonWrapper
            $newPanel.find(".weekLessonWrapper *").remove()
    
    
            // add addOtherLessons_1
    
            // $newPanel.find(".addOtherLessonsContainer a").attr("class", "addOtherLessons_" + (++addMoreLesson))
    
    
            $("#accordion").append($newPanel.fadeIn());
            
            //Weeks Name funs

            stepsForm.refresh();


    
            $("#formWeekCounter").val(numberOfWeeks);


        // } else{

        //     swal({


        //         type: 'error',
        //         title: 'You have reached the max limit of weeks',
        //         text: 'You can create other parts of this course',              
        //         showConfirmButton: false,
        //         timer: 3000


        //     });

        // }


        
        $('[data-toggle="tooltip"]').tooltip()

    });



    // End Append


    // Refresh on click week

    $(document).on('click','.btn-link', function(){
        
        setTimeout(function () {
        
            stepsForm.refresh();

        }, 750);

    });

    // keyup input

    $(document).on('keyup','.week-name-title', function(){
                
        $(this).parent().parent().parent().parent().parent().find('.btn-link span').html($(this).val())

    });


    // Delete Button

    $(document).on('click','.deleteInputRow', function() {


        swal({
            title: 'Are you sure you want to delete this Lesson?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
                $(this).parent().remove();


                let allInputs = $( ".week-card input" ).map( function() {

            
                    if ($(this).val().length === 0) {
        
                        $(this).addClass('error');
                        $(this).removeClass('valid');
        
                    } else {
            
                        $(this).addClass('valid');
                        $(this).removeClass('error');
            
                    }
        
        
                    let empty = $(this).closest('.week-card').find("input").filter(function() {
                        return this.value === "";
                    });
        
        
                    if(empty.length) {
        
                        $(this).closest('.week-card').find('.card-header').addClass('week-error');
                        $(this).closest('.week-card').find('.card-header').removeClass('week-valid');
                    
                    } else {
        
                        $(this).closest('.week-card').find('.card-header').addClass('week-valid');
                        $(this).closest('.week-card').find('.card-header').removeClass('week-error');
        
                    }
        
        
                });



            }
          })


    });



    // Add More Lessons




    $(document).on('click','.addOtherLessonsButton', function(){



        let CurrentWeekLessonsTest = $(this).parent().parent().parent().find('.weekLessonContainer:first').clone();

        CurrentWeekLessonsTest.find(".week-lesson-name").val('');
        CurrentWeekLessonsTest.find(".week-lesson-link").val('');



        CurrentWeekLessonsTest.find(".error").removeClass('error');


        $(this).parent().parent().parent().find('.weekLessonWrapper').append(CurrentWeekLessonsTest);



            let allInputs = $( ".week-card input" ).map( function() {
    
                
                if ($(this).val().length === 0) {
    
                    $(this).addClass('error');
                    $(this).removeClass('valid');
    
                } else {
        
                    $(this).addClass('valid');
                    $(this).removeClass('error');
        
                }
    
    
                let empty = $(this).closest('.week-card').find("input").filter(function() {
                    return this.value === "";
                });
    
    
                if(empty.length) {
    
                    $(this).closest('.week-card').find('.card-header').addClass('week-error');
                    $(this).closest('.week-card').find('.card-header').removeClass('week-valid');
                
                } else {
    
                    $(this).closest('.week-card').find('.card-header').addClass('week-valid');
                    $(this).closest('.week-card').find('.card-header').removeClass('week-error');
    
                }
    
    
            });
    
    
    


    

        stepsForm.refresh();

    });


    // Add Lesson URL

    $(document).on('keyup touchend input','.week-lesson-link', function(){

        let currentLessonUrl = $(this).val();
    
        $(this).parent().parent().find('.previewInputLink').attr("href", currentLessonUrl);

    });


    // on write on input


    $(document).on('change paste keyup', '.week-card input', function () {


        let allInputs = $( ".week-card input" ).map( function() {

            
            if ($(this).val().length === 0) {

                $(this).addClass('error');
                $(this).removeClass('valid');

            } else {
    
                $(this).addClass('valid');
                $(this).removeClass('error');
    
            }


            let empty = $(this).closest('.week-card').find("input").filter(function() {
                return this.value === "";
            });


            if(empty.length) {

                $(this).closest('.week-card').find('.card-header').addClass('week-error');
                $(this).closest('.week-card').find('.card-header').removeClass('week-valid');
            
            } else {

                $(this).closest('.week-card').find('.card-header').addClass('week-valid');
                $(this).closest('.week-card').find('.card-header').removeClass('week-error');

            }


        });



    });


    $(document).on('click', '.deleteWeekButton', function () {


            // var $newPanel = $template.clone();

            // $newPanel.find(".card-header").attr("id", "week_header_" + (--cardHeader))
            // $newPanel.find(".btn-link").attr("data-target", "#week_target_" + (--dataTarget))
            // $newPanel.find(".btn-link").attr("aria-controls", "week_target_" + (--ariaControls))
            // // $newPanel.find(".btn-link").text("Week #" + (--weekCounterText));
            // $newPanel.find(".week-content").attr("id", "week_target_" + (--weekContentId))
            // $newPanel.find(".week-content").attr("aria-labelledby", "week_header_" + (--ariaLabelledby))
    
    
            // //form inputs append
    
            // $newPanel.find(".week-name-title").attr("name", "weekName_" + (--weekTitle))
            // $newPanel.find(".week-lesson-name").attr("name", "LessonName_" + (--weekLessonName) + "[]")
            // $newPanel.find(".week-lesson-link").attr("name", "LessonLink_" + (--weekLessonLink) + "[]")
    
            // $newPanel.find(".addOtherLessonsContainer a").attr("class", "addOtherLessons_" + (--addMoreLesson))



            // alert 


            swal({
                title: 'Are you sure you want to delete this week?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.value) {
                  swal(
                    'Deleted!',
                    'This week has been deleted.',
                    'success'
                  )

                  $(this).parents('.week-card').remove();

                }
              })
    

            // numberOfWeeks--; //Decrement field counter
    
    
            stepsForm.refresh();



    });








    //select2


    $('.form-select-active').select2();

    $('.form-select-active').select2().change(function(){

        $(this).valid();

    });


    $('[data-toggle="tooltip"]').tooltip()


});
