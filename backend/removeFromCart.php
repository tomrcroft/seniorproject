<?php

/*
 * Removes individual items from the shopping cart
 */

    session_start();
    $item = $_POST['itemId'];//item number to be removed
    //$item = 42;
    //$cart = array(40,17,42);
    if(($key = array_search($item, $_SESSION['shopping_cart'])) !== false) {
        unset($_SESSION['shopping_cart'][$key]);
    }
    /*if(($key = array_search($item, $cart)) !== false) {
        unset($cart[$key]);
    }
    foreach ($cart as $value) {
        echo $value . " ";
    }*/
?>
