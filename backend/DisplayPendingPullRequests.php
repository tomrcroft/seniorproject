<?php
// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";
//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if (!$conn) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        //run query
        $str = "SELECT * FROM cmt..[Pull_Request_Hdr] WHERE Status = 'Pending' ORDER BY Status ASC";
        $stmt = sqlsrv_query($conn,$str);
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }

        //display results
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            if($row === false) {
                die( print_r( sqlsrv_errors(), true));
            }
            //display goes here
            //echo $row['Pull_Request_ID'];
            $datecreated = date_format($row['Created_Date'], 'Y-m-d H:i:s');
            $datedelivery = date_format($row['Delivery_Date'], 'Y-m-d H:i:s');

			echo '<div class="admin_pull_result panel clearfix" id="pull_request_idnumber" data-pull-id='. $row['Pull_Request_ID'].'>
                            <div class="left pull_request_title"><b>'. $row['Production'] .'</b>
                                <div class="date_created">DATE CREATED: '. $datecreated .'</div>
                                <div class="delivery_date">DELIVERY DATE: '. $datedelivery .'</div>
                            </div>
                            <div class="left notes"> '. $row['Notes'] .' NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES </div>
                            <div class="right">
                                <div class="accept_pull_request_modal_button button success right">Accept</div>
                                <div class="reject_pull_request_modal_button button alert right">Reject</div>
                            </div>
                        </div>';





            // //show the pull request id, status, and date?
            // //need to convert to string '. $row['Created_Date'] .'
            // echo '<li class="accordion-navigation">
            //         <a href="#pull_request_'. $row['Pull_Request_ID'] .'">
            //           <div class="pull_request_name">'. $row['Pull_Request_ID'] . $row['Production'] .' - DATE SUBMITTED: '. $row['Created_Date'] .'<div class="availability right">'. $row['Status'] .'</div></div>
            //         </a>
            //         <div id="pull_request_'. $row['Pull_Request_ID'] .'" class="content">';
            // if ($row['Status'] != 'Accepted')
            //     getItems($row['Pull_Request_ID'],$row['Created_By']);
            // else 
            //     echo 'This pull request is approved, <a href="view_invoice.php">View Invoice Here</a>!';
            // echo   '</div>
            //       </li>';
        }
sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
}
?>
