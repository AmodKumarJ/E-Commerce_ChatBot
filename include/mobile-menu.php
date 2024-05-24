<!-- Menu Mobile -->
		<div class="menu-mobile">

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>
				</li>

				<li>
					<a href="" class="label1 rs1" data-label1="new">Products</a>
					<ul class="sub-menu-m">
                        <li><a href="frames.php">Frames</a></li>
                        <li><a href="crafts.php">Crafts</a></li>
                        <li><a href="other.php">Others</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>
				<?php
					if(!empty($_SESSION['isLogin'])){
						echo "<li>
						<a href='profile.php'>Accounts</a>
						<ul class='sub-menu-m'>
							<li><a href='orders.php'>Orders</a></li>
							<li><a href='profile.php'>Profile</a></li>
							<li><a href='settings.php'>Settings</a></li>
							<li><a href='include/logout.php'>Logout</a></li>
						</ul>
						<span class='arrow-main-menu-m'>
							<i class='fa fa-angle-right' aria-hidden='true'></i>
						</span>
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