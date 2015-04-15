$(document).ready(function() {



    $('.remove_item').click(function(e) {

        var idnumber = $(this).parent().parent().parent().parent().closest('div').attr('id');

        console.log(idnumber);

        $.ajax({
            type: "POST",
            url: '../backend/removeFromCart.php',
            data: {itemId: idnumber},

            success: function(response) {
                alert("Item : " + idnumber + " removed.");
                location.reload();
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


    $('#cancel_pull_request').on('click', function() {
        $('#cancel-modal').foundation('reveal','open');
    });

    $('#confirm_cancel').on('click', function() {
        $.ajax({
            url: "../backend/deleteCart.php",
            success: function(response) {
                alert("Cart Emptied, redirecting to search page.");
                location.reload();
                
            }
        });
        $('#cancel-modal').foundation('reveal', 'close');
    });

    $('#reject_cancel').on('click', function() {
        $('#cancel-modal').foundation('reveal', 'close');
    });
    

    // $('#cancel_pull_request').click(function(e) {

    //     e.preventDefault();

    //     $.ajax({
    //         // type: "POST",
    //         // dataType:'JSON',
    //         url: "../backend/deleteCart.php",
    //         success: function(response) {
    //             alert("Cart Emptied, redirecting to search page.");
    //             location.reload();
                
    //         }
    //     });

    // });
});