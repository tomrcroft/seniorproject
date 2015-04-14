/**
 * This class uses Javascript to send an AJAX call to our server. The AJAX call
 * accesses the registration.php function. If an error is returned it is alerted,
 * else the user is alerted to check their email to confirm registration.
 */

$(document).ready(function() {
  $('#register_button').click(function(e) {
      var firstname = $("#signup_firstname").val();
      var lastname = $("#signup_lastname").val();
      var email = $("#signup_email").val();
      var company = $("#signup_company").val();
      var username = $("#signup_username").val();
      var password = $("#signup_password").val();
      e.preventDefault();
      if(firstname == "" || lastname == "" || company == "" || email == "" || username == "" || password == "") {
         alert("Please fill out entire form");
      }
      else {
        $.ajax({
            type: "POST",
            dataType:'JSON',
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
                  alert(response.errormsg);
                }
                else{
                  // console.log("Response.location: " + response.location );
                  window.location = response.location;
                }

            }
      });
    }
  });

  $('#signup_firstname').keyup(function(e){
    if(e.which == 13){//Enter key pressed
        $('#register_button').click();//Trigger search button click event
    }
  });

  $('#signup_lastname').keyup(function(e){
    if(e.which == 13){//Enter key pressed
        $('#register_button').click();//Trigger search button click event
    }
  });

  $('#signup_email').keyup(function(e){
    if(e.which == 13){//Enter key pressed
        $('#register_button').click();//Trigger search button click event
    }
  });

  $('#signup_company').keyup(function(e){
    if(e.which == 13){//Enter key pressed
        $('#register_button').click();//Trigger search button click event
    }
  });

  $('#signup_username').keyup(function(e){
    if(e.which == 13){//Enter key pressed
        $('#register_button').click();//Trigger search button click event
    }
  });

  $('#signup_password').keyup(function(e){
    if(e.which == 13){//Enter key pressed
        $('#register_button').click();//Trigger search button click event
    }
  });
  
});