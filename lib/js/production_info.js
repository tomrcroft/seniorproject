/*
  This is the javascript file for submitting a pull request on production_info.php.
*/

$(document).ready(function() {
   /*
      Take all form data and POST to the addToPullRequest.php function. 
      If function was successful redirect to order_status.php.
   */
   $('#production_form').on('valid', function() {
      var productionname = $("#production_name").val();
      var deliverydate = $("#delivery_date").val() + " 00:00:00.000";
      var productionopendate = $("#production_open_date").val() + " 00:00:00.000";
      var productionclosedate = $("#production_close_date").val() + " 00:00:00.000";
      var dateofreturn = $("#date_of_return").val() + " 00:00:00.000";
      var notes = $("#notes").val();

      if(notes == "")
        notes = "N/A";

      // e.preventDefault();
      // if(productionname == "" || deliverydate == "" || productionopendate == "" || productionclosedate == "" || dateofreturn == "") {
      //    alert("Please fill out entire form");
      // }
      // else {
         $.ajax({
            type: "POST",
            dataType:'JSON',
            url: "../backend/addToPullRequest.php",
            data: { productionName: productionname, deliveryDate: deliverydate, productionOpenDate: productionopendate, productionCloseDate: productionclosedate, returnDate: dateofreturn, notes: notes },
            success: function(response) {
               if(response.error == true) {
                  alert(response.errormsg);
               }
               else{
                  // For Debugging
                  // console.log(response);
                  // console.log("Response.location: " + response.location );
                  window.location = response.location;
                  //should submit info and complete the writing of a pull request to database followed by a redirect to order status page which should show pull request as pending.
               }
            }
         });
      // }
   });

   // $('#production_info input').keyup(function(e){
   //    if(e.which == 13){//Enter key pressed
   //       $('#submit_pull_request_button').click();//Trigger search button click event
   //    }
   // });  

   $(document).foundation({
      abide : {
         patterns: {
            MDY_date: /^\d{2}[\-\/]\d{2}[\-\/]\d{4}$/,
         }
      }
   });
});