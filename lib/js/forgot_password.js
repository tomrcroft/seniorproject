/**
 * This class uses Javascript to send an AJAX call to our server. The AJAX call
<<<<<<< HEAD
 * accesses the reset.php function. If an error is returned it is alerted,
 * else the user is alerted to check their email to confirm password reset and redirected to index.php
 */


$(document).ready(function() {
    $('#reset_email_button').click(function(e) {
       var email = $("#reset_email").val();
       e.preventDefault();
       //alert(email);
       if(email == "") {
           alert("Please fill out the entire form.");
       }
       else {
        
        $.ajax({
            type: "POST",
            //dataType:'json',
            url: "../backend/forgetPassword.php",
            data: {email:email},
            success: function(response) {
                $("#reset_email").val("");
                if(response.error == true) {
                    alert(response.data);
                }
                else {
                    console.log(response); //for debugging
                    alert(response);
                    window.location = "index.php";
                }
            }
          });
       }
    });
});