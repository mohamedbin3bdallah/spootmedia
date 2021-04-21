<?php

/*function getCategories($lang)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$title = 'title'.$lang;
	$result = $dbh->query("select id,{$title} as title from categories");
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			?><option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option><?php
		}
	}
	include("../libs/closedb.php");
}*/

function getCategories($lang)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
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
	include("../libs/closedb.php");
	return $allrows;
}

function getSelectData($table)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select id,title from {$table}");
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			?><option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option><?php
		}
	}
	include("../libs/closedb.php");
}

function getSelectColor($lang)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$title = 'title'.$lang;
	$result = $dbh->query("select id,color from colors");
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			?><option value="<?php echo $row['color']; ?>" style="background-color: #<?php echo $row['color']; ?>;"></option><?php
		}
	}
	include("../libs/closedb.php");
}

/*function getDataByID($lang,$id,$table)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$title = 'title'.$lang;
	$result = $dbh->query("select {$title} as title from {$table} where id = '$id'");
	$row = $result->fetch();	
	include("../libs/closedb.php");
	return $row['title'];	
}*/

function getProductByID($id)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select * from products where id = '$id'");
	$allrows = array();	
	if(!empty($result))
	{
		$row = $result->fetch();
		$allrows['titleen'] = $row['titleen'];
		$allrows['titlear'] = $row['titlear'];
		$allrows['descriptionen'] = $row['descriptionen'];
		$allrows['descriptionar'] = $row['descriptionar'];
		$allrows['categories'] = $row['categories'];
		$allrows['oldprice'] = $row['oldprice'];
		$allrows['price'] = $row['price'];
		$allrows['quantity'] = $row['quantity'];
		$allrows['views'] = $row['views'];
	}
	include("../libs/closedb.php");
	return $allrows;	
}

function getnoOfProducts()
{
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$result = $dbh->query("select count(*) as count from products");
	$row = $result->fetch();
	include("../libs/closedb.php");
	return $row['count'];
}

function getProducts($startResults,$resultsPerPage)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select * from products LIMIT $startResults, $resultsPerPage");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = $result->fetch(); $i++)
		{
			$allrows[$i]['id'] = $row['id'];
			$allrows[$i]['titleen'] = $row['titleen'];
			$allrows[$i]['titlear'] = $row['titlear'];
			$allrows[$i]['descriptionen'] = $row['descriptionen'];
			$allrows[$i]['descriptionar'] = $row['descriptionar'];
			$allrows[$i]['categories'] = $row['categories'];
			$allrows[$i]['oldprice'] = $row['oldprice'];
			$allrows[$i]['price'] = $row['price'];
			$allrows[$i]['quantity'] = $row['quantity'];
			$allrows[$i]['views'] = $row['views'];
		}
	}
	include("../libs/closedb.php");
	return $allrows;
}


function upload_profile_picture($folder)
{
	$image_director = "../uploads/products/".$folder;
	if(!is_dir($image_director)) $create_image_director = mkdir($image_director);	
	for($i=0;$i<count($_FILES['file']['name']);$i++)
	{
		if($_FILES['file']['size'][$i] < 1024000)
		{
			$file_extn[$i] = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
			if($_FILES["file"]["type"][$i] == "image/jpg" || $_FILES["file"]["type"][$i] == "image/jpeg" || $_FILES["file"]["type"][$i] == "image/gif" || $_FILES["file"]["type"][$i] == "image/png")
			{
				$_FILES["file"]["name"][$i] = rand().'.'.$file_extn[$i];
				move_uploaded_file($_FILES["file"]["tmp_name"][$i], $image_director.'/'.$_FILES["file"]["name"][$i]);				
			}
		}
	}
}

function updateProduct($id,$titleen,$titlear,$descriptionen,$descriptionar,$categories,$oldprice,$price,$quantity)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("update products set titleen = '$titleen',titlear = '$titlear',descriptionen = '$descriptionen',descriptionar = '$descriptionar',categories = '$categories',oldprice = '$oldprice',price = '$price',quantity = '$quantity' where id = '$id'");
	$stmt->execute();	
	include("../libs/closedb.php");
}

function insertProduct($admin,$titleen,$titlear,$descriptionen,$descriptionar,$categories,$oldprice,$price,$quantity)
{
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("insert into `products` (`admin`,`titleen`,`titlear`,`descriptionen`,`descriptionar`,`categories`,`oldprice`,`price`,`quantity`) values ('$admin','$titleen','$titlear','$descriptionen','$descriptionar','$categories','$oldprice','$price','$quantity')");
	$stmt->execute();
	return $dbh->lastInsertId();
}

?>