<?php

/*
 * This will display all the invoices a user has had sent to them
 */
    include '../backend/DBConnection.php';
    $link = connect();
    $user = $_SESSION['login_user'];
    //$user = 'gurnit';
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        //run query
        $str = "SELECT * FROM cmt..[Invoice_Hdr] WHERE Username = ? ORDER BY Status,Created_Date ASC";
        $params = array($user);
        $stmt = sqlsrv_query($link,$str,$params);
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        //display results
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            if($row === false) {
                die( print_r( sqlsrv_errors(), true));
            }
            //invoice display goes here
            //data of importance: cost-$row['Total'], date approved-$row['Created_Date'], status-$row['Status']
            //should have link to the individual invoice view
            echo '<div class="user_invoice_result panel clearfix" data-invoice-id="'. $row['Invoice_ID'] .'">
                <div class="left invoice_title">
                   <div class="production_name"><b>'. $row['Production'] .'</b></div>
                   <div class="created_date">'. date_format($row['Created_Date'],'m/d/y') .'</div>
                </div>
                <div class="left dates text-center">
                   <div class="delivery_date">Expected Delivery Date: '. date_format($row['Delivery_Date'],'m/d/y') .'</div>
                   <div class="return_date">Expected Return Date: '. date_format($row['Expected_Return_Date'],'m/d/y') .'</div>
                </div>
                <div class="right">
                   <div class="invoice_total"><b>TOTAL:</b> $'. number_format($row['Invoice_Total'], 2) .'</div>';
             if($row['Status'] == 'Pending'){
             echo  '<div class="accept_invoice_modal_button button success right">Accept</div>
                    <div class="reject_invoice_modal_button button alert right">Reject</div>';}
            else
            {
                echo '<div class="invoice_status"><b>'. $row['Status'] .'</b></div>';
            }
             echo   '</div>
             </div>';
        }
    }
?>
