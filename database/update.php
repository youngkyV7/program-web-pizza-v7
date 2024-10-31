<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get data from form
$id = $_POST['id'];
$customer_name = $_POST['customer_name'];
$customer_address = $_POST['customer_address'];
$pizza_name = $_POST['pizza_name'];
$pizza_quantity = $_POST['pizza_quantity'];

// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "pizza_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is valid
if (!empty($id)) {
    // Update data in database
    $sql_update = "UPDATE orders SET customer_name='$customer_name', customer_address='$customer_address', pizza_name='$pizza_name', pizza_quantity=$pizza_quantity WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Order updated successfully!";
    } else {
        echo "Error updating order: " . $conn->error;
    }
} else {
    echo "Invalid order ID.";
}

// Close connection
$conn->close();
?>
