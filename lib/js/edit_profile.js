$(document).ready(function() {
  $('#update_button').click(function(e) {
      var firstname = $("#update_firstname").val();
      var lastname = $("#update_lastname").val();
      var email = $("#update_email").val();
      var company = $("#update_company").val();
      var password = $("#update_password").val();
      // e.preventDefault();
      // console.log(firstname);
      if(firstname == "" && lastname == "" && company == "" && email == "" && password == "") {
         alert("Please fill out entire form");
      }
      else {
        $.ajax({
            type: "POST",
            // dataType:'json',
            url: "../backend/info_update.php",
            data: { firstname: firstname, lastname: lastname, company: company, email: email, password: password },
            success: function(response) {
                if(response.error == true) {
                  alert(response);
                }
                else{
                  console.log("Update Button was Pressed");
                  // window.location="index.php";
                }

            }
      });
    }
  });
});