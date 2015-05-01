<?php

// check to make sure admin
 include '../backend/checkIfLoggedIn.php';
    include '../backend/checkAdmin.php';
    if(!checkIfAdmin($_SESSION['login_user']))
        header ("Location: ../www/index.php");

// connect to db first
$serverName="CMT-CIMS\CIMS";
$database="CMT";
$username="CIMSADMIN";
$password="Hook2015";

//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

// $pull_id = ($_POST['pull_id']);
// $status = ($_POST['status']);
// $username = ($_POST['username']);

$formvars = array ($_POST['pull_id'], $_POST['status'], $_POST['username']);

$str = "{call dbo.Accept_Reject_Pull_Request(?,?,?)}";

$stmt = sqlsrv_query($conn, $str, $formvars);
if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            sqlsrv_free_stmt($stmt);

// if($status = 'accepted'){
// EXECUTE [dbo].Accept_Reject_Pull_Request 
//   @Pull_Request_ID = $pull_id
//   ,@status = 'Accepted'
//   ,@Username = $username;
// }

// else if($status = 'rejected'){
// EXECUTE [dbo].Accept_Reject_Pull_Request 
//   @Pull_Request_ID = $pull_id
//   ,@status = 'Rejected'
//   ,@Username = $username;
// }




?>
