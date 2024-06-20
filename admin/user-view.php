<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <title>Categories</title>
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
			<h3>Tambah User</h3>
			<!-- <button type="button" class="btn btn-tambah"><a href="tambah-prodi.html">Tambah Data</a></button> -->
			<div class="card">
				<table class="table-data">
				<thead>
					<tr>
					<th style="width: 20%">User</th>
					<th style="width: 20%">Jumlah</th>
					<th style="width: 20%">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<td>Dosen</td>
					
					<td>
    <?php
    // include '../koneksi.php';
    // Pastikan $NIDN didefinisikan
    // $NIDN = isset($_GET['NIDN']) ? $_GET['NIDN'] : ''; // atau metode lain untuk mengambil nilai NIDN

    // Membuat koneksi ke database
    // $koneksi = new mysqli("localhost:3307", "root", "", "siakad");

    //Periksa koneksi
    // if ($koneksi->connect_error) {
        // die("Koneksi gagal: " . $koneksi->connect_error);
    // }

    // Mempersiapkan dan menjalankan query
    // $g = "SELECT COUNT(*) FROM dosen";
    // $gq = $koneksi->query($g);
    ?>
</td>

					</td>
					<td><a href="tambah-dsn.php">Tambah Data</a> | <a href="dsn-view.php">Lihat Data</a></td>
					</tr>
					<tr>
						<td>Mahasiswa</td>
						<td>450000</td>
						<td><a href="tambah-mhs.php">Tambah Data</a> | <a href="mhs-view.php">Lihat Data</td>
						</tr>
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
