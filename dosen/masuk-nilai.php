<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en">	
<head>
   <meta charset="UTF-8" />
   <title>Boleeeh.id Admin | Transaction Entry</title>
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
		<button class="btn btn-kembali"><a href="user-view.html">Kembali</a></button>
	   <h3>Input Nilai Mahasiswa</h3>
	   <div class="form-login">
		<form action="">
		   <label for="nama">NIM</label>
		   <input class="input" type="number" name="nama"
				id="nama" placeholder="NIM" />
		   <label for="jenis">Nama</label>
		   <input class="input" type="text" name="jenis"
				id="jenis" placeholder="Nama" />
		   <label for="harga">Alamat</label>
		   <input class="input" type="text" name="harga"
				id="harga" placeholder="Alamat" />
		   <label for="tgl">Tanggal</label>
		   <input class="input" type="date" name="tgl"
				id="tgl" style="margin-bottom: 20px" />
				<label for="harga">Program Studi</label>
		   <input class="input" type="text" name="harga"
				id="harga" placeholder="Program Studi" />
				<!-- <label for="photo">Photo</label>
			<input type="file" name="photo" id="photo"
				style="margin-bottom: 20px" /> -->
		   <button type="submit" class="btn btn-simpan" 
                        name="simpan">
			      Simpan
		   </button>
		</form>
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
