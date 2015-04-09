<?php
session_start();// the edit profile page should check for login
// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";

//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$user = $_SESSION['login_user'];
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$crypt = better_crypt($_POST['password']);
$email = trim($_POST['email']);
$company = trim($_POST['company']);


//$formvars = array($_POST['first_name'],$_POST['last_name'],$_POST['company'],$_POST['username'],$_POST['email'], $crypt);
$formvars = array($first_name, $last_name, $company, $user, $email , $crypt);

//fill in blanks
$newvars = fillBlanks($conn, $formvars);
$str = "{call dbo.Add_Or_Update_User(?, ?, ?, ?, ?, ?)}";

$stmt = sqlsrv_query($conn,$str,$newvars);//runs statement
if( $stmt === false ) 
	{
	die( print_r( sqlsrv_errors(), true));
    }
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

echo "Information updated.";

function better_crypt($input, $rounds = 7)
{
  $salt = "";
  $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
  for($i=0; $i < 22; $i++) {
    $salt .= $salt_chars[array_rand($salt_chars)];
  }
  return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
}

function fillBlanks($conn, $blanks)
{
    $str = "SELECT * FROM CMT..[User] WHERE Username = $blanks[3]";

    $stmt = sqlsrv_query($conn,$str);//runs statement
    if( $stmt === false ) 
    {
        die( print_r( sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
    $count = 0;
    foreach ($blanks as $value) 
    {
        if (empty($value))
            $value = $row[$count];
        $count ++;
    }
    sqlsrv_free_stmt($stmt);
    }
?>
