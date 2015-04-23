<?php
include '../backend/DBConnection.php';
/*
 * This will display all the invoices a user has had sent to them
 */
    $link = connect();
    $user = $_SESSION['login_user'];
    //$user = 'gurnit';
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        //run query
        $str = "SELECT * FROM cmt..[Invoice_Line], cmt..[Cotume] WHERE Created_By = ? ";
        $params = array($user);
        $stmt = sqlsrv_query($link,$str,$params);
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        //display results
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            if($row === false) {
                die( print_r( sqlsrv_errors(), true));
            }
            //invoice display goes here
            //data of importance: cost, date approved, status
            //should have link to the individual invoice view
        }
    }
?>
