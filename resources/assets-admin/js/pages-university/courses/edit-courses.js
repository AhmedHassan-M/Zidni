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

    // $("#nav-general-tab").click(function(e) {
    //     e.preventDefault();
    //     if (
    //         $("#nav-material-tab").hasClass("active") ||
    //         $("#nav-exams-tab").hasClass("active")
    //     ) {
    //         $("#nav-material-tab").removeClass("active");
    //         $("#nav-exams-tab").removeClass("active");
    //     }
    //     $(this).tab("show");
    // });

    // $("#nav-material-tab").click(function(e) {
    //     e.preventDefault();
    //     if (
    //         $("#nav-general-tab").hasClass("active") ||
    //         $("#nav-exams-tab").hasClass("active")
    //     ) {
    //         $("#nav-general-tab").removeClass("active");
    //         $("#nav-exams-tab").removeClass("active");
    //     }
    //     $(this).tab("show");
    // });

    // $("#nav-exams-tab").click(function(e) {
    //     e.preventDefault();
    //     if (
    //         $("#nav-material-tab").hasClass("active") ||
    //         $("#nav-general-tab").hasClass("active")
    //     ) {
    //         $("#nav-material-tab").removeClass("active");
    //         $("#nav-general-tab").removeClass("active");
    //     }
    //     $(this).tab("show");
    // });
});
