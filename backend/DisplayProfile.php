<?php

/*
 * Displays the user's shipping address
 */

    //declare variables
    include '../backend/DBConnection.php';
    $link = connect();
    $formvars = array($_SESSION['login_user']);
    //Checks connection
    if (!$link) {
        $output = "Problems with the database connection!"; 
        $json = json_encode($output);
        echo $json;
    }        
    else
    {
        $str = "SELECT * FROM cmt..[user] WHERE Username = ?";
        $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        if($row === false) {
            die( print_r( sqlsrv_errors(), true));
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($link);
        
        echo '<div id="account_username">Username: ' . $row['Username']. '</div>
                <div id="account_first_name">First Name: ' . $row['First_Name']. '</div>
                <div id="account_last_name">Last Name: ' . $row['Last_Name']. '</div>
                <div id="account_company">Company: ' . $row['Company']. '</div>
                <div id="account_email">E-mail: ' . $row['Email']. '</div>
                <div id="account_email">Phone: ' . $row['Phone_Number']. '</div>
                <div id="account_email">Fax: ' . $row['Fax_Number']. '</div>';
    }
?>
