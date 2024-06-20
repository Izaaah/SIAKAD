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
    $id_fak = $_POST['id_fak'];
    $nama_fakultas = $_POST['nama_fakultas'];

    // SQL untuk memperbarui data di tabel fakultas
    $sql = "UPDATE fakultas SET nama_fakultas = ? WHERE id_fak = ?";

    // Menyiapkan statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Mengikat parameter
    $stmt->bind_param("si", $nama_fakultas, $id_fak);

    // Menjalankan statement
    if ($stmt->execute()) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>/ Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $id_fak = $_POST['id_fak'];
    $nama_fakultas = $_POST['nama_fakultas'];

    // SQL untuk memperbarui data di tabel fakultas
    $sql = "UPDATE fakultas SET nama_fakultas = ? WHERE id_fak = ?";

    // Menyiapkan statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Mengikat parameter
    $stmt->bind_param("si", $nama_fakultas, $id_fak);

    // Menjalankan statement
    if ($stmt->execute()) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>