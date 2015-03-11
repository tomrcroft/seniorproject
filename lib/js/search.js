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
                // dataType:'JSON',
                url: "../backend/search.php",
                data: { searchterm: search_param },
                success: function(response) {
                    if(response.error == true) {
                        alert(response.data);
                    }
                    else {
                        console.log("This button is functioning");
                        window.location = "search_page.php";
                    }
                }
            });
        }
    });
});