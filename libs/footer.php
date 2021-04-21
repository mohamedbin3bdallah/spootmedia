<?php

function getContact()
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select * from contact");
	if(!empty($result))
	{
		$row = $result->fetch();
		include("libs/closedb.php");
		return $row;
	}
}

function getAbout($lang)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select id,vision{$lang} as vision,mission{$lang} as mission from about");
	$row = $result->fetch();
	include("libs/closedb.php");
	return $row;	
}

?>