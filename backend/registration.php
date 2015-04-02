<?php
    session_start();
    echo "I got in";
    $formvars = array($_POST['firstname'],$_POST['lastname'],$_POST['company'],$_POST['email'],$_POST['username'],  md5($_POST['password']));

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

    //inserts into the database   
   function InsertIntoDB($formvars)
    {
        echo"time to connect";
        
        $server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';//remember to change the server
        $connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
        $link = sqlsrv_connect($server, $connectionInfo);

        //Checks connection
        if (!$link) {
            $output = "Problems with the database connection!"; 
            $json = json_encode($output);
            echo $json;
        }        
        else
        {
            echo 'I connected';
            //Insert data
            $str = "{?= call Add_Or_Update_User( , ?, ?, ?, ?, ?, ?, , , )}";

            sqlsrv_query($link,$str,$formvars);//runs statement
            sqlsrv_free_stmt($stmt);//frees statement
            sqlsrv_close($link);
            echo"im done";
        }
    }
?>
