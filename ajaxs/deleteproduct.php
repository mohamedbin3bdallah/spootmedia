<?php
function delTree($dir)
{
	$files = array_diff(scandir($dir), array('.','..')); 
    foreach ($files as $file) { 
    (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
    }
    rmdir($dir);
}

if(isset($_POST['id']))
{	
	$id = $_POST['id'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("delete from products where id = '$id'");
	if($stmt->execute())
	{		
		delTree('../uploads/products/'.$_POST['id'].'/thumbnail');
		delTree('../uploads/products/'.$_POST['id']);
	}
	include("../libs/closedb.php");
   exit;
}
?>