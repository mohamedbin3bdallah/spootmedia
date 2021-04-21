<?php
//include('../classes/ResizeImage.php');
if(isset($_COOKIE['admin']))
{
	include('../libs/categories.php');
	$admin = $_COOKIE['admin'];
	
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$resultsPerPage = 10;
	$startResults = ($page - 1) * $resultsPerPage;
	
	if(!isset($_GET['id']) || $_GET['id'] == '')	$noOfcategories = getnoOfAllCategories();
	else $noOfcategories = getnoOfCategories($_GET['id']);
	
	$totalPages = ceil($noOfcategories / $resultsPerPage);

	if(isset($_POST['savecategory']))
	{
		unset($_POST['savecategory']);
		
		/*if(isset($_POST['oldid']) && $_POST['oldid'] != '')
		{
			explode(',',$_POST['childto']);
			implode("|",$_POST['categories'])
			updateCategory($_POST['oldid'],$_POST['titleen'],$_POST['titlear']);
		}
		else*/
		if(isset($_POST['childto']) && $_POST['childto'] != '')
		{
			if(exist('categories','titleen',$_POST['titleen'],'childto',$_POST['childto']) && exist('categories','titlear',$_POST['titlear'],'childto',$_POST['childto']))	insertCategory($_POST['titleen'],$_POST['titlear'],$_POST['childto'].','.$_POST['titleen']);
		}
		else
		{
			if(existdad('categories','titleen',$_POST['titleen']) && existdad('categories','titlear',$_POST['titlear']))	insertCategory($_POST['titleen'],$_POST['titlear'],$_POST['titleen']);
		}
		
		if($_SERVER['QUERY_STRING'] != '') header('location: categories.php?'.$_SERVER['QUERY_STRING']);
		else header('location: categories.php');
	}
}
else header('location: ../index.php');
?>