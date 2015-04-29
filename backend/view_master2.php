<?php

// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";

//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//$formvars = array($_POST['companySearch']);
$formvars = array('bigwatts');
//all pull requests
 $num_items_pull = 0;
 $num_items_invoice = 0;
 $rows_invoice = array();


$query1 = "SELECT * FROM cmt..[Invoice_Hdr], cmt..[User]
                               WHERE cmt..[User].Company = ?
                               AND cmt..[User].Username = cmt..[Invoice_Hdr].Username";
	 	// echo '	</div>
   //                  <div class="large-4 large-offset-2 columns left" id="records_results">
   //                      <h5>COMPANYNAME View Invoice Records for USER (2 Results)</h5> ';

$stmt1 = sqlsrv_query($conn, $query1, $formvars);
while($results = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC ));
{
    if($results === false) {
        die( print_r( sqlsrv_errors(), true));
    }
	
    echo 'this is one results';
$rows_invoice[] = $results; // this is returning null
$num_items_invoice++;
}
echo $num_items_pull;
echo $num_items_invoice;

echo json_encode(array("searchterm"=> "bigwatts", "results2" =>$rows_invoice, "numItemsInvoice" => $num_items_invoice));

sqlsrv_free_stmt($stmt1);

// sqlsrv_free_stmt($stmt);

        sqlsrv_close($conn);

?>
