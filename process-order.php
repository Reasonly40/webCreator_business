<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $order = $_POST['order'];

    // Menyiapkan dan mengikat pernyataan SQL
    $stmt = $conn->prepare("INSERT INTO orders (id, name, email, telephone, order_name) VALUES (?, ?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("sssss", $number, $name, $email, $telephone, $order);

    // Menjalankan pernyataan dan memeriksa keberhasilan
    if ($stmt->execute()) {
        echo "New order created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup pernyataan dan koneksi
    $stmt->close();
    $conn->close();

    // Mengalihkan ke halaman admin
    header('Location: admin.html');
    exit;
}
?>
