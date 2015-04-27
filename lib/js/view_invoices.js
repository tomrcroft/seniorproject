$(document).ready(function() {

   var invoiceID;
   /*
      When invoice is clicked, new page opens displaying the invoice.
   */
   $("#invoice_results .user_invoice_result").click(function (e) {

      var idnumber = $(this).attr("data-invoice-id");

      $.ajax({
         type: "POST",
         // url: '../backend/AdminViewPullRequest.php',
         data: { invoiceID: idnumber },
         success: function(response) {
            console.log(idnumber);
         // window.location = "view_pending_request.php?idnumber=" + idnumber;
         }
      });
   });

   /*
      This button will accept an invoice.

      After clicking this button, the function will use the ID number set by .accept_invoice_modal_button.
      It will then POST the ID number to the xxxxxxx.php file.

      It will expect an error response T/F.
      
      If True, alert with the error message.
      If False, the Invoice was accepted and the page will refresh.
   */
   $('#accept_invoice_button').click(function(e) {

      // console.log(invoiceID); Make sure the invoiceID was set correctly.
      $.ajax({
         type: "POST",
         // dataType:'JSON',
         // url: "../backend/ApprovePullRequest.php",
         data: { invoiceid: invoiceID },
         success: function(response) {
            if(response.error == true) {
               alert(response.errormsg);
            }
            else{
               console.log(response);
               console.log("Invoice ID: " + invoiceID);
               console.log("Accept Invoice Button Working!");
               // window.reload();
            }

         }
      });
   });

   /*
      This button will reject an invoice.

      After clicking this button, the function will use the ID number set by .reject_invoice_modal_button.
      It will then POST the ID number to the xxxxxxx.php file.

      It will expect an error response T/F.
      
      If True, alert with the error message.
      If False, the invoice was rejected and the page will refresh.
   */
   $('#reject_invoice_button').click(function(e) {

      // console.log(invoiceID); Make sure the invoiceID was set correctly.
      $.ajax({
         type: "POST",
         // dataType:'JSON',
         // url: "../backend/ApprovePullRequest.php",
         data: { invoiceid: invoiceID },
         success: function(response) {
            if(response.error == true) {
               alert(response.errormsg);
            }
            else{
               console.log(response);
               console.log("Invoice ID: " + invoiceID);
               console.log("Reject Invoice Button Working!");
               // window.reload();
            }

         }
      });
   });

   /*
      These are the jQuery functions associated with the Accept and Reject Invoice Modals.
      The modals were created by the Foundation Framework are called with jQuery.
   */
    $('.accept_invoice_modal_button').click(function(e) {
      //Set the invoice ID for the accept invoice function.
      invoiceID = $(this).parent().parent().closest('div').attr('data-invoice-id');
      e.stopImmediatePropagation();
      $('#accept-invoice-modal').foundation('reveal','open');
      // console.log(invoiceID);
    });

    $('.reject_invoice_modal_button').click(function(e) {
      //Get the restocking fee for this invoice.
      invoiceID = $(this).parent().parent().closest('div').attr('data-invoice-id');
      $.ajax({
         type: "POST",
         // dataType:'JSON',
         // url: "../backend/ApprovePullRequest.php",
         data: { invoiceid: invoiceID },
         success: function(response) {
            if(response.error == true) {
               alert(response.errormsg);
            }
            else{
               // $('.restocking_fee').html(response);
               $('.restocking_fee').html('50.00');
            }
         }
      });
      e.stopImmediatePropagation();
      $('#reject-invoice-modal').foundation('reveal','open');
    });

    $('.cancel_modal_button').on('click', function() {
      $('#accept-invoice-modal').foundation('reveal', 'close');
      $('#reject-invoice-modal').foundation('reveal', 'close');
   });

   $('.invoice_status').each(function(index) {
      // console.log(index + ": " + $(this).text());
      if($(this).text() == "Accepted")
         $(this).css("color", "#0000FF");
      else if($(this).text() == "Rejected")
         $(this).css("color", "#FF0000");
      else
         $(this).css("color", "#008000")
   });
});