<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Homepage | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] h-screen relative">
  <!-- Bagian atas -->
  <div class="flex justify-between items-center w-full">
    <img src="../../assets/img/anonim.jpg" alt="Foto Profile" class="size-[40px] rounded-full">
    <img src="../../assets/icon/icon-notif.png" alt="notif icon" class="size-[20px] cursor-pointer">
  </div>
  <!-- END Bagian atas -->

  <!-- Sapa User -->
  <div>
    <p class="font-medium text-[15px] text-s-black">Selamat Pagi</p>
    <h1 class="font-bold text-[25px] text-s-black">Wijdan AKhmad S</h1>
  </div>
  <!-- END Sapa User -->

  <div class="h-[3px] w-full bg-s-black rounded"></div>

  <!-- Fitur Kami -->
  <div class="flex flex-col gap-[5px]">
    <p class="font-semibold text-[15px] text-s-black">Fitur Kami : </p>
    <div class="flex justify-evenly w-full">
      <a href="../security/laporan_barang.php">
        <div class="flex flex-col justify-center items-center p-[10px] bg-ijo-400 hover:bg-ijo-500 rounded-[10px] w-[130px] cursor-pointer">
          <img src="../../assets/icon/security-icon-barang.png" alt="Lapor Barang" class="w-[50px] h-[50px] fill-s-black">
          <p class="font-semibold text-[15px] text-s-black">Laporan</p>
          <p class="font-semibold text-[15px] text-s-black">Barang</p>
        </div>
      </a>
      <a href="../security/pergantian_shift.php">
        <div class="flex flex-col justify-center items-center p-[10px] bg-ijo-400 hover:bg-ijo-500 rounded-[10px] w-[130px] cursor-pointer">
          <img src="../../assets/icon/security-icon-shift.png" alt="Lapor Barang" class="w-[50px] h-[50px] fill-s-black">
          <p class="font-semibold text-[15px] text-s-black">Pergantian</p>
          <p class="font-semibold text-[15px] text-s-black">Shift</p>
        </div>
      </a>
    </div>
  </div>
  <!-- END Fitru Kami -->

  <div class="h-[3px] w-full bg-s-black rounded"></div>

  <!-- Laporan barang -->
  <div class="flex flex-col gap-[5px]">
    <p class="font-semibold text-[15px] text-s-black">Laporan barang yang ada : </p>
    <div class="flex gap-[10px] bg-ijo-400 w-full p-[10px] rounded-[8px] items-center hover:bg-ijo-500 cursor-pointer">
      <img src="../../assets/icon/contoh.png" alt="Gambar Barang" class="object-cover w-[75px] h-[75px]">
      <div class="w-full flex flex-col gap-[2px]">
        <h2 class="font-semibold text-[18px] text-s-black">Kunci Motor</h2>
        <div class="font-normal text-[13px] text-s-black">
          <p>Tgl : </p>
          <p>ditemukan di : </p>
          <p>Deskripsi Barang</p>
        </div>
      </div>
    </div>
  </div>
  <!-- END Laporan barang -->

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