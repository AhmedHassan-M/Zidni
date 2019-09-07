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

    console.log(lastQuestionCount);

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

    // form submit

    $('[data-toggle="popover"]').popover();

    $("#EditQuizzesForm").on("submit", function(e) {
        radioError();

        $(".quiz-questions-answers-title").each(function() {
            let inputStatus = $(this).val().length;

            let allInputs = $(".quiz-questions-answers-title").map(function() {
                if ($(this).val().length === 0) {
                    $(this).addClass("error");
                    $(this).removeClass("valid");

                    e.preventDefault();
                } else {
                    $(this).addClass("valid");
                    $(this).removeClass("error");
                }
            });

            if (inputStatus === 0) {
                let notValidInput = $(this);

                $(this).addClass("error");
                $(this).removeClass("valid");

                swal({
                    type: "error",
                    title: "Please Complete All Questions",
                    showConfirmButton: false,
                    timer: 3000
                });

                e.preventDefault();
            } else {
                $(this).addClass("valid");
                $(this).removeClass("error");
            }
        });
    });
});
