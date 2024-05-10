<?php
session_start();
require "../../model/be_main.php";
// Harus login dulu
sessionProtection();

// Fetch id dari session // ambil data security
$id_user = $_SESSION["id_user"];
$queryUser = "SELECT * FROM security WHERE id_user = $id_user";
$hasilUser = mysqli_query($koneksi, $queryUser);
$dataUser = mysqli_fetch_assoc($hasilUser);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Homepage | Security App</title>
</head>

<body class="relative bg-s-white border-x border-ijo-600 mx-auto md:w-9/12 lg:w-7/12">
  <section class="flex flex-col gap-[10px] p-[30px] w-full h-screen">
    <!-- Bagian atas -->
    <div class="flex justify-between items-center w-full">
      <img src="../../assets/img/anonim.jpg" alt="Foto Profile" class="size-[40px] rounded-full">
      <img src="../../assets/icon/icon-notif.png" alt="notif icon" class="size-[20px] cursor-pointer">
    </div>
    <!-- END Bagian atas -->

    <!-- Sapa User -->
    <div>
      <p class="font-medium text-[15px] text-s-black">Selamat Pagi</p>
      <h1 class="font-bold text-[25px] text-s-black"><?= $dataUser["nama"] ?></h1>
    </div>
    <!-- END Sapa User -->

    <div class="h-[3px] w-full bg-s-black rounded"></div>

    <!-- Fitur Kami -->
    <div class="flex flex-col gap-[5px]">
      <p class="font-semibold text-[15px] text-s-black">Fitur Kami : </p>
      <div class="flex gap-[10px] justify-evenly">
        <a href="../security/laporan_barang.php" class="flex flex-col justify-center items-center p-[10px] bg-ijo-400 hover:bg-ijo-500 rounded-[10px] w-full cursor-pointer">
          <img src="../../assets/icon/security-icon-barang.png" alt="Lapor Barang" class="w-[50px] h-[50px] fill-s-black">
          <p class="font-semibold text-[15px] text-s-black">Laporan</p>
          <p class="font-semibold text-[15px] text-s-black">Barang</p>
        </a>
        <a href="../security/pergantian_shift.php" class="flex flex-col justify-center items-center p-[10px] bg-ijo-400 hover:bg-ijo-500 rounded-[10px] w-full cursor-pointer">
          <img src="../../assets/icon/security-icon-shift.png" alt="Lapor Barang" class="w-[50px] h-[50px] fill-s-black">
          <p class="font-semibold text-[15px] text-s-black">Pergantian</p>
          <p class="font-semibold text-[15px] text-s-black">Shift</p>
        </a>
      </div>
    </div>
    <!-- END Fitru Kami -->

    <div class="h-[3px] w-full bg-s-black rounded"></div>


    <p class="font-semibold text-[15px] text-s-black">Barang yang dilaporkan : </p>
    <!-- button absen, kalo udah jamnya di klik bisa absen -->
    <form action="" method="post">
      <button type="submit" name="submit" class="px-[30px] py-[10px] bg-ijo-400 w-full rounded-[10px] hover:bg-ijo-300">
        <p class="font-semibold text-xl text-s-white">Absen Masuk Jaga</p>
      </button>
    </form>



    </div>
  </section>

  <!-- Navbar -->
  <nav class="flex px-[63px] py-[13px] justify-between items-center bg-ijo-500 w-full absolute bottom-0 left-0">
    <!-- Barang -->
    <a href="../security/laporan_barang.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer  p-1">
        <div class="relative">
          <img src="../../assets/icon/nav-icon-barang.png" alt="Barang" class="size-[30px] group-hover:opacity-0">
          <img src="../../assets/icon/nav-icon-barang-active.png" alt="Barang-hover" class="size-[30px] opacity-0 absolute top-0 left-0 group-hover:opacity-100">
        </div>
        <p class="font-reguler text-[12px] text-s-white group-hover:font-bold">Barang</p>
      </div>
    </a>
    <!-- Pergantian -->
    <a href="../security/pergantian_shift.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer ">
        <div class="relative">
          <img src="../../assets/icon/nav-icon-shift.png" alt="shift" class="size-[30px] group-hover:opacity-0">
          <img src="../../assets/icon/nav-icon-shift-active.png" alt="shift-hover" class="size-[30px] opacity-0 absolute top-0 left-0 group-hover:opacity-100">
        </div>
        <p class="font-reguler text-[12px] text-s-white group-hover:font-bold">Pergantian</p>
      </div>
    </a>
    <!-- Profile -->
    <a href="../security/profile.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer ">
        <div class="relative">
          <img src="../../assets/icon/nav-icon-profile.png" alt="profile" class="size-[30px] group-hover:opacity-0">
          <img src="../../assets/icon/nav-icon-profile-active.png" alt="profile-hover" class="size-[30px] opacity-0 absolute top-0 left-0 group-hover:opacity-100">
        </div>
        <p class="font-reguler text-[12px] text-s-white group-hover:font-bold">Profile</p>
      </div>
    </a>
  </nav>
  <!-- END Navbar -->


</body>

</html>