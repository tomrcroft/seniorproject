<?php
session_start();
include '../backend/checkAdmin.php';
if(isset($_SESSION['login_user'])){ //if login in session is not set
    if (checkIfAdmin($_SESSION['login_user']))    
        header("Location: ../www/pending_requests.php");//whatever the admin page is called
    else
        header("Location: ../www/search_page.php");
    }
?>