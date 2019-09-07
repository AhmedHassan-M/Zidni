$("#addAdminsForm").validate({
    rules: {
        adminsFullName: {
            required: true,

        },
        adminsEmail: {
            required: true,
            email: true

        },
        adminsPassword: {
            required: true,
            minlength: 5,
            maxlength: 20

        },
        adminsRetypePassword: {
            required: true,
            minlength: 5,
            maxlength: 20,
            equalTo: "#adminsPassword"

        },
        adminsRoles: {
            required: true

        },
        newRole: {
            required: true,
            minlength: 1
        }
    },
    messages: {
        adminsFullName: {
            required: "Enter Admin FullName",
        },

        adminsRetypePassword: {
            required: "Password is required",
            minlength: "Password must be at least 5 characters",
            remote: "Password must be no more than 20 characters"
        },
        adminsPassword: {
            required: "Password is required",
            minlength: "Password must be at least 5 characters",
            remote: "Password must be no more than 20 characters"
        },
        adminsRoles: {
            required: "Enter Admin Role",
        },
        newRole: "Choose at least one role"

    },

    // SignUp Submit Handler
    submitHandler: function (form, e) {

        let url = "path/to/your/script.php"; // the script where you handle the form input.

        let adminsFullName = $("#adminsFullName").val();
        let adminsEmail = $("#adminsEmail").val();
        let adminsPassword = $("#adminsPassword").val();
        let adminsRetypePassword = $("#adminsRetypePassword").val();
        let adminsRoles = $("#adminsRoles").val();

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

                
               
            },
            error: function (data) {

                Swal({
                    title: "Successfully added " + adminsFullName + " as " + adminsRoles + " to Zidni institute ",
                    imageUrl: '/images/zidni-logo-1.png',
                    imageWidth: 150,
                    imageHeight: 150,
                    imageAlt: 'Zidni Logo',
                    animation: true,
                    showCancelButton: false,
                    confirmButtonColor: '#f1dd7e',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'See All Admins',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    width: '60rem',
                    customClass: 'welcomeAlertMessage'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "/admin/all-admins";
                    }
                });

            },


        });

        e.preventDefault();

    }



});



$('#newAdminShowPassword').on('click', function () {

    const newAdminShowPassword = document.getElementById("adminsPassword");

    if (newAdminShowPassword.type === "password") {
        $('#newAdminShowPassword').text("Hide password");
        newAdminShowPassword.type = "text";
    } else {
        
        $('#newAdminShowPassword').text("Show password");
        newAdminShowPassword.type = "password";
        
    }

});
