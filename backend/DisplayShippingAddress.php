<?php

/*
 * Displays the user's shipping address
 */

    //declare variables
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);
    $formvars = array($_SESSION['login_user']);
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = "SELECT * FROM cmt..SHIPPING WHERE Username = ?";
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
