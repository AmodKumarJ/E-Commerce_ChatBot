<?php
    session_start();
    
    require_once 'include/keywords.php';
    require_once 'include/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us - <?php echo $site;?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon-32x32.png"/>
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
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
        <?php require_once 'include/top-bar.php';?>

            <div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
                    <?php require_once 'include/desktop-logo.php';?>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>
							<li  class="label1" data-label1="new">
								<a href="">Ask Me Anything</a>
							</li>
							<?php
								if(!empty($_SESSION['isLogin'])){
									echo "<li>
									<a href='profile.php'>Accounts</a>
									<ul class='sub-menu'>
										<li><a href='orders.php'>Orders</a></li>
										<li><a href='profile.php'>Profile</a></li>
										<li><a href='settings.php'>Settings</a></li>
										<li><a href='include/logout.php'>Logout</a></li>
									</ul>
								</li>";
								} else{
									echo "<li>
										<a href='login.php'>Login</a>
									</li>";
								}
                            ?>

							<li class="active-menu">
								<a href="about.php">About Us</a>
							</li>

							<li>
								<a href="contact.php">Contact Us</a>
							</li>
						</ul>
					</div>
                    <?php require_once 'include/cart-search.php';?>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			
            <?php require_once 'include/mobile-logo.php';?>
			<?php require_once 'include/cart-search-mobile.php';?>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		

		<?php 
            require_once 'include/mobile-menu.php'; 
            require_once 'include/search-modal.php'; 
        ?>
	</header>
    
    <?php require_once 'include/cart.php';?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/slider/1.jfif');">
		<h2 class="ltext-105 cl0 txt-center" style="backdrop-filter: blur(5px);">
			About Us
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-75">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
                      ads
						</h3>

						<p class="stext-113 cl6 p-b-26">
                        easz
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-2 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/profile/1.jfif" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
		
	
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
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<?php
		
	?>
</body>
</html>