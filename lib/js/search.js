/*
  This is the javascript file for search functionality on search_page.php.
  It will call the appropriate functions and dynamically load the results onto the webpage.
*/

$(document).ready(function() {
    
   /*
      Take search value and POST to the search.php and filterDisplay.php function. 
      If search.php function was successful, search results will load and be placed in the div with id search_results.
      If filterDisplay.php function was successful, the filter for the search results will be placed in div with class filter-facets.
   */
   $('#search_page_form').click(function(e) {

      var search_param = $('#search_term').val();
      // e.preventDefault();

      if(search_param == "") {
         alert("Please fill out entire form");
      }
      else{
         $.ajax({
            async: false,
            type: "POST",
            dataType:'JSON',
            url: "../backend/search.php",
            data: { searchterm: search_param },
            success: function(response) {
               if(response.error == true) {
                  alert(response.data);
               }
               else {
                  // For Debugging
                  // console.log(response.searchterm);
                  // console.log(response.results);
                  // console.log(response.numItems);

                  $('#search_results').empty();
                  $('#search_results').html('<h3 id="search_num_results">Search results for "' + search_param +'" (' + response.numItems +' results)</h3>'+
                    '<div class="hide" id="add_item_text"> added to your cart!</div>');

                  for(i = 0; i < response.results.length; i++){
                     var rentable = "Available";
                     var priceString = "Price not Available";
                     var imageID = "result" + i;
                     var costumeID = response.results[i].Costume_Key;
                     d = new Date();
                            
                     if(response.results[i].Rentable == 0) {
                        rentable = "Unavailable";
                     }
                     if(response.results[i].Rental_Fee != null){
                        priceString = '$' + response.results[i].Rental_Fee
                     }

                     var search_results_string = 
                     '<div id="' + costumeID + '" class="inventory_item large-4 small-6 columns">' +
                        '<div class="panel_image panel clearfix centered" data-equalizer-watch="image">' +
                           '<img id="' + imageID + '" src="' + response.results[i].Costume_Image + '">' +
                        '</div>' +
                        '<div class="panel clearfix centered">' +
                           '<h5 class="item_name">' + response.results[i].Costume_Name +'</h5>' +
                           '<h5>Rental Status: ' + rentable + '</h5>' +
                           '<h6 class="subheader">' + priceString + '</h6>' +
                           '<div class="add_item button">Add Item</div>' +
                        '</div>' +
                     '</div>';
                            
                     $('#search_results').append(search_results_string);  
                     $('#'+imageID).attr("src", response.results[i].Costume_Image + '?' + d.getTime());
                  }
               }
            }
         });

         $.ajax({
            type: "POST",
            // dataType:'JSON',
            url: "../backend/FilterDisplay.php",
            data: { searchterm: search_param },
            success: function(response) {
               if(response.error == true) {
                  alert(response.data);
               }
               else {
                  $('.filter-facets').empty();
                  $('.filter-facets').html(response);
                  // console.log(response);
                  // console.log("Filter reloaded");
                  // window.location = "search_page.php";
                }
            }
         });

      }
      $(document).foundation('equalizer', 'reflow');
      // $('.panel_image img').css('display', 'inline-block');
      // $('.panel_image img').css('vertical-align', 'middle');
   });

   $('#search_term').keyup(function(e){
      if(e.which == 13){//Enter key pressed
         $('#search_page_form').click();//Trigger search button click event
      }
   });


   /*
      Find the id number of the inventory item placed as an attribute in the parent div and POST the value to addToCart.php
      If addToCart.php function was successful, a confirmation message will fade in for the user.
   */
   $('#search_results').on("click", ".inventory_item .add_item", function() {

      var idnumber = $(this).parent().parent().closest('div').attr('id');
      var item_name = $(this).siblings('.item_name').text();
      // console.log(idnumber);
      $.ajax({
         async: false,
         type: "POST",
         url: '../backend/addToCart.php',
         data: {itemID: idnumber},

         success: function(response) {
            // alert("ItemID: " + response);
            $('#add_item_text').hide();
            $('#add_item_text').html( " added to your cart!");
            $('#add_item_text').prepend(item_name);
            $('#add_item_text').fadeIn(1000);

            // console.log(item_name);
            // console.log(idnumber);
            // window.location="inventory_page.php?idnumber=" + idnumber;
         }
      });

      $.ajax({
         url: '../backend/cartSize.php',
         success: function(response) {
            console.log(response);
            $('#cart_size').text(response);
         }
      });

   });

   /*
      When the filter button is clicked, take search value checked radio buttons and POST to the search.php and filterDisplay.php function. 
      If search.php function was successful, search results will load and be placed in the div with id search_results.
      If filterDisplay.php function was successful, the filter for the search results will be placed in div with class filter-facets.
   */

   $('.filter-facets').on("click", "#filter_button", function(e) {

      var ageFacet = $("[name='age']:checked").val()
      var genderFacet = $("[name='gender']:checked").val()
      var typeFacet = $("[name='type']:checked").val()
      var groupFacet = $("[name='group']:checked").val()
      var search_param = $('#search_term').val();
      e.preventDefault();

      if(search_param == "") {
         alert("Please fill out entire form");
      }
      if (ageFacet === undefined) {
         ageFacet = "";
      }
      if (genderFacet === undefined) {
         genderFacet = "";
      }
      if (typeFacet === undefined) {
         typeFacet = "";
      }
      if (groupFacet === undefined) {
         groupFacet = "";
      }

      console.log("Search Term: " + search_param);
      console.log("Age Selection: " + ageFacet);
      console.log("Gender Selection: " + genderFacet);
      console.log("Type Selection: " + typeFacet);
      console.log("Group Selection: " + groupFacet);

      $.ajax({
         type: "POST",
         dataType:'JSON',
         data: {searchterm: search_param, age_facet: ageFacet, gender_facet: genderFacet, type_facet: typeFacet, group_facet: groupFacet},
         url: "../backend/FilterSearch.php",
         success: function(response) {
            if(response.error == true) {
               alert(response.data);
            }
            else {
               // For Debugging
               // console.log(response.searchterm);
               // console.log(response.results);
               // console.log(response.numItems);

               $('#search_results').empty();
               $('#search_results').html('<h3 id="search_num_results">Search results for "' + search_param +'" (' + response.numItems +' results)</h3>'+
                                          '<div class="hide" id="add_item_text"> added to your cart!</div>');

               for(i = 0; i < response.results.length; i++){
                  var rentable = "Available";
                  var priceString = "Price not Available";
                  var imageID = "result" + i;
                  var costumeID = response.results[i].Costume_Key;
                  d = new Date();
                         
                  if(response.results[i].Rentable == 0) {
                     rentable = "Unavailable";
                  }
                  if(response.results[i].Rental_Fee != null){
                     priceString = '$' + response.results[i].Rental_Fee
                  }

                  var search_results_string = 
                  '<div id="' + costumeID + '" class="inventory_item large-4 small-6 columns">' +
                     '<div class="panel_image panel clearfix centered">' +
                        '<img id="' + imageID + '" src="' + response.results[i].Costume_Image + '">' +
                     '</div>' +
                     '<div class="panel clearfix centered">' +
                        '<h5 class="item_name">' + response.results[i].Costume_Name +'</h5>' +
                        '<h5>Rental Status: ' + rentable + '</h5>' +
                        '<h6 class="subheader">' + priceString + '</h6>' +
                        '<div class="add_item button">Add Item</div>' +
                     '</div>' +
                  '</div>';
                         
                  $('#search_results').append(search_results_string);  
                  $('#'+imageID).attr("src", response.results[i].Costume_Image + '?' + d.getTime());
                 }
            }
         }
      });
   });

   /*
      Find the id number of the inventory item placed as an attribute in the parent div and redirect to inventory_page.php file with the id number as the get request.
   */
   $('#search_results').on("click", ".inventory_item .panel_image", function() {
      
      var idnumber = $(this).parent().closest('div').attr('id');
         $.ajax({
            type: "GET",
            url: '../backend/itemView.php',
            data: idnumber,

         success: function(response) {
            // console.log(idnumber);
            window.location="inventory_page.php?idnumber=" + idnumber;
         }
      });
   });

   /*
   Cookie functions just in case need cookies.
   Example how to create a cookie: createCookie("searchCookie", "", 1);
   // createCookie("searchCookie", response.searchterm, 1);
   // console.log("Search Cookie: " + readCookie("searchCookie"));
   
   function createCookie(name, value, days) {
      var expires;

      if (days) {
         var date = new Date();
         date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
         expires = "; expires=" + date.toGMTString();
      } 
      else {
         expires = "";
      }
      document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
   }

   function readCookie(name) {
      var nameEQ = encodeURIComponent(name) + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
         var c = ca[i];
         while (c.charAt(0) === ' ') c = c.substring(1, c.length);
         if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
      }
      return null;
   }

   function eraseCookie(name) {
      createCookie(name, "", -1);
   }
   */
});