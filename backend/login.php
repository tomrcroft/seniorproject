<?php

    if(empty($_POST['username']))
    {
        print '<script type="text/javascript">'; 
        print 'alert("Please enter a Username!")'; 
        print '</script>';
    }
     
    elseif(empty($_POST['password']))
    {
        print '<script type="text/javascript">'; 
        print 'alert("Please enter a Password!")'; 
        print '</script>';
    }
    
    else 
    {
        return false;
    }
     
    session_start();
     
    $_SESSION['login_user']=$email; // Initializing Session
    header('location: ../www/dashboard.php'); // Redirecting To Other Page
                        
    return true;

    //database check for login information
    function CheckDBForLogin($username,$password)
    {          

        $username = $this->SanitizeForSQL($username);
        $pwdmd5 = md5($password);
        
        // Connect to MSSQL
        $link = mssql_connect(ALEXBIGLAPTOP, 'Alex', 'harmonic');

        //prevents SQL injection
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        
        //encrypts password
        $pwdmd5 = md5($password);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if(!CheckDBForLogin($username,$password))
        {
            
        }
        else
        {
            session_start();
            $_SESSION['login_user']=$username; // Initializing Session
            header('location: dashboard.php'); // Redirecting To Other Page
        }
    }
?>
