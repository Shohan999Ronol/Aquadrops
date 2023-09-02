<?php
include('login_check.php');

include('connection.php');
if (isset($_GET['totalAmount'])) {
    $totalAmount = $_GET['totalAmount'];
} else {
    // Handle the case where the parameter is not set
    $totalAmount = 0; // Set a default value or perform error handling
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNo = $_POST['contact_no'];
    $address = $_POST['address'];
    $paymentMethod = $_POST['payment_method'];
    $totalamount= $_POST['total_amount'];
    

    // Get the product list from the cart
    $productList = array();
    $cartSql = "SELECT * FROM cart WHERE user_id = '$userId'";
    $cartResult = $conn->query($cartSql);
    foreach ($cartResult as $cartItem) {
        $productList[] = array(
            'product_name' => $cartItem['product_name'],
            'quantity' => $cartItem['quantity']
        );
    }

    // Insert user information and product list into the database
    $insertQuery = "INSERT INTO orders (user_id, name, email, contact_no, address, payment_method, product_list,total_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("isssssss", $userId, $name, $email, $contactNo, $address, $paymentMethod, json_encode($productList),$totalamount);
    if ($stmt->execute()) {
        // Clear the cart after successful order
        $deleteCartQuery = "DELETE FROM cart WHERE user_id = ?";
        $stmt = $conn->prepare($deleteCartQuery);
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Order placed successfully!';
        header('Location: cart.php');
        exit();
    } else {
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Failed to place order. Please try again.';
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Your head content goes here -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Check Out</title>
        <link rel="stylesheet" href="frontend/style.css">
        <link rel="stylesheet" href="frontend/cart.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="frontend/css/adminlte.min.css">
        <link rel="stylesheet" href="frontend/css/custom.css">
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            li {
                marker: none;
            }
        </style>
    </head>

    <body>
        <?php include('header.php'); ?>

        <main>
            <section class="section-10 pt-4 md-6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto ">
                            <div class="card checkout-card">
                                <div class="card-header">
                                    <h3>Checkout</h3>
                                </div>
                                <div class="card-body">
                                    <!-- <?php if (isset($_SESSION['showAlert']) && $_SESSION['showAlert'] === 'block'): ?>
                                    <div class="alert alert-success">
                                        <?php echo $_SESSION['message']; ?>
                                    </div>
                                    <?php unset($_SESSION['showAlert']); ?>
                                <?php endif; ?> -->
                                    <div class="cartitems justify text-center mx-auto">
                                        <h4>Your Cart Items:</h4>
                                        <ul class="list-unstyled">
                                            <?php
                                    $userId = $_SESSION['user_id'];
                                    $cartSql = "SELECT * FROM cart WHERE user_id = '$userId'";
                                    $cartResult = $conn->query($cartSql);
                                    foreach ($cartResult as $cartItem) {
                                        echo '<li>' . $cartItem['product_name'] . ' - ' . $cartItem['quantity'] . ' pcs</li>';
                                    }
                                    ?>
                                        </ul>
                                        <!-- Use the $totalAmount value in your checkout page -->
                                    <div><strong class="text-danger">Total Amount: <?php echo $totalAmount;?> tk</strong></div>
                                    </div>
                                    <form action="checkout.php" method="post">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="contact_no" class="form-label">Contact Number</label>
                                            <input type="tel" class="form-control" id="contact_no" name="contact_no" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="payment_method" class="form-label">Payment Method</label>
                                            <select class="form-control" id="payment_method" name="payment_method" required>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                            <option value="Credit Card">Credit Card</option>
                                            <option value="Bkash">BKash</option>
                                        </select>
                                        </div>
                                        <input type="hidden" name="total_amount" value="<?php echo $totalAmount;?>">
                                        <button type="submit" class="btn btn-dark btn-block">Place Order</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php include('footer.php'); 
        
        $conn->close();
        ?>
        
        <!-- Your script includes go here -->
    </body>

    </html>