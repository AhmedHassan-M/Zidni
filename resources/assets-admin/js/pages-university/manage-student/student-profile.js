

$(document).ready(function() {

    $(".load-card-box").remove();

    $(".select-int-nosearch").select2({
        minimumResultsForSearch: -1
    });

    // ON CHANGE SELECT


    const ApplicantOnlineDocumentsStatus = () => {

        if ( $("#applicantOnlineDocumentsStatus").val() == "request-documents") {


            $("#applicantRequiredOnlineDocumentsContainer").show();
            $("#applicantCompletedOnlineDocumentsContainer").hide();
            $("#applicantRejectOnlineDocumentsContainer").hide();

            
            

            $("#applicantRequiredOnlineDocuments").prop('disabled', false);
            $("#applicantCompletedOnlineDocuments").prop('disabled', true);
            $("#applicantRejectOnlineDocumentsContainer").prop('disabled', true);

            
    
        }else if ($("#applicantOnlineDocumentsStatus").val() == "completed") {
    
            $("#applicantCompletedOnlineDocumentsContainer").show();
            $("#applicantRequiredOnlineDocumentsContainer").hide();
            $("#applicantRejectOnlineDocumentsContainer").hide();

            $("#applicantCompletedOnlineDocuments").prop('disabled', false);
            $("#applicantRequiredOnlineDocuments").prop('disabled', true);
            $("#applicantRejectOnlineDocumentsContainer").prop('disabled', true);


        } else if ($("#applicantOnlineDocumentsStatus").val() == "rejected-applicant") {

            $("#applicantRejectOnlineDocumentsContainer").show();
            $("#applicantCompletedOnlineDocumentsContainer").hide();
            $("#applicantRequiredOnlineDocumentsContainer").hide();


            $("#applicantRejectOnlineDocumentsContainer").prop('disabled', false);
            $("#applicantCompletedOnlineDocuments").prop('disabled', true);
            $("#applicantRequiredOnlineDocuments").prop('disabled', true);


        } else {

            $("#applicantRejectOnlineDocumentsContainer").hide();
            $("#applicantCompletedOnlineDocumentsContainer").hide();
            $("#applicantRequiredOnlineDocumentsContainer").hide();

            $("#applicantRejectOnlineDocumentsContainer").prop('disabled', true);
            $("#applicantCompletedOnlineDocuments").prop('disabled', true);
            $("#applicantRequiredOnlineDocuments").prop('disabled', true);


        }

    }






    const ApplicantOfflineDocumentsStatus = () => {

        if ( $("#applicantOfflineDocumentsStatus").val() == "request-documents") {
    
            $("#applicantRequiredOfflineDocumentsContainer").show();
            $("#applicantCompletedOfflineDocumentsContainer").hide();
            $("#applicantRejectOfflineDocumentsContainer").hide();

            
            

            $("#applicantRequiredOfflineDocuments").prop('disabled', false);
            $("#applicantCompletedOfflineDocuments").prop('disabled', true);
            $("#applicantRejectOfflineDocumentsContainer").prop('disabled', true);

            
    
        }else if ($("#applicantOfflineDocumentsStatus").val() == "completed") {
    
            $("#applicantCompletedOfflineDocumentsContainer").show();
            $("#applicantRequiredOfflineDocumentsContainer").hide();
            $("#applicantRejectOfflineDocumentsContainer").hide();

            $("#applicantCompletedOfflineDocuments").prop('disabled', false);
            $("#applicantRequiredOfflineDocuments").prop('disabled', true);
            $("#applicantRejectOfflineDocumentsContainer").prop('disabled', true);


        } else if ($("#applicantOfflineDocumentsStatus").val() == "rejected-applicant") {

            $("#applicantRejectOfflineDocumentsContainer").show();
            $("#applicantCompletedOfflineDocumentsContainer").hide();
            $("#applicantRequiredOfflineDocumentsContainer").hide();


            $("#applicantRejectOfflineDocumentsContainer").prop('disabled', false);
            $("#applicantCompletedOfflineDocuments").prop('disabled', true);
            $("#applicantRequiredOfflineDocuments").prop('disabled', true);


        } else {

            $("#applicantRejectOfflineDocumentsContainer").hide();
            $("#applicantCompletedOfflineDocumentsContainer").hide();
            $("#applicantRequiredOfflineDocumentsContainer").hide();

            $("#applicantRejectOfflineDocumentsContainer").prop('disabled', true);
            $("#applicantCompletedOfflineDocuments").prop('disabled', true);
            $("#applicantRequiredOfflineDocuments").prop('disabled', true);


        }

    }



    const ApplicantPaymentStatus = () => {

        if ( $("#applicantPaymentStatus").val() == "completed") {
    
            $("#applicantCompletedPaymentContainer").show();
            $("#applicantRejectPaymentContainer").hide();

            $("#applicantCompletedPayment").prop('disabled', false);
            $("#applicantRejectPayment").prop('disabled', true);

            
    
        }else if ($("#applicantPaymentStatus").val() == "rejected") {
    
            $("#applicantCompletedPaymentContainer").hide();
            $("#applicantRejectPaymentContainer").show();

            $("#applicantCompletedPayment").prop('disabled', true);
            $("#applicantRejectPayment").prop('disabled', false);


        } else {


            $("#applicantCompletedPaymentContainer").hide();
            $("#applicantRejectPaymentContainer").hide();

            $("#applicantCompletedPayment").prop('disabled', true);
            $("#applicantRejectPayment").prop('disabled', true);


        }

    }



    ApplicantOnlineDocumentsStatus();
    ApplicantOfflineDocumentsStatus();
    ApplicantPaymentStatus();



    $("#applicantOnlineDocumentsStatus").change(function() { 
        ApplicantOnlineDocumentsStatus();
    });




    $("#applicantOfflineDocumentsStatus").change(function() { 
        ApplicantOfflineDocumentsStatus();
    });


    $("#applicantPaymentStatus").change(function() { 
        ApplicantPaymentStatus();
    });
    
});

