<?php

/*
 * Show all pull requests the user has along with their status
 */

    //session_start();
    //variables
    include '../backend/DBConnection.php';
    $link = connect();
    $user = $_SESSION['login_user'];
    //$user = 'BBB';
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        //run query
        $str = "SELECT * FROM cmt..[Pull_Request_Hdr] WHERE Created_By = ? AND Status != 'Canceled' ORDER BY Status ASC";
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
            //need to convert to string '. $row['Created_Date'] .'
            $date = date_format($row['Created_Date'],'m/d/y');
            echo '<li class="accordion-navigation">
                    <a href="#pull_request_'. $row['Pull_Request_ID'] .'">
                      <div class="pull_request_name"><b>'. $row['Production'] .'</b></div>
                      <span class="date_submitted">Date Submitted: '. $date .'</span>
                      <div class="availability right">'. $row['Status'] .'</div>
                    </a>
                    <div id="pull_request_'. $row['Pull_Request_ID'] .'" class="content">';
            if ($row['Status'] != 'Accepted')
                getItems($row['Pull_Request_ID'],$row['Created_By']);
            else 
                echo 'This pull request is approved, <a href="view_invoices.php">View Invoice Here</a>!';
            echo   '</div>
                  </li>';
        }
    }
?>
