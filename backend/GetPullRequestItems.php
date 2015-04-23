<?php
include '../backend/DBConnection.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function getItems($id,$user)
{
    $link = connect();
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = "SELECT * FROM cmt..[Pull_Request_Line],cmt..[Costume],cmt..[Dic_Costume_Type] 
            WHERE Pull_Request_ID = ? AND cmt..[Costume].Costume_Type_Key = cmt..[Dic_Costume_Type].Costume_Type_Key
            AND cmt..[Pull_Request_Line].Costume_Key = cmt..[Costume].Costume_Key
            AND cmt..[Pull_Request_Line].Source_Deleted = 0 AND cmt..[Pull_Request_Line].Created_By = ?";
        $params = array($id,$user);
        $stmt = sqlsrv_query($link,$str,$params);
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            if($row === false) {
                die( print_r( sqlsrv_errors(), true));
            }
            echo '<div class="row">
                        <h5 class="item_name"><a href="inventory_page.php?idnumber='. $row['Costume_Key'] .'">'. $row['Costume_Name'] .'</a></h5>
                        <div class="large-2 columns">
                          
                          Group: '. $row['Costume_Group'] .'<br>
                          Type: '. $row['Costume_Type'] .'
                        </div>
                        <div class="large-10 columns">
                          '. $row['Costume_Description'] .'
                        </div>
                      </div>
                        <hr>';
        }
    }
}
?>
