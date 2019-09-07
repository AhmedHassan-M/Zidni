


// ADMIN LOGIN


$("#adminSigninForm").validate({
    rules: {
        adminSigninEmail: {
            required: true,
            email: true
        },
        adminSigninPassword: {
            required: true,
            minlength: 5,
            maxlength: 20

        },
    },
    messages: {
        adminSigninEmail: {
            required: "E-Mail is required",
        },
        adminSigninPassword: {
            required: "Password is required",
            minlength: "Password must be at least 5 characters",
            remote: "Password must be no more than 20 characters"
        }
    },

    // SignUp Submit Handler
    submitHandler: function (form, e) {

        e.preventDefault();

        let adminSigninEmails = $("#adminSigninEmail").val();
        let adminSigninPasswords = $("#adminSigninPassword").val();
        
        var form = $('#adminSigninForm');
        $.ajax({
            type: "POST",
            url: "/login",
            data:form.serialize(),
            dataType:'json',
            beforeSend: function() {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function() {

            },
            success: function (data) {

                if(data == 1){
                    window.location.href = "/admin/home";
                    $('.ajax-loading').css('display', 'none');
                }else if(data == 'error'){


                    Swal({
                        type: 'error',
                        title: 'Something went wrong!',
                        text: 'Please check your email address and password and try again',
                    });

                    $('.ajax-loading').hide();





                }

               
            },
            error: function (data) {

                Swal({
                    type: 'error',
                    title: 'Something went wrong!',
                    text: 'Please check your email address and password and try again',
                });

                $('.ajax-loading').hide();
            

            },


        });


    }

});



// INSTRUCTOR LOGIN




$("#instructorSigninForm").validate({
    rules: {
        instructorSigninEmail: {
            required: true,
            email: true
        },
        instructorSigninPassword: {
            required: true,
            minlength: 5,
            maxlength: 20

        },
    },
    messages: {
        instructorSigninEmail: {
            required: "E-Mail is required",
        },
        instructorSigninPassword: {
            required: "Password is required",
            minlength: "Password must be at least 5 characters",
            remote: "Password must be no more than 20 characters"
        }
    },

    // SignUp Submit Handler
    submitHandler: function (form, e) {

        e.preventDefault();

        let instructorSigninEmails = $("#instructorSigninEmail").val();
        let instructorSigninPasswords = $("#instructorSigninPassword").val();
        
        var form = $('#instructorSigninForm');


        $.ajax({
            type: "POST",
            url: "/login",
            data:form.serialize(),
            dataType:'json',
            beforeSend: function() {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function() {

            },
            success: function (data) {

                if(data == 1){
                    window.location.href = "/instructor/home";
                    $('.ajax-loading').css('display', 'none');
                }else if(data == 'error'){


                    Swal({
                        type: 'error',
                        title: 'Something went wrong!',
                        text: 'Please check your email address and password and try again',
                    });

                    $('.ajax-loading').hide();

                }

               
            },
            error: function (data) {

                Swal({
                    type: 'error',
                    title: 'Something went wrong!',
                    text: 'Please check your email address and password and try again',
                });

                $('.ajax-loading').hide();
            
            },


        });


    }

});



// ADMIN

$('.forget-password-link a').on('click', function () {

    $('#all-admin-signin-data').css('display', 'none');

    $('#forget-password-admin-signin').css('display', 'block');


});

$('#forget-password-back').on('click', function () {

    $('#forget-password-admin-signin').css('display', 'none');

    $('#all-admin-signin-data').css('display', 'block');

});



// INSTRUCTOR



$('.instructor-forget-password-link a').on('click', function () {

    $('#all-instructor-signin-data').css('display', 'none');

    $('#forget-password-instructor-signin').css('display', 'block');


});

$('#instructor-forget-password-back').on('click', function () {

    $('#forget-password-instructor-signin').css('display', 'none');

    $('#all-instructor-signin-data').css('display', 'block');

});



// ADMIN

$('#adminShowPassword').on('click', function () {

    const adminShowPasswordInput = document.getElementById("adminSigninPassword");

    if (adminShowPasswordInput.type === "password") {
        $('#adminShowPassword').text("Hide password");
        adminShowPasswordInput.type = "text";
    } else {
        
        $('#adminShowPassword').text("Show password");
        adminShowPasswordInput.type = "password";
        
    }

});


// INSTRUCTOR


$('#instructorShowPassword').on('click', function () {

    const adminShowPasswordInput = document.getElementById("instructorSigninPassword");

    if (adminShowPasswordInput.type === "password") {
        $('#instructorShowPassword').text("Hide password");
        adminShowPasswordInput.type = "text";
    } else {
        
        $('#instructorShowPassword').text("Show password");
        adminShowPasswordInput.type = "password";
        
    }

});




//forget password validation


$("#forget-password-admin-signin").validate({
    rules: {
        adminForgetPasswordEmail: {
            required: true,
            email: true
        },
    },
    messages: {
        adminForgetPasswordEmail: {
            required: "E-Mail is required",
        }
    },

    // SignUp Submit Handler
    submitHandler: function (form, e) {

        let url = "path/to/your/script.php"; // the script where you handle the form input.

        let adminForgetPasswordEmail = $("#adminForgetPasswordEmail").val();

        $.ajax({
            type: "POST",
            url: url,
            beforeSend: function() {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function() {

                $('.ajax-loading').css('display', 'none');

            },
            success: function (data) {

                Swal('Hello world!')
               
            },
            error: function (data) {
                window.location.href = "/password-reset";
            },


        });

        e.preventDefault();

    }



});







$("#forget-password-instructor-signin").validate({
    rules: {
        instructorForgetPasswordEmail: {
            required: true,
            email: true
        },
    },
    messages: {
        instructorForgetPasswordEmail: {
            required: "E-Mail is required",
        }
    },

    // SignUp Submit Handler
    submitHandler: function (form, e) {

        let url = "path/to/your/script.php"; // the script where you handle the form input.

        let instructorForgetPasswordEmail = $("#instructorForgetPasswordEmail").val();

        $.ajax({
            type: "POST",
            url: url,
            beforeSend: function() {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function() {

                $('.ajax-loading').css('display', 'none');

            },
            success: function (data) {

                Swal('Hello world!')
               
            },
            error: function (data) {
                window.location.href = "/password-reset";
            },


        });

        e.preventDefault();

    }



});