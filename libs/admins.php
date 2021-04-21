<?php

function getnoOfAdmins()
{
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$result = $dbh->query("select count(*) as count from admins where id <> 1");
	$row = $result->fetch();
	include("../libs/closedb.php");
	return $row['count'];
}

function getAdmins($startResults,$resultsPerPage)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select * from admins where id <> 1 LIMIT $startResults, $resultsPerPage");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['id'] = $row['id'];
			$allrows[$i]['username'] = $row['username'];
			$allrows[$i]['email'] = $row['email'];
			$allrows[$i]['company'] = $row['company'];
			$allrows[$i]['active'] = $row['active'];
		}
	}
	include("../libs/closedb.php");
	return $allrows;
}

function getAdminByID($id)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select * from admins where id = '$id'");
	$allrows = array();	
	if(!empty($result))
	{
		$row = $result->fetch();
		$allrows['username'] = $row['username'];
		$allrows['email'] = $row['email'];
		$allrows['company'] = $row['company'];
		$allrows['active'] = $row['active'];
	}
	include("../libs/closedb.php");
	return $allrows;	
}

function updateAdmin($id,$username,$email,$company,$active)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("update admins set username = '$username',email = '$email',company = '$company',active = '$active' where id = '$id'");
	$stmt->execute();	
	include("../libs/closedb.php");
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

function insertAdmin($username,$password,$email,$company,$active)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("insert into `admins` (`username`,`password`,`email`,`company`,`active`) values ('$username','$password','$email','$company','$active')");
	$stmt->execute();
	include("../libs/closedb.php");
}

?>