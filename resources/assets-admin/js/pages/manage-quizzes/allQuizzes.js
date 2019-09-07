
const allQuizzesTable = $('#allQuizzesTable');

allQuizzesTable.DataTable({
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
            text: 'All Quizzes Options',


            buttons: [

                {
                    extend: 'copyHtml5',
                    text: 'Copy All Quizzes',
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
                        bHeader: "Zidni Quizzes",
                        columns: [1, 2, 3, 4]
                    }
                },
                {
                    extend: 'selectAll',
                    text: 'Select All Quizzes'
                },
                {
                    extend: 'selectNone',
                    text: 'Unselect All Quizzes'
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
            "width": "20%",
            orderable: false,
            className: 'select-qize-category',
        }

],
    select: {
        style: 'multi',
        selector: 'td:first-child'
    },
    order: [[1, 'asc']],
    initComplete: function () {
        this.api().columns(2).every( function () {
            var column = this;
            var select = $('<select><option value="">Select Category</option></select>')
                .appendTo( $(column.header()).empty() )
                .on( 'change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );

                    column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                } );

            column.data().unique().sort().each( function ( d, j ) {
                select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
        } );
    }

});



    $('#allQuizzesTable tbody').on( 'mouseover', 'tr', function () {

        $(this).addClass( 'highlight' );
        $(this).find('.options-container a').removeClass( 'hide-options' );
        $(this).find('.options-container a').addClass( 'show-options' );


    }).on( 'mouseleave', 'tr', function () {


        $(this).removeClass( 'highlight' );
        $(this).find('.options-container a').addClass( 'hide-options' );
        $(this).find('.options-container a').removeClass( 'show-options' );


    });






$('#allQuizzesTableContainer .buttons-collection').on('click', function () {


    $('#allQuizzesTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Quizzes</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#allQuizzesTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#allQuizzesTableContainer #table-delete').prop("disabled", true);

    };


    $('#allQuizzesTableContainer .buttons-select-all').click(function () {

        $('#allQuizzesTableContainer #table-delete').removeAttr('disabled');

    });


    $('#allQuizzesTableContainer .buttons-select-none').click(function () {

        $('#allQuizzesTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $('#allQuizzesTableContainer #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Quizzes ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {

                $('#allQuizzesTableContainer tr.selected').each(function() {
                    id = this.id;
                    //console.log(id);

                    $.ajax({
                        type:'POST',
                        url:'/api/deleteQuiz',
                        data:{
                            id:id,
                        },
                        success:function (data) {
                            console.log(data);

                            swal({


                                title: 'Quizzes Successfully Deleted',
                                type: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Good',
                                confirmButtonClass: 'btn btn-success',
            
            
                            })
                        },
                        error:function(){
                            console.log('error');
                        }
                   });
                });



                if ($("#allQuizzesTable tr").hasClass("selected")) {


                    $("#allQuizzesTable tr.selected").remove();
                    $("#table-delete").remove();

                }


                //console.log(1);
            } else {
                $("#table-delete").remove();
            }
        })


    });


});



$("#allQuizzesTable .delete-quizzes").click(function () {


    
    let deleteRow = $(this).parent().parent();
    
    id = this.id;
    //console.log(id);
    
    swal({
        title: 'Are you sure you want to delete this quizzes',
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
                url:'/api/deleteQuiz',
                data:{
                    id:id,
                },
                success:function (data) {
                    console.log(data);

                    swal({
                        title: 'course successfully deleted',
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
