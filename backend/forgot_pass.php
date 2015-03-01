<?php

//mysql_connect use to connect our db
$serverName = "ALEXBIGLAPTOP"; //put your servername here
$connection = array( "Database"=>"CMT");
$conn = sqlsrv_connect( $serverName, $connection);

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    echo 'hi';
    $sql = "SELECT * FROM dbo.User_History WHERE Email = '$email'"
    $stmt = sqlsrv_query( $conn, $sql );
    if($stmt == true)
        echo 'apple';

    $numrow = mysql_num_rows($query);

    if($numrow!=0) 
    {
        while($row = mysql_fetch_assoc($query))
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
            $code";

            //add passreset column to table
            mysql_query("UPDATE main_table SET password='$code' WHERE username='$username'");

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