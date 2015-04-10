<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';//remember to change the server
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);
    if (!$link) {
        $output = "Something went wrong with connecting to the database!"; 
        $json = json_encode($output);
        exit($json);
    }
    
    //run query
    $str = "select Username, Password from cmt..[User] where username = ?";
    $params = array($username);
    $stmt = sqlsrv_query($link,$str,$params);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if($row === false) {
        die( print_r( sqlsrv_errors(), true));
    }
    //echo $row['Username'] . $row['Password'];
    if($row === NULL || !password_verify($password, $row['Password']))
    {
        // echo $row['Password'];
        // $output = "Username or Password is incorrect!"; 
        $json = json_encode(array("error" => true));
        exit($json);
    }
    
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($link);
    
    $_SESSION['login_user'] = $username; // Initializing Session
    $json = json_encode(array("error" => false));
    exit($json);
    // header("Location: ../www/search_page.php");
?>
