

$(document).ready(function () { 

    const EditMasterForm = $("#EditMasterForm");
    const summernoteElement = $('#editMasterOverview');

    // $('#editMasterAddPrice').priceFormat();


    //select2


    $('.form-select-active').select2();

    $('.form-select-active').select2().change(function(){
        $(this).valid();
    });




    $('.dropify').dropify({




        messages: {
            'default': 'Drag and drop a Master image here or click',
            'replace': 'Drag and drop or click to replace Master image',
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



    EditMasterForm.validate({
        ignore: ":hidden:not(.validate)",
        rules: {
            editMasterName: {
                required: true,
                minlength: 3,
                maxlength: 30

            },
            editMasterShortDescription: {

                required: true,
                minlength: 3,
                maxlength: 300
            },
            editMasterPreviewVideo: {

                required: true,
                url: true

            },
            editMasterAddPrice: {

                required: true,
                number: true


            },
            editMasterTotalDuration: {
                required: true,
            },
            editMasterAddLanguage: {
                required: true,
            },
            "editAddMasterCourses[]" :{

                required: true,


            }

        },
        messages: {
            editMasterName: {
                required: "Course name is required"
            },
            editMasterShortDescription: {
                required: "Short description is required"
            },
            editMasterPreviewVideo: {

                required: "Preview video is required"

            },
            editMasterAddPrice: {

                required: "Price is required"

            },
            editMasterTotalDuration: {

                required: "Total duration is required"

            },
            editMasterAddLanguage: {

                required: "Language is required",

            },
            "editAddMasterCourses[]" :{

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



    function SubmitForm()
    {
        if (EditMasterForm.valid()){


        console.log("valid")
        return true;


        } else {    

            swal({


                type: 'error',
                title: 'Please Complete Master Degree Missing Data',
                showConfirmButton: false,
                timer: 3000


            });
        
            return false;


        }
    }


    EditMasterForm.submit(function(e){


        SubmitForm()

    });


});