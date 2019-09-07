
import html2canvas from 'html2canvas';

$(document).ready(function () {


    html2canvas(document.querySelector('#main-certificate-container')).then(function(canvas) {
    
        $('#main-canvas-certificate-container').append(canvas)

    });


    $(document).on('click', '#share-certificate-button', function () {


        html2canvas(document.querySelector('#main-certificate-container')).then(function(canvas) {
    
            $('#certificate-share').append(canvas)


            const can = document.getElementById("certificate-share").getElementsByTagName("canvas");

            let certificateImage = new Image();
            certificateImage.src = can[0].toDataURL("image/png");


            $('#certificate-share').append(certificateImage)

        });
    


    });



    $(document).on('click', '#download-certificate-button', function () {


        html2canvas(document.querySelector('#main-certificate-container')).then(function(canvas) {
    
            $('#certificate-image').append(canvas)

            saveAs(canvas.toDataURL(), 'certificate.png');
        });
    


    });

    

    $(document).on('lity:close', function(event, instance) {
        $('#certificate-image canvas').remove();
    });


    $(document).on('lity:close', function(event, instance) {
        $('#certificate-share canvas').remove();
        $('#certificate-share img').remove();

    });
    
    function saveAs(uri, filename) {
    
        var link = document.createElement('a');
    
        if (typeof link.download === 'string') {
    
            link.href = uri;
            link.download = filename;
    
            //Firefox requires the link to be in the body
            document.body.appendChild(link);
    
            //simulate click
            link.click();
    
            //remove the link when done
            document.body.removeChild(link);
    
        } else {
    
            window.open(uri);
    
        }
    }


});


