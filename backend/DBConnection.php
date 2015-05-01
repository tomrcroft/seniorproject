<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function connect()
{
    //db connection
    $server = 'CMT-CIMS\CIMS';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
    return sqlsrv_connect($server, $connectionInfo);
}
?>
