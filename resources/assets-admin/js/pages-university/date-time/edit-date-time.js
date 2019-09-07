$(document).ready(function() {


    $('.form-select-active').select2();

    $('.form-select-active').select2().change(function(){

        $(this).valid();

    });


    let startTime = $('.pickatime-start').pickatime({
        interval: 5,
        clear: '',
        formatSubmit: 'HH:i',
        format: 'h:i A',
        hiddenName: true,
    }).change(function(){
        $(this).valid();
    });



    
    let endTime = $('.pickatime-end').pickatime({
        interval: 5,
        clear: '',
        formatSubmit: 'HH:i',
        format: 'h:i A',
        hiddenName: true,

    }).change(function(){
        $(this).valid();
    });

    


    let pickerStartTime = startTime.pickatime('picker');
    let pickerEndTime = endTime.pickatime('picker');



    pickerStartTime.on({
        open: function() {
        },
        close: function() {
        },
        render: function() {
        },
        stop: function() {
        },
        set: function() {
            pickerEndTime.clear();
        }
    });


    pickerEndTime.on({
        open: function() {
          
            let activeStartingTimeH = pickerStartTime.get("view").hour;
            let activeStartingTimeM = pickerStartTime.get("view").mins;

            console.log(activeStartingTimeH, activeStartingTimeM);

            pickerEndTime.set('disable', [
                { from: [0,0], to: [activeStartingTimeH,activeStartingTimeM] },
            ]);

        },
        close: function() {
        },
        render: function() {
        },
        stop: function() {
        },
        set: function() {
        }
    })


});
