<?php

/*
 * Submits a Pull Request to the database
 */
    session_start();
    if(!isset($_SESSION['shopping_cart']))
        header ("Location: ../www/search_page.php");
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);
    //converted costume array Costume_Key-Quantity
    //$list = formatList(array(40,42));
    $list = $_SESSION['shopping_cart'];
    $formvars = array($list,$_POST['production'],$_POST['code'],$_POST['billAddress'],$_POST['billCity'],
        $_POST['billState'],$_POST['billAreaCode'],$_POST['billCountry'],$_POST['billAttn'],$_POST['shipAddress'],$_POST['shipCity'],
        $_POST['shipState'],$_POST['shipAreaCode'],$_POST['shipCountry'],$_POST['shipAttn'],$_POST['pickupDate'],$_POST['returnDate'],
        $_POST['contactName'],$_POST['contactEmail'],$_POST['contactPhone'],$_POST['contactFax'],$_POST['billing'],
        $_POST['paymentType'],$_POST['description'],$_POST['salesperson'],$_POST['rentalFee'],$_SESSION['login_user']);
    /*$formvars = array('40-1,42-1','Watts Industries','test purchase','123 cossa blvd','sac town',
        'CA',95831,'US','MR. Watts','123 cossa blvd','sac town',
        'CA',95831,'US','MR. Watts','2015-06-25 00:00:00.000','2015-06-27 00:00:00.000',
        'Watts','jdub9108@yahoo.com','9162131010','9162131010','Watts Industries',
        'check','test pull','da homie',12,'jdub9108');*/
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
            unset($_SESSION['shopping_cart']);

            $output = "Pull Request Created!"; 
            $json = json_encode(array("status"=> $output));
            echo $json;
            //add confirmation
    }
    function formatList($costumes)
    {
        foreach ($costumes as $item) {
            $list[] = $item . '-1';//will have to account for quantity 
        }
        $formatList = implode(',', $list);
        return $formatList;
    }
?>
