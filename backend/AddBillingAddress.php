<?php
include '../backend/DBConnection.php';
/*
 * Adds the billing address to the database
 */
    session_start();
    if(!isset($_SESSION['user_id']))
        include '../backend/getUserId.php';
    $link = connect();
    $formvars = array($_POST['billAddress'],$_POST['billCity'],$_POST['billState'],
        $_POST['billAreaCode'],$_POST['billCountry'],$_POST['billAttn'], $_SESSION['user_id']);
    /*$formvars = array('jdub9108','123 cossa blvd','sac town','CA',95831,'US','MR. Watts');*/
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = 'UPDATE CMT..[User_Address]
                SET Billing_Street_Address = ?, Billing_City = ?, Billing_State_Province = ?, 
                Billing_Postal_Code = ?, Billing_Country = ?, Billing_Attn = ?
                WHERE User_Key = ?';
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
        $json = json_encode(array("location"=>"search_page.php", "error" => false));
        exit($json);   
    }
?>
