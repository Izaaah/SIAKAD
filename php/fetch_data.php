<?php

// Include file koneksi.php
include '../koneksi.php';

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data dari tabel fakultas
$sql = "SELECT id_fak, nama_fak FROM fakultas";
$result = $conn->query($sql);

// Memeriksa apakah hasil query mengandung data
if ($result->num_rows > 0) {
    // Menginisialisasi array untuk menyimpan data
    $data = array();

    // Mengambil setiap baris data dan menambahkannya ke array
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Mengembalikan data dalam format JSON
    echo json_encode($data);
} else {
    // Jika tidak ada data, mengembalikan array kosong dalam format JSON
    echo json_encode(array());
}

// Menutup koneksi
$conn->close();
?>