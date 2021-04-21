<?php

function exist($table,$where)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select count(*) as count from {$table} $where");
	$row = $result->fetch();
	include("../libs/closedb.php");
	if($row['count'] == 0) return 0;
	else return 1;
}

function insertuser($person)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$fquery = "insert into users (";
	$lquery = " values (";
	foreach ($person as $key => $value)
	{
		$fquery .= "`".$key."`";
		$lquery .= '"'.$value.'"';
		$data  = array_keys($person);
		$lastkey = array_pop($data);
		if($key != $lastkey) 
		{	
			$fquery .= ",";
			$lquery .= ",";
		}	
	}
	$fquery .= ")";
	$lquery .= ")";
	$query = $fquery.$lquery;
	$result = $dbh->prepare($query);
	if($result->execute()) return 1;
	else return 0;
    /*include("../libs/closedb.php");
	unset($data,$lastkey,$person,$fquery,$lquery,$query,$result);*/
}

function insertAdmin($person)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$fquery = "insert into admins (";
	$lquery = " values (";
	foreach ($person as $key => $value)
	{
		$fquery .= "`".$key."`";
		$lquery .= '"'.$value.'"';
		$data  = array_keys($person);
		$lastkey = array_pop($data);
		if($key != $lastkey) 
		{	
			$fquery .= ",";
			$lquery .= ",";
		}	
	}
	$fquery .= ")";
	$lquery .= ")";
	$query = $fquery.$lquery;
	$result = $dbh->prepare($query);
	if($result->execute()) return 1;
	else return 0;
    /*include("../libs/closedb.php");
	unset($data,$lastkey,$person,$fquery,$lquery,$query,$result);*/
}

function sendemail($type,$person)
{
	require_once('../../PHPMailer/class.phpmailer.php');
	require_once('../../PHPMailer/class.smtp.php');
	require_once('../../PHPMailer/PHPMailerAutoload.php');
	$mail             = new PHPMailer(); // defaults to using php "mail()"
	$mail->IsSMTP(); // telling the class to use SMTP
	//$mail->Host       = "smtp.secureserver.net";
	$mail->Host       = "localhost";
	//	$mail->Host       = "smtpout.secureserver.net";      // sets GMAIL as the SMTP server
	//	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	//	$mail->SMTPSecure = 'ssl';
	//	$mail->Port = 465;
	//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	//$mail->Username   = "";  // GMAIL username
	//$mail->Password   = "";					
	//$mail->AddReplyTo("name@yourdomain.com","First Last");
	if(isset($person['contactemail'])) $address = $person['contactemail'];
	else $address = "info@spootmedia.com";
	$mail->SetFrom($address, 'INFO');
	$mail->AddAddress($person['email']);
	$mail->Subject    = 'Activation';
	//$mail->AltBody    = "You can active your account on : "; // optional, comment out and test
	$mail->Body    = 'Activation link: http://www.spootmedia.com/'.$type.'active.php?email='.$person['email'].'&code='.$person['code'];
	if($mail->Send()) return 1;
	else return 0;
}

?>