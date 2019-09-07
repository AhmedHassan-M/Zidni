
$(document).ready(function() {

    $('.form-select-active').select2();

    $('.form-select-active').select2().change(function(){

        $(this).valid();

    });

});
