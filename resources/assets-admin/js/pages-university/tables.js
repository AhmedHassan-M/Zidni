
// --------------------------------------Start Applicant---------------------------------------------------

    

export function applicantTable(tableContainer, tableId, tableName, deleteUrl){

    
    $(`${tableId}`).DataTable({
    
    
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
                text: `${tableName} Options`,
    
    
                buttons: [
    
                    {
                        extend: 'copyHtml5',
                        text: `Copy ${tableName}`,
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
                            bHeader: `Zidni University ${tableName}`,
                            columns: [1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'selectAll',
                        text: `Select All ${tableName}`
                    },
                    {
                        extend: 'selectNone',
                        text: `Unselect All ${tableName}`
                    },
                ]
            }
        ],
        columnDefs: [
            {
            orderable: false,
            className: 'select-checkbox',
            targets: 0
            }
    
    ],
        select: {
            style: 'multi',
            selector: 'td:first-child'
        },
        order: [[1, 'asc']]
    });





    $(`${tableId} tbody`).on( 'mouseover', 'tr', function () {

        $(this).addClass( 'highlight' );
        $(this).find('.options-container a').removeClass( 'hide-options' );
        $(this).find('.options-container a').addClass( 'show-options' );
    
    
    }).on( 'mouseleave', 'tr', function () {
    
    
        $(this).removeClass( 'highlight' );
        $(this).find('.options-container a').addClass( 'hide-options' );
        $(this).find('.options-container a').removeClass( 'show-options' );
    
    
    });







    $(`${tableContainer} .buttons-collection`).on('click', function () {
        
        let tableDeletebutton = `<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected ${tableName}</span></button>`

        $(`${tableContainer} .dt-button-collection`).append(tableDeletebutton);
    
    
        if ($("tr").hasClass("selected")) {
    
            

            $(`${tableContainer} #table-delete`).removeAttr('disabled');
    
        } else {
    
            $(`${tableContainer} #table-delete`).prop("disabled", true);
    
        };
    

        
    
        $(`${tableContainer} .buttons-select-all`).click(function () {
    
            $(`${tableContainer} #table-delete`).removeAttr('disabled');
    
        });
    
        
        $(`${tableContainer} .buttons-select-none`).click(function () {
    
            $(`${tableContainer} #table-delete`).prop("disabled", true);
    
        });
    
        $('.buttons-colvis').click(function () {
    
            $("#table-delete").remove();
    
        });
    
    
        $('.dt-button-background').click(function () {
    
            $("#table-delete").remove();
    
        });


        $(`${tableContainer} #table-delete`).click(function () {
    
            swal({
                title: `Are you sure you want to delete selected ${tableName} ?`,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
            }).then(function (result) {
    
                if (result.value) {


                    $(`${tableId} tr.selected`).each(function() {
                    
                       // console.log($("#usersTable tr.selected")[0].id;;

                        let rowId = this.id


                        $.ajax({
                            type:'POST',
                            url: deleteUrl,
                            data:{
                                id:rowId,
                            },
                            success:function (data) {
                               
                                console.log(data);

                                if ($(`${tableId} tr`).hasClass("selected")) {
    
    
                                    $(`${tableId} tr.selected`).remove();
                                    $("#table-delete").remove();
    
                                }

                                swal({
    
                                    title: `${tableName} Successfully Deleted`,
                                    type: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Good',
                                    confirmButtonClass: 'btn btn-success',
                
                                })

                                $("#table-delete").remove();

                                console.log(1);
                            },
                            error:function(error){
                                console.log(error);

                                swal({
    
                                    title: `Opsss, ${error.status}`,
                                    type: 'error',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Good',
                                    confirmButtonClass: 'btn btn-success',
                
                                })


                                $("#table-delete").remove();

                            }
                        });
                    });
                } else {
                    $("#table-delete").remove();
                }
            })
    
    
        });
 
    });




    $(document).on("click",`${tableContainer} .delete-user`,function() {


    
        let deleteRow = $(this).parent().parent()
    
        let userId = this.id;
    
    
        swal({
            title: `Are you sure you want to delete this ${tableName}?`,
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
                    url: deleteUrl,
                    data:{
                        id:userId,
                    },

                    success:function (data) {
                        console.log(data);
                        swal({
                            title: `${tableName} successfully deleted`,
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Good',
                            confirmButtonClass: 'btn btn-success',
                        });
    
                        deleteRow.remove();
                    },

                    
                    error:function(error){

                        swal({
    
                            title: `Opsss, ${error.status}`,
                            type: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Good',
                            confirmButtonClass: 'btn btn-success',
        
                        })


                    }
                });
    
            }
        });


    });
    


}
    
    
    














