<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Subscription Details</h1>
        <?php
        include('connection.php'); // Include your database connection code

        // Retrieve subscription data from the database
        $sql = "SELECT * FROM subscriptions";
        $result = $conn->query($sql);

        // Check if there are any subscriptions
        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Name</th>';
            echo '<th>Email</th>';
            echo '<th>Phone</th>';
            echo '<th>Address</th>';
            echo '<th>Bottle Size</th>';
            echo '<th>Frequency</th>';
            echo '<th>Quantity</th>';
            echo '<th>Total Price</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Loop through each subscription record
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td>' . $row['address'] . '</td>';
                echo '<td>' . $row['bottle_size'] . '</td>';
                echo '<td>' . $row['frequency'] . '</td>';
                echo '<td>' . $row['quantity'] . '</td>';
                echo '<td>' . $row['total_price'] . '</td>';
                echo '</tr>';
            }

            // Close the table
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No subscriptions found.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
