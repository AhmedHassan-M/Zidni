
$('#signinModalButton').on('click', function (e) {
    e.preventDefault()
    $('#signinPill a[href="#pills-signin"]').tab('show') // Select tab by name
});

$('#signupModalButton').on('click', function (e) {
    e.preventDefault()
    $('#signupPill a[href="#pills-signup"]').tab('show') // Select tab by name
});



// SignUp Form Validation


$("#signupForm").validate({
    rules: {
        signupName: {
            required: true,
            minlength: 3,
            maxlength: 20
        },
        signupEmail: {
            required: true,
            email: true


        },
        signupPassword: {
            required: true,
            minlength: 5,
            maxlength: 20
        }
    },
    messages: {
        signupName: {
            required: "Full name is required",
            minlength: "Full name must be at least 3 characters",
            remote: "Full name must be no more than 20 characters"
        },
        signupEmail: {
            required: "E-Mail is required",
        },
        signupPassword: {
            required: "Password is required",
            minlength: "Password must be at least 5 characters",
            remote: "Password must be no more than 20 characters"
        }
    },

    // SignUp Submit Handler
    submitHandler: function (form, e) {

        
        let signupUserName = $("#signupName").val();
        let signipEmail = $("#signupEmail").val();
        let signipPassword = $("#signupPassword").val();

        console.log(signupUserName);
        
        $.ajax({
            type: "POST",
            url: "/api/register",
            data:{register:'register',signupName:signupUserName, signupEmail:signipEmail, signupPassword:signipPassword},
            dataType:'json',
            beforeSend: function() {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function() {

                $('.ajax-loading').css('display', 'none');

            },

            success: function (data) {

                if(data == "true"){
                    $('#registrationModal').remove();

                
                    Swal({
                        title: "Welcome " + signupUserName + " to Zidni institute ",
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
                            window.location.href = "/";
                        }
                    });

                    $("body").css('padding-right', '0px');


                    
                }else if(data == "exist"){

                    $("body").css('padding-right', '0px');


                    Swal({
                        type: 'error',
                        title: 'Something went wrong!',
                        text: 'This user already exists, please choose another email',
                    });
    

                }
               
            },
            error: function (data) {


                console.log('error');

            },


        });

        e.preventDefault();

    }



});






// Signin Form Validation

$("#signinForm").validate({
    rules: {
        signinEmail: {
            required: true,
            email: true


        },
        signinPassword: {
            required: true,
            minlength: 5,
            maxlength: 20
        }
    },
    messages: {
        signinEmail: {
            required: "E-Mail is required",
        },
        signinPassword: {
            required: "Password is required",
            minlength: "Password must be at least 5 characters",
            remote: "Password must be no more than 20 characters"
        }
    },

    // SignUp Submit Handler
    submitHandler: function (form, e) {


            let signinEmails = $("#signinEmail").val();
            let signinPasswords = $("#signinPassword").val();
               
              e.preventDefault();
              var form = $('#signinForm');
              $.ajax({
                  type: "POST",
                  url: "/login",
                 // data:{login:'login',signinEmail:signinEmails, signinPassword:signinPasswords},
                  data:form.serialize(),
                  dataType:'json',
                  beforeSend: function() {

                      $('.ajax-loading').css('display', 'block');

                  },
                  complete: function() {

                      $('.ajax-loading').css('display', 'none');

                  },

                  success: function (data) {
                    if(data == "0"){
                        console.log(data);
                        $('#registrationModal').remove();

                        $("body").css('padding-right', '0px');

                        window.location.href = "/";
                    }else if(data == "1"){
                        window.location.href = "/admin/home";
                    }else{


                        Swal({
                            type: 'error',
                            title: 'Something went wrong!',
                            text: 'Please check your email address and password and try again',
                        });
        
                    }
                     
                  },
                  error: function (data) {

                    Swal({
                        type: 'error',
                        title: 'Something went wrong!',
                        text: 'Please check your email address and password and try again',
                    });
    
                     
                  },


              });
           // e.preventDefault();

    }



});



//forget password form


