<?php
$laporan = true;
isset($_GET['buka']) ? $laporan = $_GET['buka'] : $laporan = true;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Pergantian Shift | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] w-full">
  <!-- Header -->
  <div class="flex justify-between w-full">
    <a href="homepage.php">
      <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali">
    </a>
    <h1 class="font-semibold text-xl text-s-black text-center">Pergantian Shift</h1>
    <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali" class="opacity-0">
  </div>
  <!-- END Header -->
  <div class="h-[3px] w-full bg-s-black rounded"></div>

  <!-- Main -->
  <main class="flex flex-col gap-[10px] w-full">
    <p class="font-semibold text-[15px] text-s-black">Isi untuk laporan : </p>
    <form action="" method="get" class="flex flex-col gap-[10px]">

      <!-- Terdapat Barang ? -->
      <!-- <div class="flex flex-col gap-1">
        <label for="laporan" class="font-semibold text-[15px] text-s-black">Terdapat barang hilang :</label>
        <div class="flex gap-[10px] w-full">
          <button id="adaLaporan" type="button" class="w-full px-[20px] py-[10px] bg-ijo-400 text-s-white text-center rounded-[10px] border border-ijo-400">Ada</button>
          <button id="tidakAdaLaporan" type="button" class="w-full px-[20px] py-[10px] bg-s-white text-s-black text-center rounded-[10px] border border-ijo-400"> Tidak Ada</button>
          <input id="laporan" type="hidden" name="laporan">
        </div>
      </div> -->

      <div class="flex flex-col gap-1">
        <label for="laporan" class="font-semibold text-[15px] text-s-black">Terdapat barang hilang :</label>
        <div class="flex gap-[10px] w-full">
          <a href="./pergantian_shift.php?buka=1" class="w-full px-[20px] py-[10px] <?= $laporan ? "bg-ijo-400 text-s-white" : "bg-s-white text-s-black" ?>  text-center rounded-[10px] border border-ijo-400">Ada</a>
          <a href="./pergantian_shift.php?buka=0" class="w-full px-[20px] py-[10px] <?= $laporan ? "bg-s-white text-s-black" : "bg-ijo-400 text-s-white" ?> text-center rounded-[10px] border border-ijo-400"> Tidak Ada</a>
          <input id="laporan" type="hidden" name="laporan" value=<?= $laporan ? "ada" : "tidak ada" ?>>
        </div>
      </div>

      <!-- Laporan Secara Tertulis -->
      <?php if ($laporan) : ?>
        <div class="flex flex-col gap-1">
          <label for="laporan" class="font-semibold text-[15px] text-s-black">Laporan secara tertulis</label>
          <textarea id="laporan" name="laporan_text" placeholder="Laporan secara tertulis" class="px-[15px] py-[5px] rounded-[10px] text-s-black border border-s-black"></textarea>
        </div>
      <?php endif; ?>

      <!-- Button -->
      <button type="submit" name="submit" class="px-[30px] py-[8px] bg-ijo-500 w-full rounded-[10px] hover:bg-ijo-300">
        <p class="font-semibold text-xl text-s-white">LAPOR</p>
      </button>
    </form>
  </main>
  <!-- END Main -->

  <!-- Navbar -->
  <nav class="flex px-[63px] py-[13px] justify-between items-center bg-ijo-500 w-full absolute bottom-0 left-0">
    <!-- Barang -->
    <a href="../security/laporan_barang.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer">
        <div class="relative">
          <img src="../../assets/icon/nav-icon-barang.png" alt="Barang" class="size-[30px] group-hover:opacity-0">
          <img src="../../assets/icon/nav-icon-barang-active.png" alt="Barang-hover" class="size-[30px] opacity-0 absolute top-0 left-0 group-hover:opacity-100">
        </div>
        <p class="font-reguler text-[12px] text-s-white group-hover:font-bold">Barang</p>
      </div>
    </a>
    <!-- Pergantian -->
    <a href="../security/pergantian_shift.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer">
        <img src="../../assets/icon/nav-icon-shift-active.png" alt="shift" class="size-[30px] ">
        <p class="font-bold text-[12px] text-s-white">Pergantian</p>
      </div>
    </a>
    <!-- Profile -->
    <a href="../security/profile.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer">
        <div class="relative">
          <img src="../../assets/icon/nav-icon-profile.png" alt="profile" class="size-[30px] group-hover:opacity-0">
          <img src="../../assets/icon/nav-icon-profile-active.png" alt="profile-hover" class="size-[30px] opacity-0 absolute top-0 left-0 group-hover:opacity-100">
        </div>
        <p class="font-reguler text-[12px] text-s-white group-hover:font-bold">Profile</p>
      </div>
    </a>
  </nav>
  <!-- END Navbar -->
  <!-- <script>
    // Ambil tombol-tombol yang diperlukan
    const adaLaporanButton = document.getElementById("adaLaporan");
    const tidakAdaLaporanButton = document.getElementById("tidakAdaLaporan");
    const inputLaporan = document.querySelector('#laporan');

    // Tambahkan event listener untuk tombol "Ada"
    adaLaporanButton.addEventListener("click", function() {
      // Ubah nilai input hidden menjadi "ada" saat tombol "Ada" diklik
      inputLaporan.value = "ada";
      console.log(inputLaporan.value);

      // Atur kelas-kelas Tailwind CSS untuk menyesuaikan tampilan tombol
      adaLaporanButton.classList.remove('bg-s-white', 'text-s-black');
      adaLaporanButton.classList.add('bg-ijo-400', 'text-s-white');
      tidakAdaLaporanButton.classList.remove('bg-ijo-400', 'text-s-white');
      tidakAdaLaporanButton.classList.add('bg-s-white', 'text-s-black');
    });

    // Tambahkan event listener untuk tombol "Tidak Ada"
    tidakAdaLaporanButton.addEventListener("click", function() {
      // Ubah nilai input hidden menjadi "tidak ada" saat tombol "Tidak Ada" diklik
      inputLaporan.value = "tidak ada";
      console.log(inputLaporan.value);

      // Atur kelas-kelas Tailwind CSS untuk menyesuaikan tampilan tombol
      tidakAdaLaporanButton.classList.remove('bg-s-white', 'text-s-black');
      tidakAdaLaporanButton.classList.add('bg-ijo-400', 'text-s-white');
      adaLaporanButton.classList.remove('bg-ijo-400', 'text-s-white');
      adaLaporanButton.classList.add('bg-s-white', 'text-s-black');
    });
  </script> -->
</body>

</html>