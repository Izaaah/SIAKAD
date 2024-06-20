<?php
session_start();
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    // Validasi panjang username untuk menentukan role
    if ($username == 'admin') {
        $role = 'admin';
    } elseif ($username == 'mahasiswa') {
        $role = 'mahasiswa';
    } else {
        $role = 'dosen';
    }

    // Query untuk memeriksa kredensial pengguna
    $sql = "SELECT * FROM user WHERE username = ? AND password = ? AND role = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Set session untuk user yang berhasil login
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        if ($role == 'admin') {
            header("Location: ../admin.php");
        } elseif ($role == 'mahasiswa') {
            header("Location: ../mahasiswa/index.php");
        } else {
            header("Location: ../dosen/dasboard-dsn.html");
        }
        exit();
    } else {
        echo "Username atau password salah!";
    }

    $stmt->close();
    $conn->close();
}
?>