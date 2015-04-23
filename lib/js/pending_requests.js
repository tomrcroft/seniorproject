$(document).ready(function() {

    /*
        When pending pull request is clicked, user is redirected to view the pull request.
    */
    $("#pending_pull_results > div").click(function (e) {

        var idnumber = $(this).attr("data-pull-id");

        $.ajax({
            type: "GET",
            url: '../backend/AdminViewPullRequest.php',
            data: idnumber,

            success: function(response) {
                // console.log(idnumber);
                window.location = "view_pending_request.php?idnumber=" + idnumber;
            }
        });
    });

    /*
      These are the jQuery functions associated with the Accept and Reject Pull Request Modals.
      The modals were created by the Foundation Framework are called with jQuery.
   */

    $('#accept_pull_request_modal_button').click(function(e) {
        e.stopImmediatePropagation();
        $('#accept-request-modal').foundation('reveal','open');
    });

    $('#reject_pull_request_modal_button').click(function(e) {
        e.stopImmediatePropagation();
        $('#reject-request-modal').foundation('reveal','open');
    });

    $('.cancel_modal_button').on('click', function() {
      $('#accept-request-modal').foundation('reveal', 'close');
      $('#reject-request-modal').foundation('reveal', 'close');
   });

});