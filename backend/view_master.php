<?php

// check to make sure admin
 include '../backend/checkIfLoggedIn.php';
    include '../backend/checkAdmin.php';
    if(!checkIfAdmin($_SESSION['login_user']))
        header ("Location: ../www/index.php");

// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";

//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$formvars = array($_POST['company']);
//all pull requests
 $num_items_returned = 0;

$query = sqlsrv_query( $conn, "SELECT * FROM cmt..[Pull_Request_Hdr], cmt..[User]
							   WHERE cmt..[User].Company = ?
							   AND cmt..[User].Username = cmt..[Pull_Request_Hdr].Created_By
							   ORDER BY Status ASC", $formvars);

while($result = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC ))
{

$rows_pulls[] = $result;
$num_items_returned++;
}

$query = sqlsrv_query( $conn, "SELECT * FROM cmt..[Invoice_Hdr], cnt..[User]
                               WHERE cmt.[User].Company = ?
                               AND cmt.[User].Username = cmt..[Invoice_Hdr].Username", $formvars);

while($results = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC ));
{
$rows_invoice[] = $results;
}

echo json_encode(array("searchterm"=> $find, "results1"=>$rows_pulls, "results2" =>$rows_invoice, "numItems"=>$num_items_returned));


?>
