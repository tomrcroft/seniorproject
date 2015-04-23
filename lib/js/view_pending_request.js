
$(document).ready(function() {


   /*
      After clicking this button, the function will grab the form data for rental fee and notes.
      It will then POST the data to the xxxxxxx.php file.

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
         // url: "../backend/addToPullRequest.php",
         data: { rentalFee: rentalfee, notes: notes},
         success: function(response) {
            if(response.error == true) {
               alert(response.errormsg);
            }
            else{
               console.log("Rental Fee: " + rentalfee);
               console.log("Notes: " + notes);
               console.log("Accept Pull Request Button Working!");
               // window.location = "pending_requests.php";
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

   $('#accept_pull_request_modal_button').on('click', function() {
      $('#reject-request-modal').foundation('reveal','open');
   });

   $('.cancel_button').on('click', function() {
      $('#accept-request-modal').foundation('reveal', 'close');
      $('#reject-request-modal').foundation('reveal', 'close');
   });

});