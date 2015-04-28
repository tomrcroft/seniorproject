$(document).ready(function() {

     var pullID;
    /*
        When pending pull request is clicked, user is redirected to view the pull request.
    */
    $("#pending_pull_results .admin_pull_result").click(function (e) {

        var idnumber = $(this).attr("data-pull-id");
window.location = "view_pending_request.php?idnumber=" + idnumber;
        // $.ajax({
        //     type: "GET",
        //     url: '../backend/AdminViewPullRequest.php',
        //     data: idnumber,

        //     success: function(response) {
        //         // console.log(idnumber);
        //         window.location = "view_pending_request.php?idnumber=" + idnumber;
        //     }
        // });
    });

   /*
      This button will accept a pull request.

      After clicking this button, the function will grab the ID number of the pull request and the form data for rental fee and notes.
      It will then POST the data to the ApprovePullRequest.php file.

      It will expect an error response T/F.
      
      If True, alert with the error message.
      If False, the Pull Request was accepted and the page will redirect to pending_requests.php
   */
    $('#accept_pull_request_button').click(function(e) {

      var rentalfee = $("#rental_fee").val();
      var notes = $("#pull_request_notes").val();

      if(notes == "")
        notes = "N/A";

      if(rentalfee == "") {
         alert("Please enter a rental fee");
      }
      $.ajax({
         type: "POST",
         // dataType:'JSON',
         url: "../backend/ApprovePullRequest.php",
         data: { pullid: pullID, rentalFee: rentalfee, notes: notes},
         success: function(response) {
            if(response.error == true) {
               alert(response.errormsg);
            }
            else{
               // console.log(response);
               // console.log("Pull ID: " + idnumber);
               // console.log("Rental Fee: " + rentalfee);
               // console.log("Notes: " + notes);
               // console.log("Accept Pull Request Button Working!");
               window.location = response.location;
               // window.location = "pending_requests.php";
            }

         }
      });
   });

   /*
      This button will reject a pull request.

      After clicking this button, the function will grab the form data for reason.
      It will then POST the data to the RejectPullRequest.php file.

      It will expect an error response T/F.
      
      If True, alert with the error message.
      If False, the Pull Request was rejected and the page will redirect to pending_requests.php
   */
    $('#reject_pull_request_button').click(function(e) {
      // var idnumber = $('#pending_pull_results > div').attr('data-pull-id');
      var rejectreason = $("#reject_reason").val();
      // var notes = $("#pull_request_notes").val();
      // console.log(rejectreason);

      // if(notes == "")
      //   notes = "N/A";

      if(rejectreason == "") {
         alert("Please enter a reason");
      }
      $.ajax({
         type: "POST",
         dataType:'JSON',
         url: "../backend/RejectPullRequest.php",
         data: { pullid: pullID, reason: rejectreason},
         success: function(response) {
            if(response.error == true) {
               alert(response.errormsg);
            }
            else{
               // console.log(response);
               // console.log("Pull ID: " + idnumber);
               // console.log("Rental Fee: " + rentalfee);
               // console.log("Notes: " + notes);
               // console.log("Accept Pull Request Button Working!");
               window.location = response.location;
               // window.location = "pending_requests.php";
            }

         }
      });
   });

   /*
      These are the jQuery functions associated with the Accept and Reject Pull Request Modals.
      The modals were created by the Foundation Framework are called with jQuery.
   */

   $('.accept_pull_request_modal_button').click(function(e) {
        pullID = $(this).parent().parent().closest('div').attr('data-pull-id');
        e.stopImmediatePropagation();

        $.ajax({
         type: "POST",
         // dataType:'JSON',
         // url: "../backend/GetRestockingFee.php",
         data: { pullid: pullID },
         success: function(response) {
            if(response.error == true) {
               alert(response.errormsg);
            }
            else{
               // $('.current_rental_fee').html(response);
               $('.current_rental_fee').html('50.00');
            }
         }
      });
        $('#accept-request-modal').foundation('reveal','open');
   });

   $('.reject_pull_request_modal_button').click(function(e) {
      pullID = $(this).parent().parent().closest('div').attr('data-pull-id');
      e.stopImmediatePropagation();
      $('#reject-request-modal').foundation('reveal','open');
   });

   $('.cancel_modal_button').on('click', function() {
      $('#accept-request-modal').foundation('reveal', 'close');
      $('#reject-request-modal').foundation('reveal', 'close');
   });

});