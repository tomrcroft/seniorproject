<?php
include '../backend/DBConnection.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function getUserInfo(){
    $link = connect();
    
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
