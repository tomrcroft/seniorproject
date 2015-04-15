$(document).ready(function() {

    $('.add_item').click(function() {
        var idnumber = $(this).parent().closest('div').attr('id');
        console.log(idnumber);
        $.ajax({
            type: "POST",
            // dataType: 'JSON',
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

});