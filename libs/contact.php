<?php

function getContact()
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select * from contact");
	$row = $result->fetch();
	include("../libs/closedb.php");
	return $row;	
}

function updateContact($id,$mobile,$phone,$email,$addressen,$addressar,$facebook,$twitter,$instagram)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("update contact set mobile = '$mobile',phone = '$phone',email = '$email',addressen = '$addressen',addressar = '$addressar',facebook = '$facebook',twitter = '$twitter',instagram = '$instagram' where id = '$id'");
	$stmt->execute();	
	include("../libs/closedb.php");
}

?>