
$(document).ready(function () {

    let addInstructorsForm = $('#addInstructorsForm')

    addInstructorsForm.validate({
        rules: {
            instructorsFullName: {
                required: true,
    
            },
            instructorsOverview: {
                required: true,
                minlength: 5,
                maxlength: 1000
    
            },
            instructorsPhoto: {

                required: true,

            },
            instructorsFacebook:{

                url: true

            },
            instructorsTwitter: {

                url: true

            },
            instructorsLinkedin: {

                url: true

            }
        },
        messages: {
            instructorsFullName: {
                required: "Instructors FullName is required",
            },
    
            instructorsOverview: {
                required: "Instructors Overview is required",
            },
            instructorsPhoto: {
                required: "instructors Photo is required",
            },
        },
    
        // SignUp Submit Handler
        submitHandler: function (form, e) {
    
            let url = "path/to/your/script.php"; // the script where you handle the form input.
    
            let instructorsFullName = $("#instructorsFullName").val();
            let instructorsOverview = $("#instructorsOverview").val();
            let instructorsPhoto = $('#instructorsPhoto').prop('files')[0];
            let instructorsFacebook = $("#instructorsFacebook").val();
            let instructorsTwitter = $("#instructorsTwitter").val();
            let instructorsLinkedin = $("#instructorsLinkedin").val();

            e.preventDefault();
            let instructorForm = $('.instructor-form');

            var form_data = new FormData();
            form_data.append('fullname', instructorsFullName);
            form_data.append('overview', instructorsOverview);
            form_data.append('photo', instructorsPhoto);
            form_data.append('fb', instructorsFacebook);
            form_data.append('twit', instructorsTwitter);
            form_data.append('ln', instructorsLinkedin);
    
            $.ajax({
                type: "POST",
                url: "/admin/add-instructors",
                data: form_data,
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,
                beforeSend: function() {
    
                    $('.ajax-loading').css('display', 'block');
    
                },
                complete: function() {
    
                    $('.ajax-loading').css('display', 'none');
    
                },
                success: function (data) {
                    console.log(data);

                    Swal({
                        title: "Successfully added " + instructorsFullName + " to Zidni Instructors ",
                        imageUrl: '/images/zidni-logo-1.png',
                        imageWidth: 150,
                        imageHeight: 150,
                        imageAlt: 'Zidni Logo',
                        animation: true,
                        showCancelButton: false,
                        confirmButtonColor: '#f1dd7e',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'See All Instructors',
                        allowOutsideClick: true,
                        allowEscapeKey: true,
                        width: '60rem',
                        customClass: 'welcomeAlertMessage'
                    }).then((result) => {
                        if (result.value) {
                            
                            window.location.href = "/admin/all-instructors";


                        }else{
                            let instructorsFullName = $("#instructorsFullName").val('');
                            let instructorsOverview = $("#instructorsOverview").val('');
                            $('.dropify-clear').click();
                            let instructorsFacebook = $("#instructorsFacebook").val('');
                            let instructorsTwitter = $("#instructorsTwitter").val('');
                            let instructorsLinkedin = $("#instructorsLinkedin").val('');
                        }
                    });
                },
                error: function (data) {
    
                    
    
                },
    
    
            });
    
            e.preventDefault();
    
        }
    
    
    
    });

    $('.dropify').dropify({

        messages: {
            'default': 'Drag and drop a instructor image here or click',
            'replace': 'Drag and drop or click to replace instructor image',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.',
            'test':    'Your image should be at minimum 200x200 pixels and maximum 1000x1000 pixels'
            
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
    

});






