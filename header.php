<header class="navbar"style=" background-color: rgb(19, 182, 151);">
    <div class="logo">
        <a href="./index.php">
            <img src="frontend/img/download.jfif" alt="Company Logo" style="height: 100px;">
        </a>
    </div>
    <nav class="navbar-icons d-flex align-items-center row">
        <a href="./products.php" class="nav-link d-flex align-items-center text-dark col-3">
            <img src="frontend/img/product.png" alt="Products" class="mr-1" style="max-height: 40px;">
            Products
        </a>
        <a href="./aboutUs.php" class="nav-link d-flex align-items-center text-dark col-3">
            <img src="frontend/img/contact-us.png" alt="About Us" class="mr-1" style="max-height: 40px;">
            ABOUT US
        </a>
		<?php if ($userLoggedIn) : ?>
        <a href="./cart.php" class="nav-link d-flex align-items-center text-dark col-2">
            <img src="frontend/img/grocery-store.png" alt="Cart" class="mr-1" style="max-height: 40px;">
            Cart
        </a>
        <div class="dropdown nav-link p-0 pr-3">
            <a class="dropdown-toggle d-flex align-items-center text-dark col-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="frontend/img/avatar.png" alt="Dashboard" class="mr-1" style="max-height: 40px;">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                <h4 class="h3 mb-0"><strong><?php echo $user_name ?></strong></h4>
                <div class="mb-3"><?php echo $user_email ?></div>
                <div class="dropdown-divider"></div>
                <a href="user_order_page.php" class="dropdown-item">
                    <i class="fa fa-list" aria-hidden="true"></i> Orders
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user-cog mr-2"></i> Settings
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-lock mr-2"></i> Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item text-danger" id="logout-button">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
				<?php else : ?>
				<a href="login.php" class="nav-link d-flex align-items-center text-dark col-3"><img src="frontend/img/avatar.png" alt="Login"class="mr-1" style="max-height: 40px;">LogIn</a>
			<?php endif; ?>
            </div>
        </div>
    </nav>
</header>