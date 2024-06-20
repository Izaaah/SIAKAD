<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
   <title>JADWAL</title>
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
			<h3>Jadwal</h3>
			<button type="button" class="btn btn-tambah"><a href="tambah-jadwal.php">Tambah Jadwal</a></button>
			<div class="card">
				<table class="table-data">
					<thead>
						<tr>
						<th>ID</th>
						<th>ID Jadwal</th>
						<th>Kode Mata Kuliah</th>
						<th>Nama Mata Kuliah</th>
						<th>Ruang</th>
						<th>Hari</th>
						<th>Waktu</th>
						<th>Program Studi</th>
						<th>Nama Dosen</th>
						<th>Rombongan Belajar</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<?php
						include "../koneksi.php";
						$no = 1;
						$a = "SELECT jadwal_kuliah.*, mata_kuliah.nama_mk, dosen.nama_dosen, prodi.nama_prodi, jadwal_kuliah.id_jadwal
						FROM jadwal_kuliah
						INNER JOIN mata_kuliah ON jadwal_kuliah.kode_mk = mata_kuliah.kode_mk
						INNER JOIN dosen ON jadwal_kuliah.NIDN = dosen.NIDN
						INNER JOIN prodi ON jadwal_kuliah.prodi = prodi.id_prodi";
						
						$aq = $conn->query($a);
						while ($aa = $aq->fetch_array()) {
							$kode_mk = $aa['kode_mk'];
							$prodi = $aa['prodi'];
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $aa['id_jadwal']; ?></td>
								<td><?php echo $aa['kode_mk']; ?></td>
								<td><?php echo $aa['nama_mk']; ?></td>
								<td><?php echo $aa['ruang']; ?></td>
								<td><?php echo $aa['hari']; ?></td>
								<td><?php echo $aa['waktu']; ?></td>
								<td><?php echo $aa['prodi']; ?></td>
								<td><?php echo $aa['nama_dosen']; ?></td>
								<td><a href="rombongan-view.php?id_jadwal=<?php echo $aa['id_jadwal']; ?>">List</a></td>
								<!-- <td><a href="form_absensi.php?idjurusan=<?php echo $idjurusan; ?>">link</a></td> -->
							</tr>
						<?php
						}
						?>
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
