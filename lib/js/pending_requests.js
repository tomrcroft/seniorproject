
$('#accept_pull_request_button').click(function(e) {

    $.ajax({
        // type: "GET",
        // url: '../backend/itemView.php',
        data: idnumber,

        success: function(response) {
            console.log("Accept Pull Request Button works!");
            // console.log(idnumber);
            window.location="inventory_page.php?idnumber=" + idnumber;
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