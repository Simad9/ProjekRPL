<?php
require "../../model/be_main.php";

// Fetch Data di Laporan Barang
$query = "SELECT * FROM lap_barang";
$hasil = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Homepage | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] h-screen  bg-s-white border-x border-ijo-600 mx-auto md:w-9/12 lg:w-7/12">
  <h1 class="font-bold text-2xl text-s-black">SELAMAT DATANG</h1>
  <div class="h-[3px] w-full bg-s-black rounded"></div>

  <div class="flex flex-col gap-[5px] w-full h-screen">
    <p class="font-semibold text-[15px] text-s-black">Laporan Barang yang ada : </p>
    <!-- Perulangan card -->
    <?php while ($data = mysqli_fetch_assoc($hasil)) : ?>
      <div class="flex gap-[10px] bg-ijo-400 w-full p-[10px] rounded-[8px] items-center">
        <img src="../../assets/icon/contoh.png" alt="Gambar Barang" class="object-cover w-[75px] h-[75px]">
        <div class="w-full flex flex-col gap-[5px]">
          <h2 class="font-semibold text-[18px] text-s-black"><?= $data["namaBarang"] ?></h2>
          <div>
            <p class="font-medium text-[13px] text-s-black">Tgl ditemukan : <span class="font-normal text-[13px] text-s-black"><?= tanggalBarangHilang($data['tanggal']) ?></span></p>
            <p class="font-medium text-[13px] text-s-black">Ditemukan di : </p>
            <p class="font-normal text-[13px] text-s-black"><?= $data['deskripsi']  ?></p>
          </div>
          <!-- Ngirim id -->
          <a href="laporan_kehilangan.php?id=<?= $data['id_lapBarang']  ?>">
            <div class="px-[15px] py-[5px] border-ijo-400 bg-s-white w-full rounded-[10px] hover:bg-slate-200 cursor-pointer">
              <p class="font-medium text-[13px] text-s-black text-center">Lapor</p>
            </div>
          </a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

</body>

</html>