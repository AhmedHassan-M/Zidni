$(document).ready(function() {

    function updateSelectedCoursesState() {
        const selectedCoursesState = [];
        const dropdowns = $('.selectCourses');
        for (let dropdown of dropdowns) {
            for (let option of $(dropdown).find('option:selected')) {
                selectedCoursesState.push($(option).val());
            }
        }
        return selectedCoursesState;
    }

    function updateCourses() {
        const selectedCoursesState = updateSelectedCoursesState();
        console.log(selectedCoursesState);
        const dropdowns = $('.selectCourses');
        for (let dropdown of dropdowns) {
            for (let option of $(dropdown).find('option')) {
                console.log(selectedCoursesState.includes($(option).val()));
                if (!$(option).is(':selected')) {
                    $(option).eq(0).prop('disabled', selectedCoursesState.includes($(option).val()));
                }
                
            }
            $(dropdown).find('select').select2({
                placeholder: "Select Courses"
            });
        }
    }

    $('.selectCourses select').change(() => updateCourses());

    $('.form-select-active').select2({
        placeholder: "Select Courses"
    });

    // $(".daterange_1").daterangepicker(
    //     {
    //         opens: "center"
    //     },
    //     function(start, end, label) {
    //         console.log(
    //             "A new date selection was made: " +
    //                 start.format("YYYY-MM-DD") +
    //                 " to " +
    //                 end.format("YYYY-MM-DD")
    //         );
    //     }
    // );


    const createNewYear = () => {

        const selectedCoursesState = updateSelectedCoursesState();

        let yearCardContainer = $("#specializationYears .card");

        let lastYearNumber = parseFloat(yearCardContainer.last().data("year"));

        lastYearNumber++;

        const selectCourses = $('.selectCourses').eq(0).clone();

        const newSelect = selectCourses.find('select').eq(0).clone();

        newSelect.empty()
            .attr('class', 'form-control auto-save form-select-active')
            .attr('name', `specializationCourses_${lastYearNumber}[]`)
            .removeAttr('data-select2-id tabindex aria-hidden');

        $.each(selectCourses.find('option'), (i, option) => {
            $(option).eq(0).prop('disabled', selectedCoursesState.includes($(option).val())).removeAttr('data-select2-id');
            $(newSelect).eq(0).append($(option));
        });

        let newYearCard = `
        
        
            <div class="card" data-year="${lastYearNumber}">
                <div class="card-header" role="tab" id="specializationYear_${lastYearNumber}">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-parent="#specializationYears" href="#year_${lastYearNumber}"
                                aria-expanded="false" aria-controls="year_${lastYearNumber}">
                        <div class="icon-week-status">

                                <i class="fas fa-plus"></i>
                                <i class="fas fa-minus"></i>

                        </div>
                                                    
                        <span>Specialization Level</span>


                        </button>

                        <a class="deleteYear_${lastYearNumber}" id="deleteYear"><i class="fas fa-trash"></i></a>

                    </h5>
                </div>

                <div id="year_${lastYearNumber}" class="collapse" role="tabpanel"
                    aria-labelledby="specializationYear_${lastYearNumber}">
                    <div class="card-block">
                        <div class="form-group selectCourses">
                            <label>Select Courses</label>
                        </div>
                    </div>
                </div>
            </div>
        
        `;

        /*
            <div class="form-group">

                <label>Semester 1</label>
                <input type="text" class="form-control daterange_${lastYearNumber}" placeholder="Select Start & End Date" name="specializationSemester_${lastYearNumber}[]" value=""/>

            </div>

            <div class="form-group">

                <label>Semester 2</label>
                <input type="text" class="form-control daterange_${lastYearNumber}" placeholder="Select Start & End Date" name="specializationSemester_${lastYearNumber}[]" value=""/>

            </div>

        */


        // $('.daterange').val('');
        // $('.daterange').attr("placeholder","Check In");






        if(yearCardContainer.length < 8){

            $("#specializationYears").append(newYearCard);
            $(`#year_${lastYearNumber - 1}`).collapse('hide');
            $(`#year_${lastYearNumber}`).collapse('show');
            $(`#year_${lastYearNumber}`).children('.card-block').children('.selectCourses').append(newSelect.eq(0));
            $(newSelect.eq(0)).select2({
                placeholder: "Select Courses"
            });
            $('.selectCourses select').change(() => updateCourses());
        }

        // $(`.daterange_${lastYearNumber}`).daterangepicker(
        //     {
        //         opens: "center"
        //     },
        //     function(start, end, label) {
        //         console.log(
        //             "A new date selection was made: " +
        //                 start.format("YYYY-MM-DD") +
        //                 " to " +
        //                 end.format("YYYY-MM-DD")
        //         );
        //     }
        // );





    };

    const deleteYear = (activeYear) => {

        let deleteYear =  activeYear.parent().parent().parent();

        

        swal({
            title: 'Are you sure you want to delete this level?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then(function (result) {
            if (result.value) {
    

                swal({
                    title: 'year successfully deleted',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Good',
                    confirmButtonClass: 'btn btn-success',
                });
    
                deleteYear.remove();

                updateCourses();
    
            }
        });
    }



    $(document).on("click", "#addYear", function(e) {
        e.preventDefault();
        createNewYear();
    });

    $(document).on("click", "#deleteYear", function(e) {
        e.preventDefault();
        deleteYear($(this));
    });


    $(".load-card-box").remove();


});
