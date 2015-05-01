<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//db connection
include '../backend/DBConnection.php';
$link = connect();

//Checks connection
if (!$link) {
    $output = "Problems with the database connection!"; 
    $json = json_encode($output);
    echo $json;
}
else
{
    $str = "SELECT Item_Total_Amount FROM cmt..[Pull_Request_Hdr] WHERE Pull_Request_ID = ?";//change to Total_Rental_Fee
    $params = array($_POST['pullid']);
    $stmt = sqlsrv_query($link,$str,$params);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
    sqlsrv_free_stmt($stmt);
    echo $row['Item_Total_Amount'];
}
?>
