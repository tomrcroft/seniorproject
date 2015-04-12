<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);
    $formvars = array($_POST['costumeList'],$_POST['production'],$_POST['code'],$_POST['billAddress'],$_POST['billCity'],
        $_POST['billState'],$_POST['billAreaCode'],$_POST['billCountry'],$_POST['billAttn'],$_POST['shipAddress'],$_POST['shipCity'],
        $_POST['shipState'],$_POST['shipAreaCode'],$_POST['shipCountry'],$_POST['shipAttn'],$_POST['pickupDate'],$_POST['returnDate'],
        $_POST['contactName'],$_POST['contactEmail'],$_POST['contactPhone'],$_POST['contactFax'],$_POST['production'],
        $_POST['paymentType'],$_POST['description'],$_POST['salesperson'],$_POST['rentalFee'],$_SESSION['login_user']);
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = '{call dbo.Create_Pull_Request(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}';
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($link);
            //add confirmation
    }
?>
