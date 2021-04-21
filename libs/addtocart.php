<?php

function getProductByID($id)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select * from products where id = '$id'");
	$allrows = array();	
	if(!empty($result))
	{
		$row = $result->fetch();
		$allrows['id'] = $row['id'];
		$allrows['titleen'] = $row['titleen'];
		$allrows['titlear'] = $row['titlear'];
		$allrows['price'] = $row['price'];
		$allrows['quantity'] = $row['quantity'];
	}
	include("../libs/closedb.php");
	unset($row);
	return $allrows;	
}

function countIpCart($ipaddress)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select count(*) as count from cart where ipaddress = '$ipaddress' and uid = ''");
	$row = $result->fetch();
	include("../libs/closedb.php");
	if(empty($row) || $row['count'] < 3) return 1;
	else return 0;
}

function countUserCart($uid)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select count(*) as count from cart where uid = '$uid'");
	$row = $result->fetch();
	include("../libs/closedb.php");
	if(empty($row) || $row['count'] < 3) return 1;
	else return 0;
}

function insertIPCart($product,$titleen,$titlear,$price,$quantity,$total,$ipaddress)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("insert into `cart` (`product`,`titleen`,`titlear`,`price`,`quantity`,`total`,`ipaddress`) values ('$product','$titleen','$titlear','$price','$quantity','$total','$ipaddress')");
	$stmt->execute();
	return $dbh->lastInsertId();	
}

function insertUserCart($product,$titleen,$titlear,$price,$quantity,$total,$uid)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("insert into `cart` (`product`,`titleen`,`titlear`,`price`,`quantity`,`total`,`uid`) values ('$product','$titleen','$titlear','$price','$quantity','$total','$uid')");
	$stmt->execute();
	return $dbh->lastInsertId();	
}

function updateProductQuantity($id,$quantity)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("update products set quantity = '$quantity' where id = '$id'");
	$stmt->execute();	
	include("../libs/closedb.php");
}

?>