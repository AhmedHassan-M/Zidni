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

    // because edit starts the page with already selected courses 
    updateCourses();

    $('.selectCourses select').change(() => updateCourses());

    $('.form-select-active').select2({
        placeholder: "Select Courses"
    });

    // const createDataRange = () => {
    //     $(".daterange").daterangepicker(
    //         {
    //             opens: "center"
    //         },
    //         function(start, end, label) {
    //             console.log(
    //                 "A new date selection was made: " +
    //                     start.format("YYYY-MM-DD") +
    //                     " to " +
    //                     end.format("YYYY-MM-DD")
    //             );
    //         }
    //     );
    // };

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
            $(option).eq(0).prop('disabled', selectedCoursesState.includes($(option).val())).prop('selected', false).removeAttr('data-select2-id');
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
                        <h5>Resources: </h5>
                        <div class="form-group">
                            <label>Google Drive</label>
                            <input type="text" class="form-control" name="specializationDrive_${lastYearNumber}" placeholder="Google Drive url">
                        </div>
                        <div class="form-group">
                            <label>YouTube Playlist</label>
                            <input type="text" class="form-control" name="specializationYoutube_${lastYearNumber}" placeholder="YouTube url">
                        </div>
                    </div>
                </div>
            </div>
        
        `;


        // $('.daterange').val('');
        // $('.daterange').attr("placeholder","Check In");



        if(yearCardContainer.length < 8){
            $("#specializationYears").append(newYearCard);
            $(`#year_${lastYearNumber - 1}`).collapse('hide')
            $(`#year_${lastYearNumber}`).collapse('show')
            $(`#year_${lastYearNumber}`).children('.card-block').children('.selectCourses').append(newSelect.eq(0));
            $(newSelect.eq(0)).select2({
                placeholder: "Select Courses"
            });
            $('.selectCourses select').change(() => updateCourses());
        }



    };

    const deleteYear = (activeYear) => {

        let deleteYear =  activeYear.parent().parent().parent();

        

        swal({
            title: 'Are you sure you want to delete this year?',
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
        // createDataRange();
    });

    $(document).on("click", "#deleteYear", function(e) {
        e.preventDefault();
        deleteYear($(this));
    });


    // createDataRange();

    $(".load-card-box").remove();


});
