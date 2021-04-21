<?php
if(isset($_POST['ip']))
{	
	$ip = $_POST['ip'];
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$stmt = $dbh->prepare("delete from cart where ipaddress = '$ip'");
	if($stmt->execute())
	{
		echo 1;
	}
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>