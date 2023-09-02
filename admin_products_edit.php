<?php
include('login_check.php');

// Database configuration
include('connection.php');

// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
    $productId = intval($_GET['id']);

    // Query to retrieve product details by ID
    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $product = $result->fetch_assoc();

        // Check if the form is submitted to update the product
        if (isset($_POST['update_product'])) {
            $newProductName = $_POST['product_name'];
            $newDescription = $_POST['description'];
            $newPrice = $_POST['price'];
            $newQuantity = $_POST['quantity'];

            // Validate and update the product details in the database
            // You can add more validation here as needed
            if (!empty($newProductName) && !empty($newDescription) && is_numeric($newPrice) && is_numeric($newQuantity)) {
                // SQL query to update the product details
                $updateSql = "UPDATE products SET
                              product_name = '$newProductName',
                              description = '$newDescription',
                              price = $newPrice,
                              quantity = $newQuantity
                              WHERE id = $productId";

                if ($conn->query($updateSql) === TRUE) {
                    echo "<div class='alert alert-success'>Product updated successfully.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error updating product: " . $conn->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Invalid input. Please check the values.</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Product not found.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Product ID not provided in the URL.</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Add your CSS links here if needed -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>

        
        <form method="POST" action="">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $product['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update_product">Update Product</button>
        </form>
        <br>
        <a href="products_show_by_category.php" class="btn btn-secondary mb-3">Go Back</a>
    </div>

    <!-- Add your Bootstrap JS and jQuery links here if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
