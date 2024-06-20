<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <title>FAKULTAS</title>
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
		<h3>Fakultas</h3>
			<button type="button" class="btn btn-tambah"><a href="tambah-fak.php">Tambah Data</a></button>
			
			<div class="card">
				<table class="table-data" id="table">
				<thead>
					<tr>
					<th style="width: 5%">ID</th>
					<th style="width: 20%">Nama Fakultas</th>
					<!-- <th style="width: 20%">Jumlah</th> -->
					<th style="width: 20%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include "../koneksi.php";
					$no = 1;
					$a = "SELECT * FROM add_fakultas";
					$aq = $conn->query($a);
					while ($aa = $aq->fetch_array()) {
						$idjurusan = $aa['id_fak'];
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $aa['nama_fak']; ?></td>
							<td><a href="form_absensi.php?idjurusan=<?php echo $idjurusan; ?>">link</a></td>
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
	
		<!-- // Fungsi untuk mengambil data dari server dan memperbarui tabel
		function fetchData() {
			fetch('../php/fetch_data.php')
			.then(response => response.json())
			.then(data => {
				const tableBody = document.querySelector('#table tbody');
				tableBody.innerHTML = ''; // Kosongkan isi tabel sebelum menambahkan data baru
				
				data.forEach(row => {
					const tr = document.createElement('tr');
					tr.innerHTML = `
						<td>${row.id_fak}</td>
						<td>${row.nama_fak}</td>
						<td><a href="../php/edit.php?id=${row.id_fak}">Edit</a></td>
					`;
					tableBody.appendChild(tr);
				});
			});
		}
	
		// Panggil fungsi fetchData saat halaman dimuat
		document.addEventListener('DOMContentLoaded', () => {
			fetchData();
		}); -->
	</script>
	
</body>
</html>
