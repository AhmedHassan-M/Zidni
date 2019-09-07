
const allSpecializationsTable = $('#allSpecializationsTable');

allSpecializationsTable.DataTable({
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
            text: 'All Specializations Options',


            buttons: [

                {
                    extend: 'copyHtml5',
                    text: 'Copy All Specializations',
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
                        bHeader: "Zidni Specializations",
                        columns: [1, 2, 3, 4]
                    }
                },
                {
                    extend: 'selectAll',
                    text: 'Select All Specializations'
                },
                {
                    extend: 'selectNone',
                    text: 'Unselect All Specializations'
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



    $('#allSpecializationsTable tbody').on( 'mouseover', 'tr', function () {

        $(this).addClass( 'highlight' );
        $(this).find('.options-container a').removeClass( 'hide-options' );
        $(this).find('.options-container a').addClass( 'show-options' );


    }).on( 'mouseleave', 'tr', function () {


        $(this).removeClass( 'highlight' );
        $(this).find('.options-container a').addClass( 'hide-options' );
        $(this).find('.options-container a').removeClass( 'show-options' );


    });






$('#allSpecializationsTableContainer .buttons-collection').on('click', function () {


    $('#allSpecializationsTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Specializations</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#allSpecializationsTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#allSpecializationsTableContainer #table-delete').prop("disabled", true);

    };


    $('#allSpecializationsTableContainer .buttons-select-all').click(function () {

        $('#allSpecializationsTableContainer #table-delete').removeAttr('disabled');

    });


    $('#allSpecializationsTableContainer .buttons-select-none').click(function () {

        $('#allSpecializationsTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $('#allSpecializationsTableContainer #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Specializations ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {

                $('#allSpecializationsTableContainer tr.selected').each(function() {
                
                    // console.log($("#usersTable tr.selected")[0].id;;
                    id = this.id;
                    
                     $.ajax({
                         type:'POST',
                         url:'/api/deleteSpecialization',
                         data:{
                             id:id,
                         },
                         success:function (data) {
                            console.log(data);
                            
                            swal({


                                title: 'Specializations Successfully Deleted',
                                type: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Good',
                                confirmButtonClass: 'btn btn-success',
            
            
                            })
            
            
            
                            if ($("#allSpecializationsTable tr").hasClass("selected")) {
            
            
                                $("#allSpecializationsTable tr.selected").remove();
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



$("#allSpecializationsTable .delete-specializations").click(function () {


    
    let deleteRow = $(this).parent().parent();
    id = this.id;
    
    swal({
        title: 'Are you sure you want to delete this Specialization ?',
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
                url:'/api/deleteSpecialization',
                data:{
                    id:id,
                },
                success:function (data) {
                    console.log(data);
                   
                    swal({
                        title: 'Specialization Successfully Deleted',
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
