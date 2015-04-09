<?php
    session_start();

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    echo $username;
    echo $password;
    CheckDBForLogin($username,$password);

    $_SESSION['login_user'] = $username; // Initializing Session
    // go to dashboard.php
    header("Location: ../backend/index.php");
    
    //database check for login information
    function CheckDBForLogin($username,$password)
    {          
        // Connect to MSSQL
        $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';//remember to change the server
        $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
        $link = sqlsrv_connect($server, $connectionInfo);

        if (!$link) {
            $output = "Something went wrong with connecting to the database!"; 
            $json = json_encode($output);
            exit($json);
        }
        
        $str = "select Username, Password from cmt..[User] where username = ?";
        $params = array($username);
        $stmt = sqlsrv_query($link,$str,$params,array('SQLSRV_CURSOR_STATIC'));
        
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        else 
        {
            $row_count = sqlsrv_num_rows($stmt);
            if( $row_count === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
            if ($row_count == 1 && crypt($password, $row[1]) == $row[1]){
                    sqlsrv_free_stmt($stmt);
                    sqlsrv_close($link);
            }
            else
            {
                $output = "Username or Password is incorrect!"; 
                $json = json_encode($output);
                sqlsrv_free_stmt($stmt);
                sqlsrv_close($link);
                exit($json);
            }
        }
    }

?>
