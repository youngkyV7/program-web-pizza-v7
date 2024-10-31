<?php
// Ambil data dari form
$order_id = $_POST['id'];

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

// Hapus data dari database berdasarkan order_id
$sql = "DELETE FROM orders WHERE id = $order_id";

if ($conn->query($sql) === TRUE) {
    echo "Order deleted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
