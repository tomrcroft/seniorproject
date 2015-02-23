<?php

    if(!isset($_POST['submitted']))
    {
       return false;
    }

    $formvars = array();

    //implement - ValidateRegistrationSubmission();
    
    $this->CollectRegistrationSubmission($formvars);

    if(AddToDatabase($formvars))
    {
        session_start();
        $_SESSION['login_user']=$username; // Initializing Session
        header('location: dashboard.php'); // Redirecting To Other Page
    }
    
    //checks if can be added to the database
    function AddToDatabase(&$formvars)
    {
       if(!$this->IsFieldUnique($formvars,'email'))
       {
           $this->HandleError("This email is already registered");
           return false;
       }
        
       if(!$this->IsFieldUnique($formvars,'username'))
       {
           $this->HandleError("This UserName is already used. Please try another username");
           return false;
       }        
       if(!$this->InsertIntoDB($formvars))
       {
           $this->HandleError("Inserting to Database failed!");
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
            $this->HandleError("Something went wrong while connecting to MSSQL");
            return false;
        }        
        
        //Insert data
        
        
        return true;
    }
?>
