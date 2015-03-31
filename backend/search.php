<?php
// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";

//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);


// assuming $find is input being searched
// We perform a bit of filtering
$find = explode(' ', $find);
$find = strtoupper($find);
$find = strip_tags($find);
$find = trim ($find);

$query = mssql_query("SELECT * FROM cmt.[User] WHERE username='$username'"); // need to fix to find $find

while($result = mysql_fetch_array( $query ))
{

// display results however we want

}

//if there are no matches..
$anymatches=mysql_num_rows($query);
if ($anymatches == 0)
{
echo "Sorry, but we can not find an entry to match your search...<br><br>";
}
?>
