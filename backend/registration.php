<?php

    if(!isset($_POST['submitted']))
    {
       return false;
    }

    $formvars = array($_POST['firstName'],$_POST['lastName'],$_POST['Company'],$_POST['email'],$_POST['username'],$_POST['password']);
    
    //ValidateRegistrationSubmission();
    
    if(AddToDatabase($formvars))
    {
        session_start();
        $_SESSION['login_user']=$formvars[4]; // Initializing Session
        header('location: ../www/dashboard.php'); // Redirecting To Other Page
    }
    
    //validate registration form data
    function ValidateRegistrationSubmission()
    {
        // do stuff
    }

    //checks if can be added to the database
    function AddToDatabase($formvars)
    {
       /*if(!IsFieldUnique($formvars[3]))
       {
           print '<script type="text/javascript">'; 
           print 'alert("The email address '. $formvars[3].' is already registered!")'; 
           print '</script>';
           return false;
       }
        
       if(!IsFieldUnique($formvars[4]))
       {
           print '<script type="text/javascript">'; 
           print 'alert("The email address '. $formvars[4].' is already taken!")'; 
           print '</script>';
           return false;
       }        */
       if(!InsertIntoDB($formvars))
       {
           print '<script type="text/javascript">'; 
           print 'alert("Problems with the database entry")'; 
           print '</script>';
           return false;
       }
       return true;
   }
   
   //inserts into the database   
   function InsertIntoDB($formvars)
    {
        // Connect to MSSQL
        $link = mssql_connect($server, 'sa', 'phpfi');

        //Checks connection
        if (!$link) {
            print '<script type="text/javascript">'; 
            print 'alert("Something went wrong with connecting to the database!")'; 
            print '</script>';
            return false;
        }        
        
        //Insert data
        $str = "EXECUTE CMT.[dbo].[Add_Or_Update_User] 
        @First_Name = '$formvars[0]'
        ,@Last_Name = '$formvars[1]'
        ,@Company = '$formvars[2]'
        ,@Username = '$formvars[3]'
        ,@Email = '$formvars[4]'
        ,@Password = '$formvars[5]'
        GO";
        
        $stmt = mssql_init($str);//makes statement
        mssql_execute($stmt);//runs statement
        mssql_free_statement($stmt);//frees statement
        
        return true;
    }
?>
