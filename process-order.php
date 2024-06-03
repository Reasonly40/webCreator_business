<?php
$servername = "localhost";
$username = "root";  // Sesuaikan dengan username database Anda
$password = "";      // Sesuaikan dengan password database Anda
$dbname = "My_DB";   // Sesuaikan dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // proses data
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}

// Menyiapkan dan mengikat
$stmt = $conn->prepare("INSERT INTO orders (name, email, telephone, order_name) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $telephone, $order_name);

// Mengatur parameter dan mengeksekusi
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$order_name = $_POST['order'];
$stmt->execute();

// Menutup pernyataan dan koneksi
$stmt->close();
$conn->close();

// Mengalihkan ke halaman admin
header('Location: admin.html');
exit;
?>
