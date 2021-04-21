<?php
if(isset($_POST['id'],$_POST['childto']))
{	
	$id = $_POST['id'];
	$childto = $_POST['childto'].',';
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select count(*) as count from categories where childto LIKE '$childto%'");
	$row = $result->fetch();
	if($row['count'] == 0)
	{
		$stmt = $dbh->prepare("delete from categories where id = '$id'");
		$stmt->execute();
		echo 1;
	}
	else echo 'This Category Has SubCategory';
	include("../libs/closedb.php");
   exit;
}
?>