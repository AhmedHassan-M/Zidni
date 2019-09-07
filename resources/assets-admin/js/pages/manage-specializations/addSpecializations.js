import '../../other/step-form-wizard.min';


$(document).ready(function () {

    let stepsForm
    const AddSpecializationsForm = $("#AddSpecializationsForm");
    const summernoteElement = $('#specializationsOverview');

    // $('#specializationsAddPrice').priceFormat();


    AddSpecializationsForm.on('sf-loaded', function () {
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


    $('.dropify').dropify({

        messages: {
            'default': 'Drag and drop a Specializations image here or click',
            'replace': 'Drag and drop or click to replace Specializations image',
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




    AddSpecializationsForm.validate({

        rules: {
            specializationsName: {
                required: true,
                minlength: 3,
                maxlength: 30

            },
            specializationsShortDescription: {

                required: true,
                minlength: 3,
                maxlength: 300
            },
            courseImage: {

                required: true,

            },
            specializationsPreviewVideo: {

                required: true,
                url: true

            },
            specializationsAddPrice: {

                required: true,
                number: true


            },
            specializationsTotalDuration: {
                required: true,
            },
            specializationsAddLanguage: {
                required: true,
            },
            "addSpecializationsCourses[]" :{

                required: true


            }

        },
        messages: {
            specializationsName: {
                required: "Specializations name is required"
            },
            specializationsShortDescription: {
                required: "Short description is required"
            },
            courseImage:{

                required: "Specializations image is required"


            },
            specializationsPreviewVideo: {

                required: "Preview video is required"

            },
            specializationsAddPrice: {

                required: "Price is required"

            },
            specializationsTotalDuration: {

                required: "Total duration is required"

            },
            specializationsAddLanguage: {

                required: "Language is required",

            },
            "addSpecializationsCourses[]" :{

                required: "Courses is required",


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

    stepsForm = AddSpecializationsForm.stepFormWizard({
        height: 'auto',
        theme: 'sun',
        showNavNumbers: true,
        transition: 'fade',
        finishBtn: finishCoursesForm,
        onNext: function () {
            var valid = AddSpecializationsForm.valid();

            if (summernoteElement.summernote('isEmpty')) {

                swal({


                    type: 'error',
                    title: 'Please type the overview for this Specializations',
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


            var valid = AddSpecializationsForm.valid();
            // if use height: 'auto' call refresh metod after validation, because validation can change content

            return valid;
            stepsForm.refresh();


        }
    });


     //select2


    $('.form-select-active').select2();

    $('.form-select-active').select2().change(function(){
        $(this).valid();
    });


});


