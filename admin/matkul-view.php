<?php
include 'inc_header.php';
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
		<h3>Data Mata Kuliah</h3>
		<button type="button" class="btn btn-tambah"><a href="tambah-matkul.php">Tambah Mata Kuliah</a></button>
			<div class="card">
				<table class="table-data">
				<thead>
					<tr>
                    <th>No</th>
					<th style="width: 20%">Kode Mata Kuliah</th>
					<th style="width: 20%">Nama Mata Kuliah</th>
					<th>SKS</th>
                    <th style="width: 20%">Program Studi</th>
					<th style="width: 20%">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						include "../koneksi.php";
						$no = 1;
						$a = "SELECT mata_kuliah.*, prodi.nama_prodi
						FROM mata_kuliah 
						INNER JOIN prodi ON mata_kuliah.prodi = prodi.id_prodi";
						$aq = $conn->query($a);
						while ($aa = $aq->fetch_array()) {
							$kode_matkul = $aa['kode_mk'];
							$nama_matkul = $aa['nama_mk'];
              $sks = $aa['sks'];
              $nama_prodi = $aa['nama_prodi'];
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $aa['kode_mk']; ?></td>
								<td><?php echo $aa['nama_mk']; ?></td>
								<td><?php echo $aa['sks']; ?></td>
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
