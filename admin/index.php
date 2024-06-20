<?php
include 'inc_header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="../assets/icon.png" />
  <link rel="stylesheet" href="/assets/css/admin.css" />
  <!-- Boxicons CDN Link -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
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
      <h2 id="text"></h2>
      <h3 id="date"></h3>
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
    function myFunction() {
      const months = ["Januari", "Februari", "Maret", "April", "Mei",
        "Juni", "Juli", "Agustus", "September", "Oktober",
        "November", "Desember"];
      const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis",
        "Jumat", "Sabtu"];
      let date = new Date();
      jam = date.getHours();
      tanggal = date.getDate();
      hari = days[date.getDay()];
      bulan = months[date.getMonth()];
      tahun = date.getFullYear();
      let m = date.getMinutes();
      let s = date.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById("date").innerHTML = `${hari}, 
         ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
      requestAnimationFrame(myFunction);
    }
    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
    window.onload = function () {
      let nama = prompt("Masukkan Nama Anda : ", "Admin");
      let jam = new Date().getHours();
      if (nama != null) {
        if (jam >= 4 && jam <= 10) {
          document.getElementById("text").innerHTML = `Selamat Pagi ${nama}`;
        } else if (jam >= 11 && jam <= 14) {
          document.getElementById("text").innerHTML = `Selamat Siang ${nama}`;
        } else if (jam >= 15 && jam <= 18) {
          document.getElementById("text").innerHTML = `Selamat Sore ${nama}`;
        } else {
          document.getElementById("text").innerHTML = `Selamat Malam ${nama}`;
        }
      }
      myFunction();
    };
  </script>

</body>

</html>