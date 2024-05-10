<?php
session_start();
require "../../model/be_main.php";
// Harus login dulu
sessionProtection();

// ambil id laporan barang
$id_lapKehilangan = $_GET['id'];

// Fetch laporan barang yang dituju
$query = "SELECT * FROM lap_kehilangan 
INNER JOIN lap_barang ON lap_barang.id_lapBarang = lap_kehilangan.id_lapBarang
WHERE lap_kehilangan.id_lapKehilangan = $id_lapKehilangan";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Detail Laporan | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] w-full h-screen bg-s-white border-x border-ijo-600 mx-auto md:w-9/12 lg:w-7/12">
  <!-- Header -->
  <div class="flex justify-between w-full">
    <a href="profile_laporanMahasiswa.php">
      <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali">
    </a>
    <h1 class="font-semibold text-xl text-s-black text-center">Laporan Mahasiswa</h1>
    <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali" class="opacity-0">
  </div>
  <!-- END Header -->
  <div class="h-[3px] w-full bg-s-black rounded"></div>
  <!-- Main -->
  <main>
    <!-- Nanti dibikin perulangan sesuai data || Kasih kalo data kosong juga-->
    <section class="flex flex-col gap-[5px] p-[10px] border-[2px] border-ijo-400 rounded-[10px]">
      <!-- Barangnya -->
      <div class="flex gap-[10px] w-full p-[10px] rounded-[8px] items-center">
        <img src="../../assets/icon/contoh.png" alt="Gambar Barang" class="object-cover w-[75px] h-[75px]">
        <div class="w-full flex flex-col gap-[5px]">
          <h2 class="font-semibold text-[18px] text-s-black"><?= $data["namaBarang"] ?></h2>
          <div>
            <p class="font-medium text-[13px] text-s-black">Tgl ditemukan : <span class="font-normal text-[13px] text-s-black"><?= tanggalBarangHilang($data['tanggal']) ?></span></p>
            <p class="font-medium text-[13px] text-s-black">Ditemukan di : </p>
            <p class="font-normal text-[13px] text-s-black"><?= $data['deskripsi']  ?></p>
          </div>
        </div>
      </div>
      <div class="h-[2px] w-full bg-ijo-400 rounded"></div>
      <!-- pelapor -->
      <div class="flex flex-col">
        <h1 class="font-semibold text-[18px] text-s-black">Pelapor</h1>
        <div class="flex flex-col font-normal text-[13px] text-s-black">
          <p>Nama : <?= $data['namaPemilik'] ?></p>
          <p>No Hp : <?= $data['noHp'] ?></p>
        </div>
      </div>
      <!-- Bukti -->
      <div class="flex flex-col gap-[5px]">
        <h1 class="font-semibold text-[18px] text-s-black">Bukti</h1>
        <div class="font-normal text-[13px] text-s-black">
          <p>Jenis : <?= $data['buktiKepemilikan'] ?></p>
        </div>
        <img src="../../assets/img/contohBukti.JPG" alt="foot bukti" class="w-full h-full object-cover">
      </div>
      <!-- Button -->
      <div class="flex w-full gap-[10px]">
        <a href="https://wa.me/<?= noHpWa($data['noHp'])  ?>" target="_blank" class="w-full px-[15px] py-[5px] border border-ijo-400 rounded-[10px] hover:bg-ijo-400 hover:text-s-white text-center text-medium text-[13px] text-s-black">Hubungi</a>
      </div>

    </section>

  </main>

</body>

</html>