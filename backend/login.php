<?php
    
    session_start();

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    CheckDBForLogin($username,$password);

    $_SESSION['login_user']=$username; // Initializing Session
    // go to dashboard.php
    header("Location: index.php");
    
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
        
        $str = "select password from dbo.[User] where username = ?";
        $params = array($username);
        $count = sqlsrv_query($link,$str,$params);
        
        if( $count === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        else 
        {
            if (sqlsrv_has_rows($count)){
                $row_count = sqlsrv_num_rows( $count );
                $row = sqlsrv_fetch_array( $count, SQLSRV_FETCH_NUMERIC);
                if ($row_count === 1 && crypt($password, $row[0]) == $row[0]){
                    sqlsrv_free_stmt($count);
                    sqlsrv_close($link);
                }
            }
            else
            {
                $output = "Username or Password is incorrect!"; 
                $json = json_encode($output);
                sqlsrv_free_stmt($count);
                sqlsrv_close($link);
                exit($json);
            }
        }
    }

?>
