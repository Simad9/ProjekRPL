<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Homepage | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] h-screen">
  <h1 class="font-bold text-2xl text-s-black">SELAMAT DATANG</h1>
  <div class="h-[3px] w-full bg-s-black rounded"></div>
  <div class="flex flex-col gap-[5px] w-full h-screen">
    <p class="font-semibold text-[15px] text-s-black">Laporan Barang yang ada : </p>
    <!-- Perulangan card -->
    <div class="flex gap-[10px] bg-ijo-400 w-full p-[10px] rounded-[8px] items-center">
      <img src="../../assets/icon/contoh.png" alt="Gambar Barang" class="object-cover w-[75px] h-[75px]">
      <div class="w-full flex flex-col gap-[5px]">
        <h2 class="font-semibold text-[18px] text-s-black">Kunci Motor</h2>
        <div class="font-normal text-[13px] text-s-black">
          <p>Tgl : </p>
          <p>ditemukan di : </p>
          <p>Deskripsi Barang</p>
        </div>
        <!-- Ngirim id -->
        <a href="laporan_kehilangan.php">
          <div class="px-[15px] py-[5px] border-ijo-400 bg-s-white w-full rounded-[10px] hover:bg-slate-200 cursor-pointer">
            <p class="font-medium text-[13px] text-s-black text-center">Lapor</p>
          </div>
        </a>
      </div>
    </div>

  </div>

</body>

</html>