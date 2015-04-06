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
 //$find = trim('tutu');
// echo "$find ";
// $find = "apple";
// assuming $find is input being searched
// We perform a bit of filtering
// $find = explode(' ', $find);
// $find = strtoupper($find);
// $find = strip_tags($find);
// $find = trim ($find);

$rows = array();
$num_items_returned = 0;
$dir = 'C:/Users/Aymeric/Desktop/image_tester';

if (empty($find))
{
	$query = sqlsrv_query( $conn, "SELECT TOP 100 FROM cmt..costume");
}
else
{
	$query = sqlsrv_query( $conn, "SELECT * FROM cmt..costume WHERE costume_name LIKE '%$find%'"); // need to fix to find $find
}


while($result = sqlsrv_fetch_array( $query ))
{
// display results however we wan
$rows[] = $result;
$temp = $rows[$num_items_returned]['Costume_Image'];
file_put_contents($dir.'/test'.$num_items_returned.'.jpeg', $temp);
$rows[$num_items_returned]['Costume_Image'] = $dir.'/test'.$num_items_returned.'.jpeg';

echo $rows[$num_items_returned]['Costume_Image'];
$num_items_returned++;
 // create new directory with 744 permissions if it does not exist yet
 // owner will be the user/group the PHP script is run under

   // foreach($rows as $itemNum => $itemNumAttr){
   //    foreach ($itemNumAttr as $attribute => $value){
   //       // if($attribute === 'Notes')
   //          // echo "Value: $Value";
   //    }
   // }
}
// echo print_r($rows[0]['Notes']);
// echo " ";
// echo print_r($rows[0]['Waist_to_Hem']);
// echo print_r($rows);
// echo $num_items_returned;

echo json_encode(array("searchterm"=> $find, "results"=>$rows, "numItems"=>$num_items_returned));

// if ($num_items_returned == 0)
// {
// echo "Sorry, but we can not find an entry to match your search...<br><br>";
// }
?>
