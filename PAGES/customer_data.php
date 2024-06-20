<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve user data or perform any necessary operations
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Customer</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $username; ?>!</h2>
    <p>Ini adalah halaman data customer Anda.</p>
    <p>Anda dapat menambahkan konten sesuai kebutuhan Anda di halaman ini.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
