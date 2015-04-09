<?php
// connect to db first
$serverName="cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433";
$database="CMT";
$username="admin";
$password="SJSUcmpe195";

//DO NOT EDIT BELOW THIS LINE
$connectionInfo = array( "UID"=>$username, "PWD"=>$password, "Database"=>$database);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//$_SESSION['login_user'] = $username;
// $username1 = trim($_POST['username1']);
// $first_name = trim($_POST['first_name']);
// $last_name = trim($_POST['last_name']);
// $password = trim($_POST['password']);
// $email = trim($_POST['email']);
// $company = trim($_POST['company']);

$formvars = array($_POST['first_name'],$_POST['last_name'],$_POST['company'],$_POST['username1'],$_POST['email'], $_POST['password']);


$str = "{call dbo.Add_Or_Update_User(?, ?, ?, ?, ?, ?)}";

$stmt = sqlsrv_query($conn,$str,$formvars);//runs statement
if( $stmt === false ) 
	{
	die( print_r( sqlsrv_errors(), true));
    }
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

// $stmt = mssql_init('cmt..Add_Or_Update_User',  $conn);

// mssql_bind($stmt, '@First_Name', $first_name, SQLVARCHAR, 50);
// mssql_bind($stmt, '@Last_Name', $last_name, SQLVARCHAR, 50);
// mssql_bind($stmt, '@Company', $company, SQLVARCHAR, 70);
// mssql_bind($stmt, '@Password', $password, SQLVARCHAR, 70);
// mssql_bind($stmt, '@Email', $email, SQLVARCHAR, 30);
// mssql_bind($stmt, '@Username', $username1, SQLVARCHAR, 20);

// mssql_excute($stmt);





// $query = sqlsrv_query( $conn, "UPDATE cmt..[User] SET First_Name = $first_name, Last_Name = $last_name,
// 	 Company = $company, Email = $email, Password = $password WHERE Username = $idtest");

// echo "UPDATE cmt..[User] SET First_Name = $first_name, Last_Name = $last_name,
// 	 Company = $company, Email = $email, Password = $password WHERE Username = $idtest";
// if( $query === false ) {
//             die( print_r( sqlsrv_errors(), true));
//         }

echo "Information updated."
?>
