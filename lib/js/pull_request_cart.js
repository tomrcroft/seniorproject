$(document).ready(function() {

   $('.remove_item').click(function(e) {

      var idnumber = $(this).parent().parent().parent().parent().closest('div').attr('id');

      console.log(idnumber);

      $.ajax({
         type: "POST",
         url: '../backend/removeFromCart.php',
         data: {itemId: idnumber},

         success: function(response) {
            alert("Item : " + idnumber + " removed.");
            location.reload();
         }
      });
   });

   $('#cancel_pull_request').on('click', function() {
      $('#cancel-modal').foundation('reveal','open');
   });

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

   $('#reject_cancel').on('click', function() {
      $('#cancel-modal').foundation('reveal', 'close');
   });
    

   $('#send_pull_request').on('click', function() {
      $('#send-modal').foundation('reveal','open');
   });

    $('#confirm_send').on('click', function() {
      window.location = "shipping_info.php"
    });

   $('#reject_send').on('click', function() {
      $('#send-modal').foundation('reveal', 'close');
   });
});