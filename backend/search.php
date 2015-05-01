<?php
// connect to db first
$serverName="CMT-CIMS\CIMS";
$database="CMT";
$username="CIMSADMIN";
$password="Hook2015";

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
// $find = strip_tags($find);$dir = '../lib/images/temp/item'.$rows['Costume_Key'].'.jpeg';

// $find = trim ($find);

$rows = array();
$num_items_returned = 0;

$formvars = array ($_POST['searchterm']);
$str = "{call dbo.Search_Costume(?)}";


if (empty($find))
{
	$stmt = sqlsrv_query( $conn, "SELECT TOP 100 FROM cmt..costume");
}
else
{
	$stmt = sqlsrv_query($conn, $str, $formvars);
	if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            //sqlsrv_free_stmt($stmt);
	//$query = sqlsrv_query( $conn, "SELECT * FROM cmt..costume WHERE costume_name LIKE '%$find%'"); // need to fix to find $find
}


while($result = sqlsrv_fetch_array( $stmt , SQLSRV_FETCH_ASSOC ))
{
// display results however we wan
$rows[] = $result;
$dir = '../lib/images/temp/item'.$result['Costume_Key'].'.jpeg';
if (!file_exists($dir)){
    $temp = $rows[$num_items_returned]['Costume_Image'];
    file_put_contents($dir, $temp);
}
$rows[$num_items_returned]['Costume_Image'] = $dir;

// echo $rows[$num_items_returned]['Costume_Image'];
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
