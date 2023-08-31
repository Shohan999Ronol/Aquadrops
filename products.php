<?php
 include('login_check.php');

// Initialize the cart in the session if not already done
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding items to the cart
if (isset($_POST['add_to_cart'])) {
    $productName = $_POST['product_name'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    include('connection.php');

    // Insert the product into the cart table using prepared statement
    $insertQuery = "INSERT INTO cart (user_id, product_name, price, image_url) VALUES (?, ?, ?, ?)";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("isss", $_SESSION['user_id'], $productName, $price, $image_url);
    
    if ($stmt->execute()) {
        // Product added successfully, show a success message
        $message = "Product added to cart!";
    } else {
        // Error occurred while adding the product, show an error message
        $message = "Error adding product to cart.";
    }

    $stmt->close();
    $conn->close();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
        
        <!-- Meta tags and title -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        
        <title>Products</title>
    <style>
        
        /* Add this CSS to your existing style.css or in a <style> tag in your HTML */
        .product-listing {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Three columns */
            gap: 20px; /* Gap between products */
            padding: 20px;
        }

        .product {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php 
    include('header.php');
?>



<section class="product-section">
        <?php
        // Database configuration
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = 'watersupplyphp';

        // Create a database connection
        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch product types from the database
        $sql = "SELECT DISTINCT product_type FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productType = $row["product_type"];
                echo '<div class="product-category">';
                echo '<h2>' . $productType . '</h2>';

                // Fetch products of the current type
                $productsSql = "SELECT * FROM products WHERE product_type = '$productType'";
                $productsResult = $conn->query($productsSql);

                if ($productsResult->num_rows > 0) {
                    echo '<section class="product-listing">';
                    while ($product = $productsResult->fetch_assoc()) {
                        echo '<div class="product">';
                        echo '<img src="' . $product["image_url"] . '" alt="' . $product["product_name"] . '">';
                        echo '<h3>' . $product["product_name"] . '</h3>';
                        echo '<p>' . $product["description"] . '</p>';
                        echo '<span>' . $product["price"] . ' Taka</span>';
                        
                        // Add the "Add to Cart" button within a form
                        echo '<form method="post">';
                        echo '<input type="hidden" name="product_name" value="' . $product["product_name"] . '">';
                        echo '<input type="hidden" name="price" value="' . $product["price"] . '">';
                        echo '<input type="hidden" name="image_url" value="'.$product["image_url"].'">';
                        echo '<button class="add-to-cart" type="submit" name="add_to_cart">Add to Cart</button>';
                        echo '</form>';
                        
                        echo '</div>';
                    }
                    echo '</section>';
                }

                echo '</div>';
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </section>
<?php 
    include('footer.php');
    ?>

</body>
</html>
