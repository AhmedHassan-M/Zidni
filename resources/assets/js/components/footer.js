
$("#subscribeForm").validate({
    rules: {
        subscribeInput: {
            required: true,
            email: true
        }
    },
    messages: {
        subscribeInput: {
            required: "E-Mail is required",
        },
    },

    // SignUp Submit Handler
    submitHandler: function (form, e) {


        let subscribeInput = $("#subscribeInput").val();

        $.ajax({
            type: "POST",
            url: url,
            beforeSend: function() {


            },
            complete: function() {


            },
            success: function (data) {

                Swal('Hello world!');
               
            },
            error: function (data) {


                Swal('Hello world!');
            

            },


        });

        e.preventDefault();

    }



});
