$(document).ready(function() {

    $(".registration").hide();

    $('#login_tab').click(function(e) {
      $(".registration").hide();
      $(".login").show();
    });

    $('#register_tab').click(function(e) {
      $(".login").hide();
      $(".registration").show();
    });
});