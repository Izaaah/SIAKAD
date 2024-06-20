<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <title>Boleeeh.id Admin | Categories Entry</title>
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
	  <h3>Input Program Studi</h3>
	  <div class="form-login">
		<form action="../php/tambah_prodi.php" method="post">
			<!-- <label for="categories">ID Program Studi</label>
			<input class="input" type="text" name="categories"
				id="categories" placeholder="ID Program Studi"/> -->
	  	   <label for="categories">Nama Program Studi</label>
			<input class="input" type="text" name="nama_prodi"
				id="categories" placeholder="Nama Program Studi"/>
 		   <label for="categories">Fakultas</label><br>
			<select class="form-control m-b" name="fakultas">
				<?php
				include "../koneksi.php";
				$a = "SELECT * FROM add_fakultas";
				$aq = $conn->query($a);
				while($aa = $aq->fetch_array()){
				?>
				<option value="<?php echo $aa['id_fak']; ?>"><?php echo $aa['nama_fak'];?></option>
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
