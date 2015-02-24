<?php
$serverName = "ALEXBIGLAPTOP"; //put your servername here
$connection = array( "Database"=>"CMT");
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