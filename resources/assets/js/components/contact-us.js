$(document).ready(function () {

    // Signin Form Validation

    $(".contactus-form").validate({


        rules: {

            contactusName: {
                required: true
            },

            contactusEmail: {
                required: true,
                email: true
            },
            contactusMessage: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            contactusName: {
                required: "Name is required",
            },
            contactusEmail: {
                required: "E-Mail is required",
            },
            contactusMessage: {
                required: "Message is required",
                minlength: "Message must be at least 5 characters"
            }
        },

        // SignUp Submit Handler
        submitHandler: function (form, e) {


            let contactusName = $("#contactusName").val();
            let contactusEmail = $("#contactusEmail").val();
            let contactusMessage = $("#contactusMessage").val();

            e.preventDefault();
            let contactusForm = $('.contactus-form');
            $.ajax({
                type: "POST",
                url: "/contact-us",
                data: contactusForm.serialize(),
                dataType: 'json',
                beforeSend: function () {

                    $('.ajax-loading').css('display', 'block');

                },
                complete: function () {

                    $('.ajax-loading').css('display', 'none');

                },

                success: function (data) {
                    console.log(data);
                    swal({
                        title: "Thanks " + contactusName + " for contacting us",
                        text: "we will follow with you very soon",
                        type: 'success',
                        showConfirmButton: true,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continue',
                        showCancelButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then((result) => {
                        if (result.value) {
                            let contactusName = $("#contactusName").val('');
                            let contactusEmail = $("#contactusEmail").val('');
                            let contactusMessage = $("#contactusMessage").val('');
                        }
                    })
                },
                error: function (data) {
                    

                },


            });
            // e.preventDefault();

        }



    });

});