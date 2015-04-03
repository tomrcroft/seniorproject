<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function itemView()
{
    $id = $_GET['idnumber'];// whatever variable name it is
    
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);

    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        //Search for costume
        $str = "select * from dbo.[Costume] where Costume_Key = ?";

        $query = sqlsrv_query($link,$str,$id);//runs statement
        if( $query === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        //change result into an array
        $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC);
        //return as json object
        $json = json_encode($row);
        echo $json;
        
        sqlsrv_free_stmt($query);//frees statement
        sqlsrv_close($link);
    }
}
?>
