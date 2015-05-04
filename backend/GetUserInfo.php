<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function getUserInfo(){
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';//remember to change the server
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);
    
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        exit($json);
    }        
    else
    {
        $str = 'SELECT * FROM cmt..[user] WHERE Username = ?';
        $username = array($_SESSION['login_user']);
        
        $stmt = sqlsrv_query($link,$str,$username);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        $userInfo = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
        return $userInfo;
    }
}
?>
