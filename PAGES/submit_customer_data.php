<?php
include('database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO customer_data (user_id, name, phone, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $name, $phone, $address);

    if ($stmt->execute()) {
        echo "Data pelanggan berhasil disimpan.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
