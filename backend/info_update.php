<?php
// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";

//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);


$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);
$company = trim($_POST['company']);

$query = sqlsrv_query( $conn, "UPDATE cmt..User SET First_Name = $first_name, Last_Name = $last_name, Company = $company, Email = $email, Password = $password WHERE (id from current account logged in");


?>
