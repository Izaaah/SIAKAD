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
			<i class="bx bx-user-circle"></i>
		   <span class="admin_name">Dosen</span>
		</div>
	   </nav>
	   <div class="home-content">
			
			<!-- <button type="button" class="btn btn-tambah"><a href="categories-entry.html">Tambah Data</a></button> -->
			<h3>Jadwal Kuliah</h3>
			<div class="card">
				<table class="table-data">
				<thead>
					<tr>
						<th>ID</th>
						<th>Hari</th>
						<th>Waktu</th>
						<th>Ruang</th>
						<th style="width: 20%">Mata Kuliah</th>
						<th style="width: 20%">Dosen</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
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
