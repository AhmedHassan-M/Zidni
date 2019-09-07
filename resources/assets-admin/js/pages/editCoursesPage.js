

$(document).ready(function () { 

    const EditCoursesForm = $("#EditCoursesForm");
    const summernoteElement = $('#Overview');

    // $('#addPrice').priceFormat();


    //select2


    $('.form-select-active').select2();

    $('.form-select-active').select2().change(function(){
        $(this).valid();
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



    


    EditCoursesForm.validate({
        ignore: ":hidden:not(.validate)",
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
            previewVideo: {

                required: true,
                url: true

            },
            courseImage: {

                required: false,

            },
            addPrice: {

                required: true,
                number: true

            },
            totalDuration: {
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
            previewVideo: {

                required: "Preview video is required"

            },
            courseImage:{

                required: "Course image is required"


            },
            addPrice: {

                required: "Price is required"

            },
            totalDuration: {

                required: "Total duration is required"

            },
            addLanguage: {

                required: "Language is required",

            }

        }


    });

    $(".EditCoursesFormSubmit button").click(function() {

        if (EditCoursesForm.valid() == false ) {

            swal({


                type: 'error',
                title: 'Please Complete Course Info',
                showConfirmButton: false,
                timer: 3000


            });
            
        }
    
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



    var $template = $(".week-card:first");

    let cardHeader = 6;
    let dataTarget = 6;
    let ariaControls = 6;
    let weekContentId = 6;
    let ariaLabelledby = 6;
    let weekCounterText = 6;


    // form inputs


    let weekTitle = 6;
    let weekLessonName = 6;
    let weekLessonLink = 6;

    let addMoreLesson = 6;


    //limit the weeks


    let numberOfWeeks = 6;


    let maxNumberOfWeeks = 12; //Input fields increment limitation

    // Start Append


    const weeksWrapper = $('.weekLessonWrapper');


    let lastWeekCount = parseFloat($('.week-card').last().data('week'));


    // counter for weeks

    let formWeekCounter = $(".week-card").length

    $("#formWeekCounter").val(formWeekCounter);

    console.log(formWeekCounter);




    $(".addMoreWeeks").on("click", function () {


            lastWeekCount++; //Increment field counter


        
            var $newPanel = $template.clone();

            $newPanel.attr("data-week", (lastWeekCount))


            $newPanel.find(".card-header").attr("id", "week_header_" + (lastWeekCount))
            $newPanel.find(".btn-link").attr("data-target", "#week_target_" + (lastWeekCount))
            $newPanel.find(".btn-link").attr("aria-controls", "week_target_" + (lastWeekCount))
            // $newPanel.find(".btn-link").text("Week #" + (++weekCounterText));
            $newPanel.find(".week-content").attr("id", "week_target_" + (lastWeekCount))
            $newPanel.find(".week-content").attr("aria-labelledby", "week_header_" + (lastWeekCount))
    
    
            //form inputs append
    
            $newPanel.find(".week-name-title").attr("name", "weekName_" + (lastWeekCount))
            $newPanel.find(".week-lesson-name").attr("name", "LessonName_" + (lastWeekCount) + "[]")
            $newPanel.find(".week-lesson-link").attr("name", "LessonLink_" + (lastWeekCount) + "[]")

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
    

            $('[data-toggle="tooltip"]').tooltip()


    
            $("#accordion").append($newPanel.fadeIn());

            $('[data-toggle="tooltip"]').tooltip()



            // counter for weeks

            let formWeekCounter = $(".week-card").length

            $("#formWeekCounter").val(formWeekCounter);

            console.log(formWeekCounter);

            


    });










    // update the week names

    $(document).on('click', '.courseLessonsNavContainer', function () {


        let currentWeekName = $('.weekNameContainer input').val();

        $('.weekNameContainer input').parent().parent().parent().parent().parent().find('.btn-link span').html(currentWeekName);


    });



    // keyup traker

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
    
    


    // Add Exist Lesson URL

    $(document).on('click','.previewInputLink', function(){

        let ExistLessonUrl = $(this).parent().find('.week-lesson-link').val()
    
        $(this).attr("href", ExistLessonUrl);

    });




    // Add More Lessons


    $(document).on('click','.addOtherLessonsButton', function(){

        let CurrentWeekLessonsTest = $(this).parent().parent().parent().find('.weekLessonContainer:first').clone();

        CurrentWeekLessonsTest.find(".week-lesson-name").val('');
        CurrentWeekLessonsTest.find(".week-lesson-link").val('');

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


                    // counter for weeks

                    let formWeekCounter = $(".week-card").length

                    $("#formWeekCounter").val(formWeekCounter);

                    console.log(formWeekCounter);

            }
        })

    });


    $('[data-toggle="tooltip"]').tooltip()



    $("#EditCoursesForm").submit(function(e){


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

            }
        });



    });



});



