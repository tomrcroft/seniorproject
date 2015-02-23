<?php

    if(empty($_POST['username']))
    {
        $this->HandleError("Please enter a Username!");
    }
     
    elseif(empty($_POST['password']))
    {
        $this->HandleError("Please enter a Password!");
    }
    
    else 
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if(!$this->CheckDBForLogin($username,$password))
        {
            $this->HandleError("Username or password is incorrect!");
        }
        else
        {
            session_start();
            $_SESSION['login_user']=$username; // Initializing Session
            header('location: dashboard.php'); // Redirecting To Other Page
        }
        //database check for login information
        function CheckDBForLogin($username,$password)
        {          
            //prevents SQL injection
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysql_real_escape_string($username);
            $password = mysql_real_escape_string($password);

            //encrypts password
            $pwdmd5 = md5($password);

            // Connect to MSSQL
            $link = mssql_connect($server, 'sa', 'phpfi');

            if (!$link) {
                $this->HandleError("Something went wrong while connecting to MSSQL");
                return false;
            }

            $count = mssql_query('select count(*) from cmt.[User] where username = @username and password = @pwdmd5');

            if ($count == 1)
            {
                mssql_free_result($count);
                return true;
            }
            else
            {
                mssql_free_result($count);
                return false;
            }
        }
    }
?>
