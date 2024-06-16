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

<body class=" md:w-5/12 md:m-auto border border-s-black border-e-black">
  <section class="flex flex-col gap-[10px] h-screen ">
    <?php judulPath("Pelaporan Barang", "../../index.php") ?>
    <main class="px-[15px] flex flex-col gap-[20px] bg-white">
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
        while ($data = mysqli_fetch_assoc($hasil)) :
          $data['tanggal'] = explode(' ', $data['tanggalWaktu'])[0];
      ?>
          <!-- Listnya -->
          <section class="p-[10px] bg-ijo-500 rounded-[10px]">
            <div class="flex justify-between items-center text-s-white mb-2">
              <h1 class="font-semibold text-[15px]"><?= $data['jenisBarang'] ?></h1>
              <h2 class="font-normal text-[10px]"><?= tampilanTanggal($data['tanggal']) ?></h2>
            </div>
            <div class="flex gap-[5px]">
              <img src="../../img/laporanBarang/<?= $data['urlFoto'] ?>" alt="foto barang" class="w-[64px] h-[64px] bg-s-grey">
              <div class="text-[10px] text-s-white">
                <h1 class="font-semibold">Deskripsi ditemukan : </h1>
                <p class="font-medium shrink"><?= $data['deskripsi'] ?></p>
              </div>
            </div>
            <div class="w-full flex justify-end">
              <a href="./LaporanKehilangan.php?idLapBarang=<?= $data['id_lapBarang'] ?>" class="px-[15px] py-[2px] border border-ijo-500 bg-s-white text-center text-semibold text-ijo-500 text-[13px] rounded-[8px]">
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