$(document).ready(function() {
    // createCookie("searchCookie", "", 1);

    $('#search_page_form').click(function(e) {
        var search_param = $('#search_term').val();
        e.preventDefault();

        if(search_param == "") {
            alert("Please fill out entire form");
        }
        else{
            $.ajax({
                type: "POST",
                dataType:'JSON',
                url: "../backend/search.php",
                data: { searchterm: search_param },
                success: function(response) {
                    if(response.error == true) {
                        alert(response.data);
                    }
                    else {
                        console.log(response.searchterm);
                        console.log(response.results);
                        console.log(response.numItems);
                        // createCookie("searchCookie", response.searchterm, 1);
                        // console.log("Search Cookie: " + readCookie("searchCookie"));

                        $('#search_results').empty();
                        $('#search_results').html('<h3 id="search_num_results">Search results for "' + search_param +'" (' + response.numItems +' results)</h3>');
                        
                        

                        for(i = 0; i < response.results.length; i++){
                            var rentable = "Available";
                            var priceString = "Price not Available";
                            var imageID = "result" + i;
                            var costumeID = response.results[i].Costume_Key;
                            d = new Date();
                            
                            // if(response.results[i].Costume_Image == null)
                            //     console.log("There is no image available");
                            if(response.results[i].Rentable == 0) {
                                rentable = "Unavailable";
                            }
                            if(response.results[i].Rental_Fee != null){
                                priceString = '$' + response.results[i].Rental_Fee
                            }

                            var search_results_string = '<div id="' + costumeID + '" class="inventory_item large-4 small-6 columns">' +
                            '<div class="panel_image panel clearfix centered">' +
                            '<img id="' + imageID + '" src="' + response.results[i].Costume_Image + '">' +
                            '</div>' +
                            '<div class="panel clearfix centered">' +
                            '<h5>' + response.results[i].Costume_Name +'</h5>' +
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
                    console.log("Filter reloaded");
                    // window.location = "search_page.php";
                }
                }
            });

        }
    });

    $('#search_term').keyup(function(e){
        if(e.which == 13){//Enter key pressed
            $('#search_page_form').click();//Trigger search button click event
        }
    });

    $('#search_results').on("click", ".inventory_item .add_item", function() {
        var idnumber = $(this).parent().parent().closest('div').attr('id');
        // console.log(idnumber);
        $.ajax({
            type: "POST",
            url: '../backend/addToCart.php',
            data: {itemID: idnumber},

            success: function(response) {
                alert("ItemID: " + response);
                // console.log("Hi");
                // console.log(idnumber);
                // window.location="inventory_page.php?idnumber=" + idnumber;
            }
        });
    });

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

        // function getFilterValues() {         
        //     var filter_values = [];

        //     $('#facets :checked').each(function() {
        //         // .function("div").attr("id");
        //         filter_values.push($(this).val());
        //     });

        //     return filter_values;
        // }
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
                    console.log(response.searchterm);
                    console.log(response.results);
                    console.log(response.numItems);
                    $('#search_results').empty();
                    $('#search_results').html('<h3 id="search_num_results">Search results for "' + search_param +'" (' + response.numItems +' results)</h3>');
                    
                    

                    for(i = 0; i < response.results.length; i++){
                        var rentable = "Available";
                        var priceString = "Price not Available";
                        var imageID = "result" + i;
                        var costumeID = response.results[i].Costume_Key;
                        d = new Date();
                        
                        // if(response.results[i].Costume_Image == null)
                        //     console.log("There is no image available");
                        if(response.results[i].Rentable == 0) {
                            rentable = "Unavailable";
                        }
                        if(response.results[i].Rental_Fee != null){
                            priceString = '$' + response.results[i].Rental_Fee
                        }

                        var search_results_string = '<div id="' + costumeID + '" class="inventory_item large-4 small-6 columns">' +
                        '<div class="panel_image panel clearfix centered">' +
                        '<img id="' + imageID + '" src="' + response.results[i].Costume_Image + '">' +
                        '</div>' +
                        '<div class="panel clearfix centered">' +
                        '<h5>' + response.results[i].Costume_Name +'</h5>' +
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
    
    $('#search_results').on("click", ".inventory_item .panel_image", function() {
        var idnumber = $(this).parent().closest('div').attr('id');
        $.ajax({
            type: "GET",
            url: '../backend/itemView.php',
            data: idnumber,

            success: function(response) {
                console.log("this button works");
                // console.log(idnumber);
                window.location="inventory_page.php?idnumber=" + idnumber;
            }
        });
    });

    function createCookie(name, value, days) {
    var expires;

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
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

});