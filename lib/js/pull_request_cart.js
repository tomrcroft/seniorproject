/*
  This is the javascript file for cart functionality on pull_request_cart.php.
  Users may remove an item, cancel a pull request, or send a pull request.
*/

$(document).ready(function() {


   /*
      Find the id number of the inventory item placed as an attribute in a parent div and POST the value to removeFromCart.php
      If removeFromCart.php function was successful, the window will refresh and the item will be removed from cart.
   */
   $('.remove_item').click(function(e) {

      var idnumber = $(this).parent().parent().parent().parent().closest('div').attr('id');

      console.log(idnumber);

      $.ajax({
         type: "POST",
         url: '../backend/removeFromCart.php',
         data: {itemId: idnumber},

         success: function(response) {
            // alert("Item : " + idnumber + " removed.");
            location.reload();
         }
      });
   });

   /*
      These are the jQuery functions associated with the Accept and Reject Invoice Modals.
      The modals were created by the Foundation Framework are called with jQuery.
   */
   $('#cancel_pull_request').on('click', function() {
      $('#cancel-modal').foundation('reveal','open');
   });

   $('#send_pull_request').on('click', function() {
      $('#send-modal').foundation('reveal','open');
   });

   $('#reject_send').on('click', function() {
      $('#send-modal').foundation('reveal', 'close');
   });

   $('#reject_cancel').on('click', function() {
      $('#cancel-modal').foundation('reveal', 'close');
   });

   /*
      If the user is ready to submit their cart, redirect them shipping_info.php to verify shipping information.
   */
   $('#confirm_send').on('click', function() {
      window.location = "shipping_info.php"
   });


   /*
      When the user clicks on cancel cart, run the deleteCart.php function.
      If deleteCart.php was successful, cart will be emptied and the page will be refreshed.
   */
   $('#confirm_cancel').on('click', function() {
      $.ajax({
         url: "../backend/deleteCart.php",
         success: function(response) {
            alert("Cart Emptied, redirecting to search page.");
            location.reload();
         }
      });
      $('#cancel-modal').foundation('reveal', 'close');
   });

});