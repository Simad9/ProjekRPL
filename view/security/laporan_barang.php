<?php
session_start();
require "../../model/be_main.php";
// Harus login dulu
sessionProtection();

// kirim laporan barang
if (isset($_POST["submit"])) {
  be_laporanBarang();
}

// notif
if (isset($_GET["status"])) {
  $message = "";
  switch ($_GET["status"]) {
    case 'gagal':
      $message = "Gagal Mengirim";
      break;
    case 'notImage':
      $message = "File bukan gambar";
      break;
    case 'bigSize':
      $message = "File terlalu besar";
      break;
  }
  echo "<script>alert('$message');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Laporan Barang | Security App</title>
</head>

<body class="flex flex-col gap-[10px] px-[30px] pt-[30px] pb-20 w-full h-screen relative  bg-s-white border-x border-ijo-600 mx-auto md:w-9/12 lg:w-7/12">
  <!-- Header -->
  <div class="flex justify-between w-full">
    <a href="homepage.php">
      <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali">
    </a>
    <h1 class="font-semibold text-xl text-s-black text-center">Laporan Barang</h1>
    <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali" class="opacity-0">
  </div>
  <!-- END Header -->
  <div class="h-[3px] w-full bg-s-black rounded"></div>

  <!-- Main -->
  <main class="flex flex-col gap-[10px] w-full">
    <p class="font-semibold text-[15px] text-s-black">Isi barang yang ditemukan : </p>
    <form action="" method="post" enctype="multipart/form-data" class="flex flex-col gap-[10px]">
      <!-- Tanggal + Waktu -->
      <div class="flex gap-1 w-full">
        <div class="flex flex-col w-full">
          <label class="font-semibold text-[15px] text-s-black">Tanggal :</label>
          <input type="text" placeholder="<?= $tanggal_sekarang ?>" disabled class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black w-full">
        </div>
        <div class="flex flex-col w-full">
          <label class="font-semibold text-[15px] text-s-black">Waktu :</label>
          <input type="text" placeholder="<?= $waktu_sekarang ?> WIB" disabled class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black w-full">
        </div>
      </div>

      <!-- Jenis Barang -->
      <div class="flex flex-col gap-1 relative">
        <label for="barang" class="font-semibold text-[15px] text-s-black">Jenis Barang</label>
        <img src="../../assets/icon/guest-icon-arrow.png" alt="arrow" class="-rotate-90 absolute right-3 top-1/2">
        <select name="barang" id="barang" class="px-[15px] py-[10px] rounded-[10px] text-s-black border-[2px] border-s-black appearance-none">
          <option value="">Opsi Bukti Kepemilikan</option>
          <option value="Kunci Motor">Kunci Motor</option>
          <option value="Tas">Tas</option>
        </select>
      </div>

      <!-- Note -->
      <div class="flex flex-col gap-1">
        <label for="note" class="font-semibold text-[15px] text-s-black">Note :</label>
        <textarea type="text" name="note" id="note" placeholder="Note" required class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black"></textarea>
      </div>

      <!-- Bukti Foto -->
      <div class="flex flex-col gap-1">
        <label class="font-semibold text-[15px] text-s-black">Bukti Foto</label>
        <label for="foto" class="flex items-center gap-3">
          <img src="../../assets/icon/guest-icon-upload.png" id="foto-preview" class="object-cover w-[100px] h-[100px] border border-s-black rounded-[10px]" alt="Foto">
          <p class="font-normal text-[10px] text-s-black">kirim foto maksimal 2mb</p>
        </label>
        <input type="file" id="foto" name="foto" accept="image/*" class="hidden">
      </div>


      <!-- Button -->
      <button type="submit" name="submit" class="px-[30px] py-[8px] bg-ijo-500 w-full rounded-[10px] hover:bg-ijo-300">
        <p class="font-semibold text-xl text-s-white">INPUT</p>
      </button>

    </form>

  </main>
  <!-- END Main -->

  <!-- Navbar -->
  <nav class="flex px-[63px] py-[13px] justify-between items-center bg-ijo-500 w-full bottom-0 left-0 absolute">
    <!-- Barang -->
    <a href="../security/laporan_barang.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer ">
        <img src="../../assets/icon/nav-icon-barang-active.png" alt="Barang" class="size-[30px]">
        <p class="font-bold text-[12px] text-s-white">Barang</p>
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


  <script>
    // Memperbaiki penanganan perubahan gambar
    document.getElementById('foto').onchange = function(event) {
      event.preventDefault(); // Mencegah default action form
      const fotoPreview = document.getElementById('foto-preview');
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function() {
          fotoPreview.src = reader.result;
        }
        reader.readAsDataURL(file);
      }
    };
  </script>

</body>

</html>