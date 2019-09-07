


const allAdminsTable = $('#allAdminsTable');



allAdminsTable.DataTable({
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
            text: 'All Admins Options',


            buttons: [

                {
                    extend: 'copyHtml5',
                    text: 'Copy All Admins',
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
                        bHeader: "Zidni Admins",
                        columns: [1, 2, 3, 4]
                    }
                },
                {
                    extend: 'selectAll',
                    text: 'Select All Admins'
                },
                {
                    extend: 'selectNone',
                    text: 'Unselect All Admins'
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


$('#allAdminsTableContainer .buttons-collection').on('click', function () {


    $('#allAdminsTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Admins</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#allAdminsTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#allAdminsTableContainer #table-delete').prop("disabled", true);

    };


    $('#allAdminsTableContainer .buttons-select-all').click(function () {

        $('#allAdminsTableContainer #table-delete').removeAttr('disabled');

    });


    $('#allAdminsTableContainer .buttons-select-none').click(function () {

        $('#allAdminsTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $('#allAdminsTableContainer #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Admins ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {


                swal({


                    title: 'Admins Successfully Deleted',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Good',
                    confirmButtonClass: 'btn btn-success',


                })



                if ($("#allAdminsTable tr").hasClass("selected")) {


                    $("#allAdminsTable tr.selected").remove();
                    $("#table-delete").remove();

                }


                console.log(1);
            } else {
                $("#table-delete").remove();
            }
        })


    });


});