<?php
// Ambil data dari form
$customer_name = $_POST['customer_name'];
$customer_address = $_POST['customer_address'];
$pizza_name = $_POST['pizza_name'];
$pizza_quantity = $_POST['pizza_quantity'];

// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "pizza_db";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil harga pizza berdasarkan nama pizza dari database
$sql_price = "SELECT pizza_price FROM menu WHERE pizza_name = '$pizza_name'";
$result = $conn->query($sql_price);

if ($result) {
    if ($result->num_rows > 0) {
        // Ambil hasil query
        $row = $result->fetch_assoc();
        $pizza_price = $row['pizza_price'];

        // Masukkan data ke database
        $sql = "INSERT INTO orders (customer_name, customer_address, pizza_name, pizza_price, pizza_quantity)
                VALUES ('$customer_name', '$customer_address', '$pizza_name', $pizza_price, $pizza_quantity)";

        if ($conn->query($sql) === TRUE) {
            echo "Order placed successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Pizza price not found in database for selected pizza.";
    }
} else {
    echo "Error: " . $sql_price . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
