/**
 * This class uses Javascript to send an AJAX call to our server. The AJAX call
 * accesses the registration.php function, and redirects the User to the dashboard if
 * the function returned true
 */

$(document).ready(function() {
  $('#register_button').click(function(e) {
      var firstname = $("#signup_firstname").val();
      var lastname = $("#signup_lastname").val();
      var email = $("#signup_email").val();
      var company = $("signup_company").val();
      var username = $("#signup_username").val();
      var password = $("#signup_password").val();
      e.preventDefault();
      if(firstname = "" || lastname == "" || company == "" || email == "" || username == "" || password == "") {
         alert("Please fill out entire form");
      }
      else {
        $.ajax({
            type: "POST",
            url: "../backend/registration.php",
            data: { firstname: firstname, lastname: lastname, company: company, email: email, username: username, password: password },
            success: function(response) {
                $("#signup_firstname").val("");
                $("#signup_lastname").val("");
                $("#signup_email").val("");
                $("#signup_company").val("");
                $("#signup_username").val("");
                $("#signup_password").val("");
                if(response.error == true) {
                    alert(response.data);
                }
                else{
                alert( "Please view email to confirm registration" );
                window.location="dashboard.php";
                }

            }
      });
    }
  });
});