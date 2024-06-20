<?php
session_start();
include 'inc_header.php';
include '../koneksi.php';

if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika belum login
    header("Location: login.php");
    exit;
}

$id_jadwal = $_GET['id_jadwal'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Rombongan Belajar</title>
</head>
<body>
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class="bx bx-menu sidebarBtn"></i>
        </div>
        <div class="profile-details">
            <span class="admin_name">Admin</span>
        </div>
    </nav>
    <div class="home-content">
        <h3>Rombongan Belajar</h3>
        <div class="card">
            <table class="table-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $query = "SELECT mahasiswa.NIM, mahasiswa.nama 
                          FROM rekap_jadwal
                          INNER JOIN mahasiswa ON rekap_jadwal.nim = mahasiswa.NIM
                          WHERE rekap_jadwal.id_jadwal = '$id_jadwal'";

                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['NIM']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="3">Tidak ada data mahasiswa yang mengambil jadwal ini.</td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };
</script>
</body>
</html>
