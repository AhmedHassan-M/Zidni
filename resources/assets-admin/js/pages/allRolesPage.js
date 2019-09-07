


const allRolesTable = $('#allRolesTable');



allRolesTable.DataTable({
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
            text: 'All Roles Options',


            buttons: [

                {
                    extend: 'copyHtml5',
                    text: 'Copy All Roles',
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
                        bHeader: "Zidni Roles",
                        columns: [1, 2, 3, 4]
                    }
                },
                {
                    extend: 'selectAll',
                    text: 'Select All Roles'
                },
                {
                    extend: 'selectNone',
                    text: 'Unselect All Roles'
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
            targets: 1,
            "width": "15%"
        },
        {
            targets: 2,
            "width": "25%"
        }

],
    select: {
        style: 'multi',
        selector: 'td:first-child'
    },
    order: [[1, 'asc']]
});


$('#allRolesTableContainer .buttons-collection').on('click', function () {


    $('#allRolesTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Roles</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#allRolesTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#allRolesTableContainer #table-delete').prop("disabled", true);

    };


    $('#allRolesTableContainer .buttons-select-all').click(function () {

        $('#allRolesTableContainer #table-delete').removeAttr('disabled');

    });


    $('#allRolesTableContainer .buttons-select-none').click(function () {

        $('#allRolesTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $('#allRolesTableContainer #table-delete').click(function () {

        swal({
            title: 'هل انت متأكد من مسح جميع الصفوف المختارة',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'مسح',
            cancelButtonText: 'إلغاء',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: false
        }).then(function (result) {

            if (result.value) {


                swal({


                    type: 'success',
                    title: 'تم المسح بنجاح',
                    showConfirmButton: false,
                    timer: 2500


                })



                if ($("#allRolesTable tr").hasClass("selected")) {


                    $("#allRolesTable tr.selected").remove();
                    $("#table-delete").remove();

                }


                console.log(1);
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel

            ) {
                swal({


                    type: 'error',
                    title: 'تم إلغاء الحذف',
                    showConfirmButton: false,
                    timer: 2500


                })

                $("#table-delete").remove();

            }
        })


    });


});