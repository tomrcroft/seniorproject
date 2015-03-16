<?php
// connect to db first


// assuming #find is input being searched
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
