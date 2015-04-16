$(document).ready(function() {
  $('#update_profile').click(function(e) {
      var firstname = $("#update_firstname").val();
      var lastname = $("#update_lastname").val();
      var email = $("#update_email").val();
      var company = $("#update_company").val();
      var phone = $("#update_phone").val();
      var fax = $("#update_fax").val();
      var password = $("#update_password").val();
      // e.preventDefault();
      // console.log(firstname);
      if(firstname == "" && lastname == "" && company == "" && phone == "" && fax == "" && email == "" && password == "") {
         alert("Please fill out at least one field.");
      }
      else {
        $.ajax({
            type: "POST",
            // dataType:'json',
            url: "../backend/info_update.php",
            data: { first_name: firstname, last_name: lastname, company: company, phone: phone, fax: fax, email: email, password: password },
            success: function(response) {
                if(response.error == true) {
                  // alert("something went wrong");
                }
                else{
                $("#update_firstname").val("");
                $("#update_lastname").val("");
                $("#update_email").val("");
                $("#update_company").val("");
                $("#update_phone").val("");
                $("#update_fax").val("");
                $("#update_password").val("");
                $('#edit_profile_success').hide();
                $('#edit_profile_success').fadeIn(1000);

                }

            }
        });
      }
  });

  $('.edit_profile_box').keyup(function(e){
      if(e.which == 13){//Enter key pressed
          $('#update_profile').click();//Trigger search button click event
      }
  });

  $('#update_billing_button').click(function(e) {
      var billingname = $("#update_billing_name").val();
      var billingaddress = $("#update_billing_address").val();
      var billingcity = $("#update_billing_city").val();
      var billingstate = $("#update_billing_state").val();
      var billingzip = $("#update_billing_zip").val();
      var billingcountry = $("#update_billing_country").val();
      // e.preventDefault();
      // console.log(firstname);
      if(billingname == "" && billingaddress == "" && billingcity == "" && billingstate == "" && billingzip == "" && billingcountry == "") {
         alert("Please fill out at least one field.");
      }
      else {
        $.ajax({
            type: "POST",
            // dataType:'json',
            // url: "../backend/info_update.php",
            data: { billAddress: billingaddress, billCity: billingcity, billState: billingstate, billAreaCode: billingzip, billCountry: billingcountry, billAttn: billingname },
            success: function(response) {
                if(response.error == true) {
                  // alert("something went wrong");
                }
                else{
                $("#update_billing_name").val("");
                $("#update_billing_address").val("");
                $("#update_billing_city").val("");
                $("#update_billing_state").val("");
                $("#update_billing_zip").val("");
                $("#update_billing_country").val("");
                // $('#edit_profile_success').hide();
                // $('#edit_profile_success').fadeIn(1000);
                //page should probably refresh with success message and updated information

                }

            }
        });
      }
  });

  $('.update_billing_box').keyup(function(e){
      if(e.which == 13){//Enter key pressed
          $('#update_billing_button').click();//Trigger search button click event
      }
  });



});