<?php

function addViews($id)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$stmt = $dbh->prepare("update products set views = views+1 where id = '$id'");
	$stmt->execute();
	include("libs/closedb.php");	
}

?>