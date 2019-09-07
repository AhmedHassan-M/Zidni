$("#addCategoryForm").validate({
    rules: {
        adminsCategory: {
            required: true,

        },
        adminsSubCategory: {
            required: false,
        },

    },
    messages: {
        adminsCategory: {
            required: "Category name is required",
        },
    },

    // SignUp Submit Handler
    submitHandler: function (form, e) {

        let url = "/admin/add-categories"; // the script where you handle the form input.



        let adminsCategory = $("#adminsCategory").val();
        let adminsSubCategory = $("#adminsSubCategory").val();
        e.preventDefault();
        var form = $('#addCategoryForm');
        $.ajax({
            type: "POST",
            url: url,
            data:form.serialize(),
            dataType:'json',
            beforeSend: function() {

                $('.ajax-loading').css('display', 'block');

            },
            complete: function() {

                $('.ajax-loading').css('display', 'none');

            },
            success: function (data) {
                if(data  == 'category added successfully'){
                    Swal({
                        title: "Successfully added " + adminsCategory + " to Categories",
                        type: 'success',
                        animation: true,
                        showCancelButton: true,
                        confirmButtonText: 'See All Categories',
                        cancelButtonText: 'Add Other Categories',
                        confirmButtonClass : 'zidni-confirm',
                        cancelButtonClass: 'zidni-cancel',
                        allowOutsideClick: true,
                        allowEscapeKey: true,
                        width: '60rem',
                        customClass: 'welcomeAlertMessage'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "/admin/all-categories";
                        } else {

                            let adminsCategory = $("#adminsCategory").val('');
                            let adminsSubCategory = $("#adminsSubCategory").val('');

                        }
                    });
                }else{
                    Swal({
                        title: data,
                        type: 'success',
                        animation: true,
                        showCancelButton: true,
                        confirmButtonText: 'See All Categories',
                        cancelButtonText: 'Add Other Categories',
                        confirmButtonClass : 'zidni-confirm',
                        cancelButtonClass: 'zidni-cancel',
                        allowOutsideClick: true,
                        allowEscapeKey: true,
                        width: '60rem',
                        customClass: 'welcomeAlertMessage'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "/admin/all-categories";
                        } else {

                            let adminsCategory = $("#adminsCategory").val('');
                            let adminsSubCategory = $("#adminsSubCategory").val('');

                        }
                    });
                }
                
               
            },
            error: function (data) {

                console.log('error');

            },


        });


    }



});

