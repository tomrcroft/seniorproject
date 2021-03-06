<?php

//DO NOT EDIT BELOW THIS LINE
include '../backend/DBConnection.php';
$conn = connect();

$formvars = array($_POST['companySearch']);
// $formvars = array('bigwatts');
//all pull requests
 $num_items_pull = 0;
 $num_items_invoice = 0;

$query = "SELECT * FROM cmt..[Pull_Request_Hdr], cmt..[User]
							   WHERE cmt..[User].Company = ?
							   AND cmt..[User].Username = cmt..[Pull_Request_Hdr].Created_By
							   ORDER BY Status ASC";

$stmt = sqlsrv_query($conn, $query, $formvars);
$rows_pulls = array();
$rows_invoice = array();

//display results
while($result = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
{	
    if($result === false) {
        die( print_r( sqlsrv_errors(), true));
    }	 


    // $datemodified = date_format($result['Last_Modified_Date'], 'm-d-Y');


    //                 echo '    <div class="admin_pull_results panel" id='. $result['Pull_Request_ID'] .'>
    //                         <h5>' .$result['Production']. '</h5> 
    //                         DATE MODIFIED: '. $datemodified .'
    //                     </div>
    //                    ';

$rows_pulls[] = $result;
$num_items_pull++;
}
 sqlsrv_free_stmt($stmt);


$query1 = "SELECT * FROM cmt..[Invoice_Hdr], cmt..[User]
                               WHERE cmt..[User].Company = ?
                               AND cmt..[User].Username = cmt..[Invoice_Hdr].Username";
	 	// echo '	</div>
   //                  <div class="large-4 large-offset-2 columns left" id="records_results">
   //                      <h5>COMPANYNAME View Invoice Records for USER (2 Results)</h5> ';

$stmt1 = sqlsrv_query($conn, $query1, $formvars);
while($results = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC ))
{
    if($results === false) {
        die( print_r( sqlsrv_errors(), true));
    }
	
	// $date = date_create($results['Last_Modified_Date']);
 //        $datemodified1 = date_format($date, 'm-d-Y');

 //                    echo '    <div class="admin_invoice_results panel" id='. $results['Pull_Request_ID'] .'>
 //                            <h5> '.$results['Billing_Name'].'</h5> 
 //                            DATE MODIFIED: '. $datemodified1 .'
 //                        </div>
 //                        ';
   // echo 'this is one results';
$rows_invoice[] = $results;
$num_items_invoice++;
}
//echo $num_items_pull;
//echo $num_items_invoice;

echo json_encode(array("searchterm" => $_POST['companySearch'], "results1" => $rows_pulls, "results2" => $rows_invoice, "numItemsPull" => $num_items_pull, "numItemsInvoice" => $num_items_invoice));
//echo json_encode(array("searchterm"=> 'CISCO', "results1"=>$rows_pulls, "numItemsPull"=>$num_items_pull));

sqlsrv_free_stmt($stmt1);

// sqlsrv_free_stmt($stmt);

        sqlsrv_close($conn);

?>
