/**
 * This class uses Javascript to send an AJAX call to our server. The AJAX call
 * accesses the registration.php function. If an error is returned it is alerted,
 * else the user is alerted to check their email to confirm registration.
 */

$(document).ready(function() {
  $('#submit_pull_request_button').click(function(e) {
      var productionname = $("#production_name").val();
      var deliverydate = $("#delivery_date").val() + " 00:00:00.000";
      var productionopendate = $("#production_open_date").val() + " 00:00:00.000";
      var productionclosedate = $("#production_close_date").val() + " 00:00:00.000";
      var dateofreturn = $("#date_of_return").val() + " 00:00:00.000";
      var notes = $("#notes").val();

      if(notes == "")
        notes = "N/A";

      e.preventDefault();
      if(productionname == "" || deliverydate == "" || productionopendate == "" || productionclosedate == "" || dateofreturn == "") {
         alert("Please fill out entire form");
      }
      else {
        $.ajax({
            type: "POST",
            dataType:'JSON',
            url: "../backend/AddToPullRequest.php",
            data: { production: productionname, deliveryDate: deliverydate, productionOpenDate: productionopendate, productionCloseDate: productionclosedate, returnDate: dateofreturn, notes: notes },
            success: function(response) {
                if(response.error == true) {
                  alert(response.errormsg);
                }
                else{
                  // console.log(response);
                  // console.log("Response.location: " + response.location );
                  window.location = response.location;
                  //should submit info and complete the writing of a pull request to database followed by a redirect to order status page which should show pull request as pending
                }

            }
      });
    }
  });

  $('#production_info').keyup(function(e){
    if(e.which == 13){//Enter key pressed
        $('#submit_pull_request_button').click();//Trigger search button click event
    }
  });
  
});