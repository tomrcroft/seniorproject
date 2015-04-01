<?php
// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";

//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$find = trim($_POST['searchterm']);
// $find = trim('tutu');
// echo $find;
// $find = "apple";
// assuming $find is input being searched
// We perform a bit of filtering
// $find = explode(' ', $find);
// $find = strtoupper($find);
// $find = strip_tags($find);
// $find = trim ($find);

$query = sqlsrv_query( $conn, "SELECT * FROM cmt..costume WHERE costume_name LIKE '%$find%'"); // need to fix to find $find
// echo $query;
$rows = array();
$num_items_returned = 0;

while($result = sqlsrv_fetch_array( $query ))
{
$num_items_returned++;
// display results however we wan
$rows[] = $result;

}
// echo print_r($rows);
// echo $num_items_returned;

echo json_encode(array("searchterm"=> $find, "results"=>$rows, "numItems"=>$num_items_returned));

// if ($num_items_returned == 0)
// {
// echo "Sorry, but we can not find an entry to match your search...<br><br>";
// }
?>
