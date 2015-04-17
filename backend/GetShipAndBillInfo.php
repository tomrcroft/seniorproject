<?php

/*
 * Converts shipping and billing informaiton to be converted to session arrays to add to stored procedure
 */

    session_start();
    // order is address, city, state, zip, country, attn
    // billing first then shipping
    // $_SESSION['bill_and_ship_info']
?>
