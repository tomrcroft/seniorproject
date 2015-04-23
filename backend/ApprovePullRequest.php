<?php

session_start();

// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";
//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

// need to get all the variables for the stored procedure
$pullrequestID = $_POST['pullid'];
$status = 'Accepted';
$user = $_SESSION['login_user'];
$fee = $_POST['rentalFee'];
$instructions = $_POST['notes'];
$formvars = array($pullrequestID, $status, $fee, $instructions, $username);
$str = "{call dbo.Accept_Reject_Pull_Request(?,?,?,?,?)}";

if (!$conn) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
    	$stmt = sqlsrv_query($conn, $str, $formvars);
		if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
            }

    }


?>    	
