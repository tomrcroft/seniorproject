<?php

/*
 * Adds the shipping address to the database
 */
    session_start();
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);
    $formvars = array($_SESSION['login_user'],$_POST['shipAddress'],$_POST['shipCity'],$_POST['shipState'],
        $_POST['shipAreaCode'],$_POST['shipCountry'],$_POST['shipAttn']);
    /*$formvars = array('jdub9108''123 cossa blvd','sac town','CA',95831,'US','MR. Watts');*/
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = 'INSERT INTO CMT..[User_Address] (User_Key,Shipping_Street_Address,Shipping_City,
            Shipping_State_Province,Shipping_Postal_Code,Shipping_Country,Shipping_Attn)
            VALUES (?,?,?,?,?,?,?)';
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($link);
    }
?>
