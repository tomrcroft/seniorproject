/*
  This is the javascript file for all forms related to registration.
*/

$(document).ready(function() {

   /*
      Take all form data and POST to the registration.php function. 
      If function was successful redirect to registration_shipping.php.
   */
   $('#registration_form').on('valid', function() {
      // console.log("this button is working");
      // Handle the submission of the form

      var firstname = $("#signup_firstname").val();
      var lastname = $("#signup_lastname").val();
      var email = $("#signup_email").val();
      var company = $("#signup_company").val();
      var phone = $("#signup_phone").val();
      var fax = $("#signup_fax").val();
      var username = $("#signup_username").val();
      var password = $("#signup_password").val();

      console.log(firstname);

      $.ajax({
         type: "POST",
         dataType:'JSON',
         url: "../backend/registration.php",
         data: { firstname: firstname, lastname: lastname, company: company, email: email, username: username, password: password, phone: phone, fax: fax },
         success: function(response) {
            $("#signup_firstname").val("");
            $("#signup_lastname").val("");
            $("#signup_email").val("");
            $("#signup_company").val("");
            $("#signup_phone").val("");
            $("#signup_fax").val("");
            $("#signup_username").val("");
            $("#signup_password").val("");
            // console.log(firstname);
            if(response.error == true) {
               alert(response.errormsg);
            }
            else{
               // console.log(response);
               // console.log(response.location);
               // For Debugging
               // console.log(response.location);
               // console.log("Response.location: " + response.location );
               window.location = response.location;
            }

         },
         // error: function(xhr, status, error) {
         //    console.log(error);
         // }
      });
   });

   /*
      Take all form data and call the AddShippingAddress.php function. 
      If function was successful, redirect to registration_billing.php.
   */
   $('#registration_shipping_form').on('valid', function(e) {
      var shippingname = $("#shipping_name").val();
      var shippingaddress = $("#shipping_address").val();
      var shippingcity = $("#shipping_city").val();
      var shippingstate = $("#shipping_state").val();
      var shippingzip = $("#shipping_zip").val();
      var shippingcountry = $("#shipping_country").val();
      // e.preventDefault();
      // if(shippingname == "" || shippingaddress == "" || shippingcity == "" || shippingstate == "" || shippingzip == "" || shippingcountry == "") {
      //    alert("Please fill out entire form");
      // }
      // else {
         $.ajax({
            type: "POST",
            dataType:'JSON',
            url: "../backend/AddShippingAddress.php",
            data: { shipAddress: shippingaddress, shipCity: shippingcity, shipState: shippingstate, shipAreaCode: shippingzip, shipCountry: shippingcountry, shipAttn: shippingname },
            success: function(response) {
               if(response.error == true) {
                  alert(response.errormsg);
               }
               else{
                  // For Debugging
                  // console.log(response);
                  // console.log("Response.location: " + response.location );
                  window.location = response.location;
               }

            }
         });
      // }
   });
  
   // $('#registration_shipping').keyup(function(e){
   //    if(e.which == 13){ //Enter key pressed
   //       $('#submit_shipping_info_button').click(); //Trigger search button click event
   //    }
   // });

   /*
      Take all form data and call the AddBillingAddress.php function. 
      If function was successful, user is logged in and sent to search_page.php
   */
   $('#registration_billing_form').on('valid', function(e) {
      var billingname = $("#billing_name").val();
      var billingaddress = $("#billing_address").val();
      var billingcity = $("#billing_city").val();
      var billingstate = $("#billing_state").val();
      var billingzip = $("#billing_zip").val();
      var billingcountry = $("#billing_country").val();

      // e.preventDefault();

      // if(billingname == "" || billingaddress == "" || billingcity == "" || billingstate == "" || billingzip == "" || billingcountry == "") {
      //    alert("Please fill out entire form");
      // }
      // else {
         $.ajax({
            type: "POST",
            dataType:'JSON',
            url: "../backend/AddBillingAddress.php",
            data: { billAddress: billingaddress, billCity: billingcity, billState: billingstate, billAreaCode: billingzip, billCountry: billingcountry, billAttn: billingname },
            success: function(response) {
               if(response.error == true) {
                  alert(response.errormsg);
               }
               else{
                  // For Debugging
                  // console.log(response);
                  // console.log("Response.location: " + response.location );
                  window.location = response.location;
               }

            }
         });
      // }
  });
  
   // $('#registration_billing').keyup(function(e){
   //    if(e.which == 13){ //Enter key pressed
   //       $('#submit_billing_info_button').click(); //Trigger search button click event
   //    }
   // });

   $(document).foundation({
      abide : {
         patterns: {
            usa_phone: /^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/,
            zip: /^\d{5}$/
         }
      }
   });

   //  Deprecated Function
   //  $('#register_button').click(function(e) {
   //     var firstname = $("#signup_firstname").val();
   //     var lastname = $("#signup_lastname").val();
   //     var email = $("#signup_email").val();
   //     var company = $("#signup_company").val();
   //     var phone = $("#signup_phone").val();
   //     var fax = $("#signup_fax").val();
   //     var username = $("#signup_username").val();
   //     var password = $("#signup_password").val();
   //     e.preventDefault();
   //     if(firstname == "" || lastname == "" || company == "" || email == "" || phone == "" || fax == "" || username == "" || password == "") {
   //        alert("Please fill out entire form");
   //     }
   //     else {
   //       $.ajax({
   //           type: "POST",
   //           dataType:'JSON',
   //           url: "../backend/registration.php",
   //           data: { firstname: firstname, lastname: lastname, company: company, email: email, username: username, password: password, phone: phone, fax: fax },
   //           success: function(response) {
   //               $("#signup_firstname").val("");
   //               $("#signup_lastname").val("");
   //               $("#signup_email").val("");
   //               $("#signup_company").val("");
   //               $("#signup_phone").val("");
   //               $("#signup_fax").val("");
   //               $("#signup_username").val("");
   //               $("#signup_password").val("");
   //               if(response.error == true) {
   //                 alert(response.errormsg);
   //               }
   //               else{
   //                 // For Debugging
   //                 // console.log(response.location);
   //                 // console.log("Response.location: " + response.location );
   //                 window.location = response.location;
   //               }

   //           }
   //     });
   //   }
   // });

   // $('#registration_box').keyup(function(e){
   //    if(e.which == 13){ //Enter key pressed
   //       $('#register_button').click(); //Trigger search button click event
   //    }
   // });
});