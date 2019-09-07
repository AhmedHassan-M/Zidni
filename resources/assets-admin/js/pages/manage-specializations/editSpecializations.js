

$(document).ready(function () { 

    const EditSpecializationsForm = $("#EditSpecializationsForm");
    const summernoteElement = $('#editSpecializationsOverview');

    // $('#editSpecializationsAddPrice').priceFormat();


    //select2


    $('.form-select-active').select2();

    $('.form-select-active').select2().change(function(){
        $(this).valid();
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



    EditSpecializationsForm.validate({

        ignore: ":hidden:not(.validate)",
        rules: {
            editSpecializationsName: {
                required: true,
                minlength: 3,
                maxlength: 30

            },
            editSpecializationsShortDescription: {

                required: true,
                minlength: 3,
                maxlength: 300
            },
            editSpecializationsPreviewVideo: {

                required: true,
                url: true

            },
            editSpecializationsAddPrice: {

                required: true,
                number: true


            },
            editSpecializationsTotalDuration: {
                required: true,
            },
            editSpecializationsAddLanguage: {
                required: true,
            },
            "editAddSpecializationsCourses[]" :{

                required: true,

            }

        },
        messages: {
            editSpecializationsName: {
                required: "Course name is required"
            },
            editSpecializationsShortDescription: {
                required: "Short description is required"
            },
            editSpecializationsPreviewVideo: {

                required: "Preview video is required"

            },
            editSpecializationsAddPrice: {

                required: "Price is required"

            },
            editSpecializationsTotalDuration: {

                required: "Total duration is required"

            },
            editSpecializationsAddLanguage: {

                required: "Language is required",

            },
            "editAddSpecializationsCourses[]" :{

                required: "Specializations is required"

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


    function SubmitForm()
    {
        if (EditSpecializationsForm.valid()){


        console.log("valid")
        return true;


        } else {    

            swal({


                type: 'error',
                title: 'Please Complete Specializations Missing Data',
                showConfirmButton: false,
                timer: 3000


            });
        
            return false;


        }
    }


    EditSpecializationsForm.submit(function(e){


        SubmitForm()

    });


});