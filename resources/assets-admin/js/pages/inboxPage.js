

// --------------------------------------Start Inbox---------------------------------------------------


const inboxTable = $('#inboxTable');


inboxTable.DataTable({
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
            text: 'Inbox Options',


            buttons: [

                {
                    extend: 'copyHtml5',
                    text: 'Copy Inbox',
                    exportOptions: {
                        columns: [1, 2, 3]
                    }

                },
                {
                    extend: 'csvHtml5',
                    text: 'Download Csv File',
                    exportOptions: {
                        columns: [1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Download Excel File',
                    exportOptions: {
                        columns: [1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        bHeader: "Zidni Users",
                        columns: [1, 2, 3]
                    }
                },
                {
                    extend: 'selectAll',
                    text: 'Select All Messages'
                },
                {
                    extend: 'selectNone',
                    text: 'Unselect All Messages'
                },
            ]
        }
    ],
    columnDefs: [
        {
        orderable: false,
        className: 'select-checkbox',
        targets: 0,
        "width": "8%"
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




$('#inboxTableContainer .buttons-collection').on('click', function () {


    $('#inboxTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Message</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#inboxTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#inboxTableContainer #table-delete').prop("disabled", true);

    };


    $('#inboxTableContainer .buttons-select-all').click(function () {

        $('#inboxTableContainer #table-delete').removeAttr('disabled');

    });


    $('#inboxTableContainer .buttons-select-none').click(function () {

        $('#inboxTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $('#inboxTableContainer #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Messages ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {
                $('#inboxTable tr.selected').each(function() {
                
                    // console.log($("#usersTable tr.selected")[0].id;;
                    id = this.id;

                     $.ajax({
                         type:'POST',
                         url:'/api/deleteContact',
                         data:{
                             id:id,
                         },
                         success:function (data) {
                             console.log(data);
                            
                             swal({


                                title: 'Messages Successfully Deleted',
                                type: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Good',
                                confirmButtonClass: 'btn btn-success',
            
            
                            })
            
            
            
                            if ($("#inboxTable tr").hasClass("selected")) {
            
            
                                $("#inboxTable tr.selected").remove();
                                $("#table-delete").remove();
            
                            }
 
 
                            //console.log(1);
                         },
                         error:function(){
                             console.log('error');
                         }
                     });
                 });

                


                //console.log(1);
            } else {
                $("#table-delete").remove();
            }
        })


    });


});



$('.message-content').on('click', function () {


   let messageContent = $(this).html()


   $('.message-content-modal').html(messageContent);

});



// --------------------------------------End Inbox---------------------------------------------------