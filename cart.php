<?php

include('login_check.php');

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Meta tags and title -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart Page</title>
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
                                                echo '<img src="'. $cartItem["image_url"] . '" alt="' . $cartItem["product_name"] . '" class="cart-item-image" style="max-width: 800px;">';
                                                echo '<h3>' . $cartItem["product_name"] . '</h3>';
                                                echo '</div>';
                                                echo '</td>';
                                                echo '<td>' . $cartItem["price"] . '</td>';
                                                echo '<td>';
                                                echo '<div class="input-group quantity mx-auto" style="width: 100px;">';
                                                echo '<div class="input-group-btn">';
                                                echo '<button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1" data-id="' . $cartItem["id"] . '"><i class="fa fa-minus"></i></button>';
                                                echo '</div>';
                                                echo '<input type="number" class="form-control form-control-sm border-0 text-center quantity-input" value="' . $cartItem["quantity"] . '" data-id="' . $cartItem["id"] . '">';
                                                echo '<div class="input-group-btn">';
                                                echo '<button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1" data-id="' . $cartItem["id"] . '"><i class="fa fa-plus"></i></button>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</td>';
                                                echo '<td>' . ($cartItem["price"] * $cartItem["quantity"]) . '</td>';
                                                echo '<td>';
                                                echo '<button class="btn btn-sm btn-danger btn-remove" data-id="' . $cartItem["id"] . '"><i class="fa fa-times"></i></button>';
                                                echo '</td>';
                                                echo '</tr>';
                                                $totalAmount += $cartItem["price"] * $cartItem["quantity"];
                                            }
                                        } else {
                                            echo '<tr><td colspan="5">Your cart is empty.</td></tr>';
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
                                            <div>$
                                                <?php echo $totalAmount; ?>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between pb-2">
                                            <div>Shipping</div>
                                            <div>$20</div>
                                        </div>
                                        <div class="d-flex justify-content-between summery-end">
                                            <div>Total</div>
                                            <div>$
                                                <?php echo $totalAmount + 20; ?>
                                            </div>
                                        </div>
                                        <div class="pt-5">
                                            <a href="checkout.php" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group apply-coupon mt-4">
                                    <input type="text" placeholder="Coupon Code" class="form-control">
                                    <button class="btn btn-dark" type="button" id="button-addon2">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <?php
    include('footer.php');
?>

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

                        removeButtons.forEach(button => {
                            button.addEventListener('click', function() {
                                const id = this.getAttribute('data-id');
                                // Implement AJAX or similar to remove the item from the cart
                                // After successful removal, you might want to update the cart contents
                            });
                        });
                    });

                        document.addEventListener('DOMContentLoaded', function() {
                            // ... (previous JavaScript code)
                        
                            quantityInputs.forEach(input => {
                                input.addEventListener('change', function() {
                                    const id = this.getAttribute('data-id');
                                    const price = parseFloat(document.querySelector(`td[data-price-id="${id}"]`).innerText);
                                    const newQuantity = parseInt(this.value);
                                    const newTotal = price * newQuantity;
                                    const totalCell = document.querySelector(`td[data-total-id="${id}"]`);
                                    totalCell.innerText = newTotal.toFixed(2);
                        
                                    // Recalculate the totalAmount
                                    totalAmount = 0;
                                    document.querySelectorAll('.quantity-input').forEach(input => {
                                        const itemPrice = parseFloat(document.querySelector(`td[data-price-id="${input.getAttribute('data-id')}"]`).innerText);
                                        totalAmount += itemPrice * parseInt(input.value);
                                    });
                        
                                    document.querySelector('#subtotal-amount').innerText = totalAmount.toFixed(2);
                                    document.querySelector('#total-amount').innerText = (totalAmount + 20).toFixed(2);
                                });
                            });
                        
                            // ... (rest of the JavaScript code)
                        });
                        
                </script>



        </body>

    </html>