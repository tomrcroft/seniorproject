<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function getInfo($link,$user,$id)
{
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = "SELECT * FROM cmt..[Invoice_Hdr] WHERE Username = ? 
            AND Invoice_ID = ?";
        $params = array($user,$id);
        $stmt = sqlsrv_query($link,$str,$params);
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        sqlsrv_free_stmt($stmt);
        return $row;
    }
}
?>
