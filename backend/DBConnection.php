<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function connect()
{
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195", "ReturnDatesAsStrings"=>"true");
    return sqlsrv_connect($server, $connectionInfo);
}
?>
