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
    $NIDN = $_POST['NIDN'];
    $nama_dosen = $_POST['nama_dosen'];
    $alamat = $_POST['alamat'];
    $tgl_lahir_dsn = $_POST['tgl_lahir_dsn']; // Pastikan nama input sesuai dengan yang ada di form HTML
    $id_prodi = $_POST['id_prodi'];
    $id_prodi = $_POST['id_user'];

    // SQL untuk menambahkan data ke tabel mahasiswa
    $sql = "INSERT INTO dosen (NIDN, nama_dosen, alamat_dosen, tgl_lahir_dsn, id_prodi, id_user) VALUES (?, ?, ?, ?, ?, ?)";

    // Menyiapkan statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Mengikat parameter (semua parameter dalam bentuk string "sssss")
    $stmt->bind_param("ssssss", $NIDN, $nama_dosen, $alamat, $tgl_lahir_dsn, $id_prodi, $id_user);

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
