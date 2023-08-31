
<header class="navbar">
    <div class="logo">
      <a href="./index.php"><img src="frontend/img/download.jfif" alt="Company Logo" style="width: 90px; height: 100px;">
      </a>
    </div>
    <nav class="navbar-icons">
		<a href="./products.php"><img src="frontend/img/product.png" alt="Products">Products</a>
        <a href="./aboutUs.php"><img src="frontend/img/contact-us.png" alt="Products">ABOUT US</a>
        <a href="./cart.php"><img src="frontend/img/grocery-store.png" alt="Cart">Cart</a>
        <a  class="nav-link p-0 pr-3" data-toggle="dropdown" href="#"><img src="frontend/img/avatar.png" alt="Dashboard">
                                    <?php echo $user_name ?>
                                </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
							<h4 class="h3 mb-0"><strong><?php echo $user_name ?></strong></h4>
							<div class="mb-3"><?php echo $user_email ?></div>
							<div class="dropdown-divider "></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-user-cog mr-2"></i> Settings								
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-lock mr-2"></i> Change Password
							</a>
							<div class="dropdown-divider"></div>
							<a href="logout.php" class="dropdown-item text-danger" id="logout-button">
    						<i class="fas fa-sign-out-alt mr-2"></i> Logout
							</a>
						</div>
    
</nav>
  </header>
