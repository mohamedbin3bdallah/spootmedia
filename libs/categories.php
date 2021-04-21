<?php

function getnoOfAllCategories()
{
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$result = $dbh->query("select count(*) as count from categories where childto NOT LIKE '%,%' ");
	$row = $result->fetch();
	include("../libs/closedb.php");
	return $row['count'];
}

function getAllCategories($startResults,$resultsPerPage)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select * from categories where childto NOT LIKE '%,%' LIMIT $startResults, $resultsPerPage");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['id'] = $row['id'];
			$allrows[$i]['titleen'] = $row['titleen'];
			$allrows[$i]['titlear'] = $row['titlear'];
			$allrows[$i]['childto'] = $row['childto'];
		}
	}
	include("../libs/closedb.php");
	return $allrows;
}

function getnoOfCategories($childto)
{
	$childto = $childto.',';
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$result = $dbh->query("select count(*) as count from categories where childto LIKE '$childto%'");
	$row = $result->fetch();
	include("../libs/closedb.php");
	return $row['count'];
}

function getCategories($childto,$startResults,$resultsPerPage)
{
	$childto = $childto.',';
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select * from categories where childto LIKE '$childto%' LIMIT $startResults, $resultsPerPage");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['id'] = $row['id'];
			$allrows[$i]['titleen'] = $row['titleen'];
			$allrows[$i]['titlear'] = $row['titlear'];
			$allrows[$i]['childto'] = $row['childto'];
		}
	}
	include("../libs/closedb.php");
	return $allrows;
}

function exist($table,$field,$value,$field2,$value2)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select id from {$table} where {$field} = '$value' and {$field2} = '$value2'");
	$row = $result->fetch();
	include("../libs/closedb.php");
	if(empty($row)) return 1;
	else return 0;
}

function existdad($table,$field,$value)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select id from {$table} where {$field} = '$value'");
	$row = $result->fetch();
	include("../libs/closedb.php");
	if(empty($row)) return 1;
	else return 0;
}

/*function updateCategory($id,$titleen,$titlear,$childto)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("update categories set titleen = '$titleen',titlear = '$titlear',childto = '$childto' where id = '$id'");
	$stmt->execute();	
	include("../libs/closedb.php");
}*/

function insertCategory($titleen,$titlear,$childto)
{
	include("../libs/config.php");	
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("insert into `categories` (`titleen`,`titlear`, `childto`) values ('$titleen','$titlear','$childto')");
	$stmt->execute();
	include("../libs/closedb.php");
}

?>