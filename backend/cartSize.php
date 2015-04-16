<?php 
    if(isset($_SESSION['login_user'])){
        if(count($_SESSION['shopping_cart']) > 0){
            echo '(' . count($_SESSION['shopping_cart']) . ')';
        }
    }
?>