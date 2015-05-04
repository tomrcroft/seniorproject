<?php

/*
 * returns the shipping and billing information
 */
function getAddressInfo($id){
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';//remember to change the server
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);
    
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        exit($json);
    }        
    else
    {
        $str = 'SELECT Billing_Street_Address, Billing_City, Billing_State_Province,
            Billing_Postal_Code, Billing_Country, Billing_Attn, Shipping_Street_Address,
            Shipping_City, Shipping_State_Province, Shipping_Postal_Code, Shipping_Country
            , Shipping_Attn FROM cmt..[User_Address] WHERE User_Key = ?';
        $userID = array($id);
        
        $stmt = sqlsrv_query($link,$str,$userID);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        $userAddresses = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
        return $userAddresses;
    }
}
?>
