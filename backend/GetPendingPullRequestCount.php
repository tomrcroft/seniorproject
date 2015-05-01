<?php

/*
 * Returns the number of pending pull requests
 */

    $server = 'CMT-CIMS\CIMS';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015", "ReturnDatesAsStrings"=>"true");
    $link = sqlsrv_connect($server, $connectionInfo);
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        //run query
        $str = "SELECT count(*) FROM cmt..[Pull_Request_Hdr] WHERE Status = 'Pending'";
        $stmt = sqlsrv_query($link,$str);
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
        if($row === false) {
            die( print_r( sqlsrv_errors(), true));
        }
        echo $row['0'];
    }
?>
