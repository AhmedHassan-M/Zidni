import '../components/app';
import '../components/app-menu';
import '../components/login';


// Announcement Form


$("#AnnouncementForm").validate({
    rules: {
        announcementTitle: {
            required: true,

        },
        announcementText: {
            required: true,
            minlength: 5,
            maxlength: 1000

        }
    },
    messages: {
        announcementTitle: {
            required: "Announcement Title is required",
        },

        announcementText: {
            required: "Announcement Text is required"
        }

    },

    // SignUp Submit Handler
    submitHandler: function (form, e) {

        e.preventDefault();

        let url = "/admin/send-announcement"; // the script where you handle the form input.

        let announcementTitle = $("#announcementTitle").val();
        let announcementText = $("#announcementText").val();

        var form = $('#AnnouncementForm');
        swal({
            title: 'Are you sure you want to publish this announcement?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Publish'
          }).then((result) => {
            if (result.value) {



                $.ajax({
                    type: "POST",
                    url: url,
                    data:form.serialize(),
                    dataType:'json',
                    beforeSend: function() {
        
                        $('.ajax-loading').css('display', 'block');
        
                    },
                    complete: function() {
        
                        $('.ajax-loading').css('display', 'none');
        
                    },
                    success: function (data) {
        
                        console.log(data);

                        Swal({
                            title: "Announcement Successfully published To All Zidni's Users",
                            imageUrl: '/images/zidni-logo-1.png',
                            imageWidth: 150,
                            imageHeight: 150,
                            imageAlt: 'Zidni Logo',
                            animation: true,
                            showCancelButton: false,
                            confirmButtonColor: '#01273f',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Great',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            width: '60rem',
                            customClass: 'welcomeAlertMessage'
                        }).then((result) => {
                            if (result.value) {
        
                                $('#announcement').modal('hide')
        
                                let announcementTitle = $("#announcementTitle").val('');
                                let announcementText = $("#announcementText").val('');                    }
                        });
                       
                    },
                    error: function (data) {
        
                        
        
                    },
        
        
                });



            }
          })






    }



});


// for all pages


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

// reset notifications number

$(".notification-icon").click(function(){
    $.ajax({
        type:'POST',
        url:'/reset-admin-notifications',
        data:{
        
        },
        dataType:'json',
        
        success: function(data){
            console.log(data);

            $('.tag-pill').hide();
                  
            
        },
          
    });
})

// Update Admin Notifications 

function notifications(){
	//console.log(12);
        $.ajax({
            type:'POST',
            url:'/fetch-new-notifications',
            data:{
            
            },
            dataType:'json',
            
            success: function(data){
                for(var i = 0 ; i < data[0] ; i++){
                    var id = data[1][i].id;
                    $('.tag-pill').show();
                    if($('.available').length < data[0]){
                        
                        var notifications = '<a href="'+data[1][i].link+'" id="check-availability" class="list-group-item available"><div class="media"><div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="http://placehold.it/100x100" alt="avatar"></span></div><div class="media-body"><h6 class="media-heading">'+data[1][i].title+'</h6><p class="notification-text font-small-3 text-muted">'+data[1][i].text+'</p></div></div></a>';
                        $('.scrollable-container').prepend(notifications);
                        //$('.tag-pill').show();

                    }
                }
                
                var number = data[0];
                $('.tag-pill').html(number);
            },
	          
        });
}

setInterval(() => {
    notifications()
}, 5000);

$(document).ready(function() {

    $(".load-card-box").remove();

});



