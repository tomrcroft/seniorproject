/**
 * This file uses Javascript to send an AJAX call to our server. The AJAX call
 * accesses the logout.php function, and redirects the user to search_page.php if
 * the function returned true.
 */

$(document).ready(function() {
   $('#logout_button').click(function(e) {
      $.ajax({
         type: "POST",
         dataType:'JSON',
         url: "../backend/logout.php",
         success: function(response) {
            if(response.error == true) {
               alert("Logout failed");
            }
            else {
               window.location = "search_page.php?status=LoggedOut";
            }
         }
      });
   });
});