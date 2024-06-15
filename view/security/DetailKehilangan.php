<?php
require '../../model/be_main.php';

$id_kehilangan = $_GET['id_lapKehilangan'];
$query = "SELECT *, lap_kehilangan.urlFoto as 'urlBukti' FROM lap_kehilangan
INNER JOIN lap_barang ON lap_kehilangan.id_lapBarang = lap_barang.id_lapBarang
INNER JOIN mahasiswa ON lap_kehilangan.id_mhs = mahasiswa.id_mhs
WHERE lap_kehilangan.id_lapKehilangan = '$id_kehilangan'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);
$data['tanggal'] = explode(' ', $data['tanggalWaktu'])[0];

if (isset($_GET["hapus"])) {
  $id_lapKehilangan = $_GET["id_lapKehilangan"];
  $urlBukti = $data['urlBukti'];
  $id_lapBarang = $data['id_lapBarang'];
  $urlBarang = $data['urlBarang'];
  $id_mhs = $data['id_mhs'];
  hapusLapKehilangan($id_lapKehilangan, $urlBukti, $id_lapBarang, $urlBarang, $id_mhs);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Detail Kehilangan</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Detail Kehilangan", "./LaporanKehilangan.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]">Detail Kehilangan Barang</h1>

        <form action="" methode="post">
          <!-- hidden data -->
          <input type="hidden" name="id_lapKehilangan" value="<?= $data['id_lapKehilangan'] ?>">

          <div class=" flex flex-col gap-[10px]">
            <section class="flex flex-col gap-[5px] p-[10px] bg-ijo-500 rounded-[5px]">
              <div class="flex justify-between items-center text-s-white">
                <h1 class="font-semibold text-[15px]"><?= $data['jenisBarang'] ?></h1>
                <h1 class="font-normal text-[10px]"><<?= tampilanTanggal($data['tanggal']) ?>></h1>
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
                  <h1 class="font-semibold">Bukti Kepemilikan : <?= $data['bukti'] ?> </h1>
                  <img src="../../img/laporanKehilangan/<?= $data['urlBukti'] ?>" alt="Foto bukti" class="h-[100px] w-full object-cover bg-s-grey">
                </div>
              </div>

              <div class="flex flex-col gap-[5px]">
                <div class="flex gap-[5px] w-full">
                  <button type="submit" name="hapus" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-s-red font-semibold text-[15px] text-center">
                    Hapus Laporan
                  </button>
                  <?php $data['noHp'] = ltrim($data['noHp'], '0');  ?>
                  <a href="https://wa.me/+62<?= $data['noHp'] ?>" target="_blank" class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                    Hubungi
                  </a>
                </div>

              </div>
            </section>


          </div>
        </form>
      </div>


    </main>

  </section>
</body>

</html>