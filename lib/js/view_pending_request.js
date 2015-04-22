
$(document).ready(function() {


   $('#submit_info_button').click(function(e) {
   window.location = "production_info.php";
   // $.ajax({
   //         // type: "POST",
   //         // dataType:'JSON',
   //         // url: "../backend/addToPullRequest.php",
   //         // data: { production: contactproduction, code: contactcode, billAddress: billingaddress, billCity: billingcity, billState: billingstate, billAreaCode: billingzip, billCountry: billingcountry, billAttn: billingname,
   //         //         shipAddress: shippingaddress, shipCity: shippingcity, shipState: shippingstate, shipAreaCode: shippingzip, shipCountry: shippingcountry, shipAttn: shippingname, pickupDate: pickupdate, returnDate: returndate, 
   //         //         contactName: contactname, contactEmail: contactemail, contactPhone: contactphone, contactFax: contactfax, billing: contactbilling, paymentType: paymenttype, description: contactdescription, salesperson: contactsalesperson, rentalFee: rentalfee},
   //         success: function(response) {
   //             if(response.error == true) {
   //               alert(response.errormsg);
   //             }
   //             else{
   //               window.location = "production_info.php";
   //             }

   //         }
   //       });
   });

   /*
      These are the jQuery functions associated with the Accept and Reject Pull Request Modals.
      The modals were created by the Foundation Framework are called with jQuery.
   */

   $('#go_back').click(function(e) {
      parent.history.back();
   });

   $('#accept_pull_request_button').on('click', function() {
      $('#accept-request-modal').foundation('reveal','open');
   });

   $('#accept_pull_request_button').on('click', function() {
      $('#reject-request-modal').foundation('reveal','open');
   });

   $('.cancel_button').on('click', function() {
      $('#accept-request-modal').foundation('reveal', 'close');
      $('#reject-request-modal').foundation('reveal', 'close');
   });

});