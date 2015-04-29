<?php 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function calcTotal($link, $params)
{
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }
    else 
    {
        $str = "SELECT SUM(Rental_Fee) FROM cmt..[Costume] WHERE ";
        //adds items to query
        foreach ($params as $value) {
            $list[] = "Costume_Key = ?";
        }

        if (count($list) > 0) {
            $str .= implode(' OR ', $list);
        }
        echo $str;
        $stmt = sqlsrv_query($link,$str,$params);
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
        if($row === false) {
            die( print_r( sqlsrv_errors(), true));
        }
        $value = $row[0];
        sqlsrv_free_stmt($stmt);
        return $value;
    }
}
?>
