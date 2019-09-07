const table = require("../tables.js");

$(document).ready(function() {
    table.applicantTable(
        (tabletableContainer = "#allCoursesTableContainer"),
        (tableId = "#allCoursesTable"),
        (tableName = "Course"),
        (deleteUrl = "/testtttt")
    );
});
