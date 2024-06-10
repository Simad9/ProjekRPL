<?php
require '../../model/be_main.php';

$query = "SELECT *, kunci.nama as 'nama_kunci', mahasiswa.nama as 'nama_mhs' FROM lap_pinjamKunci
INNER JOIN kunci ON lap_pinjamKunci.id_kunci = kunci.id_kunci
INNER JOIN mahasiswa ON lap_pinjamKunci.id_mhs = mahasiswa.id_mhs
";
$hasil = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Laporan Kunci</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <!-- Judul -->
    <?php judulPath("Laporan Kunci", "../../index.php") ?>

    <!-- Fitur -->
    <main class="px-[15px] flex flex-col gap-[20px]">
      <div class="flex flex-col gap-[5px]">
        <h1 class="text-t-black font-semibold text-[18px]">Fitur Kami</h1>
        <section class="flex gap-[5px]">
          <a href="./LaporanBarang.php">
            <img src="../../assets/sementara/mhs-icon-lapBarang-off.svg">
          </a>
          <div>
            <img src="../../assets/sementara/mhs-icon-lapKunci.svg">
          </div>
        </section>
      </div>
      <div class="flex justify-end">
        <a href="./LaporanPinjamKunci.php">
          <img src="../../assets/sementara/mhs-icon-pinjamKunci.svg" alt="">
        </a>
      </div>

      <?php
      if (mysqli_num_rows($hasil) > 0) :
        while ($data = mysqli_fetch_assoc($hasil)) :
          // var_dump($data);
      ?>
          <!-- Isi -->
          <section class="p-[10px] bg-ijo-500 rounded-[10px]">
            <div class="flex justify-between items-center text-s-white mb-2">
              <h1 class="font-semibold text-[15px]"><?= $data['nama_kunci'] ?></h1>
              <h2 class="font-normal text-[10px]"><?= $data['tanggal'] ?></h2>
            </div>
            <div class="flex gap-[5px]">
              <img src="../../img/kunci/<?= $data['urlFoto'] ?>" alt="" class="w-[64px] h-[64px] bg-s-grey">
              <div class="text-[10px] text-s-white">
                <h1 class="font-semibold">Nama : <?= $data['nama_mhs'] ?> </h1>
                <h1 class="font-semibold">Jurusan : <?= $data['jurusan'] ?></h1>
                <h1 class="font-semibold">Nomer Hp : <?= $data['noHp'] ?> </h1>
              </div>
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