<?php
include '../backend/DBConnection.php';
/*
 * Adds the shipping address to the database
 */
    session_start();
    if(!isset($_SESSION['user_id']))
        include '../backend/getUserId.php';
    $link = connect();
    $formvars = array($_SESSION['user_id'],$_POST['shipAddress'],$_POST['shipCity'],$_POST['shipState'],
        $_POST['shipAreaCode'],$_POST['shipCountry'],$_POST['shipAttn']);
    /*$formvars = array('jdub9108''123 cossa blvd','sac town','CA',95831,'US','MR. Watts');*/
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = 'INSERT INTO CMT..[User_Address] (User_Key,Shipping_Street_Address,Shipping_City,
            Shipping_State_Province,Shipping_Postal_Code,Shipping_Country,Shipping_Attn)
            VALUES (?,?,?,?,?,?,?)';
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
        $json = json_encode(array("location"=>"registration_billing.php", "error" => false));
        exit($json);    
    }
?>
