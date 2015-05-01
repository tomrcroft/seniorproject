<?php

/*
 * Displays the user's billing address
 */

    //declare variables
    $server = 'CMT-CIMS\CIMS';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
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
        $str = "SELECT * FROM cmt..BILLING, cmt..SHIPPING WHERE cmt..BILLING.Username = ?
            AND cmt..BILLING.Username = cmt..SHIPPING.Username";
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        if($row === false) {
            die( print_r( sqlsrv_errors(), true));
        }
        //echo $row['Billing_Street_Address'] . $row['Billing_City'] . $row['Billing_State_Province'] 
//                . $row['Billing_Postal_Code'] . $row['Billing_Country'] . $row['Billing_Attn'] . 
//                $row['Shipping_Street_Address'] . $row['Shipping_City'] . $row['Shipping_State_Province'] 
//                . $row['Shipping_Postal_Code'] . $row['Shipping_Country'] . $row['Shipping_Attn'];
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
        $json = json_encode(array("location"=>"search_page.php", "error" => false));//different page
        exit($json);
    }
?>

