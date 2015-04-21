<?php

/*
 * Submits a Pull Request to the database
 */
    session_start();
    if(!isset($_SESSION['shopping_cart']))
        header ("Location: ../www/search_page.php");
    include '../backend/GetUserInfo.php';
    $profileInfo = getUserInfo();
    include '../backend/GetShipAndBillInfo.php';
    $addressInfo = getAddressInfo($profileInfo['User_Key']);
    $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
    $link = sqlsrv_connect($server, $connectionInfo);
    //converted costume array Costume_Key-Quantity
    $list = formatList($_SESSION['shopping_cart']);
    $formvars = array($list,$_POST['productionName']);
    foreach ($addressInfo as $key => $value) {
        if($key != 'User_Key')
            $formvars[] = $value;
    }
    $formvars[] = $_POST['deliveryDate'];
    $formvars[] = $_POST['returnDate'];
    $formvars[] = $profileInfo['First_Name'] . ' ' . $profileInfo['Last_Name'];
    $formvars[] = $profileInfo['Email'];
    $formvars[] = $profileInfo['Phone_Number'];
    $formvars[] = $profileInfo['Fax_Number'];
    $formvars[] = $_POST['productionOpenDate'];
    $formvars[] = $_POST['productionCloseDate'];
    $formvars[] = $_POST['notes'];
    $formvars[] = $_SESSION['login_user'];
    $count = 1;
    foreach ($formvars as $value) {
        echo $count. ': ' . $value . ' ';
        $count ++;
    }
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = "{call dbo.Create_Pull_Request(?,?,'',?,?,?,?,?,?,?,?,?,?,?,?,?,?,
            ?,?,?,?,'','','','',?,?,?,?)}";
        //from new form yet to be added
        //2-production name,16-delivery date,17-return date,26-production open date,27-production close date,28-notes
        //not needed 3,22,23,24,25
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
        unset($_SESSION['shopping_cart']);
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
