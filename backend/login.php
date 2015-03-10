<?php
    // if(isset($_POST['submit']))
    // {
        session_start();

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        //prevents SQL injection
        $username = stripslashes($username);
        $password = stripslashes($password);
        // $username = mysql_real_escape_string($username);
        // $password = mysql_real_escape_string($password);

        CheckDBForLogin($username,$password);

        $_SESSION['login_user']=$username; // Initializing Session
        // go to dashboard.php
    // }
    //database check for login information
    function CheckDBForLogin($username,$password)
    {          
        //encrypts password
        $pwdmd5 = md5($password);

        // Connect to MSSQL
        // $server = 'JWOW\SQLEXPRESS';//remember to change the server
        // $connectionInfo = array( "Database"=>"CMT", "UID"=>"JWow/jdub9_000", "PWD"=>"dalaolla271/2");
        $server = 'ALEXBIGLAPTOP';
        $connectionInfo = array ( "Database"=>"CMT");

        $link = sqlsrv_connect($server, $connectionInfo);

        if (!$link) {
            $output = "Something went wrong with connecting to the database!"; 
            $json = json_encode($output);
            echo $json;
        }
        
        echo 'I connected';
        // $str = "select count(*) from cmt.[User] where username = ? and password = ?";
        $str = "select count(*) from dbo.[User] where username = ? and password = ?";
        $params = array($username,$pwdmd5);
        $count = sqlsrv_query($link,$str,$params);
        
        if( $count === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        else if ($count == sqlsrv_next_result($count))
        {
            echo 'I made it';
            sqlsrv_free_stmt($count);
            sqlsrv_close($link);
        }
        else
        {
            $output = "Username or Password is incorrect!"; 
            $json = json_encode($output);
            sqlsrv_free_stmt($count);
            sqlsrv_close($link);
            echo $json;
        }
    }

?>
