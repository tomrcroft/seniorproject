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

    // $('#cancel_pull_request').on('click', function() {
    //     $('#cancel_modal').foundation('reveal','open');
    // });

    // $('a.close-reveal-modal').on('click', function() {
    //     $('#cancel_modal').foundation('reveal', 'close');
    // });

$('#cancel_pull_request').on('click', function() {
  $('#first-modal').foundation('reveal','open');
});
$('a.open-second').on('click', function() {
  $('#second-modal').foundation('reveal', 'open');
});
$('a.close').on('click', function() {
  $('#second-modal').foundation('reveal', 'close');
});

  //     $(function() {
  //   $( "#dialog-confirm" ).dialog({
  //     resizable: false,
  //     height:140,
  //     modal: true,
  //     buttons: {
  //       "Delete all items": function() {
  //         $( this ).dialog( "close" );
  //       },
  //       Cancel: function() {
  //         $( this ).dialog( "close" );
  //       }
  //     }
  //   });
  // });
    

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