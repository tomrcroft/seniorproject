<?php

/*
 * Adds the billing address to the database
 */
    session_start();
    if(!isset($_SESSION['user_id']))
        include '../backend/getUserId.php';
    $server = 'CMT-CIMS\CIMS';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
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
        $address = trim($_POST['billAddress']);
        $city = trim($_POST['billCity']);
        $state = trim($_POST['billState']);
        $zip = trim($_POST['billAreaCode']);
        $country = $_POST['billCountry'];
        $attn = $_POST['billAttn'];
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
             $contains[] = "Billing_Street_Address = ?";
             $formvars[] = $address;
        }
        if ($city != '')
        {
            $contains[] = "Billing_City = ?";
            $formvars[] = $city;
        }
        if ($state != '')
        {
            $contains[] = "Billing_State_Province = ?";
            $formvars[] = $state;
        }
        if ($zip != '')
        {
            $contains[] = "Billing_Postal_Code = ?";
            $formvars[] = $zip;
        }
        if ($country != '')
        {
            $contains[] = "Billing_Country = ?";
            $formvars[] = $country;
        }
        if ($attn != '')
        {
            $contains[] = "Billing_Attn = ?";
            $formvars[] = $attn;
        }
        $query = $str;
        if (count($contains) > 0) {
              $query .= " SET " . implode(', ', $contains);
            }

        $query .= " WHERE User_Key = ?";
        $formvars[] = $userId;

        $stmt = sqlsrv_query($link,$query,$formvars);//runs statement
        if( $stmt === false ) 
                {
                die( print_r( sqlsrv_errors(), true));
            }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
    }
?>
