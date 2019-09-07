
const allThreadsTable = $('#allThreadsTable');

allThreadsTable.DataTable({
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
            text: 'All Threads Options',


            buttons: [
                {
                    extend: 'selectAll',
                    text: 'Select All Threads'
                },
                {
                    extend: 'selectNone',
                    text: 'Unselect All Threads'
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
            "width": "5%"
        },
        {
            targets: 2,
            "width": "65%"
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



    $('#allThreadsTable tbody').on( 'mouseover', 'tr', function () {

        $(this).addClass( 'highlight' );
        $(this).find('.options-container a').removeClass( 'hide-options' );
        $(this).find('.options-container a').addClass( 'show-options' );


    }).on( 'mouseleave', 'tr', function () {


        $(this).removeClass( 'highlight' );
        $(this).find('.options-container a').addClass( 'hide-options' );
        $(this).find('.options-container a').removeClass( 'show-options' );


    });






$('#allThreadsTableContainer .buttons-collection').on('click', function () {


    $('#allThreadsTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Threads</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#allThreadsTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#allThreadsTableContainer #table-delete').prop("disabled", true);

    };


    $('#allThreadsTableContainer .buttons-select-all').click(function () {

        $('#allThreadsTableContainer #table-delete').removeAttr('disabled');

    });


    $('#allThreadsTableContainer .buttons-select-none').click(function () {

        $('#allThreadsTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $('#allThreadsTableContainer #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Threads ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {

                $('#allThreadsTableContainer tr.selected').each(function() {
                
                    // console.log($("#usersTable tr.selected")[0].id;;
                    id = this.id;
                    
                     $.ajax({
                         type:'POST',
                         url:'/api/deleteThread',
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


                    title: 'Threads Successfully Deleted',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Good',
                    confirmButtonClass: 'btn btn-success',


                })



                if ($("#allThreadsTable tr").hasClass("selected")) {


                    $("#allThreadsTable tr.selected").remove();
                    $("#table-delete").remove();

                }
            } else {
                $("#table-delete").remove();
            }
        })


    });


});



$("#allThreadsTable .delete-instructors").click(function () {


    
    let deleteRow = $(this).parent().parent();

    id = this.id;
    //console.log(id);

    
    swal({
        title: 'Are you sure you want to delete this Thread?',
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
                url:'/api/deleteThread',
                data:{
                    id:id,
                },
                success:function (data) {
                    console.log(data);
                   
                    swal({
                        title: 'Thread successfully deleted',
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