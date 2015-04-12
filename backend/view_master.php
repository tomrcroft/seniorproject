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

 $find = "gurnit";
//all pull requests minus accepted

$query = sqlsrv_query( $conn, "SELECT * FROM cmt..Pull_Request_Hdr WHERE created_by LIKE '%$find%' AND status !='Accepted'");

while($result = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC ))
{

$rows_pulls[] = $result;
}

$query = sqlsrv_query( $conn, "SELECT * FROM cmt..Invoice WHERE username LIKE '%$find%'");

while($result = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC ));
{
$rows_invoice[] = $results;
}

echo json_encode(array("searchterm"=> $find, "results1"=>$rows_pulls, "results2" =>$rows_invoice, "numItems"=>$num_items_returned));


?>
