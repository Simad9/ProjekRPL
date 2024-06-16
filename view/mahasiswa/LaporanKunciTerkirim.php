<?php 
require '../../model/be_main.php';

$id_mhs = $_GET["id_mhs"];
$id_kunci = $_GET["id_kunci"];

$query = "SELECT *, kunci.nama as 'nama_kunci', mahasiswa.nama as 'nama_mhs' FROM lap_pinjamKunci
INNER JOIN kunci ON lap_pinjamKunci.id_kunci = kunci.id_kunci
INNER JOIN mahasiswa ON lap_pinjamKunci.id_mhs = mahasiswa.id_mhs
WHERE lap_pinjamKunci.id_mhs = '$id_mhs' AND lap_pinjamKunci.id_kunci = '$id_kunci'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Laporan Barang</title>
</head>

<body class="md:w-5/12 md:m-auto border border-s-black border-e-black">
  <section class="flex flex-col gap-[10px] h-screen">
    <?php judulPolos("Pelaporan Barang") ?>

    <main class="flex flex-col gap-[20px] mt-20 justify-center items-center w-full">
      <section class="flex flex-col gap-5">
        <div class="flex flex-col justify-center items-center">
          <img src="../../assets/icon/guest-icon-sukses.png" alt="Sukses">
          <p class="font-bold text-xl text-s-black">Nama : <?= $data["nama_mhs"] ?></p>
          <p class="font-bold text-xl text-s-black">Jurusan : <?= $data["jurusan"] ?></p>
          <p class="font-bold text-xl text-s-black">Kunci yang dipinjam</p>
          <p class="font-bold text-xl text-s-black">"<?= $data["nama_kunci"] ?>"</p>
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