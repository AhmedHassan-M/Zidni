


const allCategoriesTable = $('#allCategoriesTable');



allCategoriesTable.DataTable({
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
                    extend: 'copyHtml5',
                    text: 'Copy All Categories',
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
                        bHeader: "Zidni Categories",
                        columns: [1, 2, 3, 4]
                    }
                },
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
        targets: 0
        },
        {
            targets: 1,
            "width": "20%"
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


$('#allCategoriesTableContainer .buttons-collection').on('click', function () {


    $('#allCategoriesTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Categories</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#allCategoriesTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#allCategoriesTableContainer #table-delete').prop("disabled", true);

    };


    $('#allCategoriesTableContainer .buttons-select-all').click(function () {

        $('#allCategoriesTableContainer #table-delete').removeAttr('disabled');

    });


    $('#allCategoriesTableContainer .buttons-select-none').click(function () {

        $('#allCategoriesTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $('#allCategoriesTableContainer #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Categories ?',
            text: 'All the courses in this categories will be deleted',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {

                $('#allCategoriesTable tr.selected').each(function() {
                
                   // console.log($("#usersTable tr.selected")[0].id;;
                   id = this.id;
                    $.ajax({
                        type:'POST',
                        url:'/api/deletecats',
                        data:{
                            id:id,
                        },
                        success:function (data) {
                            console.log(data);
                           
                            if ($("#allCategoriesTable tr").hasClass("selected")) {


                                $("#allCategoriesTable tr.selected").remove();
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
                console.log(1);
            } else {
                $("#table-delete").remove();
            }
        })


    });


});