$(document).ready(function() {

    $('.availability').each(function(index) {
        // console.log(index + ": " + $(this).text());
        if($(this).text() == "Pending")
            $(this).css("color", "#0000FF");
        else if($(this).text() == "Rejected")
            $(this).css("color", "#FF0000");
        else
            $(this).css("color", "#008000")
    });
    // if($('.availability').text() == "STATUS")
    //     console.log($(this));

});