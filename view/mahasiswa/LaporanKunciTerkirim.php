<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Laporan Barang</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPolos("Pelaporan Barang") ?>

    <main class="flex flex-col gap-[20px] mt-20 justify-center items-center w-full">
      <section class="flex flex-col gap-5">
        <div class="flex flex-col justify-center items-center">
          <img src="../../assets/icon/guest-icon-sukses.png" alt="Sukses">
          <p class="font-bold text-xl text-s-black">Nama : Widan</p>
          <p class="font-bold text-xl text-s-black">Jurusan : Informatika</p>
          <p class="font-bold text-xl text-s-black">Kunci yang dipinjam</p>
          <p class="font-bold text-xl text-s-black">"Kunci Lab Patt 1</p>
        </div>
        <p class="font-semibold text-[15px] text-s-black text-center px-[20px]">Silhakan Screenshoot Halaman ini dan Laporkan ke Security yang beraga untuk di izinkan</p>
      </section>
      <a href="./LaporanKunci.php">
        <div class="w-full px-[25px] py-[8px] rounded-[10px] bg-ijo-500 hover:bg-ijo-400 cursor-pointer ">
          <p class="font-semibold text-xl text-s-white">Kembali ke Halaman Awal</p>
        </div>
      </a>
    </main>

  </section>
</body>

</html>