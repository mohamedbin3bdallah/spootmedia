<?php

function getCartTotal($ipaddress)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$result = $dbh->query("select sum(total) as sum from cart where ipaddress = '$ipaddress'");
	$row = $result->fetch();
	include("libs/closedb.php");
	if(isset($row['sum'])) return $row['sum'];
	else return 0;	
}

function getUserCartTotal($uid)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$result = $dbh->query("select sum(total) as sum from cart where uid = '$uid'");
	$row = $result->fetch();
	include("libs/closedb.php");
	if(isset($row['sum'])) return $row['sum'];
	else return 0;	
}

?>