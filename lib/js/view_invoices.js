$(document).ready(function() {

    /*
        When pending pull request is clicked, user is redirected to view the pull request.
    */
    $("#pending_pull_results > div").click(function (e) {

        var idnumber = $(this).attr("data-pull-id");

        $.ajax({
            type: "GET",
            url: '../backend/AdminViewPullRequest.php',
            data: idnumber,

            success: function(response) {
                // console.log(idnumber);
                window.location = "view_pending_request.php?idnumber=" + idnumber;
            }
        });
    });

    /*
        The below code needs to be attached to the results. The current click function isn't attached to anything
    */

    $('#accept_pull_request_button').click(function(e) {

      var idnumber = $('#pending_pull_results > div').attr('data-pull-id');
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
         data: { pullid: idnumber, rentalFee: rentalfee, notes: notes},
         success: function(response) {
            if(response.error == true) {
               alert(response.errormsg);
            }
            else{
               console.log(response);
               console.log("Pull ID: " + idnumber);
               console.log("Rental Fee: " + rentalfee);
               console.log("Notes: " + notes);
               console.log("Accept Pull Request Button Working!");
               // window.location = response.location;
               // window.location = "pending_requests.php";
            }

         }
      });
   });

    /*
      These are the jQuery functions associated with the Accept and Reject Pull Request Modals.
      The modals were created by the Foundation Framework are called with jQuery.
   */

    $('#accept_pull_request_modal_button').click(function(e) {
        e.stopImmediatePropagation();
        $('#accept-request-modal').foundation('reveal','open');
    });

    $('#reject_pull_request_modal_button').click(function(e) {
        e.stopImmediatePropagation();
        $('#reject-request-modal').foundation('reveal','open');
    });

    $('.cancel_modal_button').on('click', function() {
      $('#accept-request-modal').foundation('reveal', 'close');
      $('#reject-request-modal').foundation('reveal', 'close');
   });

});