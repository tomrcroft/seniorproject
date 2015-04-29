<?php
<body>


//instructions to set up your machine to use mail function
// in C:\xampp\php\php.ini, fine [mail function] and change
//SMTP=smtp.gmail.com
//smtp_port=587
//sendmail_from = aymeric.botella@gmail.com (or yours idc)
//sendmail_path = "\"C:\xampp\sendmal\sendmail.exe\" -t"

// in C:\xampp\sendmail\sendmail.ini, replace the whole existing code with this
//smtp_server=smtp.gmail.com
//smtp_port=587
//error_logfile=error.log
//debug_logfile=debug.log
//auth_username=aymeric.botella@gmail.com (or yours again)
//auth_password= Banania92 (or your pw)
//force_sender=aymeric.botella@gmail.com (or yours again)

// Connect to MSSQL
$server = 'AYMERIC\SQLEXPRESS';//remember to change the server
//                            user,password
$link = mssql_connect($server, 'AYMERIC/Aymeric', 'Banania92');
//Checks connection
if (!$link) {
    $output = "Problems with the database connection!"; 
    $json = json_encode($output);
    echo $json;
    return false;
    }        

<form action='Forgot_pass.php' method='POST'>
	Enter your username<br><input type='text' name='username'><p>
	Enter your email<br><input type='email'><p>
	<input type='submit' value='Submit' name='submit'>
</form>

</body>
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$email = $_POST['email'];

	$query = mssql_query("SELECT * FROM User WHERE username='$username'");
	$numrow = mssql_num_rows($query);

	if($numrow!=0) 
	{
		while($row = mssql_fetch_assoc($query))
		{
			$db_email = $row['email'];
		}
		if($email == $db_email)
		{
			$code = rand(10000,1000000);

			$to = $db_email;
			$subject = "Password Reset";
			$body = "

			This is an automated email. Please do not reply to this.

			Click the link below or paste it into your browser
			$code"; //make code into string before inserting table

			//replace the current password with new code
			mssql_query("UPDATE main_table SET password='$code' WHERE username='$username'");

			mail($to, $subject, $body);

			echo "Check Your Email";


		}
		else
		{
			echo "Email is incorrect";
		}

	}
	else
	{
		echo "That username doesn't exist";
	}



}


?>
