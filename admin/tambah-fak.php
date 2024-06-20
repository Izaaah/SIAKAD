<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <title>PLUS FAK</title>
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
	  
	  <button class="btn btn-kembali"><a href="fak-view.php">Kembali</a></button>
	  <h3>Input Fakultas</h3>
	  <div class="form-login">
		<form action="../php/tambah-fak.php" method="post">
	  	   <!-- <label for="categories">ID Fakultas</label>
			<input class="input" type="text" name="categories"
				id="categories" placeholder="ID Fakultas"/> -->
 		   <label for="categories">Nama Fakultas</label>
			<input class="input" type="text" name="nama_fakultas"
				id="price" placeholder="Nama Fakultas" />
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
