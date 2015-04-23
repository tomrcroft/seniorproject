/*
   This is the javascript file for index.php
*/

$(document).ready(function() {

   $(".registration").hide();

   // When the login button is clicked, show the login form.
   $('#login_tab').click(function(e) {
      $(".registration").hide();
      $(".login").show();
   });

   //When the register button is clicked, show the register form.
   $('#register_tab').click(function(e) {
      $(".login").hide();
      $(".registration").show();
   });

});