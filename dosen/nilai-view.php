<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <title>Nilai</title>
</head>
   <body>
	<section class="home-section">
	   <nav>
		<div class="sidebar-button">
		   <i class="bx bx-menu sidebarBtn"></i>
		</div>
		<div class="profile-details">
			<i class="bx bx-user-circle"></i>
		   <span class="admin_name">Dosen</span>
		</div>
	   </nav>
	   <div class="home-content">
		<h3>Transkrip Nilai</h3>
			<button type="button" class="btn btn-tambah"><a href="masuk-nilai.html">Tambah Data</a></button>
			
			<div class="card">
				<table class="table-data">
					<thead>
						<tr>
						<th style="width: 20%">NIM</th>
						<th>Nama</th>
						<th style="width: 20%">Mata Kuliah</th>
						<th>Kelas</th>
						<th>Nilai</th>
						<th>Huruf</th>
						<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<td>Sosmed A</td>
						<td>Social Media Marketing</td>
						<td>450000</td>
						<td>02-03-2023</td>
						<td></td>
						<td></td>
						<td><a href="">Edit</a> | <a href="">Hapus</a></td>
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
