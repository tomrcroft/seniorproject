<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();
    unset($_SESSION['login_user']);
    header('Location: ../www/search_page.php');
?>
