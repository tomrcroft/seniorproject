<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function getUserInfo(){
    $server = 'CMT-CIMS\CIMS';//remember to change the server
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
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
