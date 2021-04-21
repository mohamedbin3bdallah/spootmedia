<?php
if(isset($_POST['id'],$_POST['delivered']))
{	
	$id = $_POST['id'];
	$delivered = $_POST['delivered'];
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$stmt = $dbh->prepare("update sales set delivered = 1 , time = time where id = '$id'");
	if($stmt->execute()) echo 1;	
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>