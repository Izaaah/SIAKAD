<?php
// Include file koneksi.php
include '../koneksi.php';
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
	   <h3>Input Jadwal</h3>
	   <div class="form-login">
		<form action="../php/tambah-jadwal.php" method="post">
				<label for="categories">Mata Kuliah</label><br>
			<select class="form-control m-b" name="kode_mk" id="kode_mk">
				<?php
				include "../koneksi.php";
				$a = "SELECT * FROM mata_kuliah";
				$aq = $conn->query($a);
				while($aa = $aq->fetch_array()){
				?>
				<option value="<?php echo $aa['kode_mk']; ?>"><?php echo $aa['nama_mk'];?></option>
				<?php 
				}
			?>
		</select>
        <br><br>
		   <label for="harga">Ruang</label>
		   <input class="input" type="text" name="ruang"
				id="ruang" placeholder="Ruang" />
				<br><label for="harga">Hari</label><br>
				<select name="hari" id="hari" required>
				<option value="">Pilih...</option>
					<option value="Senin">Senin</option>
					<option value="Selasa">Selasa</option>
					<option value="Rabu">Rabu</option>
					<option value="Kamis">Kamis</option>
					<option value="Jum'at">Jum'at</option>
				</select><br><br>
		   <label for="waktu">Waktu</label>
		   <input class="input" type="text" name="waktu"
				id="waktu" style="margin-bottom: 20px" required/>
				<label for="tgl">Program Studi</label><br>
				<select class="form-control m-b" name="prodi" required>
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
		</select> <br><br>
		   <!-- <input class="input" type="text" name="waktu_finish"
				id="waktu_finish" style="margin-bottom: 20px" /> -->
				<label for="harga">Nama Dosen</label><br>
				<select class="form-control m-b" name="NIDN" id="NIDN>
				<?php
				include "../koneksi.php";
				$a = "SELECT * FROM dosen";
				$aq = $conn->query($a);
				while($aa = $aq->fetch_array()){
				?>
				<option value="<?php echo $aa['NIDN']; ?>"><?php echo $aa['nama_dosen'];?></option>
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
