
const table = require('../tables-noSelect.js')

$(document).ready(function() {


    table.applicantTable(
        tabletableContainer = "#pastYearsTableContainer",
        tableId = "#pastYearsTable",
        tableName = "Past Years",
        deleteUrl = "/admin/delete/university-specialization"
    )
    
});


