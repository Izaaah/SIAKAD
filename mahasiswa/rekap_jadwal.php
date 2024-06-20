<?php
session_start();
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $id_jadwal = $_POST['id_jadwal'];

    // Debugging: Tampilkan nilai username dan id_jadwal
    echo "Username: " . $username . "<br>";
    echo "ID Jadwal: " . $id_jadwal . "<br>";

    // Periksa apakah username ada di tabel mahasiswa
    $result = $conn->query("SELECT nim FROM mahasiswa WHERE nim = '$username'");
    if ($result === false) {
        echo "Error dalam query: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nim = $row['nim'];

            // Masukkan ke tabel rekap_jadwal
            $stmt = $conn->prepare("INSERT INTO rekap_jadwal (nim, id_jadwal) VALUES (?, ?)");
            $stmt->bind_param("si", $nim, $id_jadwal);

            if ($stmt->execute()) {
                echo "Rekap jadwal berhasil ditambahkan.";
            } else {
                echo "Terjadi kesalahan: " . $conn->error;
            }

            $stmt->close();
        } else {
            echo "Username tidak ditemukan.";
        }
    }
}
$conn->close();
?>
