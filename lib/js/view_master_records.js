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
                  console.log(response);

                  $('#pull_records_results').empty();
                  $('#pull_records_results').html('<h5>Pull Request Records for "' + response.searchterm + '" (' + response.numItemsPull + ' Results)</h5>');

                  $('#invoice_records_results').empty();
                  $('#invoice_records_results').html('<h5>View Invoice Records for "' + response.searchterm + '" (' + response.numItemsInvoice + ' Results)</h5>');

                  for(i = 0; i < response.results1.length; i++){

                     var pull_results_string = 
                        '<div class="admin_pull_results panel" data-pull-id="' + response.results1[i].Pull_Request_ID + '">' +
                            '<h5>' + response.results1[i].Production + '</h5>' + 
                            'DATE MODIFIED: ' + response.results1[i].Last_Modified_Date.date + '</div>';

                     $('#pull_records_results').append(pull_results_string);  
                  }
                  for(i = 0; i < response.results2.length; i++){

                     var invoice_results_string = 
                        '<div class="admin_pull_results panel" data-pull-id="' + response.results2[i].Invoice_ID + '">' + 
                            '<h5>' + response.results2[i].Production + '</h5>' + 
                            'DATE MODIFIED: ' + response.results2[i].Last_Modified_Date.date + '</div>';

                     $('#invoice_records_results').append(invoice_results_string);  
                  }
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


});