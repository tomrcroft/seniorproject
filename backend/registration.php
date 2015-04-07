<?php
    session_start();
    echo "I got in";
    $crypt = better_crypt($_POST['password']);
    $formvars = array($_POST['firstname'],$_POST['lastname'],$_POST['company'],$_POST['email'],$_POST['username'], $crypt);

    //checks if can be added to the database
    if(!IsEmailUnique(array($formvars[3])))
    {
        $output = "The email address '. $formvars[3].' has an account!"; 
        $json = json_encode($output);
        echo $json;
    }

    if(!IsUsernameUnique('Username',array($formvars[4])))
    {
        $output = "The username '. $formvars[4].' is already taken!"; 
        $json = json_encode($output);
        echo $json;
    }        
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
            $str = "{call dbo.Add_Or_Update_User(?, ?, ?, ?, ?, ?)}";

            $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($link);
            echo"im done";
        }
    }
    
    function better_crypt($input, $rounds = 7)
    {
      $salt = "";
      $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
      for($i=0; $i < 22; $i++) {
        $salt .= $salt_chars[array_rand($salt_chars)];
      }
      return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
    }
    
    function IsEmailUnique($compare)
    {
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
            echo 'i checked for repeats';
            $str = "SELECT Email FROM dbo.[User] WHERE Email = ?";
            $stmt = sqlsrv_query($link,$str,$compare);//runs statement
            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            $row_count = sqlsrv_num_rows( $stmt );
            if( $row_count === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            if ($row_count < 1)
            {
                echo 'i didnt fuck up';
                return TRUE;
            }
            else
                return FALSE;
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($link);
        }
    }
    
    function IsUsernameUnique($compare)
    {
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
            echo 'i checked for repeats';
            $str = "SELECT Username FROM dbo.[User] WHERE Username = ?";
            $stmt = sqlsrv_query($link,$str,$compare);//runs statement
            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            $row_count = sqlsrv_num_rows( $stmt );
            if( $row_count === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            if ($row_count < 1)
            {
                echo 'i didnt fuck up';
                return TRUE;
            }
            else
                return FALSE;
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($link);
        }
    }
?>
