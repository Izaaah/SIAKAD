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
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk']; // Menambah parameter kedua
    $sks = $_POST['sks'];
    $nama_prodi = ['nama_prodi'];

    // SQL untuk menambahkan data ke tabel fakultas
    $sql = "INSERT INTO mata_kuliah (kode_mk, nama_mk, sks, prodi) VALUES (?, ?, ?, ?)";

    // Menyiapkan statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Mengikat parameter
    $stmt->bind_param("sssi", $kode_mk, $nama_mk, $sks, $nama_prodi); // Mengubah "s" menjadi "si" untuk mengikat parameter kedua sebagai integer

    // Menjalankan statement
    if ($stmt->execute()) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>
