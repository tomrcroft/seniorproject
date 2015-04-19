<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();
    unset($_SESSION['login_user'],$_SESSION['shopping_cart'],$_SESSION['user_id']);
    echo json_encode(array("error" => false));
    // header('Location: ../www/search_page.php');
?>
