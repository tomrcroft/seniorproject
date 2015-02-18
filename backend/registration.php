<?php

    if(!isset($_POST['submitted']))
    {
       return false;
    }

    $formvars = array();

    if(!$this->ValidateRegistrationSubmission())
    {
        return false;
    }

    $this->CollectRegistrationSubmission($formvars);

    if(!$this->AddToDatabase($formvars))
    {
        return false;
    }

    return true;
    
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
