<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//check if available
//add item id to session array
    session_start();
    include '../backend/checkIfLoggedIn.php';
    $itemID = $_POST['itemID'];
    
    $_SESSION['shopping_cart'][] = $itemID;
    
    
?>
