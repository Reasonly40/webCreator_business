<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO orders (name, email, telephone, order_name) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $telephone, $order_name);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$order_name = $_POST['order'];
$stmt->execute();

// Close statement and connection
$stmt->close();
$conn->close();

// Redirect to admin page
header('Location: admin.html');
exit;
?>