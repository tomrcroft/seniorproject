<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
// server connection
$server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
$connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
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
