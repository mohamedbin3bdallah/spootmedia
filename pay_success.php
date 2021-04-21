<?php
	if(isset($_GET['id']) && ($_GET['id'] != '' || $_GET['id'] != 0))
	{
		$_SERVER['HTTP_PRAGMA'] = 'no-cache';
		$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
		include('develops/pay_success.php');	
?>
<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title><?php if(isset($cpage['title']) && $cpage['title'] != '') echo $cpage['title']; ?></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
<script src="js/jquery-1.11.0.min.js"></script>
<!--Custom-Theme-files-->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php if(isset($cpage['description']) && $cpage['description'] != '') echo $cpage['description']; ?>" />
<meta name="keywords" content="<?php if(isset($cpage['keywords']) && $cpage['keywords'] != '') echo $cpage['keywords']; ?>" />
<link rel="shortcut icon" href="uploads/<?php echo $system['logo']; ?>">
<link href="css/pignose.layerslider.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/multiuserselect.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--start-menu-->
<script src="js/simpleCart.min.js"> </script>
<script src="js/jquery.easing.min.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!--dropdown-->		

<script type="text/javascript" src="js/carts.js"></script>
<script type="text/javascript">
function gotoproducts(category,q)
{
	location.href = 'products.php?category='+category+'&q='+q;
}
</script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</head>
<body> 
	<!--top-header-->	
	<div class="header">
	<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>خدمة الشحن السريع</li>
			<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>احصل معنا على شحن مجانى</li>
			<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></li>
		</ul>
	</div>
	</div>

	<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="index.html"><img src="uploads/<?php echo $system['logo']; ?>"></a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<!--<form>-->
				<div class="sear-sub">
					<input type="submit" value="" onclick="gotoproducts('<?php if(isset($_GET['category'])) echo $_GET['category']; ?>',search.value);">
				</div>				
				<div class="section_room">
					<!--<select id="country" onchange="change_country(this.value)" class="frm-field required">
						<?php for($i=0;$i<count($flcategories);$i++) { ?>
							<option value="<?php echo $flcategories[$i]['title']; ?>"><?php echo $flcategories[$i]['title']; ?></option>
						<?php } ?>
					</select>-->.
				</div>
				<div class="search" dir="rtl">
					<input type="search" value="<?php if(isset($_GET['q'])) echo $_GET['q']; else language('search'); ?>" id="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php language('search'); ?>';}">					
				</div>
				<div class="clearfix"></div>
			<!--</form>-->
		</div>
		<div class="col-md-3 header-right footer-bottom">
			<ul>
					
				</li>
				<li><a class="fb" href="<?php echo $contact['facebook']; ?>" target="_blank"></a></li>
				<li><a class="twi" href="<?php echo $contact['twitter']; ?>" target="_blank"></a></li>
				<li><a class="insta" href="<?php echo $contact['instagram']; ?>" target="_blank"></a></li>
				<li><a class="you" href="<?php echo $contact['youtube']; ?>" target="_blank"></a></li>
				<?php if(!isset($_COOKIE['uid'])) { ?><li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>دخول</span></a></i>
				<?php } else { ?><li><a href="logout.php" class="use1"><span>خروج</span></a></i><?php } ?>

			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
	
	<div class="ban-top">
	<div class="container">
	<div class="top_nav_left" style="width: 150px; float: left">
		<div class="cart box_1">
			<a href="checkout.php">
				<h3> <div class="total">
					<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
					<?php if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') { echo $system['currency']; ?><span id="totalcart" class="/*simpleCart_total*/"><?php if(isset($_COOKIE['uid'])) echo getUserCartTotal($_COOKIE['uid']); else echo getCartTotal($ipaddress); ?></span>
					<?php } else { ?><span id="totalcart" class="/*simpleCart_total*/"><?php if(isset($_COOKIE['uid'])) echo str_replace($western_arabic, $eastern_arabic, getUserCartTotal($_COOKIE['uid'])); else echo str_replace($western_arabic, $eastern_arabic, getCartTotal($ipaddress)); ?></span><?php echo ' '.$system['currency']; }  ?>
					<!--<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)-->
				</div></h3>
			</a>
			<!--<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>-->
		</div>
	</div>
	<div class="top_nav_right">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class=" menu__item"><a class="menu__link" href="contact.php"><?php language('contact'); ?></a></li>
					<li class=" menu__item"><a class="menu__link" href="about.php"><?php language('about'); ?></a></li>
					<li class="menu__item"><a class="menu__link" href="products.php"><?php language('products'); ?></a></li>
				  <?php for($i=0;$i<count($flcategories);$i++) { ?>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $flcategories[$i]['title']; ?><span class="caret"></span></a>
							<?php
							$mlcategories = getMLevelCategories($flcategories[$i]['childto'],$lang_file);
							if(!empty($mlcategories))
							{
							?>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="mens.html"><img src="images/woo1.jpg" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<?php for($j=0;$j<count($mlcategories)/2;$j++) { ?>
												<li><a href="products.php?category=<?php echo $mlcategories[$j]['childto']; ?>&q="><?php echo $mlcategories[$j]['title']; ?></a></li>
											<?php } ?>
										</ul>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<?php for($j=(count($mlcategories)/2);$j<count($mlcategories);$j++) { ?>
												<li><a href="products.php?category=<?php echo $mlcategories[$j]['childto']; ?>&q="><?php echo $mlcategories[$j]['title']; ?></a></li>
											<?php } ?>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
							<?php } ?>
					</li>
					<?php } ?>
					<li class=" menu__item"><a class="menu__link" href="index.php"><?php language('home'); ?></a></li>
				  </ul>
				  </div>
			  </div>
			</nav>	
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
	<!--bottom-header-->
	
	<!--start-breadcrumbs-->
	<div class="breadcrumbs" dir="rtl" style="margin-top: 25px;" <?php if(isset($_COOKIE['lang']) && $_COOKIE['lang'] != 'ar') echo ' dir="ltr"'; ?>>
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li class="active"><?php language('paymessage'); ?></li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	
	<!--start-ckeckout-->	
	<div class="contact" dir="rtl" <?php if(isset($_COOKIE['lang']) && $_COOKIE['lang'] != 'ar') echo ' dir="ltr"'; ?> >
		<div class="container">
			<div class="ckeck-top heading" style="margin-top: 25px;">
				<h2><center><?php language('paymessage'); ?></center></h2>
			</div>
			<div class="ckeckout-top">
				<?php echo '<div style="font-size: 200%; margin-top: 25px; margin-bottom: 25px;">'; language('paysuccess'); echo $saleid; echo '</div>'; ?>
			</div>
		</div>
	</div>	
	<!--end-ckeckout-->
	
