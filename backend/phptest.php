<?php
<<<<<<< HEAD
$serverName = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
$connection= array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
$conn = sqlsrv_connect( $serverName, $connection);
=======
// $serverName = "JWOW\SQLEXPRESS"; //put your servername here
// $serverName = "ALEXBIGLAPTOP";
// $connection = array( "Database"=>"CMT");

$server = "cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$connectionInfo = array("Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
$conn = sqlsrv_connect( $server, $connectionInfo);
>>>>>>> origin/development

if( $conn ) {
     echo "Connection established.
";
}else{
     echo "Connection could not be established.
";
     die( print_r( sqlsrv_errors(), true));
}
?>