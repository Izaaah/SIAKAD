<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <title>MAHASISWA</title>
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
		<h3>Data Mahasiswa</h3>
			<!-- <button type="button" class="btn btn-tambah"><a href="tambah-fak.php">Tambah Data</a></button> -->
			
			<div class="card">
				<table class="table-data" id="table">
				<thead>
					<tr>
					<th style="width: 5%">NO</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Program Studi</th>
					<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <tr>
						<?php
						include "../koneksi.php";
						$no = 1;
						$a = "SELECT mahasiswa.*, user.username, prodi.nama_prodi
						FROM mahasiswa
						INNER JOIN user ON mahasiswa.id_user = user.id
						INNER JOIN prodi ON mahasiswa.prodi = prodi.id_prodi";
						$aq = $conn->query($a);
						while ($aa = $aq->fetch_array()) {
							$nim = $aa['NIM'];
							$id_user = $aa['username'];
							$prodi = $aa['nama_prodi'];
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $aa['username']; ?></td>
								<td><?php echo $aa['nama']; ?></td>
								<td><?php echo $aa['alamat']; ?></td>
								<td><?php echo $aa['tgl_lahir']; ?></td>
								<td><?php echo $aa['nama_prodi']; ?></td>
								<td><a href="form_absensi.php?idjurusan=<?php echo $idjurusan; ?>">link</a></td>
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
