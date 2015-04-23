<?php
include '../backend/DBConnection.php';
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
    $link = connect();
    //converted costume array Costume_Key-Quantity
    $list = formatList($_SESSION['shopping_cart']);
    $formvars = array($list,$_POST['productionName'],'n/a');
    foreach ($addressInfo as $key => $value) {
        if($key != 'User_Key')
            $formvars[] = $value;
    }
    $formvars[] = $_POST['deliveryDate'];
    //$formvars[] = '06-25-2015';
    $formvars[] = $_POST['returnDate'];
    //$formvars[] = '07-25-2015';
    $formvars[] = $profileInfo['First_Name'] . ' ' . $profileInfo['Last_Name'];
    $formvars[] = $profileInfo['Email'];
    $formvars[] = $profileInfo['Phone_Number'];
    $formvars[] = $profileInfo['Fax_Number'];
    $formvars[] = 'n/a';
    $formvars[] = 'n/a';
    $formvars[] = 'n/a';
    $formvars[] = 'n/a';
    $formvars[] = $_POST['productionOpenDate'];
    //$formvars[] = '06-30-2015';
    $formvars[] = $_POST['productionCloseDate'];
    //$formvars[] = '07-10-2015';
    $formvars[] = $_POST['notes'];
    //$formvars[] = 'n/a';
    $formvars[] = $_SESSION['login_user'];
    
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = "{call dbo.Create_Pull_Request(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
            ?,?,?,?,?,?,?,?,?,?,?,?)}";
        //from new form yet to be added
        //not needed 3,22,23,24,25
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
        unset($_SESSION['shopping_cart']);
        $json = json_encode(array("location"=>"order_status.php", "error" => false));
        exit($json);
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
