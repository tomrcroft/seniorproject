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
     
    $_SESSION[$this->GetLoginSessionVar()] = $username;
     
    return true;

    //database check for login information
    function CheckDBForLogin($username,$password)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }          
        $username = $this->SanitizeForSQL($username);
        $pwdmd5 = md5($password);
        //Gurnit edit the query below
        $qry = "Select name, email from $this->tablename ".
            " where username='$username' and password='$pwdmd5' "; 
        $result = mysql_query($qry,$this->connection);

        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("The username or password is incorrect");
            return false;
        }
        return true;
    }

?>
