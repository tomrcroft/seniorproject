<?php

/*
 * This will display all the invoices a user has had sent to them
 */
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195", "ReturnDatesAsStrings"=>"true");
    $link = sqlsrv_connect($server, $connectionInfo);
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
        $str = "SELECT * FROM cmt..[Invoice_Hdr] WHERE Created_By = ? ORDER BY Status ASC";
        $params = array($user);
        $stmt = sqlsrv_query($link,$str,$params);
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        //display results
        include '../backend/GetInvoice.php';
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            if($row === false) {
                die( print_r( sqlsrv_errors(), true));
            }
            //invoice display goes here
        }
    }
?>
