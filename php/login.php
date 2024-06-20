<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validate inputs
    if (!empty($user) && !empty($password) && !empty($role)) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, username, password, role FROM user WHERE username = ? AND role = ?");
        $stmt->bind_param("ss", $user, $role);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result && $result->num_rows == 1) {
            $d_1 = $result->fetch_assoc();
            // Check password (consider using password_verify for hashed passwords)
            if ($d_1['password'] === $password) {
                $_SESSION['username'] = $d_1['username'];
                $_SESSION['role'] = $d_1['role'];
                $_SESSION['prodi_id'] = $d_1['prodi_id'];
                // $prodi_id = $_SESSION['prodi_id'];
                
                // Redirect based on role
                if ($d_1['role'] == "admin") {
                    header("Location: ../admin/index.php");
                } else if ($d_1['role'] == "mahasiswa") {
                    header("Location: ../mahasiswa/index.php");
                } else if ($d_1['role'] == "dosen") {
                    header("Location: ../dosen/dasboard-dsn.php");
                } else {
                    echo "Role tidak valid <a href=\"javascript:history.back()\">kembali</a>";
                }
                exit();
            } else {
                echo "Username atau password salah <a href=\"javascript:history.back()\">kembali</a>";
            }
        } else {
            echo "Username atau password salah <a href=\"javascript:history.back()\">kembali</a>";
        }
    } else {
        echo "Harap isi semua field <a href=\"javascript:history.back()\">kembali</a>";
    }
} else {
    echo "Permintaan tidak valid <a href=\"javascript:history.back()\">kembali</a>";
}
?>

