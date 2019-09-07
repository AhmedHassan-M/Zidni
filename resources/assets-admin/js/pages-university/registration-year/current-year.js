$(document).ready(function() {

    $('.form-select-active').select2({
        placeholder: "Select Courses"
    });

    $(".daterange_1").daterangepicker(
        {
            opens: "center"
        },
        function(start, end, label) {
            console.log(
                "A new date selection was made: " +
                    start.format("YYYY-MM-DD") +
                    " to " +
                    end.format("YYYY-MM-DD")
            );
        }
    );

    $(".load-card-box").remove();

});
