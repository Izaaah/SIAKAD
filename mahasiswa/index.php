<?php
session_start();
include 'inc_header.php';
include '../koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

// Query untuk mengambil data mahasiswa berdasarkan username dari tabel user
$query = "SELECT m.nim, m.nama, m.alamat, m.tgl_lahir, m.prodi
          FROM mahasiswa m
          JOIN user u ON m.id_user = u.id
          WHERE u.username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nim = $row['nim'];
    $nama = $row['nama'];
    $alamat = $row['alamat'];
    $tgl_lahir = $row['tgl_lahir'];
    $prodi = $row['prodi'];
} else {
    echo "Tidak ada data";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
              <i class="bx bx-user-circle"></i>
            <span class="admin_name"><?php echo $nim; ?></span>
            </div>
        </nav>
        <div class="home-content">
            <h2 id="text"></h2>
            <h3 id="date"></h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h3 style="margin-left: 30px; margin-right: 30px" class="card">Profil Mahasiswa</h3>
                <div class="row card" style="margin-left: 30px; margin-right: 30px">
                    <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>NIM : <span><?php echo isset($nim) ?  $nim : 'Tidak Ditemukan'; ?></span></strong></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Nama Lengkap : <span><?php echo isset($nama) ?  $nama : 'Tidak Ditemukan'; ?></span></strong></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Alamat : <span><?php echo isset($alamat) ?  $alamat : 'Tidak Ditemukan'; ?></span></strong></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Tanggal Lahir : <span><?php echo isset($tgl_lahir) ?  $tgl_lahir : 'Tidak Ditemukan'; ?></span></strong></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Program Studi : <span><?php echo isset($prodi) ?  $prodi : 'Tidak Ditemukan'; ?></span></strong></li>
                        </ul>
                    </div>
                </div>
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
    function myFunction() {
      const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
      const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
      let date = new Date();
      jam = date.getHours();
      tanggal = date.getDate();
      hari = days[date.getDay()];
      bulan = months[date.getMonth()];
      tahun = date.getFullYear();
      let m = date.getMinutes();
      let s = date.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById("date").innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
      requestAnimationFrame(myFunction);
    }
    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
    window.onload = function () {
      let nama = "<?php echo $nama; ?>";
      let jam = new Date().getHours();
      if (nama != null) {
        if (jam >= 4 && jam <= 10) {
          document.getElementById("text").innerHTML = `Selamat Pagi ${nama}`;
        } else if (jam >= 11 && jam <= 14) {
          document.getElementById("text").innerHTML = `Selamat Siang ${nama}`;
        } else if (jam >= 15 && jam <= 18) {
          document.getElementById("text").innerHTML = `Selamat Sore ${nama}`;
        } else {
          document.getElementById("text").innerHTML = `Selamat Malam ${nama}`;
        }
      }
      myFunction();
    };
    </script>
</body>
</html>
