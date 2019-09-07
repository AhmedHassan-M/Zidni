
const subscribeInboxTable = $('#subscribeInboxTable');

subscribeInboxTable.DataTable({
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
            text: 'All Subscriber Options',


            buttons: [

                {
                    extend: 'copyHtml5',
                    text: 'Copy All Subscriber',
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
                        bHeader: "Zidni Subscriber",
                        columns: [1, 2]
                    }
                },
                {
                    extend: 'selectAll',
                    text: 'Select All Subscriber'
                },
                {
                    extend: 'selectNone',
                    text: 'Unselect All Subscriber'
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
            "width": "55%"
        }

],
    select: {
        style: 'multi',
        selector: 'td:first-child'
    },
    order: [[1, 'asc']]
});



    $('#subscribeInboxTable tbody').on( 'mouseover', 'tr', function () {

        $(this).addClass( 'highlight' );
        $(this).find('.options-container a').removeClass( 'hide-options' );
        $(this).find('.options-container a').addClass( 'show-options' );


    }).on( 'mouseleave', 'tr', function () {


        $(this).removeClass( 'highlight' );
        $(this).find('.options-container a').addClass( 'hide-options' );
        $(this).find('.options-container a').removeClass( 'show-options' );


    });






$('#subscribeInboxTableContainer .buttons-collection').on('click', function () {


    $('#subscribeInboxTableContainer .dt-button-collection').append('<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Subscriber</span></button>');


    if ($("tr").hasClass("selected")) {

        $('#subscribeInboxTableContainer #table-delete').removeAttr('disabled');

    } else {

        $('#subscribeInboxTableContainer #table-delete').prop("disabled", true);

    };


    $('#subscribeInboxTableContainer .buttons-select-all').click(function () {

        $('#subscribeInboxTableContainer #table-delete').removeAttr('disabled');

    });


    $('#subscribeInboxTableContainer .buttons-select-none').click(function () {

        $('#subscribeInboxTableContainer #table-delete').prop("disabled", true);

    });


    $('.buttons-colvis').click(function () {

        $("#table-delete").remove();

    });


    $('.dt-button-background').click(function () {

        $("#table-delete").remove();

    });



    $('#subscribeInboxTableContainer #table-delete').click(function () {

        swal({
            title: 'Are you sure you want to delete selected Subscribers ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {

            if (result.value) {

                $('#subscribeInboxTable tr.selected').each(function() {
                    id = this.id;
                     $.ajax({
                         type:'POST',
                         url:'/api/subscribe-delet',
                         data:{
                            id:id,
                         },
                         success:function (data) {
                             console.log(data);
                            
                             if ($("#subscribeInboxTable tr").hasClass("selected")) {
                                $("#subscribeInboxTable tr.selected").remove();
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


                    title: 'Subscribers Successfully Deleted',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Good',
                    confirmButtonClass: 'btn btn-success',

                })



                if ($("#subscribeInboxTable tr").hasClass("selected")) {


                    $("#subscribeInboxTable tr.selected").remove();
                    $("#table-delete").remove();

                }


                console.log(1);
            } else {
                $("#table-delete").remove();
            }
        })


    });


});



$("#subscribeInboxTable .delete-subscriber").click(function () {


    
    let deleteRow = $(this).parent().parent()
    id = this.id;
    
    swal({
        title: 'Are you sure you want to delete this subscriber ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type:'post',
                url:'/api/subscribe-delet',
                data:{
                    id:id,
                },
                success:function (data) {
                    console.log(data);
                    swal({
                        title: 'Subscribe successfully deleted',
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
