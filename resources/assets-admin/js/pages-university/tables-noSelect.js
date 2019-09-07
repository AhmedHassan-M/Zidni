
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
                    }                ]
            }
        ],
        select: {
            select: false
        },
        order: [[0, 'desc']]
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

}
    
    
    














