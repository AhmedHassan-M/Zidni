
const allCoursesTable = $('#allCoursesTable');

allCoursesTable.DataTable({
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
            text: 'All Courses Options',


            buttons: [

                {
                    extend: 'copyHtml5',
                    text: 'Copy All Courses',
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
                        bHeader: "Zidni Courses",
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



    $('#allCoursesTable tbody').on( 'mouseover', 'tr', function () {

        $(this).addClass( 'highlight' );
        $(this).find('.options-container a').removeClass( 'hide-options' );
        $(this).find('.options-container a').addClass( 'show-options' );


    }).on( 'mouseleave', 'tr', function () {


        $(this).removeClass( 'highlight' );
        $(this).find('.options-container a').addClass( 'hide-options' );
        $(this).find('.options-container a').removeClass( 'show-options' );


    });






$('#allCoursesTableContainer .buttons-collection').on('click', function () {


    $('#allCoursesTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Courses</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#allCoursesTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#allCoursesTableContainer #table-delete').prop("disabled", true);

    };


    $('#allCoursesTableContainer .buttons-select-all').click(function () {

        $('#allCoursesTableContainer #table-delete').removeAttr('disabled');

    });


    $('#allCoursesTableContainer .buttons-select-none').click(function () {

        $('#allCoursesTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $('#allCoursesTableContainer #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Courses ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {

                $('#allCoursesTableContainer tr.selected').each(function() {
                
                    // console.log($("#usersTable tr.selected")[0].id;;
                    id = this.id;
                    
                     $.ajax({
                         type:'POST',
                         url:'/api/deleteCourse',
                         data:{
                             id:id,
                         },
                         success:function (data) {
                             console.log(data);
                            
                             if ($("#usersTable tr").hasClass("selected")) {
 
 
                                 $("#usersTable tr.selected").remove();
                                 $("#table-delete").remove();
 
                             }
 
 
                             //console.log(1);
                         },
                         error:function(){
                             console.log('error');
                         }
                    });
                });

                swal({


                    title: 'Courses Successfully Deleted',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Good',
                    confirmButtonClass: 'btn btn-success',


                })



                if ($("#allCoursesTable tr").hasClass("selected")) {


                    $("#allCoursesTable tr.selected").remove();
                    $("#table-delete").remove();

                }
            } else {
                $("#table-delete").remove();
            }
        })


    });


});



$("#allCoursesTable .delete-course").click(function () {


    
    let deleteRow = $(this).parent().parent();

    id = this.id;
    //console.log(id);

    swal({
        title: 'Are you sure you want to delete this course?',
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
                url:'/api/deleteCourse',
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
