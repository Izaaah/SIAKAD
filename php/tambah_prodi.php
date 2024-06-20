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
    $nama_prodi = $_POST['nama_prodi'];
    $nama_fakultas = $_POST['fakultas']; // Menambah parameter kedua

    // SQL untuk menambahkan data ke tabel fakultas
    $sql = "INSERT INTO prodi (nama_prodi, fakultas) VALUES (?, ?)";

    // Menyiapkan statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Mengikat parameter
    $stmt->bind_param("si", $nama_prodi, $nama_fakultas); // Mengubah "s" menjadi "si" untuk mengikat parameter kedua sebagai integer

    // Menjalankan statement
    if ($stmt->execute()) {
        echo "Data berhasil disimpan. ID Prodi yang baru adalah: " . $stmt->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>
