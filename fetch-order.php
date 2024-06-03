<?php
$servername = "localhost";
$username = "root";  // Sesuaikan dengan username database Anda
$password = "";      // Sesuaikan dengan password database Anda
$dbname = "My_DB";   // Sesuaikan dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menyiapkan dan menjalankan pernyataan SQL
$stmt = $conn->prepare("SELECT * FROM orders");
$stmt->execute();
$result = $stmt->get_result();

// Mengambil data pesanan
$orders = array();
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

// Menutup pernyataan dan koneksi
$stmt->close();
$conn->close();

// Mengembalikan data pesanan dalam format JSON
echo json_encode($orders);
?>
