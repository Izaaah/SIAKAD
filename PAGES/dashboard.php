<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Selamat datang, " . $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    <p>Selamat datang, <?php echo $_SESSION['username']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
