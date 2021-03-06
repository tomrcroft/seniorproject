<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    include '../backend/DBConnection.php';
    $link = connect();
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
        $output = "Username or Password is incorrect!"; 
        $json = json_encode(array("location"=>"search", "error" => true));
        exit($json);
    }
    
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($link);
    
    $_SESSION['login_user'] = $username; // Initializing Session
    //$_SESSION['shopping_cart'];
    include '../backend/checkAdmin.php';
    if (checkIfAdmin($_SESSION['login_user'])){
        $json = json_encode(array("location"=>"pending_requests.php", "error" => false));
        exit($json);
    }
    else{
        $json = json_encode(array("location"=>"search_page.php", "error" => false));
        exit($json);
    }
?>
