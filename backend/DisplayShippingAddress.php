<?php
include '../backend/DBConnection.php';
/*
 * Displays the user's shipping address
 */

    //declare variables
    $link = connect();
    if(!isset($_SESSION['user_id']))
        include '../backend/getUserId.php';
    $formvars = array($_SESSION['user_id']);
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = "SELECT * FROM cmt..[User_Address] WHERE User_Key = ?";
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        if($row === false) {
            die( print_r( sqlsrv_errors(), true));
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
        echo '<div id="account_shipping_attn">Shipping Attn: '. $row['Shipping_Attn'] .'</div>
                <div id="account_shipping_address">Shipping Address: '. $row['Shipping_Street_Address'] .'</div>
                <div id="account_shipping_city">Shipping City: '. $row['Shipping_City'] .'</div>
                <div id="account_shipping_state">Shipping State: '. $row['Shipping_State_Province'] .'</div>
                <div id="account_shipping_zip">Shipping Zip: '. $row['Shipping_Postal_Code'] .'</div>
                <div id="account_shipping_country">Shipping Country: '. $row['Shipping_Country'] .'</div>'; 
    }
?>
