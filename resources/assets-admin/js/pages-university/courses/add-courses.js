$(document).ready(function() {
    $(".form-select-active").select2();

    $(".form-select-active")
        .select2()
        .change(function() {
            $(this).valid();
        });

    $("#summernote").summernote({
        placeholder: "Course Description",
        height: 150,
        size: 2
    });

    $("#specialization").change(function() {
        let valueOfSpec = $(this).val();
        if (valueOfSpec) {
            $("#level").attr("disabled", false);
            for (let i = 0; i < 8; i++) {
                $("#level").append(
                    `<option value=${i + 1}>level ${i + 1}</option>`
                );
            }
        }
    });
});
