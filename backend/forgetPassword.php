<?php

session_start();

$email = $_POST['email'];
//echo "email:" .$email;
$server = 'CMT-CIMS\CIMS';
$connectionInfo = array( "Database"=>"CMT", "UID"=>"CIMSADMIN", "PWD"=>"Hook2015");
$link = sqlsrv_connect($server, $connectionInfo);
$sql = "SELECT * FROM [User] WHERE email='$email'";
$stmt = sqlsrv_query( $link, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	$db_email = $row['Email'];
	//echo $row['User_Key'];
	//echo "dbemail ". $db_email;
	if($email == $db_email)
	{
		//echo "hello";
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
		//$email="gurnit@att.net"; // Add recipients email address
		$name="Gurnit"; // Add Your Recipient’s name
		$mail->From = "cims@calmt.com";
		$mail->FromName = "CMT";
		$mail->AddAddress($email,$name);
		$mail->AddReplyTo($webmaster_email,"Webmaster");
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML

		$mail->Subject = "Reset Password";

		$mail->Body = "This is an automated email. Please do not reply to this.
		This is your temporary password:
		$code. Please navigate to Edit Profile to reset your password once you login" ;      //HTML Body

		$mail->AltBody = "This is an automated email. Please do not reply to this.
		This is your temporary password:
		$code. Please navigate to Edit Profile to reset your password once you login";     //Plain Text Body
		if(!$mail->Send()){
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message has been sent";
		}
			//echo $_SERVER['REMOTE_ADDR'];
		
		//$to = $db_email;
		//$subject = "Password Reset";
		//$body = "
		//This is an automated email. Please do not reply to this.
		//Click the link below or paste it into your browser
		//$code"; //make code into string before inserting table
		//replace the current password with new code
		$crypted = better_crypt($code);
		$sql = "UPDATE [User] SET password='$crypted' WHERE email='$email'";
		$stmt = sqlsrv_query( $link, $sql );
		if( $stmt === false) {
		    die( print_r( sqlsrv_errors(), true) );
	    }

		//mail($to, $subject, $body);
		echo "\nCheck Your Email";
	}
	else
	{
		echo "Email is incorrect";
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
?>