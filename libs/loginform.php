<?php

function getRowFromTable($table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select * from {$table} $where $limit");
	if(!empty($result))
	{
		$row = $result->fetch();
	}
	include("libs/closedb.php");
	return $row;
}

?>