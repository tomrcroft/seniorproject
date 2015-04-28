/*
  This is the javascript file for order_status.php.
  It will change the color of the status indicator for each pull request.
*/

$(document).ready(function() {

   $('.availability').each(function(index) {
      if($(this).text() == "Pending")
         $(this).css("color", "#0000FF");
      else if($(this).text() == "Rejected")
         $(this).css("color", "#FF0000");
      else
         $(this).css("color", "#008000")
   });
});