<div class="coupons">
	<div class="container">
		<div class="coupons-grids text-center">
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<h4>سجل حسابك الان</h4>
				<p>قم بتسجيل حسابك الأن واختر نوع العضوية المفضلة لك من حساب تاجر او حساب مشترى.</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<h4>سجل دخول بحسابك</h4>
				<p>سجل دخولك واستمتع بتسوق احدث المنتجات المعروضة لدينا باسعار خاصة لجميع عملائنا</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<h4>اختر منتجك الأن</h4>
				<p>اختر منتجك الأن واضفه الى سلة مشترياتك واستمتع بحصولك على المنتج بسعر خاص</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
				<h4>اختر طريقة دفعك</h4>
				<p>حدد طريقة الدفع المناسبة لك عزيزى العميل واستمتع بخدمة شحن سريعة معنا</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>

<!-- footer -->
<div class="footer" dir="rtl">
	<div class="container">
		<!--<div class="col-md-3 footer-left">
			<h2><a href="index.html"><img src="images/logo3.jpg" alt=" " /></a></h2>
			<p><?php echo $about['vision']; ?></p>
		</div>-->
		<div class="col-md-12 footer-right">
			<!--<div class="col-sm-6 newsleft">
				<h3>اشترك فى القائمة البريدية</h3>
			</div>
			<div class="col-sm-6 newsright">
				<form>
					<input type="text" value="ادخل بريدك الألكترونى" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ادخل بريدك الألكترونى';}" required="">
					<input type="submit" value="اشترك">
				</form>
			</div>-->
			<div class="clearfix"></div>
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h2><a href="index.html"><img src="images/logo3.jpg" alt=" " /></a></h2>
					<p><?php echo $about['vision']; ?></p>
				</div>
				<div class="col-md-4 sign-gd">
					<h4><?php language('links'); ?></h4>
					<ul>
						<li><a href="index.php"><?php language('home'); ?></a></li>
						<?php for($i=0;$i<count($flcategories);$i++) { ?>
						<li><a href="products.php?category=<?php echo $flcategories[$i]['childto']; ?>&q="><?php echo $flcategories[$i]['title']; ?></a></li>
						<?php } ?>
						<li><a href="products.php"><?php language('products'); ?></a></li>
						<li><a href="about.php"><?php language('about'); ?></a></li>
						<li><a href="contact.php"><?php language('contact'); ?></a></li>
					</ul>
				</div>
				
				<div class="col-md-4 sign-gd-two">
					<h4><?php language('address'); ?></h4>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><?php language(' '); echo $contact['address'.$lang_file]; ?></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><?php language(' '); ?><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><?php language(' '); language('mobile'); language(':'); echo $contact['mobile']; ?></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><?php language(' '); language('phone'); language(':'); echo $contact['phone']; ?></li>
					</ul>
				</div>
				<!--<div class="col-md-4 sign-gd flickr-post">
					<h4>احدث المنتجات</h4>
					<ul>
						<li><a href="single.html"><img src="images/b15.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b16.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b17.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b18.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b15.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b16.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b17.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b18.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b15.jpg" alt=" " class="img-responsive" /></a></li>
					</ul>
				</div>-->
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		<p class="copy-right">&copy 2016 spoot media. All rights reserved | Design by <a target="_blank" href="http://onetrusted.com/">onetrusted</a></p>
	</div>
