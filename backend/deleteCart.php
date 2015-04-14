<?php

/*
 * Removes all of the items in your shopping cart
 */
    session_start();
    unset($_SESSION['shopping_cart']);
?>
