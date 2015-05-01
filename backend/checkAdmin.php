<?php
    function checkIfAdmin($username)
    {
        $server = 'CMT-CIMS\CIMS';
        $connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
        $link = sqlsrv_connect($server, $connectionInfo);
        //Checks connection
        if (!$link) {
            $output = "Problems with the database connection!"; 
            $json = json_encode($output);
            echo $json;
        }        
        else
        {
            $sql = "SELECT Admin FROM CMT..[User] WHERE Username = '$username'";

            $stmt = sqlsrv_query( $link, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }

            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                if($row['Admin'] == 0)
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }
        }
    }
    
?>