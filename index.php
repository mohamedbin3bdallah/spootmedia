<?php
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/index.php');
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
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--start-menu-->
<script src="js/simpleCart.min.js"> </script>
<script src="js/jquery.easing.min.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!--dropdown-->
<script src="js/jquery.easydropdown.js"></script>
<script type="text/javascript">
function gotoproducts(category,q)
{
	location.href = 'products.php?category='+category+'&q='+q;
}
</script>
<script type='text/javascript' src='//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js' data-shr-siteid='86a2931ebf5bee75a5b85d1dd8da0f54' data-cfasync='false' async='async'></script>
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
	<div class="top_nav_left">
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
					<li class=" menu__item"><a class="menu__link" href="products.php"><?php language('products'); ?></a></li>
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
					<li class="active menu__item menu__item--current"><a class="menu__link" href="index.php"><?php language('home'); ?><span class="sr-only">(current)</span></a></li>
				  </ul>
				  </div>
			  </div>
			</nav>	
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
	
	<!-- banner -->
<div class="banner-grid">
	<div id="visual">
			<div class="slide-visual">
			<?php $slider = array_diff(scandir('uploads/slider/thumbnail'), array('.','..')); ?>			
				<!-- Slide Image Area (1000 x 424) -->
				<?php if(!empty($slider)) { ?>
					<ul class="slide-group">
						<?php for($sl=2;$sl<count($slider)+2;$sl++) { ?>
							<li><img class="img-responsive" src="uploads/slider/<?php echo $slider[$sl]; ?>" alt="" /></li>
						<?php } ?>
					</ul>

				<!-- Slide Description Image Area (316 x 328) -->
					<div class="script-wrap">
						<ul class="script-group">
							<?php for($sl=2;$sl<count($slider)+2;$sl++) { ?>
								<li><div class="inner-script"><img class="img-responsive" src="uploads/slider/thumbnail/<?php echo $slider[$sl]; ?>" alt="" /></div></li>
							<?php } ?>
						</ul>
						<div class="slide-controller">
							<a href="#" class="btn-prev"><img src="images/btn_prev.png" alt="Prev Slide" /></a>
							<a href="#" class="btn-play"><img src="images/btn_play.png" alt="Start Slide" /></a>
							<a href="#" class="btn-pause"><img src="images/btn_pause.png" alt="Pause Slide" /></a>
							<a href="#" class="btn-next"><img src="images/btn_next.png" alt="Next Slide" /></a>
						</div>
					</div>
				<?php } ?>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	<script type="text/javascript" src="js/pignose.layerslider.js"></script>
	<script type="text/javascript">
	//<![CDATA[
		$(window).load(function() {
			$('#visual').pignoseLayerSlider({
				play    : '.btn-play',
				pause   : '.btn-pause',
				next    : '.btn-next',
				prev    : '.btn-prev'
			});
		});
	//]]>
	</script>

</div>
<!-- //banner -->

<div class="product-easy">
	<div class="container">
		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});
							
		</script>
		<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span><?php language('products'); ?></span></li> 
				</ul>
				<div class="resp-tabs-container">
					<!--<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">-->
						<?php
							$products = getProducts($lang_file,$startResults,$resultsPerPage);
							if(!empty($products))
							{
								for($p=0;$p<count($products);$p++)
								{
									$productpics[$p] = array_diff(scandir('uploads/products/'.$products[$p]['id']), array('.','..'));
						?>
							<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="uploads/products/<?php echo $products[$p]['id'].'/'.$productpics[$p][2]; ?>" alt="<?php echo $products[$p]['title']; ?>" class="pro-image-front">
									<img src="uploads/products/<?php echo $products[$p]['id'].'/'.$productpics[$p][2]; ?>" alt="<?php echo $products[$p]['title']; ?>" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="product.php?id=<?php echo $products[$p]['id']; ?>" class="link-product-add-cart"><?php language('view'); ?></a>
											</div>
										</div>
										<!--<span class="product-new-top">جديد</span>-->
										
								</div>
								<div class="item-info-product ">
									<h4><a href="product.php?id=<?php echo $products[$p]['id']; ?>"><?php echo $products[$p]['title']; ?></a></h4>
									<div class="info-product-price">
										<span class="item_price" dir="rtl"><?php echo $products[$p]['price'].' '.$system['currency']; ?></span>
										<del dir="rtl"><?php echo $products[$p]['oldprice'].' '.$system['currency']; ?></del>
									</div>
									<a href="product.php?id=<?php echo $products[$p]['id']; ?>" class="item_add single-item hvr-outline-out button2"><?php language('addtocart'); ?></a>									
								</div>
							</div>
							</div>
						<?php } } ?>
					<!--</div>-->
				</div>
				
				<div class="row">
				<div class="col-md-4 col-md-offset-5">			
				<nav>
					<ul class="pagination">
						<?php if($totalPages > 1) { ?><li style="<?php if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'ar') echo 'float:right;'; ?>"><a href="?page=1"><?php language("first"); ?></a></li><?php } ?>
						<?php if($page > 3) { ?><li>
							<a href="?page=<?php echo $page-2; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li><?php } ?>
						<?php if($page > 1) { ?><li style="<?php if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'ar') echo 'float:right;'; ?>"><a href="?page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
						<?php if($totalPages > 1) { ?><li style="<?php if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'ar') echo 'float:right;'; ?>"><a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
						<?php if($page < $totalPages) { ?><li style="<?php if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'ar') echo 'float:right;'; ?>"><a href="?page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
						<?php if($page < $totalPages-1) { ?><li style="<?php if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'ar') echo 'float:right;'; ?>">
							<a href="?page=<?php echo $page+2; ?>" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li><?php } ?>
						<?php if($totalPages > 1) { ?><li style="<?php if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'ar') echo 'float:right;'; ?>"><a href="?page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
					</ul>
				</nav>
				</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

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