<?php
// session_start();// the edit profile page should check for login
include '../backend/checkIfLoggedIn.php';
// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";

//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$str = "UPDATE CMT..[User] ";
$user = $_SESSION['login_user'];
// $user = 'ag';
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$company = trim($_POST['company']);
$email = trim($_POST['email']);
$pass = $_POST['password'];
$phone = preg_replace('~[^0-9]~','',$_POST['phone']);
$fax = preg_replace('~[^0-9]~','',$_POST['fax']);
$contains = array();

if ($first_name != '')
{
     $contains[] = "First_Name = '$first_name'";
}
if ($last_name != '')
{
    $contains[] = "Last_Name = '$last_name'";
}
if ($company != '')
{
    $contains[] = "Company = '$company'";
}
if ($email != '')
{
    $contains[] = "Email = '$email'";
}
if ($pass != '')
{
    $crypt = better_crypt($_POST['password']);
    $contains[] = "Password = '$crypt'";
}
if ($phone != '')
{
    $contains[] = "Phone_Number = '$phone'";
}
if ($fax != '')
{
    $contains[] = "Fax_Number = '$fax'";
}
$query = $str;
if (count($contains) > 0) {
      $query .= " SET " . implode(', ', $contains);
    }
    
$query .= " WHERE Username = '$user'";

$stmt = sqlsrv_query($conn,$query);//runs statement
if( $stmt === false ) 
	{
	die( print_r( sqlsrv_errors(), true));
    }
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
// echo json_encode(array("error" => true));

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
    $str = "SELECT * FROM CMT..[User] WHERE Username = '$blanks[3]'";

    $stmt = sqlsrv_query($conn,$str);//runs statement
    if( $stmt === false ) 
    {
        die( print_r( sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
    $count = 0;
    foreach ($blanks as $value) 
    {
        if (trim($value) != '')
        {
            // echo 'i found a blank';
            $value = $row[$count];
        }
        $count ++;
    }
    sqlsrv_free_stmt($stmt);

    return $blanks;

}
    
?>