<?php
// Include file koneksi.php
include '../koneksi.php';

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $nama_fakultas = $_POST['nama_fakultas'];

    // SQL untuk menambahkan data ke tabel fakultas
    $sql = "INSERT INTO add_fakultas (nama_fak) VALUES (?)";

    // Menyiapkan statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Mengikat parameter
    $stmt->bind_param("s", $nama_fakultas);

    // Menjalankan statement
    if ($stmt->execute()) {
        echo "Data berhasil disimpan. ID Fakultas yang baru adalah: " . $stmt->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>