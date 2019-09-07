$(document).ready(function () {

    // Open the first lesson on load
    $('#lessonsAccordion .card-header').eq(0).find('.btn').removeClass('collapsed');
    $('#lessonsAccordion .card').eq(0).find('.collapse').addClass('show');

});