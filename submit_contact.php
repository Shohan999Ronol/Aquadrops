<?php
include('connection.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Insert data into the database
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
        header("location:aboutUS.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("location:aboutUS.php");
        exit();
    }
}

$conn->close();
?>
