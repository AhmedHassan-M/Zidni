
import PerfectScrollbar from 'perfect-scrollbar';


$("#editAccountForm").validate({
    rules: {
        editAccountFristName: {
            required: true,
            minlength: 3,
            maxlength: 20
        },
        editAccountLastName: {
            required: true,
            minlength: 3,
            maxlength: 20
        },
        editAccountEmail: {
            required: true,
            email: true
        },
        editAccountCurrentPassword: {
            minlength: 3,
            maxlength: 20
        },
        editAccountNewPassword:{

            minlength: 3,
            maxlength: 20

        },
        editAccountConfirmPassword:{

            
            minlength: 3,
            maxlength: 20,
            equalTo: "#editAccountNewPassword"

        }
    },
    messages: {
        editAccountFristName: {
            required: "Frist Name is required",
            minlength: "Frist Name must be at least 3 characters",
            maxlength: "Frist Name must be no more than 20 characters"
        },
        editAccountLastName: {
            required: "Last Name is required",
            minlength: "Last Name must be at least 3 characters",
            maxlength: "Last Name must be no more than 20 characters"
        },
        editAccountEmail: {
            required: "E-Mail is required",
        },
        editAccountCurrentPassword: {
            minlength: "Password must be at least 5 characters",
            maxlength: "Password must be no more than 20 characters"
        },
        editAccountNewPassword:{

            minlength: "Password must be at least 5 characters",
            maxlength: "Password must be no more than 20 characters"

        },
        editAccountConfirmPassword:{

            minlength: "Password must be at least 5 characters",
            maxlength: "Password must be no more than 20 characters"
        }
    },

    // account Submit Handler
    submitHandler: function (form, e) {

        let url = "/api/profile"; // the script where you handle the form input.

        let editAccountFristNames = $("#editAccountFristName").val();
        let editAccountLastNames = $("#editAccountLastName").val();
        let editAccountEmail = $("#editAccountEmail").val();

        let userId = $("#user_id").val();
        let editAccountCurrentPasswords = $("#editAccountCurrentPassword").val();
        let editAccountNewPasswords = $("#editAccountNewPassword").val();
        let editAccountConfirmPasswords = $("#editAccountConfirmPassword").val();

        $.ajax({
            type: "POST",
            url: url,
            data:{editAccountFristName:editAccountFristNames,editAccountLastName:editAccountLastNames,id:userId,editAccountCurrentPassword:editAccountCurrentPasswords,editAccountNewPassword:editAccountNewPasswords,

            },
            beforeSend: function() {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function() {

                $('.ajax-loading').css('display', 'none');

            },
            success: function (data) {
                console.log(data);
                if(data == "success"){
                  
                    Swal({
                            title: "Welcome to Zidni institute ",
                            text: 'An Accredited Branch of the Islamic University of Minnesota',
                            imageUrl: 'http://placehold.it/150x150',
                            imageWidth: 150,
                            imageHeight: 150,
                            imageAlt: 'Zidni Logo',
                            animation: true,
                            showCancelButton: false,
                            confirmButtonColor: '#f1dd7e',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'START LEARNING',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            width: '60rem',
                            customClass: 'welcomeAlertMessage'
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = "http://localhost:8000/profile";
                            }
                        });

                        $("body").css('padding-right', '0px');

                }else if(data == "failure"){
                    $('#msgs').html('<li id="last" class="alert alert-danger" ><b>The current password you entered is incorrect</b></li>');
                    $(".alert").fadeOut(6000);
                }
               
            },
            error: function (data) {

                
                console.log('error');
            },


        });

        e.preventDefault();

    }



});


