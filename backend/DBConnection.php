<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function connect()
{
    //db connection
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    return sqlsrv_connect($server, $connectionInfo);
}
?>