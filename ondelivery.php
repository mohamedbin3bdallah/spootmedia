<!DOCTYPE html>
<html lang="en" >
<?php
if(isset($_POST['ondelivery']) && $_COOKIE['cansale'] == 1)
{
unset($_POST['ondelivery']);
if(isset($_POST['id'],$_POST['phone'],$_POST['address'],$_COOKIE['ipaddress']))
{
	if($_POST['phone'] != '' && preg_match("/^[0-9]*$/",$_POST['phone']))
	{
		if($_POST['address'] != '')
		{
			$id = $_POST['id'];
			setcookie('phone', $_POST['phone'], time()+60*60*24*100, "");
			setcookie('address', $_POST['address'], time()+60*60*24*100, "");
			include("libs/config.php");
			include("libs/opendb.php");
			include("libs/mac.php");	
			if(isset($_COOKIE['uid'])) { $uid = $_COOKIE['uid']; $result = $dbh->query("select id from cart where id = '$id' and uid = '$uid'"); }
			else { 	$ip = $_COOKIE['ipaddress']; $result = $dbh->query("select id from cart where id = '$id' and ipaddress = '$ip'"); }
			if(!empty($result))
			{
				$row = $result->fetch();
				if(isset($row['id'])) echo header('Location: pay_success.php?id='.$row['id'].'&phone='.$_POST['phone'].'&address='.$_POST['address']);
				else echo header('Location: pay_cancel.php');
			}
			else echo header('Location: pay_cancel.php');
		}
		else echo header('Location: pay_cancel.php');
	}
	else echo header('Location: pay_cancel.php');
}
else echo header('Location: pay_cancel.php');
}
else echo header('Location: pay_cancel.php');
?>
</html>