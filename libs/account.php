<?php

function getAccount($id)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select * from admins where id = '$id'");
	$row = $result->fetch();
	include("../libs/closedb.php");
	return $row;	
}

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

function updatePassAccount($id,$username,$email,$paypalemail,$password,$company)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("update admins set username = '$username',email = '$email',paypalemail = '$paypalemail',password = '$password',company = '$company' where id = '$id'");
	$stmt->execute();	
	include("../libs/closedb.php");
}

function updateAccount($id,$username,$email,$paypalemail,$company)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("update admins set username = '$username',email = '$email',paypalemail = '$paypalemail',company = '$company' where id = '$id'");
	$stmt->execute();	
	include("../libs/closedb.php");
}

?>