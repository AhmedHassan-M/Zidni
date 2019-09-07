$(document).ready(function() {
    var input = document.querySelector("#studentPhone");

    let iti = window.intlTelInput(input, {
        initialCountry: "US",
        excludeCountries: ["il"],
        nationalMode: true,
        hiddenInput: "full_phone",
        utilsScript:
            "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js"
    });

    let handleChange = () => {
        jQuery.validator.addMethod(
            "selectnic",
            function(value, element) {
                if (!iti.isValidNumber()) {
                    return false; // FAIL validation when REGEX matches
                } else {
                    return true; // PASS validation otherwise
                }
            },
            "Please enter a valid phone number"
        );

        // let text = (iti.isValidNumber()) ? "International: " + iti.getNumber() : "Please enter a number below";
        // let textNode = document.createTextNode(text);
        // output.innerHTML = "";
        // output.appendChild(textNode);
    };

    input.addEventListener("change", handleChange);
    input.addEventListener("keyup", handleChange);

    input.addEventListener("countrychange", function(e) {
        handleChange();
    });

    $(".select-int").select2();

    $(".select-int-nosearch").select2({
        minimumResultsForSearch: -1
    });

    $("#new__student__form").validate({
        highlight: function(element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2-hidden-accessible")) {
                $("#select2-" + elem.attr("id") + "-container")
                    .parent()
                    .addClass(errorClass);
            } else {
                elem.addClass(errorClass);
            }
        },
        unhighlight: function(element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2-hidden-accessible")) {
                $("#select2-" + elem.attr("id") + "-container")
                    .parent()
                    .removeClass(errorClass);
            } else {
                elem.removeClass(errorClass);
            }
        },
        errorPlacement: function(error, element) {
            var elem = $(element);
            if (elem.hasClass("select2-hidden-accessible")) {
                element = $(
                    "#select2-" + elem.attr("id") + "-container"
                ).parent();
                error.insertAfter(element);
            } else {
                error.insertAfter(element);
            }
        },

        rules: {
            studentFullname: {
                required: true
            },

            studentEmail: {
                required: true,
                email: true
            },
            studentPhone: {
                required: true,
                number: true,
                selectnic: true
            },
            studentTimeZone: {
                required: true
            },
            studentPassport: {
                required: true,
                number: true
            },
            studentPassportNameEn: {
                required: true
            },
            studentNameAr: {
                required: true
            },
            studentBrithDay: {
                required: true
            },
            studentBrithMonth: {
                required: true
            },
            studentBrithYear: {
                required: true
            },
            studentCitizenship: {
                required: true
            },
            studentMaritalStatus: {
                required: true
            },
            studentGender: {
                required: true
            },
            studentCountry: {
                required: true
            },
            studentCertificate: {
                required: true
            },
            studentGraduationYear: {
                required: true
            },
            studentSpecialization: {
                required: true
            }
        },
        messages: {
            studentFullname: {
                required: "Student Fullname is required"
            },
            studentEmail: {
                required: "Student E-Mail is required"
            },
            studentPhone: {
                required: "Student Phone Number is required"
            },
            studentTimeZone: {
                required: "Student TimeZone is required"
            },
            studentPassport: {
                required: "Student Passport Number is required"
            },
            studentPassportNameEn: {
                required: "Student Passport Name English Letters is required"
            },
            studentNameAr: {
                required: "Student Name Arabic Letters is required"
            },
            studentBrithDay: {
                required: "Student BrithDay is required"
            },
            studentBrithMonth: {
                required: "Student BrithMonth is required"
            },
            studentBrithYear: {
                required: "Student BrithYear is required"
            },
            studentCitizenship: {
                required: "Student Citizenship is required"
            },
            studentMaritalStatus: {
                required: "Student Marital Status is required"
            },
            studentGender: {
                required: "Student Gender is required"
            },
            studentCountry: {
                required: "Student Country is required"
            },
            studentCertificate: {
                required: "Student Certificate is required"
            },
            studentGraduationYear: {
                required: "Student GraduationYear is required"
            },
            studentSpecialization: {
                required: "Student Specialization is required"
            }
        }
    });

    $(".select-int")
        .select2()
        .change(function() {
            if ($(this).valid()) {
                $(this)
                    .next("span")
                    .removeClass("error")
                    .addClass("valid");
            } else {
                $(this)
                    .next("span")
                    .removeClass("valid")
                    .addClass("error");
            }
        });

    $(".select-int-nosearch")
        .select2()
        .change(function() {
            if ($(this).valid()) {
                $(this)
                    .next("span")
                    .removeClass("error")
                    .addClass("valid");
            } else {
                $(this)
                    .next("span")
                    .removeClass("valid")
                    .addClass("error");
            }
        });
});
