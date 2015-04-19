<?php

/*
 * Adds the billing address to the database
 */
    session_start();
    if(!isset($_SESSION['user_id']))
        include '../backend/getUserId.php';
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
        $str = "UPDATE CMT..[User_Address] ";
        $userId = $_SESSION['user_id'];
        // $user = 'ag';
        $address = $_POST['shipAddress'];
        $city = $_POST['shipCity'];
        $state = $_POST['shipState'];
        $zip = $_POST['shipAreaCode'];
        $country = $_POST['shipCountry'];
        $attn = $_POST['shipAttn'];
        /*$userId = 25;
        $address = '168 S 11th st';
        $city = 'San Jose';
        $state = '';
        $zip = 95112;
        $country = '';
        $attn = 'Mr. Watts';*/
        
        $contains = array();
        $formvars = array();
        if ($address != '')
        {
             $contains[] = "Shipping_Street_Address = ?";
             $formvars[] = $address;
        }
        if ($city != '')
        {
            $contains[] = "Shipping_City = ?";
            $formvars[] = $city;
        }
        if ($state != '')
        {
            $contains[] = "Shipping_State_Province = ?";
            $formvars[] = $state;
        }
        if ($zip != '')
        {
            $contains[] = "Shipping_Postal_Code = ?";
            $formvars[] = $zip;
        }
        if ($country != '')
        {
            $contains[] = "Shipping_Country = ?";
            $formvars[] = $country;
        }
        if ($attn != '')
        {
            $contains[] = "Shipping_Attn = ?";
            $formvars[] = $attn;
        }
        $query = $str;
        if (count($contains) > 0) {
              $query .= " SET " . implode(', ', $contains);
            }

        $query .= " WHERE User_Key = ?";
        $formvars[] = $userId;
        echo $query;
        foreach ($formvars as $value) {
            echo $value;
        }

        $stmt = sqlsrv_query($link,$query,$formvars);//runs statement
        if( $stmt === false ) 
                {
                die( print_r( sqlsrv_errors(), true));
            }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
    }
?>
