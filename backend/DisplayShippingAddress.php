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
        
//        echo $row['Shipping_Street_Address'] . $row['Shipping_City'] . $row['Shipping_State_Province'] 
//                . $row['Shipping_Postal_Code'] . $row['Shipping_Country'] . $row['Shipping_Attn'];
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
    }
?>
