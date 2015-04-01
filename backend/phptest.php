<?php
$serverName = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
$connection= array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
$conn = sqlsrv_connect( $serverName, $connection);

if( $conn ) {
     echo "Connection established.
";
}else{
     echo "Connection could not be established.
";
     die( print_r( sqlsrv_errors(), true));
}
?>