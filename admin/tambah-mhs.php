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
		<button class="btn btn-kembali"><a href="user-view.php">Kembali</a></button>
	   <h3>Input Mahasiswa</h3>
	   <div class="form-login">
		<form action="../php/tambah-mhs.php" method = "post" id="formMahasiswa">
		   <label for="nama">NIM</label><br>
		   <select class="form-control m-b" name="nim" required>
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
		   <input class="input" type="text" name="nama"
				id="jenis" placeholder="Nama" />
		   <label for="harga">Alamat</label>
		   <input class="input" type="text" name="alamat"
				id="harga" placeholder="Alamat" require/>
		   <label for="tgl">Tanggal Lahir</label>
		   <input class="input" type="text" name="tgl_lahir"
				id="tgl_lahir" style="margin-bottom: 20px" require/>
				<label for="harga">Program Studi</label>
				<br><select class="form-control m-b" name="prodi">
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
		<select class="form-control m-b" name="id_user">
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
