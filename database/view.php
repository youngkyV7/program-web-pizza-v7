<?php
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

// Query untuk mengambil data dari database dengan JOIN
$sql = "SELECT orders.id, orders.customer_name, orders.customer_address, orders.pizza_name, orders.pizza_quantity, menu.pizza_price
        FROM orders
        JOIN menu ON orders.pizza_name = menu.pizza_name";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    // Tampilkan data
    echo "<table>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Customer Address</th>
                <th>Pizza Name</th>
                <th>Pizza Quantity</th>
                <th>Pizza Price</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['customer_name']."</td>
                <td>".$row['customer_address']."</td>
                <td>".$row['pizza_name']."</td>
                <td>".$row['pizza_quantity']."</td>
                <td>".$row['pizza_price']."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Tutup koneksi
$conn->close();
?>

</body>
</html>
