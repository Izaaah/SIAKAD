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
    $ruang = $_POST['ruang'];
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];
    $prodi = $_POST['prodi']; // Pastikan nama input sesuai dengan yang ada di form HTML
    $NIDN = $_POST['NIDN'];

    // SQL untuk menambahkan data ke tabel mahasiswa
    $sql = "INSERT INTO jadwal_kuliah (kode_mk, ruang, hari, waktu, prodi, NIDN) VALUES (?, ?, ?, ?, ?, ?)";

    // Menyiapkan statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Mengikat parameter (semua parameter dalam bentuk string "sssss")
    $stmt->bind_param("ssssss", $kode_mk, $ruang, $hari, $waktu, $prodi, $NIDN);

    // Menjalankan statement
    if ($stmt->execute()) {
        echo "Data berhasil disimpan." . $stmt->insert_id;
    } else {
        echo "Error: " . $stmt->error; // Ubah dari $sql ke $stmt->error untuk melihat kesalahan yang sebenarnya
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>
