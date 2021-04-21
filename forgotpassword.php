<?php

function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}

$password = random_password(10);
$passw0rd = hash('sha256', $password, FALSE);

include("libs/config.php");
include("libs/opendb.php");
$stmt = $dbh->prepare("update admins set password = '$passw0rd' where username like 'blancgroupadmin'");
$stmt->execute();	
include("libs/closedb.php");

require_once('../PHPMailer/class.phpmailer.php');
require_once('../PHPMailer/class.smtp.php');
require_once('../PHPMailer/PHPMailerAutoload.php');
$mail             = new PHPMailer(); // defaults to using php "mail()"
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.secureserver.net";
//  $mail->Host       = "localhost";
//	$mail->Host       = "smtpout.secureserver.net";      // sets GMAIL as the SMTP server
//	$mail->SMTPAuth   = true;                  // enable SMTP authentication
//	$mail->SMTPSecure = 'ssl';
//	$mail->Port = 465;
//	$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
$mail->Username   = "info@blanc-group.net";  // GMAIL username
$mail->Password   = "arisempe2015";
$mail->SetFrom('info@blanc-group.net', 'INFO');
//$mail->AddReplyTo("name@yourdomain.com","First Last");
$address = "info@blanc-group.net";
$mail->AddAddress($address);
$mail->Subject    = "Blanc Group Form";
//$mail->AltBody    = "You can active your account on : "; // optional, comment out and test
$mail->Body    = '
	Name: '.$_POST['name'].'
	Phone: '.$_POST['phone'].'
	Email: '.$_POST['email'].'
	Message: '.nl2br($_POST['message']);
$mail->Send();
header('location: adminlogin.php');

?>
