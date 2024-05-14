<?php
session_start();
require "../../model/be_main.php";
// Harus login dulu
sessionProtection();

// selesai Jaga
if (isset($_GET['submit'])) {
  be_selesaiJaga();
}

$laporan = true;
isset($_GET['buka']) ? $laporan = $_GET['buka'] : $laporan = true;

// Fetch Data di Laporan Barang
$query = "SELECT * FROM lap_barang";
$hasil = mysqli_query($koneksi, $query);

// Fetch id dari session
$id_security = be_fetchIdSecurity();
$queryJadwal = "SELECT * FROM jadwal_security WHERE id_security = $id_security";
$dataJadwal = mysqli_fetch_assoc(mysqli_query($koneksi, $queryJadwal));

// slesai jaga
$queryJaga = "SELECT * FROM jadwal_security 
INNER JOIN jadwal ON jadwal.id_jadwal = jadwal_security.id_jadwal
INNER JOIN security ON security.id_security = jadwal_security.id_security
WHERE jadwal_security.id_security = $id_security;";
$fetchJaga = mysqli_query($koneksi, $queryJaga);
$dataJaga = mysqli_fetch_assoc($fetchJaga);
$dataMulai = $dataJaga['waktuMulai'];
$dataSelesai = $dataJaga['waktuSelesai'];
$selesaiJaga = false;
if ($waktu_sekarang >= $dataSelesai) {
  $selesaiJaga = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Pergantian Shift | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] w-full h-screen relative bg-s-white border-x border-ijo-600 mx-auto md:w-9/12 lg:w-7/12">
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
    <form action="../../model/be_selesaiJaga.php" method="post" class="flex flex-col gap-[10px]">
      <!-- hidden data -->
      <input type="hidden" name="id_jadwal" value="<?= $dataJadwal['id_jadwal'] ?>">
      <input type="hidden" name="id_security" value="<?= $id_security ?>">

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
          <textarea id="laporan" name="note" placeholder="Laporan secara tertulis" class="px-[15px] py-[5px] rounded-[10px] text-s-black border border-s-black"></textarea>
        </div>

        <!-- Barang yang dituju -->
        <div class="flex flex-col gap-1 relative">
          <label for="barang" class="font-semibold text-[15px] text-s-black">Jenis Barang</label>
          <img src="../../assets/icon/guest-icon-arrow.png" alt="arrow" class="-rotate-90 absolute right-3 top-1/2">
          <select name="id_lapBarang" id="barang" class="px-[15px] py-[10px] rounded-[10px] text-s-black border border-s-black appearance-none">
            <option value="">Opsi Bukti Kepemilikan</option>
            <?php while ($barang = mysqli_fetch_assoc($hasil)) : ?>
              <option value="<?= $barang['id_lapBarang'] ?>"><?= $barang['namaBarang'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
      <?php endif; ?>

      <!-- Button -->
      <?php if ($selesaiJaga) : ?>
        <button type="submit" name="submit" class="px-[30px] py-[8px] bg-ijo-500 w-full rounded-[10px] hover:bg-ijo-300">
          <p class="font-semibold text-xl text-s-white">LAPOR</p>
        </button>
      <?php else : ?>
        <button type="button" class="px-[30px] py-[10px] bg-slate-500 w-full rounded-[10px] mb-2">
          <p class="font-semibold text-xl text-s-white text-center">Belum bisa Lapor</p>
        </button>
      <?php endif; ?>
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