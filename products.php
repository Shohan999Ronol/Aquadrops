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

    // Check if the product is already in the cart
    $selectQuery = "SELECT * FROM cart WHERE user_id = ? AND product_name = ?";
    $stmt = $conn->prepare($selectQuery);
    $stmt->bind_param("is", $_SESSION['user_id'], $productName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Product is already in the cart, show a message
        $message = "Product is already in the cart.";
    } else {
        // Product is not in the cart, so insert it
        $insertQuery = "INSERT INTO cart (user_id, product_name, price, image_url) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("isss", $_SESSION['user_id'], $productName, $price, $image_url);

        if ($stmt->execute()) {
            // Product added successfully, show a success message
            $message = "Product added to cart!";
        } else {
            // Error occurred while adding the product, show an error message
            $message = "Error adding product to cart.";
        }
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
            .fade-out {
                    opacity: 0;
                    transition: opacity 1s ease; /* Adjust the transition duration as needed */
                }
        </style>
        
</head>
<body>

<?php 
    include('header.php');
?>

<section class="product-section">
<?php
    if (isset($message)) {
        echo '<div id="success-message" class="alert alert-success" role="alert">' . $message . '</div>';
    } 
    ?>
    <div class="container">
        <?php
        include('connection.php');
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
                    echo '<div class="row">';
                    while ($product = $productsResult->fetch_assoc()) {
                        echo '<div class="col-md-4">';
                        echo '<div class="card mb-4 text-center">';

                        // Add the img-fluid class to make the image responsive
                        echo '<img src="' . $product["image_url"] . '" alt="' . $product["product_name"] . '" class="card-img-top img-fluid mx-auto" style="height: 250px; max-width: 180px;">';

                        echo '<div class="card-body d-flex flex-column align-items-center">';
                        // Apply text-center class to center-align the entire content
                        echo '<h5 class="card-title"><strong>' . $product["product_name"] . '</strong></h5>';
                        echo '<p class="card-text">' . $product["description"] . '</p>';
                        echo '<p class="card-text"  style="text-decoration: line-through; color: blue ">' . $product["price"] . ' Taka</p>';
                        echo '<p class="card-text text-danger">' . $product["discount_price"] . ' Taka</p>';

                        // Add the "Add to Cart" button within a form
                        echo '<form method="post">';
                        echo '<input type="hidden" name="product_name" value="' . $product["product_name"] . '">';
                        echo '<input type="hidden" name="price" value="' . $product["discount_price"] . '">';
                        echo '<input type="hidden" name="image_url" value="'.$product["image_url"].'">';
                        echo '<button class="btn btn-primary" type="submit" name="add_to_cart" onclick="showConfirmation()">Add to Cart</button>';
                        echo '</form>';

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                }

                echo '</div>';
            }
        }


        // Close the database connection
        $conn->close();
        ?>
    </div>
</section>


<?php 
    include('footer.php');
    ?>
<script>
    // JavaScript function to show a confirmation message
    
        // JavaScript function to show the confirmation message
        function showConfirmation() {
            alert("<?php echo $confirmationMessage; ?>");
        }
  
</script>
<script>
    // Wait for the document to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Find the success message element
        var successMessage = document.getElementById('success-message');

        // Check if the element exists
        if (successMessage) {
            // Set a timeout to initiate the fade-out effect after 1000 milliseconds (1 second)
            setTimeout(function() {
                // Apply a CSS class to initiate the fade-out transition
                successMessage.classList.add('fade-out');
                
                // Set another timeout to hide the message after the transition completes (e.g., 1000ms)
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 1000);
            }, 4000); // Wait 4 seconds before starting the fade-out
        }
    });
</script>
</body>
</html>
