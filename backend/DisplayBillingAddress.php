<?php

/*
 * Displays the user's billing address
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
        $str = "SELECT * FROM cmt..BILLING WHERE Username = ?";
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
