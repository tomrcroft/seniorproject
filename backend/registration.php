<?php

    if(isset($_POST['submit']))
    {
        session_start();
        echo "I got in";
        $formvars = array($_POST['firstName'],$_POST['lastName'],$_POST['Company'],$_POST['email'],$_POST['username'],  md5($_POST['password']));

        //ValidateRegistrationSubmission();

        //checks if can be added to the database
        /*if(!IsFieldUnique($formvars[3]))
        {
            $output = "The email address '. $formvars[3].' has an account!"; 
            $json = json_encode($output);
            echo $json;
            return false;
        }

        if(!IsFieldUnique($formvars[4]))
        {
            $output = "The username '. $formvars[4].' is already taken!"; 
            $json = json_encode($output);
            echo $json;
            return false;
        }        */
        InsertIntoDB($formvars);
    }
   //validate registration form data
    function ValidateRegistrationSubmission()
    {
        // do stuff
    }

    //inserts into the database   
   function InsertIntoDB($formvars)
    {
        echo"time to connect";
        // Connect to MSSQL
        $server = 'JWOW\SQLEXPRESS';//remember to change the server
        //                            user,password
        $link = mssql_connect($server, 'JWow/jdub9_000', 'dalaolla271/2');

        //Checks connection
        if (!$link) {
            $output = "Problems with the database connection!"; 
            $json = json_encode($output);
            echo $json;
        }        
        
        //Insert data
        $str = "Add_Or_Update_User";
        $stmt = mssql_init($str);//makes statement
        
        //bind variables
        mssql_bind($stmt, '@First_Name', $formvars[0], SQLVARCHAR, false, false, 60);
        mssql_bind($stmt, '@Last_Name', $formvars[1], SQLVARCHAR, false, false, 20);
        mssql_bind($stmt, '@Company', $formvars[2], SQLVARCHAR, false, false, 60);
        mssql_bind($stmt, '@Username', $formvars[3], SQLVARCHAR, false, false, 60);
        mssql_bind($stmt, '@Email', $formvars[4], SQLVARCHAR, false, false, 60);
        mssql_bind($stmt, '@Password', $formvars[5], SQLVARCHAR, false, false, 20);
        
        mssql_execute($stmt);//runs statement
        mssql_free_statement($stmt);//frees statement
        echo"im done";
    }
?>
