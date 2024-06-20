<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <title>PLUS MATKUL</title>
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
	  <button class="btn btn-kembali"><a href="user-view.php">Kembali</a></button>
	  <h3>Input Mata Kuliah</h3>
	  <div class="form-login">
		<form action="../php/tambah-matkul.php" method="post">
			<label for="categories">Kode Mata Kuliah</label>
			<input class="input" type="text" name="kode_mk"
				id="kode_mk" placeholder="Kode Mata Kuliah"/>
	  	   <label for="categories">Nama Mata Kuliah</label>
			<input class="input" type="text" name="nama_mk"
				id="categories" placeholder="Nama Mata Kuliah"/>
				<label for="categories">SKS</label>
			<input class="input" type="number" name="sks"
				id="categories" placeholder="SKS"/>
 		   <label for="categories">Program Studi</label><br>
			<select class="form-control m-b" name="nama_prodi">
				<?php
				include "../koneksi.php";
				$a = "SELECT * FROM prodi";
				$aq = $conn->query($a);
				while($aa = $aq->fetch_array()){
				?>
				<option value="<?php echo $aa['id_prodi']; ?>"><?php echo $aa['nama_prodi'];?></option>
				<?php 
				}
			?>
		</select>

				<br><br>
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
