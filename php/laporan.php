<?php
// Include file koneksi.php
include '../koneksi.php';

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Periksa apakah data tidak kosong
    if (!empty($nim) && !empty($nama) && !empty($email) && !empty($message)) {
        // Query untuk memasukkan data ke tabel laporan
        $sql = "INSERT INTO laporan (nim, nama, email, message) VALUES (?, ?, ?, ?)";

        // Siapkan statement
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameter
            $stmt->bind_param("ssss", $nim, $nama, $email, $message);

           // Eksekusi statement
            if ($stmt->execute()) {
                // Set pesan alert
                $alertMessage = "alert('Data berhasil disimpan.');";
            } else {
                $alertMessage = "alert('Error: " . $stmt->error . "');";
            }

            // Tutup statement
            $stmt->close();
        } else {
            $alertMessage = "alert('Error: " . $conn->error . "');";
        }
    } else {
        $alertMessage = "alert('Semua field harus diisi!');";
    }
}

header("Location: ../index.html?alert=" . urlencode($alertMessage));

// Tutup koneksi
$conn->close();
?>
