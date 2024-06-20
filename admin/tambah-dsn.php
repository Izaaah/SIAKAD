<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en">	
<head>
   <meta charset="UTF-8" />
   <title>PLUS DOSEN</title>
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
	   <h3>Input Dosen</h3>
	   <div class="form-login">
		<form action="../php/tambah-dsn.php" method="post">
		   <label for="nama">NIDN</label><br>
		   <select class="form-control m-b" name="NIDN" required>
				<?php
				include "../koneksi.php";
				$a = "SELECT * FROM user";
				$aq = $conn->query($a);
				while($aa = $aq->fetch_array()){
				?>
				<option value="<?php echo $aa['id']; ?>"><?php echo $aa['username'];?></option>
				<?php 
				}
			?>
			</select><br><br>
		   <label for="jenis">Nama</label>
		   <input class="input" type="text" name="nama_dosen"
				id="jenis" placeholder="Nama" />
		   <label for="harga">Alamat</label>
		   <input class="input" type="text" name="alamat"
				id="harga" placeholder="Alamat" />
		   <label for="tgl">Tanggal Lahir</label>
		   <br><input class="input" type="text" name="tgl_lahir_dsn"
				id="tgl_lahir_dsn" style="margin-bottom: 20px" />
				<label for="harga">Program Studi</label>
				<br><select class="form-control m-b" name="id_prodi">
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
		</select><br><br>
		<label for="user">User</label><br>
		<select class="form-control m-b" name="id_user" required>
				<?php
				include "../koneksi.php";
				$a = "SELECT * FROM user";
				$aq = $conn->query($a);
				while($aa = $aq->fetch_array()){
				?>
				<option value="<?php echo $aa['id']; ?>"><?php echo $aa['username'];?></option>
				<?php 
				}
			?>
		</select><br><br>	
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
