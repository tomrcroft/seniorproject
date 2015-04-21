<?php

/*
 * Show all pull requests the user has along with their status
 */

    session_start();
    //variables
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);
    //$user = $_SESSION['login_user'];
    $user = 'gurnit';
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        //run query
        $str = "SELECT * FROM cmt..[Pull_Request_Hdr] WHERE Created_By = ? ORDER BY Status DESC";
        $params = array($user);
        $stmt = sqlsrv_query($link,$str,$params);
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        
        //display results
        include '../backend/GetPullRequestItems.php';
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            if($row === false) {
                die( print_r( sqlsrv_errors(), true));
            }
            //display goes here
            //show the pull request id, status, and date?
            //show each item id, name, description
            echo '<li class="accordion-navigation">
                    <a href="#pull_request_'. $row['Pull_Request_ID'] .'">
                      <div class="pull_request_name">'. $row['Production'] .' - '. $row['Created_Date'] .' 
                          <div class="availability right">'. $row['Status'] .'</div>
                          </div>
                    </a>';
            getItems($row['Pull_Request_ID']);
            echo '</li>';
        }
    }
?>
