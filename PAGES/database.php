<?php
$servername = "localhost";
$username = "root";  // Sesuaikan dengan username database Anda
$password = "hilimata";      // Sesuaikan dengan password database Anda
$dbname = "fotostudio";  // Nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
