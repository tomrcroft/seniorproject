$(document).ready(function() {
$('#accept_pull_request_button').click(function(e) {

    e.stopImmediatePropagation();
    console.log("Accept Pull Request Button Works!");
    // $.ajax({
    //     // type: "GET",
    //     // url: '../backend/itemView.php',
    //     data: idnumber,

    //     success: function(response) {
    //         console.log("Accept Pull Request Button works!");
    //         // console.log(idnumber);
    //         window.location="inventory_page.php?idnumber=" + idnumber;
    //     }
    // });
});


$("#pending_pull_results > div").click(function (e) {
    window.location = $(this).attr("data-href");
    return false;
});

$('#reject_pull_request_button').click(function(e) {

    e.stopImmediatePropagation();
    console.log("Reject Pull Request Button Works!");
    // $.ajax({
    //     // type: "GET",
    //     // url: '../backend/itemView.php',
    //     data: idnumber,

    //     success: function(response) {
    //         console.log("Accept Pull Request Button works!");
    //         // console.log(idnumber);
    //         window.location="inventory_page.php?idnumber=" + idnumber;
    //     }
    // });
});

});