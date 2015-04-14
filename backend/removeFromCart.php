<?php

/*
 * Removes individual items from the shopping cart
 */

    session_start();
    $item = $_POST['itemId'];//item number to be removed
    //$item = 42;
    $cart = $_SESSION['shopping_cart'];
    foreach ($cart as $value) {
        if ($value != $item)
            $newCart[] = $value;
    }
    unset($_SESSION['shopping_cart']);
    $_SESSION['shopping_cart'] = $newCart;
?>
