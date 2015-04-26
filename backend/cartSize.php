<?php 
   if (session_status() == PHP_SESSION_NONE) {
       session_start();
   }
    if(isset($_SESSION['shopping_cart'])){
        if(count($_SESSION['shopping_cart']) > 0){
            echo '(' . count($_SESSION['shopping_cart']) . ')';
        }
    }
?>