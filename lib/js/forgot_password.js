/**
 * This class uses Javascript to send an AJAX call to our server. The AJAX call
 * accesses the login.php function, and redirects the User to the dashboard if
 * the function returned true
 */

$(document).ready(function() {
    $('#reset_email_button').click(function(e) {
       var email = $("#reset_email").val();
       e.preventDefault();
       if(email == "") {
           alert("Please fill out the entire form.");
       }
       else {
        $.ajax({
            type: "POST",
            // dataType:'json',
            url: "../backend/forgot_pass.php",
            data: { email: email },
            success: function(response) {
                $("#reset_email").val("");
                if(response.error == true) {
                    alert(response.data);
                }
                else {
                     alert(response);
                    window.location = "index.php";
                }
            }
          });
       }
    });
});