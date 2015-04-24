
$(document).ready(function() {

   /*
      This button will accept a pull request.

      After clicking this button, the function will grab the ID number of the pull request and the form data for rental fee and notes.
      It will then POST the data to the xxxxxxx.php file.

      It will expect an error response T/F.
      
      If True, alert with the error message.
      If False, the Pull Request was accepted and the page will redirect to pending_requests.php
   */
   $('#accept_pull_request_button').click(function(e) {

      var idnumber = $('.pull_number').attr('data-pull-id');
      var rentalfee = $("#rental_fee").val();
      var notes = $("#pull_request_notes").val();

      if(notes == "")
        notes = "N/A";

      if(rentalfee == "") {
         alert("Please enter a rental fee");
      }
      $.ajax({
         type: "POST",
         dataType:'JSON',
         url: "../backend/ApprovePullRequest.php",
         data: { pullid: idnumber, rentalFee: rentalfee, notes: notes},
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
      It will then POST the data to the xxxxxxx.php file.

      It will expect an error response T/F.
      
      If True, alert with the error message.
      If False, the Pull Request was rejected and the page will redirect to pending_requests.php
   */
   $('#reject_pull_request_button').click(function(e) {
   
      var idnumber = $('.pull_number').attr('data-pull-id');
      var reason = $("#reject_reason").val();

      if(reason == "") {
         alert("Please enter a reason for rejection");
      }

      $.ajax({
         type: "POST",
         dataType:'JSON',
         url: "../backend/RejectPullRequest.php",
         data: { pullid: idnumber, reason: reason},
         success: function(response) {
            if(response.error == true) {
               alert(response.errormsg);
            }
            else{
               // console.log(response);
               // console.log("Reason: " + reason);
               // console.log("Reject Pull Request Button Working!");
               window.location = response.location;
            }

         }
      });
   });

   /*
      These are the jQuery functions associated with the Accept and Reject Pull Request Modals.
      The modals were created by the Foundation Framework are called with jQuery.
   */

   $('#go_back').click(function(e) {
      parent.history.back();
   });

   $('#accept_pull_request_modal_button').on('click', function() {
      $('#accept-request-modal').foundation('reveal','open');
   });

   $('#reject_pull_request_modal_button').on('click', function() {
      $('#reject-request-modal').foundation('reveal','open');
   });

   $('.cancel_modal_button').on('click', function() {
      $('#accept-request-modal').foundation('reveal', 'close');
      $('#reject-request-modal').foundation('reveal', 'close');
   });

});