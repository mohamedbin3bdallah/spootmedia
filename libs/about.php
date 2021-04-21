<?php

function getAbout()
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select * from about");
	$row = $result->fetch();
	include("../libs/closedb.php");
	return $row;	
}

function updateAbout($id,$visionen,$visionar,$missionen,$missionar)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("update about set visionen = '$visionen',visionar = '$visionar',missionen = '$missionen',missionar = '$missionar' where id = '$id'");
	$stmt->execute();	
	include("../libs/closedb.php");
}

?>