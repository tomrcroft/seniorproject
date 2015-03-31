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
                        console.log(response.results);
                        console.log(response.numItems);
                        // window.location = "search_page.php";
                    }
                }
            });
            // $('#search_results').empty();
            // $('#search_results').html('<h3>Search results for "' + search_param +'" (' + response.data.length +' results)</h3>');
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