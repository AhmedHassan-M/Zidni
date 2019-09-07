$(document).ready(function () {

    $("#add-new-role").validate({

        rules: {

            newRoleName: {
                required: true
            },
            newRole: {
                required: true,
                minlength: 1
            }
        },
        messages: {
            newRoleName: "RoleName is required",
            newRole: "Choose at least one role"
        }


    });


});


