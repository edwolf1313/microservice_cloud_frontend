<!-- <?php
	$link = $_SERVER['REQUEST_URI'];
	$link_array = explode('/',$link);
	$page = end($link_array);
	session_start();
 ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>zPainting</title>
	<meta name="description" content="Free Responsive Html5 Css3 Templates | Zerotheme.com">
	<meta name="author" content="https://www.zerotheme.com">
    <!-- Mobile Specific Metas ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS ================================================== -->
  <link rel="stylesheet" href="<?php echo $assets_url;?>/css/zerogrid.css">
	<link rel="stylesheet" href="<?php echo $assets_url;?>/css/style.css">
	<!-- Custom Fonts -->
	<link href="<?php echo $assets_url;?>/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $assets_url;?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo $assets_url;?>/css/menu.css">
	<script src="<?php echo $assets_url;?>/js/jquery1111.min.js" type="text/javascript"></script>
	<script src="<?php echo $assets_url;?>/js/script.js"></script>
	<!-- Owl Carousel Assets -->
  <link href="<?php echo $assets_url;?>/owl-carousel/owl.carousel.css" rel="stylesheet">
</head>
<body>
	<div class="wrap-body">
		<header class="main-header">
			<div class="zerogrid">
				<!--Top-->
				<div id="top">
					<div class="row">
						<div class="col-2-3">
							<ul class="list-inline top-link link">
								<li><a href="#">ARC-COMMERCE</a></li>
								<?= isset($_COOKIE['username']) ? '<li>'.$_COOKIE['username'].'</li>' : '' ;?>
								<!-- <li><a href="#">Instagram</a></li>
								<li><a href="#">Twitter</a></li>
								<li><a href="#">Google +</a></li>
								<li><a href="#">Pinterest</a></li> -->
							</ul>
						</div>
						<div class="col-1-3">
							<div class="top-search">
								<form id="form-container" action="<?=$web_url ?>/index/search_page">
									<!--<input type="submit" id="searchsubmit" value="" />-->
									<a class="search-submit-button" href="javascript:void(0)" onclick="this.parentNode.submit(); return false;">
										<i class="fa fa-search"></i>
									</a>
									<div id="searchtext">
										<input type="text" id="name" name="name" placeholder="Search">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="t-center">
					<!-- <a class="site-branding" href="index.html">
						<img src="<?php echo $assets_url;?>/images/arc.png" width="300px"/>
					</a> -->
					<!-- .site-branding -->
					<!-- Menu-main -->
					<div id='cssmenu' class="align-center">
						<ul>
						   <li class="<?php echo ($page == "") ? 'active':'' ?>"><a href='<?=$web_url ?>/'><span>Home</span></a></li>
							 <li class="<?php echo ($page == "cart") ? 'active': ''; ?>"><a href='<?=$web_url ?>/index/cart'><span>Cart<span></a>
						   <!-- <li><a href='single.html'><span>About</span></a></li> -->
								<?php if (!isset($_COOKIE['bearer'])): ?>
							   <li class= <?php echo ($page == "login") ? 'active': ''; ?>><a href='<?=$web_url ?>/index/login'><span>Login</span></a></li>
							   <li class="last <?php echo ($page == "register") ? 'active' : ''; ?>"><a href='<?=$web_url ?>/index/register'><span>Signup</span></a></li>
								<?php else: ?>
								 <li class="last"><a href='<?=$web_url ?>/index/LOGOUT_USER'><span>Logout</span></a></li>
								<?php endif;  ?>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!--////////////////////////////////////view-->
    <?php include $current_view; ?>
		<!--////////////////////////////////////Footer-->
		<footer>
			<div class="zerogrid wrap-footer">
				<div class="row">
					<div class="bottom-social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-vimeo"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-youtube"></i></a>
					</div>
				</div>
				<div class="copyright">
					<!-- Copyright @ - Designed by <a href="https://www.zerotheme.com">ZEROTHEME</a> -->
					ARC-PROJECT
				</div>
			</div>
		</footer>
		<!-- carousel -->
		<script src="<?php echo $assets_url;?>/owl-carousel/owl.carousel.js"></script>
		<script>
		$(document).ready(function() {
		  $("#owl-slide").owlCarousel({
			autoPlay: 3000,
			items : 1,
			itemsDesktop : [1199,1],
			itemsDesktopSmall : [979,1],
			itemsTablet : [768, 1],
			itemsMobile : [479, 1],
			navigation: true,
			navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
			pagination: false
		  });
		});
		function incrementValue(e) {
		  e.preventDefault();
		  var fieldName = $(e.target).data('field');
		  var parent = $(e.target).closest('div');
		  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

		  if (!isNaN(currentVal)) {
		    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
		  } else {
		    parent.find('input[name=' + fieldName + ']').val(0);
		  }
		}

		function decrementValue(e) {
		  e.preventDefault();
		  var fieldName = $(e.target).data('field');
		  var parent = $(e.target).closest('div');
		  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

		  if (!isNaN(currentVal) && currentVal > 0) {
		    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
		  } else {
		    parent.find('input[name=' + fieldName + ']').val(0);
		  }
		}
		$('.input-group').on('click', '.button-plus', function(e) {
			incrementValue(e);
		});

		$('.input-group').on('click', '.button-minus', function(e) {
			decrementValue(e);
		});
		</script>
	</div>
</body>
</html>
