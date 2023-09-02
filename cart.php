<?php

include('login_check.php');
// Add your database connection code here
include('connection.php');

// Remove single items from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

    $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed from the cart!';
    header('location:cart.php');
    exit();
}


// Remove all items at once from cart
if (isset($_GET['clear'])) {
    $stmt = $conn->prepare('DELETE FROM cart');
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All Item removed from the cart!';
    header('location:cart.php');
    exit();
}

// Update quantity and total price of the product in the cart table
if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];

    $tprice = $qty * $pprice;

    $stmt = $conn->prepare('UPDATE cart SET quantity=?, total_price=? WHERE id=?');
    $stmt->bind_param('isi', $qty, $tprice, $pid);
    $stmt->execute();
}


if (isset($_POST['applyCouponButton'])) {
    $couponCode = $_POST['couponCode'];

    // Add SQL query to retrieve the discount based on the provided coupon code
    $couponQuery = "SELECT discount FROM coupons WHERE coupon_name = ?";
    $stmt = $conn->prepare($couponQuery);
    $stmt->bind_param('s', $couponCode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $discount = $row['discount'];

        // Redirect back to the cart page with the discount parameter
        header('location: cart.php?discount=' . $discount);
        exit();
    } else {
        // Display an error message or update the UI as needed
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Coupon not found or invalid.';
        header('location: cart.php');
        exit();
    }
}


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Meta tags and title -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart Page</title>
        <!-- <link rel="stylesheet" href="frontend/style.css"> -->
        <link rel="stylesheet" href="frontend/cart.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">
    
         <!-- bootstrap -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <body>
            <?php 
    include('header.php');
?>

            <main>
                <section class="section-9 pt-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table" id="cart">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        include('connection.php');

                                        $cartSql = "SELECT * FROM cart WHERE user_id = '$user_id'";
                                        $cartResult = $conn->query($cartSql);

                                        if ($cartResult->num_rows > 0) {
                                            $totalAmount = 0;

                                            foreach ($cartResult as $cartItem) {
                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<div class="d-flex align-items-center justify-content-center">';
                                                echo '<img src="'. $cartItem["image_url"] . '" alt="' . $cartItem["product_name"] . '" class="cart-item-image" style="max-width: 80px;">';
                                                echo '<h3>' . $cartItem["product_name"] . '</h3>';
                                                echo '</div>';
                                                echo '</td>';
                                                echo '<td>' . $cartItem["price"] . '</td>';
                                                echo '<td>';
                                                echo '<form action="" method="post">';
                                                echo '<input type="hidden" name="pid" value="' . $cartItem["id"] . '">';
                                                echo '<input type="hidden" name="pprice" value="' . $cartItem["price"] . '">';
                                                echo '<div class="input-group quantity mx-auto" style="width: 100px;">';
                                                echo '<div class="input-group-btn">';
                                                echo '<button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1" data-id="' . $cartItem["id"] . '"><i class="fa fa-minus"></i></button>';
                                                echo '</div>';
                                                echo '<input type="number" class="form-control form-control-sm border-0 text-center quantity-input" value="' . $cartItem["quantity"] . '" data-id="' . $cartItem["id"] . '" name="qty">';
                                                echo '<div class="input-group-btn">';
                                                echo '<button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1" data-id="' . $cartItem["id"] . '"><i class="fa fa-plus"></i></button>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</td>';
                                                echo '<td>' . ($cartItem["price"] * $cartItem["quantity"]) . '</td>';
                                                echo '<td>';
                                                echo '<a href="cart.php?remove=' . $cartItem['id'] . '" class="text-danger lead" onclick="return confirm(\'Are you sure you want to remove this item?\');"><i class="fas fa-trash-alt"></i></a>';
                                                echo '</td>';
                                                echo '</form>'; // Close the form
                                                echo '</tr>';
                                                $totalAmount += $cartItem["price"] * $cartItem["quantity"];
                                            }
                                        } else {
                                            echo '<tr><td colspan="5">Your cart is empty.</td></tr>';
                                            $totalAmount=0;
                                        }
                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card cart-summary">
                                    <div class="sub-title">
                                        <h2 class="bg-white">Cart Summary</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between pb-2">
                                            <div>Subtotal</div>
                                            <div>
                                                <?php echo $totalAmount; ?>
                                            tk
                                        </div>
                                        </div>
                                        <div class="d-flex justify-content-between pb-2">
                                            <?php
                                        $discount = 0;
                                        $temp=0 ;// Default discount is 0
                                        // Check if the "discount" parameter is present in the URL
                                        if (isset($_GET['discount'])) {
                                            $temp = floatval($_GET['discount']);
                                        }
                                        $discount=$totalAmount *($temp/100);
                                        ?>
                                        <div>Discount <?php
                                        if($temp!=0){
                                            echo $temp ."%";
                                        } ?></div>
                                        <div>
                                           - <?php echo $discount; ?> tk
                                        </div>
                                    </div>

                                        <div class="d-flex justify-content-between pb-2">
                                            <div>Shipping</div>
                                            <div>40 tk</div>
                                        </div>

                                        <div class="d-flex justify-content-between summery-end">
                                            <div>Total</div>
                                            <div>
                                            <?php echo $totalAmount=($totalAmount + 40 - $discount); ?>
                                                tk
                                            </div>
                                        </div>
                                        <div class="pt-5">
                                            <a <a href="checkout.php?totalAmount=<?php echo $totalAmount; ?>" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group apply-coupon text text-center">
                                    <form method="post" action="cart.php"> <!-- Create a separate PHP file for processing the coupon -->
                                        <input type="text" placeholder="Coupon code" class="form-control d-inline" name="couponCode">
                                        <button class="btn btn-dark m-3" type="submit" name="applyCouponButton">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br><br><br><br><br><br><br>
                    </div>
                </section>
            </main>
            <?php
    include('footer.php');
    $conn->close();
?>

                <!-- ./wrapper -->
                <!-- jQuery -->

                <script>
                    document.getElementById('logout-button').addEventListener('click', function() {
                        // Redirect to the logout page
                        window.location.href = 'logout.php'; // Change 'logout.php' to the actual path of your logout script
                    });
                </script>
                <script>

                    document.addEventListener('DOMContentLoaded', function() {
                        const minusButtons = document.querySelectorAll('.btn-minus');
                        const plusButtons = document.querySelectorAll('.btn-plus');
                        const quantityInputs = document.querySelectorAll('.quantity-input');
                        const removeButtons = document.querySelectorAll('.btn-remove');

                        minusButtons.forEach(button => {
                            button.addEventListener('click', function() {
                                const id = this.getAttribute('data-id');
                                const input = document.querySelector(`.quantity-input[data-id="${id}"]`);
                                if (input) {
                                    let value = parseInt(input.value);
                                    if (value > 1) {
                                        value--;
                                        input.value = value;
                                    }
                                }
                            });
                        });

                        plusButtons.forEach(button => {
                            button.addEventListener('click', function() {
                                const id = this.getAttribute('data-id');
                                const input = document.querySelector(`.quantity-input[data-id="${id}"]`);
                                if (input) {
                                    let value = parseInt(input.value);
                                    value++;
                                    input.value = value;
                                }
                            });
                        });

                    });
          </script>

        </body>

    </html>