<?php
    if(isset($_POST['submit']))
    {
        session_start();

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        //prevents SQL injection
        //$username = stripslashes($username);
        //$password = stripslashes($password);
        //$username = mysql_real_escape_string($username);
        //$password = mysql_real_escape_string($password);

        CheckDBForLogin($username,$password);

        $_SESSION['login_user']=$username; // Initializing Session
        // go to dashboard.php
    }
    //database check for login information
    function CheckDBForLogin($username,$password)
    {          
        //encrypts password
        //$pwdmd5 = md5($password);

        // Connect to MSSQL
        $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';//remember to change the server
        $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
        $link = sqlsrv_connect($server, $connectionInfo);

        if (!$link) {
            $output = "Something went wrong with connecting to the database!"; 
            $json = json_encode($output);
            echo $json;
        }
        
        echo 'I connected';
        $str = "select count(*) from cmt.[User] where username = ? and password = ?";
        $params = array($username,$password);
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
