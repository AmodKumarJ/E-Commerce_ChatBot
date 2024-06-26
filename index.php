<?php
session_start();

require_once 'include/keywords.php';
require_once 'include/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home - <?php echo $site; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon-32x32.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<!--===============================================================================================-->
</head>

<body class="animsition">

	<?php
	require_once 'include/add-cart.php';
	?>

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<?php require_once 'include/top-bar.php'; ?>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<?php require_once 'include/desktop-logo.php'; ?>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.php">Home</a>
							</li>
							<li  class="label1" data-label1="new">
								<a href="http://127.0.0.1:5000">Ask Me Anything</a>
							</li>
							<?php
							if (!empty($_SESSION['isLogin'])) {
								echo "<li>
									<a href='profile.php'>Accounts</a>
									<ul class='sub-menu'>
										<li><a href='orders.php'>Orders</a></li>
										<li><a href='profile.php'>Profile</a></li>
										<li><a href='settings.php'>Settings</a></li>
										<li><a href='include/logout.php'>Logout</a></li>
									</ul>
								</li>";
							} else {
								echo "<li>
										<a href='login.php'>Login</a>
									</li>";
							}
							?>

							<li>
								<a href="about.php">About Us</a>
							</li>

							<li>
								<a href="contact.php">Contact Us</a>
							</li>
						</ul>
					</div>

					<?php require_once 'include/cart-search.php'; ?>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<?php
		require_once 'include/search-modal.php';
		?>
	</header>

	<?php require_once 'include/cart.php'; ?>



	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">

				<div class="item-slick1" style="background-image: url(images/slider/poster.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">

							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="800">
								
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="0">
								
							</div>
						</div>
					</div>
				</div>

			</div>
			
		</div>
	</section>


	<?php
	$res1 = mysqli_query($conn, "SELECT * FROM product_master WHERE product_status = 'Active' ORDER BY product_id DESC LIMIT 16");

	if (mysqli_num_rows($res1) > 0) {

	?>

		<section class="bg0 p-t-50">
			<div class="container">
				<div class="p-b-10">
					<h3 class="ltext-103 cl5">
						Trending Products
					</h3>
				</div>

				<div class="flex-w flex-sb-m p-b-52"></div>

				<div class="row isotope-grid">
					<?php
					while ($row1 = mysqli_fetch_assoc($res1)) {
					?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="admin/assets/images/products/<?php echo $row1['product_image']; ?>" alt="IMG-PRODUCT">
									<form method="post">
										<input type="hidden" name="product_id" value="<?php echo $row1['product_id']; ?>">
										<input type="hidden" name="product_name" value="<?php echo $row1['product_name']; ?>">
										<input type="hidden" name="product_image" value="<?php echo $row1['product_image']; ?>">
										<input type="hidden" name="product_price" value="<?php echo $row1['product_price']; ?>">
										<button class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" name="add_to_cart">
											Add to Cart <i class="ml-1 zmdi zmdi-shopping-cart"></i>
										</button>
									</form>
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="product-detail.php?source=<?php echo $row1['product_id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $row1['product_name']; ?>
										</a>

										<span class="stext-105 cl3">
											Rs. <?php echo number_format($row1['product_price'], 2); ?>
										</span>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</section>

	<?php } ?>



	<?php

	require_once 'include/footer.php';
	?>


	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>

</html>