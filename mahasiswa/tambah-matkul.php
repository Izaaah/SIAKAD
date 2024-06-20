<?php
include 'inc_header.php';
session_start(); // Mulai session di awal file
if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika belum login
    header("Location: tambah-matkul.php");
    exit;
}

// Ambil prodi dari session
//$prodi_id = $_SESSION['prodi_id']; // Ubah ini sesuai dengan key prodi yang ada di session

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <title>MATA KULIAH</title>
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
      <h3>Daftar Mata Kuliah</h3>
      <div class="card">
         <table class="table-data">
            <thead>
               <tr>
                  <th style="width: 5%">No</th>
                  <th style="width: 5%">ID Jadwal</th>
                  <th style="width: 15%">Kode Mata Kuliah</th>
                  <th style="width: 20%">Nama Mata Kuliah</th>
                  <th style="width: 20%">SKS</th>
                  <th style="width: 5%">Ruang</th>
                  <th style="width: 5%">Hari</th>
                  <th style="width: 5%">Waktu</th>
                  <th style="width: 20%">Program Studi</th>
                  <th style="width: 20%">Dosen</th>
                  <th style="width: 2%">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               include "../koneksi.php";
               $no = 1;
               // Query untuk mengambil data jadwal kuliah sesuai dengan prodi yang terkait dengan user yang login
               $query = "SELECT jadwal_kuliah.*, jadwal_kuliah.id_jadwal, prodi.nama_prodi, dosen.nama_dosen, mata_kuliah.nama_mk, mata_kuliah.sks
                         FROM mata_kuliah 
                         INNER JOIN jadwal_kuliah ON mata_kuliah.kode_mk = jadwal_kuliah.kode_mk
                         INNER JOIN prodi ON jadwal_kuliah.prodi = prodi.id_prodi
                         INNER JOIN dosen ON jadwal_kuliah.NIDN = dosen.NIDN"; // Sesuaikan kondisi WHERE dengan prodi yang sesuai
               $result = $conn->query($query);
               while ($row = $result->fetch_assoc()) {
                  $id_jadwal = $row['id_jadwal'];
                  $kode_matkul = $row['kode_mk'];
                  $nama_matkul = $row['nama_mk'];
                  $sks = $row['sks'];
                  $ruang = $row['ruang'];
                  $hari = $row['hari'];
                  $waktu = $row['waktu'];
                  $nama_prodi = $row['nama_prodi'];
                  $NIDN = $row['nama_dosen'];
               ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td><?php echo $id_jadwal; ?></td>
                     <td><?php echo $kode_matkul; ?></td>
                     <td><?php echo $nama_matkul; ?></td>
                     <td><?php echo $sks; ?></td>
                     <td><?php echo $ruang; ?></td>
                     <td><?php echo $hari; ?></td>
                     <td><?php echo $waktu; ?></td>
                     <td><?php echo $nama_prodi; ?></td>
                     <td><?php echo $NIDN; ?></td>
                     <td><a href="rekap_jadwal.php" class="add-rekap" data-id_jadwal="<?php echo $id_jadwal; ?>">+</a></td>
                  </tr>
               <?php
               }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</section>
<form id="rekapForm" action="rekap_jadwal.php" method="POST" style="display: none;">
   <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>" />
   <input type="hidden" name="id_jadwal" id="id_jadwal" value="" />
</form>

<script>
   let sidebar = document.querySelector(".sidebar");
   let sidebarBtn = document.querySelector(".sidebarBtn");
   sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
         sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
   };

   document.querySelectorAll('.add-rekap').forEach(button => {
      button.addEventListener('click', function(e) {
         e.preventDefault(); // prevent default action
         const id_jadwal = this.getAttribute('data-id_jadwal');
         document.getElementById('id_jadwal').value = id_jadwal;
         document.getElementById('rekapForm').submit();
      });
   });
</script>

</body>
</html>
