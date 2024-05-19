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
$stmt = $conn->prepare("SELECT * FROM orders");
$stmt->execute();
$result = $stmt->get_result();

// Fetch orders
$orders = array();
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

// Close statement and connection
$stmt->close();
$conn->close();

// Return orders in JSON format
echo json_encode($orders);
?>