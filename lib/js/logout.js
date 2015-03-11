/* 
 * When the logout button is clicked, an AJAX call is made to the logout.php API call
 */
$(document).ready(function() {
    $('#logout_button').click(function(e) {
        $.ajax({
            type: "GET",
            // dataType:'json',
            url: "../backend/logout.php",
            success: function(response) {
                if(response.error == true) {
                    alert("Logout failed");
                }
                else {
                    console.log(response); //for debugging
                    window.location.href = "index.php";
                }
            }
          });
    });
});
