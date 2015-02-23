<?php

    if(empty($_POST['username']))
    {
        $this->HandleError("Please enter a Username!");
        return false;
    }
     
    if(empty($_POST['password']))
    {
        $this->HandleError("Please enter a Password!");
        return false;
    }
     
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
     
    if(!$this->CheckDBForLogin($username,$password))
    {
        return false;
    }
     
    session_start();
     
    $_SESSION['login_user']=$email; // Initializing Session
    header('location: index.html'); // Redirecting To Other Page
                        
    return true;

    //database check for login information
    function CheckDBForLogin($username,$password)
    {          
<<<<<<< HEAD
        $username = $this->SanitizeForSQL($username);
        $pwdmd5 = md5($password);
        
        // Connect to MSSQL
        $link = mssql_connect(ALEXBIGLAPTOP, 'Alex', 'harmonic');

=======
        //prevents SQL injection
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        
        //encrypts password
        $pwdmd5 = md5($password);

        // Connect to MSSQL
        $link = mssql_connect($server, 'sa', 'phpfi');

>>>>>>> 53221d572f78bab7094e15c965fabddcc605602a
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

?>
