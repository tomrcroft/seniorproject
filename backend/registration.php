<?php
    session_start();
    $crypt = better_crypt($_POST['password']);
    $formvars = array($_POST['firstname'],$_POST['lastname'],$_POST['company'],$_POST['username'],
        $_POST['email'],$crypt,preg_replace('~[^0-9]~','',$_POST['phone']),preg_replace('~[^0-9]~','',$_POST['fax']));

    //$formvars = array('alex','gg','my house','aaaa','testing@testtt.com',better_crypt('aaaa'),9999999999,34132423);
    $server = 'CMT-CIMS\CIMS';//remember to change the server
    $connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
    $link = sqlsrv_connect($server, $connectionInfo);
            
    //checks if can be added to the database
    if(!IsUnique($link,'Email',array($formvars[4])))
    {
        $output = "The email address ' $formvars[4] ' has an account!"; 
        $json = json_encode(array("errormsg" => $output, "error" => true));
        exit($json);
    }

    if(!IsUnique($link,'Username',array($formvars[3])))
    {
        $output = "The username ' $formvars[3] ' is already taken!"; 
        $json = json_encode(array("errormsg" => $output, "error"=>true));
        exit($json);
    }        
    InsertIntoDB($link,$formvars);
    $_SESSION['login_user'] = $formvars[3]; // Initializing Session
    $json = json_encode(array("location" => "registration_shipping.php", "error" => false));
    exit($json);

    //inserts into the database   
   function InsertIntoDB($link,$formvars)
    {
        //Checks connection
        if (!$link) {
            $output = "Problems with the database connection!"; 
            $json = json_encode($output);
            exit($json);
        }        
        else
        {
            //Insert data
            $str = "{call dbo.Add_Or_Update_User(?, ?, ?, ?, ?, ?, ?, ?)}";

            $stmt = sqlsrv_query($link,$str,$formvars);//runs statement
            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($link);
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
    
    function IsUnique($link,$type,$compare)
    {
        //Checks connection
        if (!$link) {
            $output = "Problems with the database connection!"; 
            $json = json_encode($output);
            exit($json);
        }        
        else
        {
            if ($type == 'Email')
                $str = "SELECT Email FROM dbo.[User] WHERE Email = ?";
            else
                $str = "SELECT Username FROM dbo.[User] WHERE Username = ?";
            $stmt = sqlsrv_query($link,$str,$compare);//runs statement
            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            if(sqlsrv_has_rows( $stmt )) {
                return FALSE;
            }
            else
                return TRUE;
            sqlsrv_free_stmt($stmt);
        }
    }
    
?>
