$(document).ready(function() {
    const EditQuizzesForm = $("#EditQuizzesForm");

    EditQuizzesForm.validate({
        rules: {
            editQuizzesCategory: {
                required: true
            },
            editQuizzesName: {
                required: true,
                minlength: 3,
                maxlength: 30
            },
            editQuizzesPassingScore: {
                required: true
            }
        },
        messages: {
            editQuizzesCategory: {
                required: "Quiz Category is required"
            },
            editQuizzesName: {
                required: "Quiz Name is required"
            },
            editQuizzesPassingScore: {
                required: "Quiz Passing Score is required"
            }
        }
    });

    $(".popover-info").popover();

    // Question Counter

    let questionsCounter = $(".quizQuestionsContainer").length;

    $("#quizQuestionsCounter span").html(questionsCounter);

    $("#quizQuestionsCounterInput").val(questionsCounter);

    // Total Score Counter

    function calculateSum() {
        var sum = 0;
        //iterate through each textboxes and add the values
        $(".quiz-questions-score").each(function() {
            //add only if the value is number
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseFloat(this.value);
            }
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#totalScoreCounter span").html(sum);

        $("#quizScoreCounterInput").val(sum);
    }

    calculateSum();

    //iterate through each textboxes and add keyup
    //handler to trigger sum event
    $(".quiz-questions-score").each(function() {
        $(this).keyup(function() {
            calculateSum();
        });
    });

    // Radio Error

    function radioError() {
        $(".pretty label.error").hover(function() {
            $(this)
                .popover({
                    trigger: "hover",
                    title: "Correct Answer",
                    content:
                        "Please check the correct answer for this question",
                    placement: "left"
                })
                .popover("show");
        });
    }

    const quizClone = $(".quizQuestionsContainer");

    let quizQuestionsTitleLabel = 1;
    let quizQuestionsTitleId = 1;
    let quizQuestionsTitleName = 1;

    let quizQuestionsScoreLabel = 1;
    let quizQuestionsScoreId = 1;
    let quizQuestionsScoreName = 1;

    let quizQuestionsCorrectAnswers = 1;

    let quizQuestionsAnswersTitle = 1;

    let lastQuestionCount = parseFloat(
        $(".quizQuestionsContainer")
            .last()
            .data("question")
    );

    // console.log(lastQuestionCount);

    // Add More Questions

    $(document).on("click", ".addOtherQuestions", function() {
        lastQuestionCount++;

        let newQuiz = quizClone.first().clone();

        // quizQuestionsTitleLabel

        newQuiz.attr("data-question", lastQuestionCount);

        newQuiz
            .find(".quiz-questions-label")
            .attr("for", "quizQuestionsTitle_" + lastQuestionCount);

        // quizQuestionsTitle

        newQuiz
            .find(".quiz-questions-title")
            .attr("id", "quizQuestionsTitle_" + lastQuestionCount);
        newQuiz
            .find(".quiz-questions-title")
            .attr("name", "quizQuestionsTitle_" + lastQuestionCount);

        // quizQuestionsScoreLabel

        newQuiz
            .find(".quiz-questions-label")
            .attr("for", "quizQuestionsScore_" + lastQuestionCount);

        // quizQuestionsScore

        newQuiz
            .find(".quiz-questions-score")
            .attr("id", "quizQuestionsScore_" + lastQuestionCount);
        newQuiz
            .find(".quiz-questions-score")
            .attr("name", "quizQuestionsScore_" + lastQuestionCount);

        // quiz questions correct answers

        newQuiz
            .find(".quiz-questions-correct-answers")
            .attr(
                "name",
                "quizQuestionsCorrectAnswers_" + lastQuestionCount + "[]"
            );

        // quiz questions answers title

        newQuiz
            .find(".quiz-questions-answers-title")
            .attr(
                "name",
                "quizQuestionsAnswersTitle_" + lastQuestionCount + "[]"
            );

        // values = ''

        newQuiz.find(".quiz-questions-title").val("");
        newQuiz.find(".quiz-questions-score").val("");
        newQuiz.find(".quiz-questions-correct-answers").prop("checked", false);
        newQuiz.find(".quiz-questions-answers-title").val("");

        newQuiz.find(".moreAnswers").remove();

        $("#quizQuestionsWrapper").append(newQuiz.fadeIn());

        $(".popover-info").popover();

        let questionsCounter = $(".quizQuestionsContainer").length;

        $("#quizQuestionsCounter span").html(questionsCounter);

        $("#quizQuestionsCounterInput").val(questionsCounter);

        $(".quiz-questions-score").each(function() {
            $(this).keyup(function() {
                calculateSum();
            });
        });

        radioError();

        swal({
            position: "top-start",
            type: "success",
            title: "Question Added",
            showConfirmButton: false,
            timer: 1500
        });
    });

    // Add More Answers

    $(document).on("click", ".addMoreAnswers", function() {
        const cloneAnswersFromQuestion = $(this)
            .parent()
            .find("fieldset .form-check")
            .first()
            .clone();

        cloneAnswersFromQuestion
            .find(".quiz-questions-correct-answers")
            .prop("checked", false);

        cloneAnswersFromQuestion.find(".quiz-questions-answers-title").val("");

        cloneAnswersFromQuestion.find("label.error").remove();

        cloneAnswersFromQuestion.addClass("moreAnswers");

        let maxAnswersLimit = $(this)
            .parent()
            .find("fieldset .form-check");

        if (maxAnswersLimit.length < 5) {
            $(this)
                .parent()
                .find("fieldset")
                .append(cloneAnswersFromQuestion.fadeIn());
        }

        $(".quizQuestionsContainer").each(function(i, obj) {
            $(this)
                .find(".quiz-questions-correct-answers")
                .each(function(index) {
                    $(this).val(index);
                });
        });

        radioError();
    });

    // Answer Delete Icon

    $(document).on("click", ".quizAnswerDelete", function() {
        $(this)
            .parent()
            .remove();

        $(".quizQuestionsContainer").each(function(i, obj) {
            $(this)
                .find(".quiz-questions-correct-answers")
                .each(function(index) {
                    $(this).val(index);
                });
        });
    });

    // Quiz Questions Delete

    $(document).on("click", ".quizQuestionsDelete", function() {
        let deleteQuestion = $(this)
            .parent()
            .parent()
            .parent()
            .parent();

        swal({
            title: "Are you sure you want to delete this Question?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel"
        }).then(function(result) {
            if (result.value) {
                swal({
                    title: "Question successfully deleted",
                    type: "success",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Good",
                    confirmButtonClass: "btn btn-success"
                });

                deleteQuestion.remove();
                let questionsCounter = $(".quizQuestionsContainer").length;

                $("#quizQuestionsCounter span").html(questionsCounter);

                $("#quizQuestionsCounterInput").val(questionsCounter);

                calculateSum();
            }
        });
    });

    //select2

    $(".form-select-active").select2();

    $(".form-select-active")
        .select2()
        .change(function() {
            $(this).valid();
        });

    // date picker
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

    // data table
    const tableID = "#allExercisesTable";
    const name = "Exercise";
    const namePlural = "Exercises";
    const allExercisesTable = $(tableID);

    allExercisesTable.DataTable({
        dom:
            "<'row'<'col-md-6 tabel-option'B><'col-md-6 tabel-search'f><'col-md-6 table-info'i><'col-md-6 table-lenght'l>>" +
            "<'row'<'col-md-12 table-container't>><'row'<'col-md-12 table-pag'p>>",
        paging: true,
        ordering: true,
        autoWidth: true,
        responsive: false,
        scrollX: true,
        buttons: [
            {
                extend: "collection",
                text: "All " + namePlural + " Options",

                buttons: [
                    {
                        extend: "selectAll",
                        text: "Select All " + namePlural
                    },
                    {
                        extend: "selectNone",
                        text: "Unselect All " + namePlural
                    }
                ]
            }
        ],
        columnDefs: [
            {
                orderable: false,
                className: "select-checkbox",
                targets: 0,
                width: "5%"
            },
            {
                targets: 3,
                width: "15%"
            }
        ],
        select: {
            style: "multi",
            selector: "td:first-child"
        },
        order: [[1, "desc"]]
    });

    $(tableID + " tbody")
        .on("mouseover", "tr", function() {
            $(this).addClass("highlight");
            $(this)
                .find(".options-container a")
                .removeClass("hide-options");
            $(this)
                .find(".options-container a")
                .addClass("show-options");
        })
        .on("mouseleave", "tr", function() {
            $(this).removeClass("highlight");
            $(this)
                .find(".options-container a")
                .addClass("hide-options");
            $(this)
                .find(".options-container a")
                .removeClass("show-options");
        });

    $(tableID + "Container .buttons-collection").on("click", function() {
        $(tableID + "Container .dt-button-collection").append(
            '<button id="table-delete" class="btn" tabindex="0" aria-controls="postsTable"><span>Delete Selected Exercises</span></button>'
        );

        if ($("tr").hasClass("selected")) {
            $(tableID + "Container #table-delete").removeAttr("disabled");
        } else {
            $(tableID + "Container #table-delete").prop("disabled", true);
        }

        $(tableID + "Container .buttons-select-all").click(function() {
            $(tableID + "Container #table-delete").removeAttr("disabled");
        });

        $(tableID + "Container .buttons-select-none").click(function() {
            $(tableID + "Container #table-delete").prop("disabled", true);
        });

        $(".buttons-colvis").click(function() {
            $("#table-delete").remove();
        });

        $(".dt-button-background").click(function() {
            $("#table-delete").remove();
        });

        $(tableID + "Container #table-delete").click(function() {
            swal({
                title:
                    "Are you sure you want to delete selected " +
                    namePlural +
                    " ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel"
            }).then(function(result) {
                if (result.value) {
                    $(tableID + "Container tr.selected").each(function() {
                        // console.log($("#usersTable tr.selected")[0].id;;
                        id = this.id;

                        $.ajax({
                            type: "POST",
                            url: "/api/delete" + name,
                            data: {
                                id: id
                            },
                            success: function(data) {
                                console.log(data);

                                if ($("#usersTable tr").hasClass("selected")) {
                                    $("#usersTable tr.selected").remove();
                                    $("#table-delete").remove();
                                }

                                console.log(1);
                            },
                            error: function() {
                                console.log("error");
                            }
                        });
                    });

                    swal({
                        title: namePlural + " Successfully Deleted",
                        type: "success",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Good",
                        confirmButtonClass: "btn btn-success"
                    });

                    if ($(tableID + " tr").hasClass("selected")) {
                        $(tableID + " tr.selected").remove();
                        $("#table-delete").remove();
                    }
                } else {
                    $("#table-delete").remove();
                }
            });
        });
    });

    $(tableID + " .delete-instructors").click(function() {
        let deleteRow = $(this)
            .parent()
            .parent();

        id = this.id;
        //console.log(id);

        swal({
            title: "Are you sure you want to delete this " + name + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "/api/delete" + name,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);

                        swal({
                            title: name + " successfully deleted",
                            type: "success",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "Good",
                            confirmButtonClass: "btn btn-success"
                        });

                        deleteRow.remove();
                    },
                    error: function() {
                        console.log("error");
                    }
                });
            }
        });
    });

    // form submit

    // $('[data-toggle="popover"]').popover();

    // $("#EditQuizzesForm").on("submit", function(e) {
    //     radioError();

    //     $(".quiz-questions-answers-title").each(function() {
    //         let inputStatus = $(this).val().length;

    //         let allInputs = $(".quiz-questions-answers-title").map(function() {
    //             if ($(this).val().length === 0) {
    //                 $(this).addClass("error");
    //                 $(this).removeClass("valid");

    //                 e.preventDefault();
    //             } else {
    //                 $(this).addClass("valid");
    //                 $(this).removeClass("error");
    //             }
    //         });

    //         if (inputStatus === 0) {
    //             let notValidInput = $(this);

    //             $(this).addClass("error");
    //             $(this).removeClass("valid");

    //             swal({
    //                 type: "error",
    //                 title: "Please Complete All Questions",
    //                 showConfirmButton: false,
    //                 timer: 3000
    //             });

    //             e.preventDefault();
    //         } else {
    //             $(this).addClass("valid");
    //             $(this).removeClass("error");
    //         }
    //     });
    // });
});
