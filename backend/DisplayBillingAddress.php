<?php

/*
 * Displays the user's billing address
 */

    //declare variables
    $server = 'CMT-CIMS\CIMS';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
    $link = sqlsrv_connect($server, $connectionInfo);
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
        echo '<div id="account_billing_username">Billing Attn: '. $row['Billing_Attn'] .'</div>
                <div id="account_billing_first_name">Billing Address: '. $row['Billing_Street_Address'] .'</div>
                <div id="account_billing_last_name">Billing City: '. $row['Billing_City'] .'</div>
                <div id="account_billing_company">Billing State: '. $row['Billing_State_Province'] .'</div>
                <div id="account_billing_email">Billing Zip: '. $row['Billing_Postal_Code'] .'</div>
                <div id="account_billing_phone">Billing Country: '. $row['Billing_Country'] .'</div>';
    }
?>
