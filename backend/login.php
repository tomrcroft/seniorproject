<?php
    session_start();
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    //prevents SQL injection
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    if(!CheckDBForLogin($username,$password))
    {

    }
    else
    {
        $_SESSION['login_user']=$username; // Initializing Session
        header('location: ../www/dashboard.php'); // Redirecting To Other Page
    }
    //database check for login information
    function CheckDBForLogin($username,$password)
    {          
        //encrypts password
        $pwdmd5 = md5($password);

        // Connect to MSSQL
        $link = mssql_connect($server, 'sa', 'phpfi');

        if (!$link) {
            print '<script type="text/javascript">'; 
            print 'alert("Something went wrong with connecting to the database!")'; 
            print '</script>';
            return false;
        }

        $count = mssql_query('select count(*) from cmt.[User] where username = $username and password = $pwdmd5');

        if ($count == 1)
        {
            mssql_free_result($count);
            return true;
        }
        else
        {
            print '<script type="text/javascript">'; 
            print 'alert("Username or Password is incorrect!")'; 
            print '</script>';
            mssql_free_result($count);
            return false;
        }
    }

?>
