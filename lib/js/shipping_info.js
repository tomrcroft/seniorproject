/**
 * This class uses Javascript to send an AJAX call to our server. The AJAX call
 * accesses the registration.php function. If an error is returned it is alerted,
 * else the user is alerted to check their email to confirm registration.
 */

$(document).ready(function() {
  $('#submit_info_button').click(function(e) {
      var billingname = $("#billing_name").val();
      var billingaddress = $("#billing_address").val();
      var billingcity = $("#billing_city").val();
      var billingstate = $("#billing_state").val();
      var billingzip = $("#billing_zip").val();
      var billingcountry = $("#billing_country").val();

      var shippingname = $("#shipping_name").val();
      var shippingaddress = $("#shipping_address").val();
      var shippingcity = $("#shipping_city").val();
      var shippingstate = $("#shipping_state").val();
      var shippingzip = $("#shipping_zip").val();
      var shippingcountry = $("#shipping_country").val();
      var pickupdate = $("#pickup_date").val() + " 00:00:00.000"; 
      var returndate = $("#return_date").val() + " 00:00:00.000";

      var contactproduction = $("#contact_production").val();
      var contactcode = $("#contact_code").val();
      var contactname = $("#contact_name").val();
      var contactemail = $("#contact_email").val();
      var contactphone = $("#contact_phone").val();
      var contactfax = $("#contact_fax").val();
      var contactbilling = $("#contact_billing").val();
      var paymenttype = $("#payment_type").val();
      var contactdescription = $("#contact_description").val();
      var contactsalesperson = $("#contact_salesperson").val();
      var rentalfee = $("#rental_fee").val();

      e.preventDefault();
      if(billingname == "" || billingaddress == "" || billingcity == "" || billingstate == "" || billingzip == "" || billingcountry == "" ||
         shippingname == "" || shippingaddress == "" || shippingcity == "" || shippingstate == "" || shippingzip == "" || shippingcountry == "" || pickupdate == "" || returndate == "" ||
         contactproduction == "" || contactcode == "" || contactname == "" || contactemail == "" || contactphone == "" || contactfax == "" || contactbilling == "" || paymenttype == "" || contactdescription == "" || contactsalesperson == "" || rentalfee == "") {
         alert("Please fill out entire form");
      }
      else {
        // console.log("Submit info button works!");
        $.ajax({
            type: "POST",
            dataType:'JSON',
            url: "../backend/addToPullRequest.php",
            data: { production: contactproduction, code: contactcode, billAddress: billingaddress, billCity: billingcity, billState: billingstate, billAreaCode: billingzip, billCountry: billingcountry, billAttn: billingname,
                    shipAddress: shippingaddress, shipCity: shippingcity, shipState: shippingstate, shipAreaCode: shippingzip, shipCountry: shippingcountry, shipAttn: shippingname, pickupDate: pickupdate, returnDate: returndate, 
                    contactName: contactname, contactEmail: contactemail, contactPhone: contactphone, contactFax: contactfax, billing: contactbilling, paymentType: paymenttype, description: contactdescription, salesperson: contactsalesperson, rentalFee: rentalfee},
            success: function(response) {
                if(response.error == true) {
                  alert(response.errormsg);
                }
                else{
                  alert(response.msg);
                  window.location = "order_status.php";
                }

            }
      });
    }
  });

  $('.form-box').keyup(function(e){
    if(e.which == 13){//Enter key pressed
        $('#submit_info_button').click();//Trigger search button click event
    }
  });
  
});