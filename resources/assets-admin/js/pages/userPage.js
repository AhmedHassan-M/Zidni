
// --------------------------------------Start Users---------------------------------------------------


const userTable = $('#usersTable');



userTable.DataTable({
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
            text: 'Users Options',


            buttons: [

                {
                    extend: 'copyHtml5',
                    text: 'Copy Users',
                    exportOptions: {
                        columns: [1, 2, 3, 4]
                    }

                },
                {
                    extend: 'csvHtml5',
                    text: 'Download Csv File',
                    exportOptions: {
                        columns: [1, 2, 3, 4]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Download Excel File',
                    exportOptions: {
                        columns: [1, 2, 3, 4]
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        bHeader: "Zidni Users",
                        columns: [1, 2, 3, 4]
                    }
                },
                {
                    extend: 'selectAll',
                    text: 'Select All Users'
                },
                {
                    extend: 'selectNone',
                    text: 'Unselect All Users'
                },
            ]
        }
    ],
    columnDefs: [
        {
        orderable: false,
        className: 'select-checkbox',
        targets: 0
        },
        {
            orderable: false,
            className: 'tables-options',
            targets: 4
        }

],
    select: {
        style: 'multi',
        selector: 'td:first-child'
    },
    order: [[1, 'asc']]
});



$('#usersTable tbody').on( 'mouseover', 'tr', function () {

    $(this).addClass( 'highlight' );
    $(this).find('.options-container a').removeClass( 'hide-options' );
    $(this).find('.options-container a').addClass( 'show-options' );


}).on( 'mouseleave', 'tr', function () {


    $(this).removeClass( 'highlight' );
    $(this).find('.options-container a').addClass( 'hide-options' );
    $(this).find('.options-container a').removeClass( 'show-options' );


});




$('#usersTableContainer .buttons-collection').on('click', function () {


    $('#usersTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Users</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#usersTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#usersTableContainer #table-delete').prop("disabled", true);

    };


    $('#usersTableContainer .buttons-select-all').click(function () {

        $('#usersTableContainer #table-delete').removeAttr('disabled');

    });


    $('#usersTableContainer .buttons-select-none').click(function () {

        $('#usersTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });









    $('#usersTableContainer #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Users ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {
                $('#usersTable tr.selected').each(function() {
                
                   // console.log($("#usersTable tr.selected")[0].id;;
                   id = this.id;
                    $.ajax({
                        type:'POST',
                        url:'/api/deleteuser',
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

                    title: 'Users Successfully Deleted',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Good',
                    confirmButtonClass: 'btn btn-success',

                })
            } else {
                $("#table-delete").remove();
            }
        })


    });


});



$("#usersTableContainer .delete-user").click(function () {


    
    let deleteRow = $(this).parent().parent()

    id = this.id;


    
    swal({
        title: 'Are you sure you want to delete this user?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type:'post',
                url:'/api/deleteuser',
                data:{
                    id:id,
                },
                success:function (data) {
                    console.log(data);
                    swal({
                        title: 'user successfully deleted',
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
