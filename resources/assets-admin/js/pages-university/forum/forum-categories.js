const tableID = '#allForumCategoriesTable';

const allForumCategoriesTable = $(tableID);

allForumCategoriesTable.DataTable({
    "dom": "<'row'<'col-md-6 tabel-option'B><'col-md-6 tabel-search'f><'col-md-6 table-info'i><'col-md-6 table-lenght'l>>" +
    "<'row'<'col-md-12 table-container't>><'row'<'col-md-12 table-pag'p>>",
    "paging": true,
    "ordering": true,
    "autoWidth": true,
    responsive: false,
    "scrollX": true,
    buttons: [


        {
            extend: 'collection',
            text: 'All Categories Options',


            buttons: [
                {
                    extend: 'selectAll',
                    text: 'Select All Categories'
                },
                {
                    extend: 'selectNone',
                    text: 'Unselect All Categories'
                },
            ]
        }
    ],
    columnDefs: [
        {
        orderable: false,
        className: 'select-checkbox',
        targets: 0,
        "width": "5%"
        },
        {
            targets: 3,
            "width": "15%"
        }

],
    select: {
        style: 'multi',
        selector: 'td:first-child'
    },
    order: [[1, 'desc']]
});



    $(tableID + ' tbody').on( 'mouseover', 'tr', function () {

        $(this).addClass( 'highlight' );
        $(this).find('.options-container a').removeClass( 'hide-options' );
        $(this).find('.options-container a').addClass( 'show-options' );


    }).on( 'mouseleave', 'tr', function () {


        $(this).removeClass( 'highlight' );
        $(this).find('.options-container a').addClass( 'hide-options' );
        $(this).find('.options-container a').removeClass( 'show-options' );


    });






$(tableID + 'Container .buttons-collection').on('click', function () {


    $(tableID + 'Container .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Categories</span></button>');


    if ($("tr").hasClass("selected")) {

        $(tableID + 'Container #table-delete').removeAttr('disabled');

    } else {

        $(tableID + 'Container #table-delete').prop("disabled", true);

    };


    $(tableID + 'Container .buttons-select-all').click(function () {

        $(tableID + 'Container #table-delete').removeAttr('disabled');

    });


    $(tableID + 'Container .buttons-select-none').click(function () {

        $(tableID + 'Container #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $(tableID + 'Container #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Categories ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {

                $(tableID + 'Container tr.selected').each(function() {
                
                    // console.log($("#usersTable tr.selected")[0].id;;
                    id = this.id;
                    
                     $.ajax({
                         type:'POST',
                         url:'/api/deleteCategory',
                         data:{
                             id:id,
                         },
                         success:function (data) {
                             console.log(data);
                            
                             if ($("#usersTable tr").hasClass("selected")) {
 
 
                                 $("#usersTable tr.selected").remove();
                                 $("#table-delete").remove();
 
                             }
 
 
                             console.log(1);
                         },
                         error:function(){
                             console.log('error');
                         }
                    });
                });

                swal({


                    title: 'Categories Successfully Deleted',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Good',
                    confirmButtonClass: 'btn btn-success',


                })



                if ($(tableID + " tr").hasClass("selected")) {


                    $(tableID + " tr.selected").remove();
                    $("#table-delete").remove();

                }
            } else {
                $("#table-delete").remove();
            }
        })


    });


});



$(tableID + " .delete-instructors").click(function () {


    
    let deleteRow = $(this).parent().parent();

    id = this.id;
    //console.log(id);

    
    swal({
        title: 'Are you sure you want to delete this Category?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
    }).then(function (result) {
        if (result.value) {

            $.ajax({
                type:'POST',
                url:'/api/deleteCategory',
                data:{
                    id:id,
                },
                success:function (data) {
                    console.log(data);
                   
                    swal({
                        title: 'Category successfully deleted',
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Good',
                        confirmButtonClass: 'btn btn-success',
                    });
        
                    deleteRow.remove();
                },
                error:function(){
                    console.log('error');
                }
           });
            



        }
    });
});

function updateCategory(input) {
    if (!input.val()) {
        input.val(input.attr('value'));
    }
    if (input.val() !== input.attr('value')) {
        const id = input.parents('tr').id;
        const newName = input.val();
        swal({
            title: 'Are you sure you want to edit this Category Name?',
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save',
            cancelButtonText: 'Cancel',
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type:'POST',
                    url:'/api/editCategory',
                    data:{
                        id:id,
                        value: newName
                    },
                    success:function (data) {
                        console.log(data);
                        swal({
                            title: 'Category Name successfully changed',
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Good',
                            confirmButtonClass: 'btn btn-success',
                        });
                        input.attr('value', newName);
                    },
                    error:function(){
                        console.log('error');
                        input.val(input.attr('value'));
                        swal({
                            title: 'Please try again!',
                            type: 'error',
                            confirmButtonText: 'Ok',
                            confirmButtonClass: 'btn btn-danger',
                        });
                    }
                });
            } else {
                input.val(input.attr('value'));
            }
        });
    }
}

$(tableID + ' .forum_category_name').on('blur', function () {
    updateCategory($(this));
});
$(tableID + ' .forum_category_name').on('keypress', function (e) {
    if (e.which == 13) {
        updateCategory($(this));
    }
});