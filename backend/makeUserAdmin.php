<?php
    function makeUserAdmin($usernameGiving, $emailReceiving)
    {
        session_start();
        include './checkAdmin.php';
        if(!checkIfAdmin($usernameGiving))
            header ("Location: ../www/index.php");
        $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
        $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
        $link = sqlsrv_connect($server, $connectionInfo);
        //Checks connection
        if (!$link) {
            $output = "Problems with the database connection!"; 
            $json = json_encode($output);
            echo $json;
        }        
        else
        {
            $sql = "SELECT Username FROM CMT..[User] WHERE Email = '$emailReceiving'";

            $stmt = sqlsrv_query( $link, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }

            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                if(checkIfAdmin($row['Username']) == false)
                {   
                    $sql = "UPDATE CMT..[User] SET Admin = 1, Marked_As_Admin_By = '$usernameGiving 'WHERE Email = '$emailReceiving'";

                    $stmt = sqlsrv_query( $link, $sql );
                    if( $stmt === false) {
                        die( print_r( sqlsrv_errors(), true) );
                    }
                }
            }
        }
    }
    
?>