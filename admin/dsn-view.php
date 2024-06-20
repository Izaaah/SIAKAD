<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <title>DOSEN</title>
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
		<h3>Data Dosen</h3>
			<!-- <button type="button" class="btn btn-tambah"><a href="tambah-fak.php">Tambah Data</a></button> -->
			
			<div class="card">
				<table class="table-data" id="table">
				<thead>
					<tr>
					<th style="width: 5%">NO</th>
					<th>NIDN</th>
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
						$a = "SELECT * FROM dosen";
						$aq = $conn->query($a);
						while ($aa = $aq->fetch_array()) {
							$NIDN = $aa['NIDN'];
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $aa['NIDN']; ?></td>
								<td><?php echo $aa['nama_dosen']; ?></td>
								<td><?php echo $aa['alamat_dosen']; ?></td>
								<td><?php echo $aa['tgl_lahir_dsn']; ?></td>
								<td><?php echo $aa['id_prodi']; ?></td>
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
