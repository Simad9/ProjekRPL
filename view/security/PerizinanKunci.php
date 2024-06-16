<?php
require '../../model/be_main.php';

$query = "SELECT *, kunci.nama as 'nama_kunci', mahasiswa.nama as 'nama_mhs' FROM lap_pinjamKunci
INNER JOIN kunci ON lap_pinjamKunci.id_kunci = kunci.id_kunci
INNER JOIN mahasiswa ON lap_pinjamKunci.id_mhs = mahasiswa.id_mhs
WHERE diizinkan is NULL OR diizinkan = 0";
$hasil = mysqli_query($koneksi, $query);

if (isset($_POST["tolak"])) {
  be_tolakKunci();
} else if (isset($_POST["terima"])) {
  be_terimaKunci();
}

if (isset($_GET["status"])) {
  switch ($_GET["status"]) {
    case "gagal":
      echo '<script>
      alert("ada yang salah");
      </script>';
      break;
    case "tolakKunci":
      echo '<script>
        alert("Perminjaman kunci ditolak");
        </script>';
      break;
    case "terimaKunci":
      echo '<script>
          alert("Peminjaman di ACC");
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
  <title>Perizinan Kunci</title>
</head>

<body class=" md:w-5/12 md:m-auto border border-s-black border-e-black">
  <section class="flex flex-col gap-[10px] h-screen">
    <?php judulPath("Perizinan Kunci", "./FiturTambahan.php") ?>

    <main class="px-[15px] flex flex-col gap-[10px]">
      <h1 class="text-t-black font-semibold text-[18px]">Laporan Perizinan Kunci</h1>

      <?php
      if (mysqli_num_rows($hasil) > 0) :
        while ($data = mysqli_fetch_assoc($hasil)) :
          // var_dump($data);
      ?>
          <section class="p-[10px] bg-ijo-500 rounded-[10px] flex flex-col gap-[5px]">
            <div class="flex justify-between items-center text-s-white mb-2">
              <h1 class="font-semibold text-[15px]"><?= $data['nama_kunci'] ?></h1>
              <h2 class="font-normal text-[10px]"><?= tampilanTanggal($data['tanggal']) ?></h2>
            </div>

            <div class="flex gap-[5px] w-full">
              <div class="aspect-[1/1] w-[64px]">
                <img src="../../img/kunci/<?= $data['urlFoto'] ?>" alt="foto kunci" class="object-cover w-full h-full bg-s-grey">
              </div>
              <div class="text-[10px] text-s-white">
                <h1 class="font-semibold text-[13px]">Nama: <?= $data['nama_mhs'] ?> </h1>
                <h1 class="font-semibold text-[13px]">Jurusan: <?= $data['jurusan'] ?> </h1>
                <h1 class="font-semibold text-[13px]">No Hp: <?= $data['noHp'] ?> </h1>
              </div>
            </div>

            <form action="" method="post">
              <!-- hidden data -->
              <input type="hidden" name="id_pinjamKunci" value="<?= $data['id_pinjamKunci'] ?>">

              <div class="flex gap-[5px] w-full">
                <button type="submit" name="tolak" class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-s-red font-semibold text-[15px] text-center">
                  Tolak
                </button>
                <button type="submit" name="terima" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                  Izinkan
                </button>
              </div>

            </form>

          </section>
        <?php endwhile; ?>

      <?php else : ?>
        <h1 class="font-semibold text-s-black text-[20px] text-center">Tidak Ada Laporan</h1>
      <?php endif; ?>



    </main>

  </section>

</body>

</html>