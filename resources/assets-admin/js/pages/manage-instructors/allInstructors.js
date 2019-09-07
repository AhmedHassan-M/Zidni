
const allInstructorsTable = $('#allInstructorsTable');

allInstructorsTable.DataTable({
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
            text: 'All Instructors Options',


            buttons: [

                {
                    extend: 'copyHtml5',
                    text: 'Copy All Instructors',
                    exportOptions: {
                        columns: [1, 2]
                    }

                },
                {
                    extend: 'csvHtml5',
                    text: 'Download Csv File',
                    exportOptions: {
                        columns: [1, 2]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Download Excel File',
                    exportOptions: {
                        columns: [1, 2]
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        bHeader: "Zidni Instructors",
                        columns: [1, 2]
                    }
                },
                {
                    extend: 'selectAll',
                    text: 'Select All Instructors'
                },
                {
                    extend: 'selectNone',
                    text: 'Unselect All Instructors'
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
            targets: 1,
            "width": "20%"
        },
        {
            targets: 2,
            "width": "65%"
        }

],
    select: {
        style: 'multi',
        selector: 'td:first-child'
    },
    order: [[1, 'asc']]
});



    $('#allInstructorsTable tbody').on( 'mouseover', 'tr', function () {

        $(this).addClass( 'highlight' );
        $(this).find('.options-container a').removeClass( 'hide-options' );
        $(this).find('.options-container a').addClass( 'show-options' );


    }).on( 'mouseleave', 'tr', function () {


        $(this).removeClass( 'highlight' );
        $(this).find('.options-container a').addClass( 'hide-options' );
        $(this).find('.options-container a').removeClass( 'show-options' );


    });






$('#allInstructorsTableContainer .buttons-collection').on('click', function () {


    $('#allInstructorsTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Instructors</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#allInstructorsTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#allInstructorsTableContainer #table-delete').prop("disabled", true);

    };


    $('#allInstructorsTableContainer .buttons-select-all').click(function () {

        $('#allInstructorsTableContainer #table-delete').removeAttr('disabled');

    });


    $('#allInstructorsTableContainer .buttons-select-none').click(function () {

        $('#allInstructorsTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $('#allInstructorsTableContainer #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Instructors ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {

                $('#allInstructorsTableContainer tr.selected').each(function() {
                
                    // console.log($("#usersTable tr.selected")[0].id;;
                    id = this.id;
                    
                     $.ajax({
                         type:'POST',
                         url:'/api/deleteInstructor',
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


                    title: 'Instructors Successfully Deleted',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Good',
                    confirmButtonClass: 'btn btn-success',


                })



                if ($("#allInstructorsTable tr").hasClass("selected")) {


                    $("#allInstructorsTable tr.selected").remove();
                    $("#table-delete").remove();

                }
            } else {
                $("#table-delete").remove();
            }
        })


    });


});



$("#allInstructorsTable .delete-instructors").click(function () {


    
    let deleteRow = $(this).parent().parent();

    id = this.id;
    //console.log(id);

    
    swal({
        title: 'Are you sure you want to delete this Instructor?',
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
                url:'/api/deleteInstructor',
                data:{
                    id:id,
                },
                success:function (data) {
                    console.log(data);
                   
                    swal({
                        title: 'Instructor successfully deleted',
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


$('.overview-content').on('click', function () {


    let overviewContent = $(this).html()
 
 
    $('.overview-content-modal').html(overviewContent);
 
});