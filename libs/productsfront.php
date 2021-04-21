<?php

function getFLevelCategories($lang)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select id,title{$lang} as title,childto from categories where childto NOT LIKE '%,%'");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['id'] = $row['id'];
			$allrows[$i]['title'] = $row['title'];
			$allrows[$i]['childto'] = $row['childto'];
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

function getMLevelCategories($childto,$lang)
{
	$childto = $childto.',';
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select  id,title{$lang} as title,childto from categories where childto LIKE '$childto%' order by childto ASC");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['id'] = $row['id'];
			$allrows[$i]['title'] = $row['title'];
			$allrows[$i]['childto'] = $row['childto'];
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

function getCategories($lang)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select * from categories order by childto ASC");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['id'] = $row['id'];			
			$allrows[$i]['title'] = $row['title'.$lang];
			$allrows[$i]['childto'] = $row['childto'];			
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

function getSelectColor()
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select id,color from colors");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['color'] = $row['color'];
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

function getSelectSize()
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select id,title from sizes");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['title'] = $row['title'];
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

function getnoOfProducts($q,$category)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$result = $dbh->query("select count(*) as count from products where quantity > 0 and (titleen like '%$q%' or titlear like '%$q%') and categories like '%$category%'");
	$row = $result->fetch();
	include("libs/closedb.php");
	return $row['count'];
}

function getProducts($lang,$q,$category,$startResults,$resultsPerPage)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select id,title{$lang} as title,categories,oldprice,price from products where quantity > 0 and (titleen like '%$q%' or titlear like '%$q%') and categories like '%$category%' LIMIT $startResults, $resultsPerPage");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['id'] = $row['id'];
			$allrows[$i]['title'] = $row['title'];
			$allrows[$i]['categories'] = $row['categories'];
			$allrows[$i]['oldprice'] = $row['oldprice'];			
			$allrows[$i]['price'] = $row['price'];
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

function getnoOfAllProducts()
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$result = $dbh->query("select count(*) as count from products where quantity > 0");
	$row = $result->fetch();
	include("libs/closedb.php");
	return $row['count'];
}

function getAllProducts($lang,$startResults,$resultsPerPage)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = $dbh->query("select id,title{$lang} as title,categories,oldprice,price from products where quantity > 0 LIMIT $startResults, $resultsPerPage");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['id'] = $row['id'];
			$allrows[$i]['title'] = $row['title'];
			$allrows[$i]['categories'] = $row['categories'];
			$allrows[$i]['oldprice'] = $row['oldprice'];			
			$allrows[$i]['price'] = $row['price'];
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

?>