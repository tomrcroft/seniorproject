<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//check if available
//add item id to session array
    session_start();
    include '../backend/checkIfLoggedIn.php';
    $itemID = $_POST['itemID'];
    //declare variables
    $user = $_SESSION['login_user'];
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);

    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $params = array($itemID,'Pending',$user);
        $str = "{call dbo.Accept_Reject_Pull_Request(?, ?, ?)}";

        $stmt = sqlsrv_query($link,$str,$params);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
    }
?>
