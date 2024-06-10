<?php
session_start();
include 'config.php';

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