$('.forget-password-link a').on('click', function () {

    $('#all-signin-data').css('display', 'none');

    $('#forget-password-signin').css('display', 'block');


});

$('#forget-password-back').on('click', function () {

    $('#forget-password-signin').css('display', 'none');

    $('#all-signin-data').css('display', 'block');

});


//Show and hide password



$('#showPassword').on('click', function () {

    const showPasswordInput = document.getElementById("signinPassword");

    if (showPasswordInput.type === "password") {
        $('#showPassword').text("Hide password");
        showPasswordInput.type = "text";
    } else {
        
        $('#showPassword').text("Show password");
        showPasswordInput.type = "password";
        
    }

});


//forget password validation


$("#forget-password-signin").validate({
    rules: {
        forgetPasswordEmail: {
            required: true,
            email: true
        },
    },
    messages: {
        forgetPasswordEmail: {
            required: "E-Mail is required",
        }
    },

    // SignUp Submit Handler
    submitHandler: function (form, e) {


        let forgetPasswordEmail = $("#forgetPasswordEmail").val();
        console.log(forgetPasswordEmail);
        var form = $('#forget-password-signin');
        $.ajax({
            type: "POST",
            url: "/forget_user",
            data:form.serialize(),
            dataType:'json',
            beforeSend: function() {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function() {

                $('.ajax-loading').css('display', 'none');

            },
            success: function (data) {
                console.log(data);

                if(data == 1){
                    // $('#registrationModal').remove();

                    $("body").css('padding-right', '0px');

                    window.location.href = "/password-reset";


                }else if(data == 0){
                    $('.forget-password-container').html('<li id="last" class="alert alert-danger" ><b>Email is not available</b></li>');
                    $(".alert").fadeOut(5000);
                }
               
            },
            error: function (data) {

                console.log('error');
            },


        });

        e.preventDefault();

    }



});



$("#resetPasswordForm").validate({
    rules: {
        resetCode: {
            required: true,
            digits: true
        },
        resetPassword: {
            required: true,
            minlength: 5,
            maxlength: 20

        },
        confirmResetPassword: {
            required: true,
            minlength: 5,
            maxlength: 20,
            equalTo: "#resetPassword"
        }
    },
    messages: {
        resetCode: {
            required: "Reset code is required",
        },
        resetPassword: {
            required: "Password is required",
            minlength: "Password must be at least 5 characters",
            remote: "Password must be no more than 20 characters"
        },
        confirmResetPassword: {
            required: "Password is required",
            minlength: "Password must be at least 5 characters",
            remote: "Password must be no more than 20 characters",
        }
    },

    // Reset Submit Handler
    submitHandler: function (form, e) {


        let resetCode = $("#resetCode").val();
        let resetPassword = $("#resetPassword").val();
        let confirmResetPassword = $("#confirmResetPassword").val();

        var form = $('#resetPasswordForm');
        $.ajax({
            type: "POST",
            url: '/forget_user_step2',
            data:form.serialize(),
            dataType:'json',
            beforeSend: function() {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function() {

                $('.ajax-loading').css('display', 'none');

            },
            success: function (data) {
                console.log(data);

                if(data == 1){

                   $('#resetPasswordForm').remove();

                    Swal({
                        title: "Password reset sucssesfuly",
                        text: 'Your password has been changed successfully',
                        imageUrl: 'http://placehold.it/150x150',
                        imageWidth: 150,
                        imageHeight: 150,
                        imageAlt: 'Zidni Logo',
                        animation: true,
                        showCancelButton: false,
                        confirmButtonColor: '#f1dd7e',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'HOME PAGE',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        width: '60rem',
                        customClass: 'welcomeAlertMessage'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "/";
                        }
                    });

                    $("body").css('padding-right', '0px');

                }else if(data == 0){
                    $('.resetPasswordForm').html('<li id="last" class="alert alert-danger" ><b>Reset code you entered is incorrect</b></li>');
                    $(".alert").fadeOut(5000);
                }
               
            },
            error: function (data) {

                console.log('error')
                

            },


        });

        e.preventDefault();

    }



});


