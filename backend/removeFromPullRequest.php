<?php
include '../backend/DBConnection.php';
/*
 * Deletes an individual item from a pull request
 */

    session_start();
    $link = connect();
    //figure out what to do with price
    //$newPrice = calculateNewPrice();
    $newPrice = 0;
    $formvars = array($_POST['pullId'],$_POST['costumeId'],$newPrice,$_SESSION['login_user']);
    //$formvars = array(2,40,0,'jdub9108');
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = '{call dbo.Remove_Item_Pull_Request(?,?,?,?)}';
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
    }
?>
