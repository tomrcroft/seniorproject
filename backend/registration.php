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
       if(!$this->DBLogin())
       {
           $this->HandleError("Database login failed!");
           return false;
       }
       if(!$this->Ensuretable())
       {
           return false;
       }
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
        $confirmcode = $this->MakeConfirmationMd5($formvars['email']);

        $insert_query = 'insert into '.$this->tablename.'(
                name,
                email,
                username,
                password,
                confirmcode
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['name']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "' . $this->SanitizeForSQL($formvars['username']) . '",
                "' . md5($formvars['password']) . '",
                "' . $confirmcode . '"
                )';      
        if(!mysql_query( $insert_query ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }        
        return true;
    }
?>
