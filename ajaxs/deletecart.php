<?php
if(isset($_POST['id'],$_POST['product'],$_POST['ip'],$_POST['quantity']))
{	
	$id = $_POST['id'];
	$product = $_POST['product'];
	$ip = $_POST['ip'];
	$quantity = $_POST['quantity'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	
	$stmt1 = $dbh->prepare("update products set quantity = quantity+'$quantity' where id = '$product'");
	$stmt1->execute();
	
	$stmt = $dbh->prepare("delete from cart where id = '$id'");
	if($stmt->execute())
	{
		$result = $dbh->query("select sum(total) as sum from cart where ipaddress = '$ip'");
		$row = $result->fetch();		
		if(isset($row['sum'])) echo $row['sum'];
		else echo 0;
	}
	else echo 1;
	include("../libs/closedb.php");
   exit;
}
?>