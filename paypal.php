<!DOCTYPE html>
<html lang="en" >
<head>
<?php
if(isset($_POST['paypal']) && $_COOKIE['cansale'] == 1)
{
unset($_POST['paypal']);
if(isset($_POST['id'],$_POST['phone'],$_POST['address'],$_COOKIE['business'],$_COOKIE['currency_code'],$_COOKIE['ipaddress']))
{
	if(isset($_COOKIE['lang'])) $lang = $_COOKIE['lang']; else $lang = 'ar';
	$id = $_POST['id'];
	$ip = $_COOKIE['ipaddress'];
	setcookie('phone', $_POST['phone'], time()+60*60*24*100, "");
	setcookie('address', $_POST['address'], time()+60*60*24*100, "");
	include("libs/config.php");
	include("libs/opendb.php");
	include("libs/mac.php");
	$result0 = $dbh->query("select currencyen from system where id = '1'");
	$result2 = $dbh->query("select admins.paypalemail as paypalemail from admins inner join products on admins.id = products.admin inner join cart on products.id = cart.product where cart.id = '$id'");
	if(isset($_COOKIE['uid'])) $result = $dbh->query("select id,product,title{$lang} as title,price,quantity from cart where id = '$id' and uid = '".$_COOKIE['uid'].'"');
	else $result = $dbh->query("select id,product,title{$lang} as title,price,quantity from cart where id = '$id' and ipaddress = '$ip'");
	if(!empty($result0) && !empty($result))
	{
		$row2 = $result2->fetch();
		if($row2['paypalemail'] == '') $row2['paypalemail'] = $_COOKIE['business'];
		$row0 = $result0->fetch();
		$row = $result->fetch();
		if(isset($row['id']))
		{			
			$get = file_get_contents("https://www.google.com/finance/converter?a=".$row['price']."&from=".$row0['currencyen']."&to=".$_COOKIE['currency_code']);
			$get = explode("<span class=bld>",$get);
			$get = explode("</span>",$get[1]);  
			$row['price'] = number_format(preg_replace("/[^0-9\.]/", null, $get[0]),2);
			echo '<div id="submitDiv"></div>';
		}
		else echo header('Location: pay_cancel.php');
	}
	else echo header('Location: pay_cancel.php');	
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#submitDiv').show(function(e) {
		var charset = 'utf-8';
		var cmd = '_xclick';
		var business = "<?php echo $row2['paypalemail']; ?>";
		var item_name = "<?php echo $row['title']; ?>";
		var item_number = "<?php echo $row['id']; ?>";
		var amount = "<?php echo $row['price']; ?>";
		var quantity = "<?php echo $row['quantity']; ?>";		
		var currency_code = "<?php echo $_COOKIE['currency_code']; ?>";
		var no_shipping = 1;
		var handling = 0;
		var cancel_return = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/spootmedia/pay_cancel.php'; ?>";
		var success_return = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/spootmedia/pay_success.php?id='.$row['id'].'&phone='.$_POST['phone'].'&address='.$_POST['address']; ?>";		
		
		var actionForm = $('<form>', {'action': 'https://www.paypal.com/cgi-bin/webscr', 'method': 'POST'}).append($('<input>', {'name': 'charset', 'value': charset, 'type': 'hidden'}), $('<input>', {'name': 'cmd', 'value': cmd, 'type': 'hidden'}), $('<input>', {'name': 'business', 'value': business, 'type': 'hidden'}), $('<input>', {'name': 'item_name', 'value': item_name, 'type': 'hidden'}), $('<input>', {'name': 'item_number', 'value': item_number, 'type': 'hidden'}), $('<input>', {'name': 'amount', 'value': amount, 'type': 'hidden'}), $('<input>', {'name': 'quantity', 'value': quantity, 'type': 'hidden'}), $('<input>', {'name': 'currency_code', 'value': currency_code, 'type': 'hidden'}), $('<input>', {'name': 'no_shipping', 'value': no_shipping, 'type': 'hidden'}), $('<input>', {'name': 'handling', 'value': handling, 'type': 'hidden'}), $('<input>', {'name': 'cancel_return', 'value': cancel_return, 'type': 'hidden'}), $('<input>', {'name': 'success_return', 'value': success_return, 'type': 'hidden'}));
		actionForm.submit();
	});
});
</script>
</head>
<?php } else echo header('Location: pay_cancel.php'); ?>
<?php } else echo header('Location: pay_cancel.php'); ?>
</html>