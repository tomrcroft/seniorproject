

$(document).ready(function() {
    $('#add_admin_button').click(function(e) {
       var user_email = $("#add_admin_email").val();
       e.preventDefault();
       if(user_email == "") {
           alert("Please fill out the entire form.");
       }
       else {
        $.ajax({
            type: "POST",
            // dataType:'JSON',
            url: "../backend/makeUserAdmin.php",
            data: { userEmail: user_email},
            success: function(response) {
                $("#user_email").val("");
                if(response.error == true) {
                  alert("Email of user does not exist. Please try again.");
                }
                else {
                  alert("User is now Administrator!");
                  // $('#add_admin_success').empty();
                  // $('#add_admin_success').prepend("Editted!");
                }
            }
          });
       }
    });
});