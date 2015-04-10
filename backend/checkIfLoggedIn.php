<?php
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
        header("Location: ../www/index.php");
    }
?>