<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "siakad";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Koneksi berhasil!";
// }

?>
