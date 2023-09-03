<?php
include('login_check.php');
?>.

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AQUA DROPS :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="frontend/css/adminlte.min.css">
		<link rel="stylesheet" href="frontend/css/custom.css">
        		 <!-- bootstrap -->
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Right navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
					  	<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>					
				</ul>
				<div class="navbar-nav pl-2">
					<!-- <ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item active">Dashboard</li>
					</ol> -->
				</div>
				
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
							<img src="frontend/img/avatar5.png" class='img-circle elevation-2' width="40" height="40" alt="">
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
							<h4 class="h4 mb-0"><strong><?php echo $user_name; ?></strong></h4>
							<div class="mb-3"><?php echo $user_email;  ?></div>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-user-cog mr-2"></i> Settings								
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-lock mr-2"></i> Change Password
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item text-danger" id="logout-button">
    						<i class="fas fa-sign-out-alt mr-2"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="#" class="brand-link">
					<img src="frontend/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">AQUA DROPS</span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user (optional) -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
							<li class="nav-item">
								<a href="adminLogin.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p> Admin Dashboard</p>
								</a>																
							</li>
							<li class="nav-item">
								<a href="categories.html" class="nav-link">
									<i class="nav-icon fas fa-file-alt"></i>
									<p>Category</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="subcategory.html" class="nav-link">
									<i class="nav-icon fas fa-file-alt"></i>
									<p>Sub Category</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="brands.html" class="nav-link">
									<svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
									  </svg>
									<p>Brands</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="./add_product.php" class="nav-link">
									<i class="nav-icon fas fa-tag"></i>
									<p>Add Products</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="#" class="nav-link">
									<!-- <i class="nav-icon fas fa-tag"></i> -->
									<i class="fas fa-truck nav-icon"></i>
									<p>Shipping</p>
								</a>
							</li>							
							<li class="nav-item">
								<a href="order_control.php" class="nav-link">
									<i class="nav-icon fas fa-shopping-bag"></i>
									<p>Orders</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="./discount_coupon.php" class="nav-link">
									<i class="nav-icon  fa fa-percent" aria-hidden="true"></i>
									<p>Discount_coupons</p>
								</a>
							</li>
                            <li class="nav-item">
								<a href="products_discount.php" class="nav-link">
									<i class="nav-icon  fa fa-percent" aria-hidden="true"></i>
									<p>Discounts</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="users.html" class="nav-link">
									<i class="nav-icon  fas fa-users"></i>
									<p>Users</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages.html" class="nav-link">
									<i class="nav-icon  far fa-file-alt"></i>
									<p>Pages</p>
								</a>
							</li>							
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
         	</aside>






			
			<!-- Content Wrapper. Contains page content -->
			<!-- Main content -->
<section class="content">
	<section class="content-header">					
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								
							</div>
							
						</div>
					</div>

      <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3 mt-2">
                        <label for="productType" class="form-label">Product Type</label>
                        <select class="form-select" id="productType" name="productType">
                            <option value="all">ALL</option>
                            <option value="Marchents">Marchents</option>
                            <option value="Soft Drinks">Soft Drinks</option>
                            <option value="Water Bottles">Water Bottles</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="discountPercentage" class="form-label">Discount Percentage</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="discountPercentage" name="discountPercentage" min="0" max="100" value="0">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="applyDiscount">Apply Discount</button>
                </form>
            </div>
        </div>
    </div>


    <div class="container mt-5">
		<section>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Product Data</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Product Type</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            include('connection.php');

                            // Handle form submission
                            if (isset($_POST['applyDiscount'])) {
                                $productType = $_POST['productType'];
                                $discountPercentage = $_POST['discountPercentage'];

                                if($productType=='all'){

                                    $discount=1-($discountPercentage/100);

                                // Update discount prices in the database based on your logic
                                // For this example, we'll just update the discount_price column with the same value as price
                                $sql = "UPDATE products SET discount_price = price * '$discount' ";
                                $conn->query($sql);

                                }

                              
                                $discount=1-($discountPercentage/100);

                                // Update discount prices in the database based on your logic
                                // For this example, we'll just update the discount_price column with the same value as price
                                $sql = "UPDATE products SET discount_price = price * '$discount' WHERE product_type = '$productType'";
                                $conn->query($sql);
                            }

                            // Fetch and display data from the database
                            $sql = "SELECT * FROM products";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['id'] . '</td>';
                                    echo '<td>' . $row['product_name'] . '</td>';
                                    echo '<td>' . $row['description'] . '</td>';
                                    echo '<td>' . $row['product_type'] . '</td>';
                                    echo '<td>' . $row['price'] . '</td>';
                                    echo '<td>' . $row['discount_price'] . '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="6">No products found</td></tr>';
                            }

                            // Close the database connection
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
		</section>
   
	</div>
				
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		
		<strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
	</footer>
		</div>
			
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="frontend/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="frontend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="frontend/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="frontend/js/demo.js"></script>
		<script>
document.getElementById('logout-button').addEventListener('click', function() {
    // Redirect to the logout page
    window.location.href = 'logout.php'; // Change 'logout.php' to the actual path of your logout script
});
</script>

	</body>
</html>