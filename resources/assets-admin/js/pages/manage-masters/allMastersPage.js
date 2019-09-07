
const allMastersTable = $('#allMastersTable');

allMastersTable.DataTable({
    "dom": "<'row'<'col-md-4 tabel-option'B><'col-md-6 tabel-search'f><'col-md-6 table-info'i><'col-md-6 table-lenght'l>>" +
    "<'row'<'col-md-12 table-container't>><'row'<'col-md-12 table-pag'p>>",
    "paging": true,
    "ordering": true,
    "autoWidth": true,
    responsive: false,
    "scrollX": true,
    buttons: [


        {
            extend: 'collection',
            text: 'All Masters Options',


            buttons: [

                {
                    extend: 'copyHtml5',
                    text: 'Copy All Masters',
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
                        bHeader: "Zidni Masters",
                        columns: [1, 2, 3, 4]
                    }
                },
                {
                    extend: 'selectAll',
                    text: 'Select All Courses'
                },
                {
                    extend: 'selectNone',
                    text: 'Unselect All Courses'
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
            "width": "20%"
        }

],
    select: {
        style: 'multi',
        selector: 'td:first-child'
    },
    order: [[1, 'asc']]
});



    $('#allMastersTable tbody').on( 'mouseover', 'tr', function () {

        $(this).addClass( 'highlight' );
        $(this).find('.options-container a').removeClass( 'hide-options' );
        $(this).find('.options-container a').addClass( 'show-options' );


    }).on( 'mouseleave', 'tr', function () {


        $(this).removeClass( 'highlight' );
        $(this).find('.options-container a').addClass( 'hide-options' );
        $(this).find('.options-container a').removeClass( 'show-options' );


    });






$('#allMastersTableContainer .buttons-collection').on('click', function () {


    $('#allMastersTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Masters</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#allMastersTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#allMastersTableContainer #table-delete').prop("disabled", true);

    };


    $('#allMastersTableContainer .buttons-select-all').click(function () {

        $('#allMastersTableContainer #table-delete').removeAttr('disabled');

    });


    $('#allMastersTableContainer .buttons-select-none').click(function () {

        $('#allMastersTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $('#allMastersTableContainer #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Masters Degree ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {
                $('#allMastersTableContainer tr.selected').each(function() {
                
                    // console.log($("#usersTable tr.selected")[0].id;;
                    id = this.id;
                    
                     $.ajax({
                         type:'POST',
                         url:'/api/deleteMaster',
                         data:{
                             id:id,
                         },
                         success:function (data) {
                            console.log(data);
                            
                            swal({


                                title: 'Masters Degree Successfully Deleted',
                                type: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Good',
                                confirmButtonClass: 'btn btn-success',
            
            
                            })
            
            
            
                            if ($("#allMastersTable tr").hasClass("selected")) {
            
            
                                $("#allMastersTable tr.selected").remove();
                                $("#table-delete").remove();
            
                            }
                         },
                         error:function(){
                             console.log('error');
                         }
                    });
                });

                

            } else {
                $("#table-delete").remove();
            }
        })


    });


});



$("#allMastersTable .delete-masters").click(function () {


    
    let deleteRow = $(this).parent().parent()
    id = this.id;
    
    swal({
        title: 'Are you sure you want to delete this Masters Degree ?',
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
                url:'/api/deleteMaster',
                data:{
                    id:id,
                },
                success:function (data) {
                    console.log(data);
                   
                swal({
                    title: 'Masters Degree Successfully Deleted',
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
