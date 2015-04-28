<?php

// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";

//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$formvars = array($_POST['companySearch']);
//all pull requests
 $num_items_returned = 0;

$query = sqlsrv_query( $conn, "SELECT * FROM cmt..[Pull_Request_Hdr], cmt..[User]
							   WHERE cmt..[User].Company = ?
							   AND cmt..[User].Username = cmt..[Pull_Request_Hdr].Created_By
							   ORDER BY Status ASC", $formvars);
//display results
while($result = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC ))
{	
	 $datemodified = date_format($result['Last_Modified_Date'], 'm-d-Y');


                    echo '    <div class="admin_pull_results panel" id='. $result[Pull_Request_ID] .'>
                            <h5>' .$result[Production]. '</h5> 
                            DATE MODIFIED: '. $datemodified .'
                        </div>
                       ';

//$rows_pulls[] = $result;
//$num_items_returned++;
}
sqlsrv_free_stmt($result);

$query1 = sqlsrv_query( $conn, "SELECT * FROM cmt..[Invoice_Hdr], cmt..[User]
                               WHERE cmt.[User].Company = ?
                               AND cmt.[User].Username = cmt..[Invoice_Hdr].Username", $formvars);
	 	echo '	</div>
                    <div class="large-4 large-offset-2 columns left" id="records_results">
                        <h5>COMPANYNAME View Invoice Records for USER (2 Results)</h5> ';

while($results = sqlsrv_fetch_array( $query1, SQLSRV_FETCH_ASSOC ));
{

	$datemodified = date_format($results['Last_Modified_Date'], 'm-d-Y');

                    echo '    <div class="admin_invoice_results panel" id='. $results[Pull_Request_ID] .'>
                            <h5> '.$results[Billing_Name].'</h5> 
                            DATE MODIFIED: '. $datemodified .'
                        </div>
                        ';
      


//$rows_invoice[] = $results;
}

//echo json_encode(array("searchterm"=> $find, "results1"=>$rows_pulls, "results2" =>$rows_invoice, "numItems"=>$num_items_returned));
sqlsrv_free_stmt($result);
        sqlsrv_close($conn);

?>
