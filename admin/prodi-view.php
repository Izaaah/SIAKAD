<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <title>PROGRAM STUDI</title>
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
		<h3>Program Studi</h3>
		<button type="button" class="btn btn-tambah"><a href="tambah-prodi.php">Tambah Data</a></button>
			<div class="card">
				<table class="table-data">
				<thead>
					<tr>
					<!-- <th style="width: 20%">ID Program Studi</th> -->
					<th style="width: 20%">Kode Program Studi</th>
					<th style="width: 20%">Nama Program Studi</th>
					<th style="width: 20%">Fakultas</th>
					<th style="width: 20%">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						include "../koneksi.php";
						$no = 1;
						$a = "SELECT prodi.*, add_fakultas.nama_fak 
						FROM prodi 
						INNER JOIN add_fakultas ON prodi.fakultas = add_fakultas.id_fak";
						$aq = $conn->query($a);
						while ($aa = $aq->fetch_array()) {
							$idjurusan = $aa['id_prodi'];
							$fakultas = $aa['fakultas'];
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $aa['nama_prodi']; ?></td>
								<td><?php echo $aa['nama_fak']; ?></td>
								
								<td><a href="http://localhost/phpmyadmin/index.php?route=/table/structure&db=siakad&table=prodi">link</a></td>
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
