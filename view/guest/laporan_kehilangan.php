<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Laporan Kehilangan | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] h-screen w-full">
  <!-- Header -->
  <div class="flex justify-between w-full">
    <a href="homepage.php">
      <img src="../../assets/img/guest-icon-arrow.png" alt="kembali">
    </a>
    <h1 class="font-semibold text-xl text-s-black text-center">Laporan Kehilangan</h1>
    <img src="../../assets/img/guest-icon-arrow.png" alt="kembali" class="opacity-0">
  </div>
  <div class="h-[3px] w-full bg-s-black rounded"></div>
  <!-- END Header -->

  <!-- Barang -->
  <p class="font-semibold text-[15px] text-s-black">Barang yang ditemukan : </p>
  <!-- Perulangan card -->
  <div class="flex gap-[10px] bg-ijo-400 w-full p-[10px] rounded-[8px] items-center">
    <img src="../../assets/img/contoh.png" alt="Gambar Barang" class="object-cover w-[75px] h-[75px]">
    <div class="w-full flex flex-col gap-[5px]">
      <h2 class="font-semibold text-[18px] text-s-black">Kunci Motor</h2>
      <div class="font-normal text-[13px] text-s-black">
        <p>Tgl : </p>
        <p>ditemukan di : </p>
        <p>Deskripsi Barang</p>
      </div>
    </div>
  </div>
  <div class="h-[3px] w-full bg-s-black rounded"></div>
  <!-- END Barang -->

  <!-- Bukti Kepemilkan -->
  <p class="font-semibold text-[15px] text-s-black">Bukti Kepemilikan : </p>
  <form action="" method="post">

  </form>
  <!-- END BUkti Kepemilikan -->

</body>

</html>