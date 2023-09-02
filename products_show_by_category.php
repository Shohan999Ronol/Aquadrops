<?php
include('login_check.php');

// Database configuration
include('connection.php');

// Check if a form is submitted to delete products by quantity
if (isset($_POST['delete_quantity']) && isset($_POST['product_id'])) {
    $deleteQuantity = intval($_POST['delete_quantity']);
    $productId = intval($_POST['product_id']);

    // Query to retrieve the current quantity of the product
    $currentQuantityQuery = "SELECT quantity FROM products WHERE id = $productId";
    $currentQuantityResult = $conn->query($currentQuantityQuery);

    if ($currentQuantityResult->num_rows > 0) {
        $row = $currentQuantityResult->fetch_assoc();
        $currentQuantity = intval($row['quantity']);

        if ($deleteQuantity <= $currentQuantity) {
            // Calculate the new quantity after deletion
            $newQuantity = $currentQuantity - $deleteQuantity;

            // Execute a SQL query to update the quantity of the product in the database
            $updateQuery = "UPDATE products SET quantity = $newQuantity WHERE id = $productId";

            if ($conn->query($updateQuery) === TRUE) {
                echo "<div class='alert alert-success'>$deleteQuantity products deleted successfully. Remaining quantity: $newQuantity.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error updating quantity: " . $conn->error . "</div>";
            }

            // Redirect to the same page to avoid resubmission on refresh
            header("Location: ".$_SERVER['REQUEST_URI']);
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error: Cannot delete more than the available quantity.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style for product type title */
        h2 {
            font-size: 24px;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        /* Style for product table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        /* Style for table headers */
        th {
            background-color: #f2f2f2;
        }

        /* Style for table cells */
        td, th {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        /* Style for product images */
        .product-img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
    <!-- Add the Bootstrap CSS and JavaScript links here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        

        <?php
        // Query to retrieve distinct product types
        $sql = "SELECT DISTINCT product_type FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productType = $row['product_type'];

                // Output the product type as a table title
                echo "<h2>$productType</h2>";

                // Query to retrieve products of the current product type
                $productTypeSql = "SELECT id, product_name, price, description, image_url, quantity FROM products WHERE product_type = '$productType'";
                $productTypeResult = $conn->query($productTypeSql);

                if ($productTypeResult->num_rows > 0) {
                    // Output the table header with Quantity, Edit, and Delete columns
                    echo "<table>";
                    echo "<tr><th>Image</th><th>Product Name</th><th>Description</th><th>Price</th><th>Quantity</th><th>Edit</th><th>Delete Quantity</th><th>Action</th></tr>";

                    while ($productRow = $productTypeResult->fetch_assoc()) {
                        // Output each product as a table row with options to edit and delete
                        echo "<tr>";
                        echo "<td><img src='" . $productRow['image_url'] . "' alt='" . $productRow['product_name'] . "' class='product-img'></td>";
                        echo "<td>" . $productRow['product_name'] . "</td>";
                        echo "<td>" . $productRow['description'] . "</td>";
                        echo "<td>" . $productRow['price'] . "Taka</td>";
                        echo "<td>" . $productRow['quantity'] . "</td>";
                        echo "<td><a href='admin_products_edit.php?id=" . $productRow['id'] . "' class='btn btn-primary'>Edit</a></td>";

                        echo "<td>";
                        echo "<form method='post' action=''>";
                        echo "<input type='hidden' name='product_id' value='" . $productRow['id'] . "'>";
                        echo "<select name='delete_quantity'>";
                        for ($i = 1; $i <= $productRow['quantity']; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        echo "</select>";
                        echo "</td>";
                        echo "<td>";
                        echo "<button type='submit' class='btn btn-danger'>Delete</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    // Close the table
                    echo "</table>";
                } else {
                    echo "No products found for $productType.";
                }
            }
        } else {
            echo "No product types found.";
        }
        ?>

    </div>
</body>
</html>
