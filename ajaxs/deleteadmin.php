<?php
if(isset($_POST['id']))
{	
	$id = $_POST['id'];
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$stmt = $dbh->prepare("delete from admins where id = '$id'");
	$stmt->execute();
	include("../libs/closedb.php");
   exit;
}
?>