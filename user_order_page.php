<?php
// Include your session handling code or login check here if required
include('login_check.php');

// Include your database connection code here
include('connection.php');

// Fetch user orders based on user_id (you may need to replace '5' with the actual user_id)
$sql = "SELECT * FROM orders WHERE user_id = $user_id";
$result = $conn->query($sql);

// Check if there are any orders for the user
if ($result->num_rows > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Order Tracking</title>
        <!-- Add Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
           <!-- Font Awesome -->
           <link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">
        <style>
            /* Custom styling for the progress bar */

            .progress-bar-line {
                height: 2px;
                width: 100%;
                background-color: #ddd;
                position: relative;
                top: -10px;
            }

            /* Add this class to the progress bar container div */
            .custom-progress-bar {
                position: absolute;
                height: 100%;
                border-radius: 5px;
                background-color: #007BFF;
                transition: width 0.3s ease-in-out;
            }

            .custom-progress {
                margin-top: 30px;
                padding: 20px;
                background-color: #f5f5f5;
                border-radius: 5px;
            }
            .progress-label {
                color: black;
                font-weight: 600;
            }
            .progress-track {
                display: flex;
                justify-content: space-between;
                margin-top: 10px;
            }
            .step {
                flex-grow: 1;
                padding: 5px;
                text-align: center;
                font-size: 14px;
                font-weight: 500;
                color: rgb(160, 159, 159);
                position: relative;
            }
            .step.active {
                color: black;
            }
            .step.active:before {
                background: rgb(252, 103, 49);
                color: white;
            }
            .step:before {
                content: "";
                width: 15px;
                height: 15px;
                background: #ddd;
                border-radius: 50%;
                display: block;
                margin: 0 auto 5px auto;
            }
        </style>
    </head>
    <body>
    <?php
         include('header.php');
        ?>


        <div class="container">
            <h1 class="mt-5">Your Orders</h1>
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card mb-3">
                    <div class="card-body ">
                        <h5 class="card-title">Order ID: <?php echo $row['id']; ?></h5>
                        <h6 class="card-text">Order Date: <?php echo date('l, d-m-Y', strtotime($row['order_date'])); ?></h6>
                        <h6 class="card-text text-danger"> Total Amount: <?php echo $row['total_amount']; ?> tk</h6>
                         <!-- Display the product list for this order -->
                         <div>
                            <h6>Product List:</h6>
                            <?php
                            // Decode the JSON string into an array
                            $productList = json_decode($row['product_list'], true);

                            // Iterate through the products and display them
                            foreach ($productList as $product) {
                                echo "* " .$product['product_name'] . " - " . $product['quantity'] . "x <br>";
                            }
                            ?>
                        </div>
                        
                        <!-- Create a custom progress bar based on the order status -->
                        <div class="custom-progress">
                            <div class="progress-label">Tracking Order</div>
                            <div class="progress-track">
                                <div class="step <?php if ($row['status'] == 'Ordered') echo 'active'; ?>">Ordered</div>
                                <div class="step <?php if ($row['status'] == 'Shipped') echo 'active'; ?>">Shipped</div>
                                <div class="step <?php if ($row['status'] == 'On the Way') echo 'active'; ?>">On the Way</div>
                                <div class="step <?php if ($row['status'] == 'Delivered') echo 'active'; ?>">Delivered</div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <?php
            }
            ?>
        </div>
        <?php include('footer.php');
        ?>
    </body>
    </html>
    <?php
} else {
    echo "You have no orders yet.";
}

// Close the database connection
$conn->close();
?>
