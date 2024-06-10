<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['nomor'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $order = $_POST['order'];
    $created_at = $_POST['date']
    
    // Menyiapkan dan mengikat pernyataan SQL
    $stmt = $conn->prepare("INSERT INTO orders (number, name, email, telephone, order_name, created_at) VALUES (?, ?, ?, ?,  ?, ?)");

    $stmt->bind_param("ssss", $number, $name, $email, $telephone, $order, $created_at);

    // Menjalankan pernyataan dan memeriksa keberhasilan
    if ($stmt->execute()) {
        echo "New order created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

// Menutup pernyataan dan koneksi
$stmt->close();

}

$conn->close();


// Mengalihkan ke halaman admin
header('Location: admin.html');
exit;
?>
