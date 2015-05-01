<?php

/*
 * Adds the shipping address to the database
 */
    $server = 'CMT-CIMS\CIMS';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
    $link = sqlsrv_connect($server, $connectionInfo);
    $formvars = array($_SESSION['login_user']);
    /*$formvars = array('jdub9108''123 cossa blvd','sac town','CA',95831,'US','MR. Watts');*/
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = 'SELECT User_Key FROM CMT..[User] WHERE Username = ?';
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        if($row === false) {
            die( print_r( sqlsrv_errors(), true));
        }
        $_SESSION['user_id'] = $row['User_Key'];
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
    }
?>
