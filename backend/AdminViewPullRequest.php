<?php

//DO NOT EDIT BELOW THIS LINE
include '../backend/DBConnection.php';
$conn = connect();



if (!$conn) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
    	$formvars = array($_GET['idnumber']);

    	//need picture, name, description, location
    	$query = "SELECT CMT..[Pull_Request_Line].Costume_Key, Costume_Image, Costume_Name, Costume_Description, Storage_Location 
    	FROM CMT..[Pull_Request_Line], CMT..[Costume]
    	WHERE CMT..[Pull_Request_Line].Pull_Request_ID = ?
    	AND CMT..[Pull_Request_Line].Costume_Key = CMT..[Costume].Costume_Key";


    	//run query
    	//$str = $query;
		$stmt = sqlsrv_query($conn, $query, $formvars);
		if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }

		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            if($row === false) {
                die( print_r( sqlsrv_errors(), true));
            }
            displayItem($row);
        }
		sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);


}
function displayItem($item)
{


	//convert photo to jpeg
    $dir = '../lib/images/temp/item'.$item['Costume_Key'].'.jpeg';
    if (!file_exists($dir))
            file_put_contents($dir, $item['Costume_Image']);//changing from blob format
        $pic = '<img src="'.$dir.'" alt="Costume Image" class="thumbnail">';

        echo '
					<tr>
                    <td>'. $pic .'</td>
                                    <td><h4><a href="inventory_page.php?idnumber='.$item['Costume_Key'].'">'. $item['Costume_Name'] .'</a></h4></td>
                                    <td class="item_description"> '. $item['Costume_Description'] .'</td>
                                    <td class="item_location"> '. $item['Storage_Location'] .'</td>
                                </tr>
';

}


?>




