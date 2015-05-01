$(document).ready(function() {

    $('.add_item').click(function() {

        if($(this).hasClass('disabled')){
         return false;
      }
      else {
      var idnumber = $(this).parent().parent().parent().children(":first-child").attr('id');

      $.ajax({
         context: this,
         async: false,
         type: "POST",
         url: '../backend/addToCart.php',
         data: {itemID: idnumber},

         success: function(response) {
            $(this).toggleClass('disabled');
            $(this).text('Item Added!');
            // alert("ItemID: " + response);
            // $('#add_item_text').hide();
            // $('#add_item_text').html( " added to your cart!");
            // $('#add_item_text').prepend(item_name);
            // $('#add_item_text').fadeIn(1000);

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
      }
   });
    });

      

});