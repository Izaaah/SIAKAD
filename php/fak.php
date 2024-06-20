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

// Menampilkan data dalam bentuk tabel HTML
if ($result->num_rows > 0) {
    echo "<table><thead><tr><th style='width: 20%'>ID</th><th style='width: 20%'>Nama Fakultas</th><th style='width: 20%'>Action</th></tr></thead><tbody>";
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_fak"] . "</td><td>" . $row["nama_fakultas"] . "</td><td><a href='edit.php?id=" . $row["id_fak"] . "'>Edit</a></td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "Tidak ada data.";
}

// Menutup koneksi
$conn->close();
?>