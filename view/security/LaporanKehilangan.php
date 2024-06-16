<?php
require '../../model/be_main.php';

$query = "SELECT * FROM lap_kehilangan
INNER JOIN lap_barang ON lap_kehilangan.id_lapBarang = lap_barang.id_lapBarang
INNER JOIN mahasiswa ON lap_kehilangan.id_mhs = mahasiswa.id_mhs";
$hasil = mysqli_query($koneksi, $query);


if (isset($_GET["status"])) {
  switch ($_GET["status"]) {
    case "terhapus":
      echo '<script>
      alert("Laporan Dihapus");
      </script>';
      break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Lap. Kehilangan</title>
</head>

<body class=" md:w-5/12 md:m-auto border border-s-black border-e-black">
  <section class="flex flex-col gap-[10px] h-screen">
    <?php judulPath("Lap. Kehilangan", "./FiturTambahan.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]">Laporan Kehilangan Barang</h1>
        <?php
        if (mysqli_num_rows($hasil) > 0) :
          while ($data = mysqli_fetch_assoc($hasil)) :
            $data['tanggal'] = explode(' ', $data['tanggalWaktu'])[0];
        ?>

            <!-- <form action=""> -->
            <div class="flex flex-col gap-[10px]">
              <section class="flex flex-col gap-[5px] p-[10px] bg-ijo-500 rounded-[5px]">
                <div class="flex justify-between items-center text-s-white">
                  <h1 class="font-semibold text-[15px]"><?= $data['jenisBarang'] ?></h1>
                  <h1 class="font-normal text-[10px]"><?= tampilanTanggal($data['tanggal']) ?></h1>
                </div>
                <div class="flex gap-[5px] w-full">
                  <div class="aspect-[1/1] w-[64px]">
                    <img src="../../img/laporanBarang/<?= $data['urlFoto'] ?>" alt="foto barang" class="object-cover w-full h-full bg-s-grey">
                  </div>
                  <div class="text-[10px] text-s-white">
                    <h1 class="font-semibold text-[13px]">Deskripsi ditemukan : </h1>
                    <p class="font-medium shrink"><?= $data['deskripsi'] ?></p>
                  </div>
                </div>

                <div class="w-full h-[2px] bg-s-white"></div>

                <div class="flex flex-col gap-[5px]">
                  <h1 class="font-bold text-s-white text-[13px]">Pelapor</h1>
                  <div class="text-[13px] text-s-white">
                    <h1 class="font-semibold">Nama : <?= $data['nama'] ?> </h1>
                    <h1 class="font-semibold">Nomer Hp : <?= $data['noHp'] ?> </h1>
                  </div>
                </div>

                <div class="flex flex-col gap-[5px]">
                  <div class="flex gap-[5px] w-full">
                    <?php $data['noHp'] = ltrim($data['noHp'], '0');  ?>
                    <a href="https://wa.me/+62<?= $data['noHp'] ?>" target="_blank" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                      Hubungi
                    </a>
                    <a href="DetailKehilangan.php?id_lapKehilangan=<?= $data['id_lapKehilangan'] ?>" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                      Cek Detail
                    </a>
                  </div>

                </div>
              </section>
            <?php endwhile; ?>

          <?php else : ?>
            <h1 class="font-semibold text-s-black text-[20px] text-center">Tidak Ada Laporan</h1>
          <?php endif; ?>


            </div>
            <!-- </form> -->
      </div>


    </main>

  </section>
</body>

</html>