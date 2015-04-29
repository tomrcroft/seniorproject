<?php
/*<body>*/
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
/*$server = 'cmt.cs87d7osvy2t.us-west-2.rds.amazonaws.com,1433';
$connectionInfo = array( "Database"=>"CMT", "UID"=>"admin", "PWD"=>"SJSUcmpe195");
$link = sqlsrv_connect($server, $connectionInfo);
//Checks connection
if (!$link) {
    $output = "Problems with the database connection!"; 
    $json = json_encode($output);
    echo $json;
}         
/*<form action='Forgot_pass.php' method='POST'>
	Enter your username<br><input type='text' name='username'><p>
	Enter your email<br><input type='email'><p>
	<input type='submit' value='Submit' name='submit'>
</form>
</body>*/

if(isset($_POST['reset_email_submit']))
{
	
	$email = $_POST['reset_email'];
	$query = mssql_query("SELECT * FROM User WHERE email='$email'");
	$numrow = mssql_num_rows($query);
	if($numrow!=0) 
	{
		while($row = mssql_fetch_assoc($query))
		{
			$db_email = $row['email'];
		}
		if($email == $db_email)
		{
			/*<script type="text/javascript">
		    alert("The email address <?php echo $_POST['reset_email']; ?> is already registered.");
		  	</script>*/
			$code = rand(10000,1000000);
			require("C:/xampp/phpmailer/class.phpmailer.php");
			require("C:/xampp/phpmailer/PHPMailerAutoload.php");
			$mail = new PHPMailer();
			$mail->IsSMTP(); // send via SMTP
			//IsSMTP(); // send via SMTP
			$mail->SMTPAuth = true; // turn on SMTP authentication
			$mail->Username = "cims@calmt.com"; // Enter your SMTP username
			$mail->Password = "Built2015"; // SMTP password
			$webmaster_email = "cims@calmt.com"; //Add reply-to email address
			$email="gurnit@att.net"; // Add recipients email address
			$name="Gurnit"; // Add Your Recipient’s name
			$mail->From = "cims@calmt.com";
			$mail->FromName = "CMT";
			$mail->AddAddress($email,$name);
			$mail->AddReplyTo($webmaster_email,"Webmaster");
			$mail->WordWrap = 50; // set word wrap
			$mail->IsHTML(true); // send as HTML

			$mail->Subject = "This is your subject";

			$mail->Body = "This is an automated email. Please do not reply to this.
			Click the link below or paste it into your browser
			$code" ;      //HTML Body

			$mail->AltBody = "This is an automated email. Please do not reply to this.
			Click the link below or paste it into your browser
			$code";     //Plain Text Body
			if(!$mail->Send()){
			echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			echo "Message has been sent";
			}
			echo $_SERVER['REMOTE_ADDR'];
			
			//$to = $db_email;
			//$subject = "Password Reset";
			//$body = "
			//This is an automated email. Please do not reply to this.
			//Click the link below or paste it into your browser
			//$code"; //make code into string before inserting table
			//replace the current password with new code
			mssql_query("UPDATE main_table SET password='$code' WHERE username='$username'");
			//mail($to, $subject, $body);
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




/*$headers = 'From: cims@calmt.com'; 
mail('gurnit@att.net', 'Test email using PHP', 'This is a test email message', $headers, '-fcims@calmt.com');
*/

/*$to = 'cims@calmt.com'; 
$subject = 'Test email using PHP'; 
$message = 'This is a test email message'; 
$headers = 'From: cims@calmt.com' . "\r\n" . 'Reply-To: cims@calmt.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion(); 
mail($to, $subject, $message, $headers, '-fwebmaster@example.com');
*/
/*require_once "Mail.php";
 
$from = "Web master <cims@calmt.com>";
$to = "Gurnit <gurnit1@gmail.com>";
$subject = "Test email using PHP SMTP\r\n\r\n";
$body = "This is a test email message";
 
$host = "smtp.emailsrvr.com";
$username = "cims@calmt.com";
$password = "Built2015";
 
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);
 
if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
} else {
  echo("<p>Message successfully sent!</p>");
}*/

##############################################
#
#	Script By Oscar Liang - www.oscarliang.com
#	Version 1.0
#	01/March/2013
#
##############################################

/*function ping($target){

	$result = array();

	/* Execute Shell Command To Ping Target */
	/*$cmd_result = shell_exec("ping -c 1 -w 1 ". $target);

	/* Get Results From Ping */
	/*$result = explode(",",$cmd_result);

	/* Return Server Status */
	/*if(eregi("0 received", $result[1])){
		return 'offline';
	}
	elseif(eregi("1 received", $result[1])){
		return 'online';
	}
	else{
		return 'unknown';
	}

}

$target = 'google.com';

echo '"'.$target.'"' . ' is ' . ping ( $target );*/

/*
function ping($host)
{
        exec(sprintf('ping %s', escapeshellarg($host)), $res, $rval);
        return $rval === 0;
}

/* check if the host is up
        $host can also be an ip address */
/*$host = 'smtp.emailsrvr.com';
$up = ping($host);

/* optionally display either a red or green image to signify the server status */
/*echo '<img src="'.($up ? 'on' : 'off').'.jpg" alt="'.($up ? 'up' : 'down').'" />';
*/
?>