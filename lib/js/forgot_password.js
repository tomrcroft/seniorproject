/**
 * This class uses Javascript to send an AJAX call to our server. The AJAX call
 * accesses the reset.php function. If an error is returned it is alerted,
 * else the user is alerted to check their email to confirm password reset and redirected to index.php
 */

$(document).ready(function() {
    $('#reset_pass_button').click(function(e) {
       var email = $("#email").val();
       e.preventDefault();
       if(email == "") {
           alert("Please fill out the entire form.");
       }
       else {
        $.ajax({
            type: "POST",
            // dataType:'json',
            // url: "../backend/login.php",
            data: { email: email},
            success: function(response) {
                $("#email").val("");
                if(response.error == true) {
                    alert(response.data);
                }
                else {
                    alert("Password reset e-mail sent. Check your e-mail.");
                    window.location = "index.php";
                }
            }
          });
       }
    });
});