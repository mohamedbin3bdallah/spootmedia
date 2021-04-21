<?php

function getFLevelCategories($lang)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select id,title{$lang} as title,childto from categories where childto NOT LIKE '%,%'");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['id'] = $row['id'];
			$allrows[$i]['title'] = $row['title'];
			$allrows[$i]['childto'] = $row['childto'];
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

function getMLevelCategories($childto,$lang)
{
	$childto = $childto.',';
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select  id,title{$lang} as title,childto from categories where childto LIKE '$childto%' order by childto ASC");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['id'] = $row['id'];
			$allrows[$i]['title'] = $row['title'];
			$allrows[$i]['childto'] = $row['childto'];
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

function getCarttByID($id,$ipaddress)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select * from cart where id = '$id' and ipaddress = '$ipaddress'");
	$row = $result->fetch();
	include("libs/closedb.php");
	return $row;	
}

function getUserCarttByID($id,$uid)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select * from cart where id = '$id' and uid = '$uid'");
	$row = $result->fetch();
	include("libs/closedb.php");
	return $row;	
}

function insertSale($saleid,$product,$titleen,$titlear,$price,$quantity,$total,$phone,$address,$uid,$ipaddress)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$stmt = $dbh->prepare("insert into `sales` (`saleid`,`product`,`titleen`,`titlear`,`price`,`quantity`,`total`,`phone`,`address`,`uid`,`ipaddress`,`dtime`) values ('$saleid','$product','$titleen','$titlear','$price','$quantity','$total','$phone','$address','$uid','$ipaddress','')");
	$stmt->execute();
	include("libs/closedb.php");
}

function deleteCart($id)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$stmt = $dbh->prepare("delete from cart where id = '$id'");
	$stmt->execute();
	include("libs/closedb.php");
}

function sendmessage($email,$saleid,$titleen,$titlear,$total,$currency_code,$phone,$address)
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
	//$mail->Username   = "info@blanc-group.net";  // GMAIL username
	//$mail->Password   = "arisempe2015";
	$mail->SetFrom('info@blanc-group.net', 'INFO');
	//$mail->AddReplyTo("name@yourdomain.com","First Last");
	$mail->AddAddress($email);
	$mail->Subject    = "Blanc Group Form";
	//$mail->AltBody    = "You can active your account on : "; // optional, comment out and test
	$mail->Body    = '
		Sale Number: '.$saleid.'
		English Title: '.$titleen.'
		Arabic Title: '.$titlear.'
		Total: '.$total.$currency_code.'
		Phone: '.$phone.'
		Address: '.$address;
	$mail->Send();
}

?>