$("#changeEmailForm").validate({
    rules: {
        changeEmailNew: {
            required: true,
            email: true
        },
        changeEmailPassword: {
            required: true,
            minlength: 5,
            maxlength: 20

        },
    },
    messages: {
        changeEmailNew: {
            required: "E-Mail is required",
        },
        changeEmailPassword: {
            required: "Password is required",
            minlength: "Password must be at least 5 characters",
            remote: "Password must be no more than 20 characters"
        }
    },

    // change email Submit Handler
    submitHandler: function (form, e) {

        let url = "/api/profile_email"; // the script where you handle the form input.

        let changeEmailNews = $("#changeEmailNew").val();
        let changeEmailPasswords = $("#changeEmailPassword").val();
        let userId = $("#user_ids").val();

        $.ajax({
            type: "POST",
            url: url,
            data:{id:userId, changeEmailNew: changeEmailNews, changeEmailPassword: changeEmailPasswords},
            beforeSend: function() {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function() {

                $('.ajax-loading').css('display', 'none');

            },
            success: function (data) {
                console.log(data)
                Swal({
                    title: "Welcome to Zidni institute ",
                    text: 'An Accredited Branch of the Islamic University of Minnesota',
                    imageUrl: 'http://placehold.it/150x150',
                    imageWidth: 150,
                    imageHeight: 150,
                    imageAlt: 'Zidni Logo',
                    animation: true,
                    showCancelButton: false,
                    confirmButtonColor: '#f1dd7e',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'START LEARNING',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    width: '60rem',
                    customClass: 'welcomeAlertMessage'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "http://localhost:8000/profile";
                    }
                });

                $("body").css('padding-right', '0px');
               
            },
            error: function (data) {

                console.log('error')

            },


        });

        e.preventDefault();

    }



});



// image upload




$('.dropify').dropify({

    messages: {
        'default': 'Drag and drop a profile image here or click',
        'replace': 'Drag and drop or click to replace your profile image',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.',
        'test':    'Your image should be at minimum 200x200 pixels and maximum 6000x6000 pixels'
        
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



// messages 


const psMessages = new PerfectScrollbar('#messages-container');

psMessages.update();


// Notifaction



$("#notificationsForm").validate({


    // change email Submit Handler
    submitHandler: function (form, e) {

        let url = "/api/profile_notifications"; // the script where you handle the form input.

        let sendMeNotifications = $("#sendMeNotifications").val();
        let dontSendMeNotifications = $("#dontSendMeNotifications").val();

        $('#notificationsForm input').on('change', function() {

            let seletedOption = $('input[name=notificationsControl]:checked', '#notificationsForm').val()

        });


        $.ajax({
            type: "POST",
            url: url,
            data:{},
            beforeSend: function() {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function() {

                $('.ajax-loading').css('display', 'none');

            },
            success: function (data) {
                console.log(data)               
            },
            error: function (data) {

                console.log('error')


                let seletedOption = $('input[name=notificationsControl]:checked', '#notificationsForm').val()

                if (seletedOption == 1){



                    Swal({
                        title: "Done",
                        text: 'Zidni will send you notifications about new lectures ،live classes ، instructor answers ، grades published',
                        imageUrl: 'http://placehold.it/150x150',
                        imageWidth: 150,
                        imageHeight: 150,
                        imageAlt: 'Zidni Logo',
                        animation: true,
                        showCancelButton: false,
                        confirmButtonColor: '#f1dd7e',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Great',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        width: '60rem',
                        customClass: 'welcomeAlertMessage'
                    }).then((result) => {
                        if (result.value) {
                        }
                    });
    
                    $("body").css('padding-right', '0px');




                } else {


                    Swal({
                        title: "Done",
                        text: 'Zidni will no longer send you notifications',
                        imageUrl: 'http://placehold.it/150x150',
                        imageWidth: 150,
                        imageHeight: 150,
                        imageAlt: 'Zidni Logo',
                        animation: true,
                        showCancelButton: false,
                        confirmButtonColor: '#f1dd7e',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Great',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        width: '60rem',
                        customClass: 'welcomeAlertMessage'
                    }).then((result) => {
                        if (result.value) {
                        }
                    });
    
                    $("body").css('padding-right', '0px');



                }

            },


        });

        e.preventDefault();

    }



});



const hash = window.location.hash;

hash && $('.hash-controler .nav-link[href="' + hash + '"]').tab('show');

$('#profile-page-links .nav-link').click(function (e) {
  $(this).tab('show');
//   const scrollmem = $('body').animate({ scrollTop: 150 }, 600);
  window.location.hash = this.hash;
//   $('html,body').scrollTop(scrollmem);
});


$(window).on('load', function() { // makes sure the whole site is loaded 
    $('#status').fadeOut(); // will first fade out the loading animation 
    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
    $('body').delay(350).css({'overflow':'visible'});
});


$('.account-link a').click(function() {
    location.reload();
});


$('.notifications-sittings a').click(function() {
    location.reload();
});


  