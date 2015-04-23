<?php
include '../backend/DBConnection.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();
    $link = connect();
    //$formvars = array($_POST['pullId'],'Canceled',$_SESSION['login_user']);
    $formvars = array(9,'Canceled','jdub9108');
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = '{call dbo.Accept_Reject_Pull_Request(?,?,,,?)}';
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
    }
?>
