<?php
    session_start();
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    //prevents SQL injection
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    CheckDBForLogin($username,$password);
    
    $_SESSION['login_user']=$username; // Initializing Session
    header('location: ../www/dashboard.php'); // Redirecting To Other Page
    
    //database check for login information
    function CheckDBForLogin($username,$password)
    {          
        //encrypts password
        $pwdmd5 = md5($password);

        // Connect to MSSQL
        $server = 'JWOW\SQLEXPRESS';//remember to change the server
        //                            user,password
        $link = mssql_connect($server, 'JWow/jdub9_000', 'dalaolla271/2');

        if (!$link) {
            $output = "Something went wrong with connecting to the database!"; 
            $json = json_encode($output);
            echo $json;
        }

        $str = "select count(*) from cmt.[User] where username = $username and password = $pwdmd5";
        $count = mssql_query($str);

        if ($count == 1)
        {
            mssql_free_result($count);
        }
        else
        {
            $output = "Username or Password is incorrect!"; 
            $json = json_encode($output);
            mssql_free_result($count);
            echo $json;
        }
    }

?>
