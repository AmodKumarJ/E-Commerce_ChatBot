<?php
    session_start();
    
    require_once 'include/keywords.php';
    require_once 'include/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Settings - <?php echo $site;?></title>
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
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/sweetalert/sweetalert.min.js"></script>
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

							<li class="label1" data-label1="hot">
								<a>Products</a>
                                <ul class="sub-menu">
									<li><a href="frames.php">Frames</a></li>
									<li><a href="crafts.php">Crafts</a></li>
                                    <li><a href="other.php">Others</a></li>
								</ul>
							</li>
							<?php
								if(!empty($_SESSION['isLogin'])){
									echo "<li class='active-menu'>
									<a href='profile.php'>Accounts</a>
									<ul class='sub-menu'>
										<li><a href='orders.php'>Orders</a></li>
										<li><a href='profile.php'>Profile</a></li>
										<li><a href='settings.php'>Settings</a></li>
                                        <li><a href='gallery.php'>Gallery</a></li>
										<li><a href='include/logout.php'>Logout</a></li>
									</ul>
								</li>";
								} else{
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
			Gallery
		</h2>
	</section>	

    <?php
                 
				 
		$user_id = 0;

		if(!empty($_SESSION['user_id'])){
			$user_id = $_SESSION['user_id'];
		}

        if(isset($_POST['update'])){

            $path_banner = time() . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            if (move_uploaded_file($_FILES['image']['tmp_name'], "admin/assets/images/user-image/" . $path_banner)) {
            
                if(mysqli_query($conn, "INSERT INTO user_gallery(image, date_create, user_id) 
                    VALUES ('$path_banner', NOW(), '$user_id')")){
    
                    echo '<script>swal("Yay", "Image added successfully !", "success");</script>';      
                }
                else{
    
                    echo '<script>swal("Oops", "Unable to process your request !", "error");</script>';       
                }
            } else {
    
                echo '<script>swal("Oops", "Unable to process your request !", "error");</script>';       
            }                                                 
    
        }

        if(isset($_POST['delete'])){

            if (mysqli_query($conn, "DELETE FROM user_gallery WHERE gallery_id = '$_POST[did]'")){  
   
                echo '<script>swal("Yay", "Image deleted successfully !", "success");</script>';     
            } else {
        
                echo '<script>swal("Oops", "Unable to process your request !", "error");</script>'; 
            }
        }

    ?>


	<!-- Content page -->
	<section class="bg0 p-t-75">
		<div class="container">
		<?php if(!empty($_SESSION['isLogin'])){ ?>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10 d-flex align-items-center">
                    <div class="card-body text-black">
                        <form method="POST" class="row" enctype="multipart/form-data">
                        <div class="form-outline mb-4 col-lg-6">
                            <label class="form-label">Full Name</label>
                            <input type="file" class="form-control form-control-lg" name="image" required accept="image/*"/>
                        </div>

                        <div class="form-outline mb-4 col-lg-6"><label class="form-label">&nbsp;</label>
                            <button class="btn btn-dark btn-lg btn-block" type="submit" name="update">Submit</button>
                        </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <div class="row">
                <?php

                    $res = mysqli_query($conn, "SELECT * FROM user_gallery WHERE user_id = '$user_id'");

                    if(mysqli_num_rows($res)>0){

                        while($row = mysqli_fetch_assoc($res)){

                            ?>
                                <div class="col-lg-2 pe-3 pb-4" style="position:relative">
                                    <img src="admin/assets/images/user-image/<?php echo $row['image'];?>" class="w-100" width="140" height="140"/>
                                    <form method="POST" style="position: absolute;top: 8px;right: 16px;">
                                        <input type="hidden" name="did" value="<?php echo $row['gallery_id'];?>"/>
                                        <button  style="font-size:19px;margin:6px" name="delete" type="submit"><i style="color: #0d6efd;" class="fa fa-trash text-danger"></i></button>
                                    </form>
                                </div>

                            <?php
                        }
                    }
                ?>
            </div>
			<?php } else{ echo '<script>swal("Oops", "Kindly login to proceed !", "error").then(function() {
					window.location = "login.php";
				});</script>';} ?>
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
		require_once 'include/chat.php';
	?>
</body>
</html>