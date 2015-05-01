$(document).ready(function() {

$('#find_records_button').click(function(e) {

      var search_param = $('#search_company').val();
      // e.preventDefault();

      if(search_param == "") {
         alert("Please fill out entire form");
      }
      else{
         $.ajax({
            // async: false,
            type: "POST",
            dataType:'JSON',
            url: "../backend/view_master.php",
            data: { companySearch: search_param },
            success: function(response) {
               if(response.error == true) {
                  alert(response.data);
               }
               else {
                  // For Debugging
                  // console.log(response.searchterm);
                  // console.log(response.results);
                  // console.log(response.numItems);
                  // console.log(response);

                  $('#pull_records_results').empty();
                  $('#pull_records_results').html('<h5>Pull Request Records for "' + response.searchterm + '" (' + response.numItemsPull + ' Results)</h5>');

                  $('#invoice_records_results').empty();
                  $('#invoice_records_results').html('<h5>View Invoice Records for "' + response.searchterm + '" (' + response.numItemsInvoice + ' Results)</h5>');

                  for(i = 0; i < response.results1.length; i++){
                      var pull_date = response.results1[i].Last_Modified_Date.date;

                     var pull_results_string = 
                        '<div class="admin_pull_results panel clearfix" data-pull-id="' + response.results1[i].Pull_Request_ID + '">' +
                            '<div class="left pull_request_title"><b>' + response.results1[i].Production + '</b>' +
                            '<div class="date_modified">DATE MODIFIED: ' + pull_date.substring(0, 10) + '</div>' +
                            '</div>' + 
                            '<div class="status right">' + response.results1[i].Status + '</div>' +
                        '</div>';

                     $('#pull_records_results').append(pull_results_string);  
                  }
                  for(i = 0; i < response.results2.length; i++){

                    var invoice_date = response.results2[i].Last_Modified_Date.date;

                     var invoice_results_string = 
                        '<div class="admin_invoice_results panel clearfix" data-invoice-id="' + response.results2[i].Invoice_ID + '">' + 
                            '<div class="left invoice_title"><b>' + response.results2[i].Production + '</b>' +
                            '<div class="date_modified">DATE MODIFIED: ' + invoice_date.substring(0, 10) + '</div>' +
                             '</div>' + 
                            '<div class="status right">' + response.results2[i].Status + '</div>' +
                        '</div>';
                     $('#invoice_records_results').append(invoice_results_string);  

                  }
                        $('.status').each(function(index) {
      // console.log(index + ": " + $(this).text());
      if($(this).text() == "Accepted")
         $(this).css("color", "#008000");
      else if($(this).text() == "Rejected" || $(this).text() == "Canceled")
         $(this).css("color", "#FF0000");
      else
         $(this).css("color", "#0000FF")
   });
               }
            }
         });

      }

   });

   $('#search_company').keyup(function(e){
      if(e.which == 13){//Enter key pressed
         $('#find_records_button').click();//Trigger search button click event
      }
   });

    /*
        When pending pull request is clicked, user is redirected to view the pull request.
    */
    $("#pull_records_results").on('click', '.admin_pull_results', function () {

        var idnumber = $(this).attr("data-pull-id");
        window.location = "view_pending_request.php?idnumber=" + idnumber;
    });

    $("#invoice_records_results").on('click', '.admin_invoice_results', function () {

        var idnumber = $(this).attr("data-invoice-id");
        window.location = "accepted_invoice.php?invoiceID=" + idnumber;
    });

});