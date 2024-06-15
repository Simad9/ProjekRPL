<?php
session_start();
require '../../model/be_main.php';

// Set timezone
date_default_timezone_set('Asia/Jakarta'); // Ganti dengan timezone server yang sesuai

// Query untuk mengambil data dari tabel lap_jaga, jadwal, dan security
$id_security = $_SESSION['id_security'];
$query = "SELECT * FROM lap_jaga
INNER JOIN jadwal ON lap_jaga.id_jadwal = jadwal.id_jadwal
INNER JOIN security ON lap_jaga.id_security = security.id_security";
$fetch = mysqli_query($koneksi, $query);

$jamSekarang = date("H:i:s");
$bisaJaga = false;
$penjagaSekarang = [];
$jadwalUser = [];

// Mengulang setiap baris dari hasil query
while ($data = mysqli_fetch_assoc($fetch)) {
  $jamMulai = date("H:i:s", strtotime($data['jamMulai']));
  $jamAkhir = date("H:i:s", strtotime($data['jamAkhir']));

  // Menentukan siapa yang berjaga saat ini
  if ($jamMulai < $jamAkhir) {
    // Shift tidak melintasi tengah malam
    if ($jamSekarang >= $jamMulai && $jamSekarang <= $jamAkhir) {
      $penjagaSekarang[] = [
        'nama' => $data['nama'],
        'jamMulai' => $data['jamMulai'],
        'jamAkhir' => $data['jamAkhir']
      ];
      if ($data['id_security'] == $id_security) {
        $bisaJaga = true;
      }
    }
  } else {
    // Shift melintasi tengah malam
    if ($jamSekarang >= $jamMulai || $jamSekarang <= $jamAkhir) {
      $penjagaSekarang[] = [
        'nama' => $data['nama'],
        'jamMulai' => $data['jamMulai'],
        'jamAkhir' => $data['jamAkhir']
      ];
      if ($data['id_security'] == $id_security) {
        $bisaJaga = true;
      }
    }
  }

  // Menyimpan jadwal user yang sedang login
  if ($data['id_security'] == $id_security) {
    $jadwalUser[] = [
      'jamMulai' => $data['jamMulai'],
      'jamAkhir' => $data['jamAkhir']
    ];
  }
}

// Menampilkan hasil
echo "Penjaga saat ini:<br>";
if (!empty($penjagaSekarang)) {
  foreach ($penjagaSekarang as $penjaga) {
    echo $penjaga['nama'] . " (Mulai: " . $penjaga['jamMulai'] . " - Akhir: " . $penjaga['jamAkhir'] . ")<br>";
  }
} else {
  echo "Tidak ada yang berjaga saat ini.<br>";
}

if ($bisaJaga) {
  echo "Anda sedang berjaga.<br>";
} else {
  echo "Anda tidak sedang berjaga.<br>";
  if (!empty($jadwalUser)) {
    echo "Jadwal Anda:<br>";
    foreach ($jadwalUser as $jadwal) {
      echo "Mulai: " . $jadwal['jamMulai'] . " - Akhir: " . $jadwal['jamAkhir'] . "<br>";
    }
  } else {
    echo "Tidak ada jadwal untuk Anda.<br>";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Security</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPolos("Security") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px] text-center"> Saat ini yang berjaga</h1>
        <div class="flex flex-col gap-[5px] border border-ijo-500 p-[10px] rounded-[10px]">
          <div class="flex justify-between items-center">
            <h1 class="text-t-black font-semibold text-[15px]">Yang Berjaga</h1>
            <h1 class="text-t-black font-semibold text-[10px]"><?= tampilanTanggal($tanggal_sekarang) ?></h1>
          </div>
          <div class="text-center">
            <?php
            if (!empty($penjagaSekarang)) {
              foreach ($penjagaSekarang as $penjaga) {
                // echo $penjaga['nama'] . " (Mulai: " . $penjaga['jamMulai'] . " - Akhir: " . $penjaga['jamAkhir'] . ")<br>";
            ?>
                <h1 class="text-t-black font-bold text-[20px]"><?= $penjaga['nama']  ?></h1>
                <h2 class="text-t-black font-medium text-[20px]"><?= ubahFormatJam($penjaga['jamMulai']) ?> s/d <?= ubahFormatJam($penjaga['jamAkhir']) ?></h2>
            <?php
              }
            }
            ?>
          </div>
        </div>

        <?php if ($bisaJaga) : ?>
          <button class="w-full px-[25px] py-[5px] rounded-[10px] bg-ijo-500 hover:bg-ijo-400 cursor-pointer ">
            <p class="font-semibold text-xl text-s-white">Mulai Berjaga</p>
          </button>
        <?php elseif ($bisaJaga == 'berjaga') : ?>
          <button class="w-full px-[25px] py-[5px] rounded-[10px] bg-ijo-500 hover:bg-ijo-400 cursor-pointer ">
            <p class="font-semibold text-xl text-s-white">Sedang Berjaga</p>
          </button>
        <?php else : ?>
          <button class="w-full px-[25px] py-[5px] rounded-[10px] bg-s-grey cursor-none">
            <p class="font-semibold text-xl text-s-white">Tidak Berjaga</p>
          </button>
        <?php endif; ?>

      </div>

      <div class="flex flex-col gap-[5px]">
        <h1 class="text-t-black font-semibold text-[18px]">Fitur Utama Lainnya</h1>
        <div class="flex flex-col gap-[10px]">
          <a href="./PenemuanBarang.php">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-ijo-500 border border-ijo-500 cursor-pointer ">
              <p class="font-semibold text-xl text-s-white">Penemuan Barang</p>
            </div>
          </a>
          <a href="./ListTemuan.php">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-s-white border border-ijo-500 cursor-pointer ">
              <p class="font-semibold text-xl text-s-black">List Barang Ditemukan</p>
            </div>
          </a>
          <a href="./FiturTambahan.php">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-s-white border border-ijo-500  cursor-pointer ">
              <p class="font-semibold text-xl text-s-black">Tambahan</p>
            </div>
          </a>
          <a href="../../">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-s-white border border-s-red cursor-pointer ">
              <p class="font-semibold text-xl text-s-red">Keluar</p>
            </div>
          </a>

        </div>
      </div>


    </main>

  </section>
</body>

</html>