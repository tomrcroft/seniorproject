<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//db connection
$server = 'CMT-CIMS\CIMS';
$connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015", "ReturnDatesAsStrings"=>"true");
$link = sqlsrv_connect($server, $connectionInfo);

//Checks connection
if (!$link) {
    $output = "Problems with the database connection!"; 
    $json = json_encode($output);
    echo $json;
}
else
{
    $str = "SELECT Total_Restocking_Fee FROM cmt..[Invoice_Hdr] WHERE Invoice_ID = ?";
    $params = array($_POST['invoiceid']);
    $stmt = sqlsrv_query($link,$str,$params);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
    sqlsrv_free_stmt($stmt);
    echo $row['Total_Restocking_Fee'];
}
?>
