<?php
require '../../model/be_main.php';

$query = "SELECT * FROM lap_barang";
$hasil = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Pelaporan Barang</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Pelaporan Barang", "../../index.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px]">
      <div class="flex flex-col gap-[5px]">
        <h1 class="text-t-black font-semibold text-[18px]">Fitur Kami</h1>
        <section class="flex gap-[5px]">
          <div>
            <img src="../../assets/sementara/mhs-icon-lapBarang.svg">
          </div>
          <a href="./LaporanKunci.php">
            <img src="../../assets/sementara/mhs-icon-lapKunci-off.svg">
          </a>
        </section>
      </div>

      <?php
      if (mysqli_num_rows($hasil) > 0) :
        while ($data = mysqli_fetch_assoc($hasil)) :  ?>
          <!-- Listnya -->
          <section class="p-[10px] bg-ijo-500 rounded-[10px]">
            <div class="flex justify-between items-center text-s-white mb-2">
              <h1 class="font-semibold text-[15px]">Kunci Motor</h1>
              <h2 class="font-normal text-[10px]">06/04/2024</h2>
            </div>
            <div class="flex gap-[5px]">
              <img src="../../img/kehilangan/" alt="" class="w-[64px] h-[64px] bg-s-grey">
              <div class="text-[10px] text-s-white">
                <h1 class="font-semibold">Deskripsi ditemukan : </h1>
                <p class="font-medium">Ditemukan di motor AB xxx</p>
              </div>
            </div>
            <div class="w-full flex justify-end">
              <a href="./LaporanKehilangan.php" class="px-[15px] py-[2px] border border-ijo-500 bg-s-white text-center text-semibold text-ijo-500 text-[13px] rounded-[8px]">
                Lapor
              </a>
            </div>
          </section>
        <?php endwhile; ?>

      <?php else : ?>
        <h1 class="font-semibold text-s-black text-[20px] text-center">Tidak Ada Laporan</h1>
      <?php endif; ?>
    </main>

  </section>

</body>

</html>