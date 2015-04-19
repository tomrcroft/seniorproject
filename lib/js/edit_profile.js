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
                  location.reload();
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

  $('#update_shipping_button').click(function(e) {
      var shippingname = $("#update_shipping_name").val();
      var shippingaddress = $("#update_shipping_address").val();
      var shippingcity = $("#update_shipping_city").val();
      var shippingstate = $("#update_shipping_state").val();
      var shippingzip = $("#update_shipping_zip").val();
      var shippingcountry = $("#update_shipping_country").val();
      // e.preventDefault();
      // console.log(firstname);
      if(shippingname == "" && shippingaddress == "" && shippingcity == "" && shippingstate == "" && shippingzip == "" && shippingcountry == "") {
         alert("Please fill out at least one field.");
      }
      else {
        $.ajax({
            type: "POST",
            // dataType:'json',
            url: "../backend/EditShippingAddress.php",
            data: { shipAddress: shippingaddress, shipCity: shippingcity, shipState: shippingstate, shipAreaCode: shippingzip, shipCountry: shippingcountry, shipAttn: shippingname },
            success: function(response) {
                if(response.error == true) {
                  // alert("something went wrong");
                }
                else{
//                    console.log(response);
                  location.reload();
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
            url: "../backend/EditBillingAddress.php",
            data: { billAddress: billingaddress, billCity: billingcity, billState: billingstate, billAreaCode: billingzip, billCountry: billingcountry, billAttn: billingname },
            success: function(response) {
                if(response.error == true) {
                  // alert("something went wrong");
                }
                else{
                  location.reload();
                // $('#edit_profile_success').hide();
                // $('#edit_profile_success').fadeIn(1000);
                //page should probably refresh with success message and updated information

                }

            }
        });
      }
  });

  $('.update_shipping_box').keyup(function(e){
      if(e.which == 13){//Enter key pressed
          $('#update_shipping_button').click();//Trigger search button click event
      }
  });





});