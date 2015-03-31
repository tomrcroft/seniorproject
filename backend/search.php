<?php
// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";

//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$find = "apple";
// assuming $find is input being searched
// We perform a bit of filtering
//$find = explode(' ', $find);
//$find = strtoupper($find);
//$find = strip_tags($find);
$find = trim ($find);

$query = sqlsrv_query( $conn, "SELECT * FROM cmt..costume WHERE costume_name LIKE '%$find%'"); // need to fix to find $find

while($result = sqlsrv_fetch_array( $query ))
{

echo "heres one result";
// display results however we wan

}

//if there are no matches..
$anymatches=sqlsrv_num_rows($query);
if ($anymatches == 0)
{
echo "Sorry, but we can not find an entry to match your search...<br><br>";
}
?>
