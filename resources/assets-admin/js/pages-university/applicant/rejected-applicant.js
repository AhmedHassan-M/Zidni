






const table = require('../tables.js')

$(document).ready(function() {

    table.applicantTable(
        tabletableContainer = "#rejectedApplicantTableContainer",
        tableId = "#rejectedApplicantTable",
        tableName = "Rejected Applicant",
        deleteUrl = "/admin/university/delete-applicant"
    )
    
});


