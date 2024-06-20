<?php
session_start();
include 'inc_header.php';
include '../koneksi.php';

if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika belum login
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

// Ambil NIM dari username
$result = $conn->query("SELECT NIM FROM mahasiswa WHERE nim = '$username'");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nim = $row['NIM'];

    // Ambil data rekap jadwal berdasarkan NIM
    $rekap = $conn->query("SELECT rekap_jadwal.*, jadwal_kuliah.*, mata_kuliah.nama_mk, mata_kuliah.sks, prodi.nama_prodi, dosen.nama_dosen 
                           FROM rekap_jadwal
                           INNER JOIN jadwal_kuliah ON rekap_jadwal.id_jadwal = jadwal_kuliah.id_jadwal
                           INNER JOIN mata_kuliah ON jadwal_kuliah.kode_mk = mata_kuliah.kode_mk
                           INNER JOIN prodi ON jadwal_kuliah.prodi = prodi.id_prodi
                           INNER JOIN dosen ON jadwal_kuliah.NIDN = dosen.NIDN
                           WHERE rekap_jadwal.nim = '$nim'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <title>Rekap Jadwal</title>
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
	  <h3>Jadwal Kuliah</h3>
		   <button type="button" class="btn btn-tambah"><a href="tambah-matkul.php">Tambah Mata Kuliah</a></button>
      <div class="card">
         <table class="table-data">
            <thead>
               <tr>
                  <th style="width: 5%">No</th>
                  <th style="width: 15%">Kode Mata Kuliah</th>
                  <th style="width: 20%">Nama Mata Kuliah</th>
                  <th style="width: 10%">SKS</th>
                  <th style="width: 10%">Ruang</th>
                  <th style="width: 10%">Hari</th>
                  <th style="width: 10%">Waktu</th>
                  <th style="width: 20%">Program Studi</th>
                  <th style="width: 20%">Dosen</th>
               </tr>
            </thead>
            <tbody>
               <?php
               if (isset($rekap) && $rekap->num_rows > 0) {
                   $no = 1;
                   while ($row = $rekap->fetch_assoc()) {
                       ?>
                       <tr>
                           <td><?php echo $no++; ?></td>
                           <td><?php echo $row['kode_mk']; ?></td>
                           <td><?php echo $row['nama_mk']; ?></td>
                           <td><?php echo $row['sks']; ?></td>
                           <td><?php echo $row['ruang']; ?></td>
                           <td><?php echo $row['hari']; ?></td>
                           <td><?php echo $row['waktu']; ?></td>
                           <td><?php echo $row['nama_prodi']; ?></td>
                           <td><?php echo $row['nama_dosen']; ?></td>
                       </tr>
                       <?php
                   }
               } else {
                   ?>
                   <tr>
                       <td colspan="9">Tidak ada data jadwal yang diinputkan.</td>
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