</div>
<!-- //footer -->

<!-- login -->
		<?php if(!isset($_COOKIE['uid'])) { ?>
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" dir="rtl">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>حساب جديد</h3>
										<form action="develops/registerform.php" method="POST">
											<div class="sign-up">
												<h4>اسم لمستخدم :</h4>
												<input type="text" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" required="">	
											</div>
											<div class="sign-up">
												<h4>ايميل :</h4>
												<input type="text" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">	
											</div>
											<div class="sign-up">
												<h4>كلمة المرور :</h4>
												<input type="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<h4>اعادة كلمة المرور :</h4>
												<input type="password" name="cmfpassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" required="">
												
											</div>
											<div class="sign-up">
												<h4>تاجر :</h4>
												<input type="checkbox" name="dealer" id="dealer" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Dealer';}">
												
											</div>
											<div class="sign-up" id="dealercompany">
												<h4>شركة :</h4>
												<input type="text" name="company" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Company';}">
												
											</div>
											<div class="sign-up">
												<input type="submit" name="registersubmit" value="تسجيل" >
											</div>
											
										</form>
									</div>
									<div class="login-right">
										<h3>حسابي</h3>
										<form action="loginform.php" method="POST">
											<div class="sign-in">
												<h4>ايميل :</h4>
												<input type="text" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-in">
												<h4>كلمة المرور :</h4>
												<input type="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												<a href="#">نسيت كلمة المرور؟</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox" name="remember" id="brand" value="">
												<label for="brand"><span></span>تذكرني</label>
											</div>
											<div class="sign-in">
												<input type="submit" name="loginsubmit" value="دخول" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>بالتسجيل هنا تكون قد وافقت على كل  <a href="#">البنود والشروط</a> و <a href="#">سياسة الخصوصية</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
<!-- //login -->

</body>
</html>
<?php } else header('Location: index.php'); ?>