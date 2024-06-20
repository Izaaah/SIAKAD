<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="../assets/icon.png" />
   <link rel="stylesheet" href="/assets/css/transaction.css" />
   <!-- Boxicons CDN Link -->
   <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Categories</title>
</head>
   <body>
	<div class="sidebar">
	   <div class="logo-details">
		<i class="bx bx-category"></i>
		<span class="logo_name">UIN MALANG</span>
	   </div>
	   <ul class="nav-links">
      <li>
        <a href="admin.php">
          <i class="bx bx-grid-alt"></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="admin/rombongan-view.php">
          <i class="bx bx-group"></i>
          <span class="links_name">Rombongan Belajar</span>
        </a>
      </li>
      <li>
        <a href="admin/jadwal-view.php">
          <i class="bx bx-box"></i>
          <span class="links_name">Buat Jadwal</span>
        </a>
      </li>
      <li>
        <a href="admin/matkul-view.php">
          <i class="bx bx-folder-plus"></i>
          <span class="links_name">Tambah Matkul</span>
        </a>
      </li>
      <li>
        <a href="admin/user-view.php">
          <i class="bx bx-list-ul"></i>
          <span class="links_name">Masukkan User</span>
        </a>
      </li>
      <li>
        <a href="admin/prodi-view.php">
          <i class="bx bx-book-reader"></i>
          <span class="links_name">Program Studi</span>
        </a>
      </li>
      <li>
        <a href="admin/fak-view.php">
          <i class="bx bx-buildings"></i>
          <span class="links_name">Fakultas</span>
        </a>
      </li>
      <li>
        <a href="laporan.php" class="active">
          <i class="bx bx-file"></i>
          <span class="links_name">Laporan</span>
        </a>
      </li>
      <li>
        <a href="login.html">
        <i class="bx bx-log-out"></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
	</div>
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
		<h3>Laporan</h3>
			<!-- <button type="button" class="btn btn-tambah"><a href="tambah-fak.php">Tambah Data</a></button> -->
			
			<div class="card">
				<table class="table-data" id="table">
				<thead>
					<tr>
					<th style="width: 5%">NO</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Email</th>
                    <th>Message</th>
					</tr>
				</thead>
				<tbody>
                <tr>
						<?php
						include "koneksi.php";
						$no = 1;
						$a = "SELECT * FROM laporan";
						$aq = $conn->query($a);
						while ($aa = $aq->fetch_array()) {
							$nim = $aa['NIM'];
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $aa['NIM']; ?></td>
								<td><?php echo $aa['nama']; ?></td>
								<td><?php echo $aa['email']; ?></td>
								<td><?php echo $aa['message']; ?></td>
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
