<!-- Modal -->
<div class="modal fade" id="raitingModal" tabindex="-1" role="dialog" aria-labelledby="raitingModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{ __('user-university.review-the-course') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form id="course__rating__form" class="course-rating-form" action="" method="post">


            <div class="modal-body">

                <div class="form-group">
                    <label class="rating-title">{{ __('user-university.course-content') }}</label>


                    <div class="rating_1">
                        <label class="icon">
                            <input type="radio" name="courseContentRating" value="5" title="5 stars">
                        </label>
                        <label>
                            <input type="radio" name="courseContentRating" value="4" title="4 stars">
                        </label>
                        <label>
                            <input type="radio" name="courseContentRating" value="3" title="3 stars">
                        </label>
                        <label>
                            <input type="radio" name="courseContentRating" value="2" title="2 stars">
                        </label>
                        <label>
                            <input type="radio" name="courseContentRating" value="1" title="1 star">
                        </label>
                    </div>

                </div>


                <div class="form-group">


                        <label class="rating-title">{{ __('user-university.course-instructor') }}</label>


                        <div class="rating_2">
                            <label>
                                <input type="radio" name="courseInstructorRating" value="5" title="5 stars">
                            </label>
                            <label>
                                <input type="radio" name="courseInstructorRating" value="4" title="4 stars">
                            </label>
                            <label>
                                <input type="radio" name="courseInstructorRating" value="3" title="3 stars">
                            </label>
                            <label>
                                <input type="radio" name="courseInstructorRating" value="2" title="2 stars">
                            </label>
                            <label>
                                <input type="radio" name="courseInstructorRating" value="1" title="1 star">
                            </label>
                        </div>


                </div>

            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">{{ __('user-university.submit-rating') }}</button>
            </div>

        </form>


      </div>
    </div>
  </div>