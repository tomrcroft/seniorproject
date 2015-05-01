<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
// server connection
$server = 'CMT-CIMS\CIMS';
$connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
$link = sqlsrv_connect($server, $connectionInfo);
//Checks connection
if (!$link) {
    $output = "Problems with the database connection!"; 
    $json = json_encode($output);
    echo $json;
}        
else
{
    $str = "{call dbo.Accept_Reject_Invoice(?,'Accepted',?)}";
    $params = array($_POST['invoiceid'], $_SESSION['login_user']);
    $stmt = sqlsrv_query($link,$str,$params);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
}
?>
