$(document).ready(function() {
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
                        console.log("This button is functioning");
                        console.log(response.searchterm);
                        console.log(response.results);
                        console.log(response.numItems);
                        $('#search_results').empty();
                        $('#search_results').html('<h3>Search results for "' + search_param +'" (' + response.numItems +' results)</h3>');
                        
                        for(i = 0; i < response.results.length; i++){
                            var rentable = "Available";
                            if(response.results[i].Rentable == 0) {
                                rentable = "Unavailable";
                            }

                            var search_results_string = '<div class="inventory_image large-4 small-6 columns">' +
                            '<img src="../lib/images/costumes/' + response.results[i].Costume_Key + '.jpg">' +
                            '<div class="panel clearfix centered">' +
                            '<h5>' + response.results[i].Costume_Name +'</h5>' +
                            '<h5>Rental Status: ' + rentable + '</h5>' +
                            '<h6 class="subheader">$' + response.results[i].Rental_Fee + '</h6>' +
                            '<div class="add_item button">Add Item</div>' +
                            '</div>' +
                            '</div>';
                            $('#search_results').append(search_results_string);  
                        }


                    }
                }
            });

        }
    });

    $('.add_item').click(function(e) {

        e.preventDefault();

        $.ajax({
            type: "POST",
            // dataType:'JSON',
            url: "../backend/search.php",
            success: function(response) {
                if(response.error == true) {
                    alert(response.data);
                }
                else {
                    alert("Add Item button is functioning");
                    // window.location = "search_page.php";
                }
            }
        });
    });

    $(".inventory_image img").click(function () {
        window.location = "inventory_page.php";
        return false;
    });
});