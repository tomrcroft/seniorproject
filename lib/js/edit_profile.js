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
         alert("Please fill out at least one field.");
      }
      else {
        $.ajax({
            type: "POST",
            // dataType:'json',
            url: "../backend/info_update.php",
            data: { first_name: firstname, last_name: lastname, company: company, email: email, password: password },
            success: function(response) {
                if(response.error == true) {
                  // alert("something went wrong");
                }
                else{
                $("#update_firstname").val("");
                $("#update_lastname").val("");
                $("#update_email").val("");
                $("#update_company").val("");
                $("#update_password").val("");
                  // console.log(response);
                $('#edit_profile_success').hide();
                $('#edit_profile_success').fadeIn(1000);

                }

            }
        });
      }
  });
    $('.edit_profile_box').keyup(function(e){
        if(e.which == 13){//Enter key pressed
            $('#update_button').click();//Trigger search button click event
        }
    });
});