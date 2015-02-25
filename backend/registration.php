<?php

    if(!isset($_POST['submitted']))
    {
       return false;
    }

    if(AddToDatabase())
    {
        session_start();
        $_SESSION['login_user']=$username; // Initializing Session
        header('location: dashboard.php'); // Redirecting To Other Page
    }
    
    //validate registration form data
    function ValidateRegistrationSubmission()
    {
        // do stuff
    }

    //checks if can be added to the database
    function AddToDatabase()
    {
       if(!IsFieldUnique($_POST['email']))
       {
           print '<script type="text/javascript">'; 
           print 'alert("The email address '. $_POST['email'].' is already registered!")'; 
           print '</script>';
           return false;
       }
        
       if(!IsFieldUnique($_POST['username']))
       {
           print '<script type="text/javascript">'; 
           print 'alert("The email address '. $_POST['username'].' is already taken!")'; 
           print '</script>';
           return false;
       }        
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
   function InsertIntoDB(&$formvars)
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
        
        
        return true;
    }
?>
