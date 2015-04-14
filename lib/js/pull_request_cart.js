$(document).ready(function() {
    $('.remove_item').click(function(e) {

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
                    alert("Remove Item Button is functioning");
                    // window.location = "search_page.php";
                }
            }
        });
    });

    $('#send_pull_request').click(function(e) {

        e.preventDefault();

        $.ajax({
            type: "POST",
            // dataType:'JSON',
            // url: "../backend/search.php",
            success: function(response) {
                if(response.error == true) {
                    alert(response);
                }
                else {
                    window.location = "shipping_info.php"
                }
            }
        });
        
    });

    // $('#cancel_pull_request').on('click', function() {
    //     $('#cancel_modal').foundation('reveal','open');
    // });

    // $('a.close-reveal-modal').on('click', function() {
    //     $('#cancel_modal').foundation('reveal', 'close');
    // });

    $('#cancel_pull_request').click(function(e) {

        e.preventDefault();

        $.ajax({
            // type: "POST",
            // dataType:'JSON',
            url: "../backend/deleteCart.php",
            success: function(response) {
                alert("Cart Emptied, redirecting to search page.");
                location.reload();
                
            }
        });

    });
});