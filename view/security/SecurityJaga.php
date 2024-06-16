<?php
session_start();
require '../../model/be_main.php';
// Set timezone
date_default_timezone_set('Asia/Jakarta'); // Ganti dengan timezone server yang sesuai

// Melihat siapa yang berjaga
$query = "SELECT * FROM lap_jaga
JOIN jadwal ON lap_jaga.id_jadwal = jadwal.id_jadwal
JOIN security ON lap_jaga.id_security = security.id_security
";
$fetch = mysqli_query($koneksi, $query);
$jaga = mysqli_fetch_assoc($fetch);

// Ngecek aku jaga gak
$id_security = $_SESSION['id_security'];
$query = "SELECT * FROM lap_jaga
JOIN jadwal ON lap_jaga.id_jadwal = jadwal.id_jadwal
JOIN security ON lap_jaga.id_security = security.id_security
WHERE lap_jaga.id_security = $id_security;
";
$fetch = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($fetch);

// var_dump($data);

$current_time = new DateTime();
$waktu_mulai = new DateTime($jaga['jamMulai']);
$waktu_selesai = new DateTime($jaga['jamAkhir']);

// print_r($current_time = new DateTime());
// echo "<br>";
// print_r($waktu_mulai = new DateTime($jaga['jamMulai']));
// echo "<br>";
// print_r($waktu_selesai = new DateTime($jaga['jamAkhir']));
// echo "<br>";


$belumJaga = false;
$berjaga = "";

// echo $id_security;
// echo "<br>";
// echo $jaga['id_security'];

if ($waktu_mulai < $waktu_selesai) {
  if ($current_time >= $waktu_mulai && $current_time <= $waktu_selesai) {

    // $belumJaga = false;
    if ($jaga['id_security'] == $id_security) {
      $berjaga = "ready";

      if ($current_time < $waktu_selesai) {
        $berjaga = 'selesai';
      }
    } else {
      $belumJaga = true;
    }
  }
} else {
  // Shift melintasi tengah malam
  if ($current_time >= $waktu_mulai || $current_time <= $waktu_selesai) {

    // $belumJaga = false;
    if ($jaga['id_security'] == $id_security) {
      $berjaga = "ready";

      if ($current_time < $waktu_selesai) {
        $berjaga = 'selesai';
      }
    } else {
      $belumJaga = true;
    }
  }
}


// mulai jaga
if (isset($_POST["jaga"])) {
  be_mulaiJaga($id_security);
} else if (isset($_POST["selesai"])) {
  be_selesaiJaga($id_security);
}

// apakah lagi jaga atau tidak
if ($data['statusJaga'] == 'berjaga') {
  $berjaga = "sedang";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Security</title>
</head>

<body class=" md:w-5/12 md:m-auto border border-s-black border-e-black">
  <section class="flex flex-col gap-[10px] h-screen">
    <?php judulPolos("Security") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px] text-center"> Saat ini yang berjaga</h1>
        <div class="flex flex-col gap-[5px] border border-ijo-500 p-[10px] rounded-[10px]">
          <div class="flex justify-between items-center">
            <h1 class="text-t-black font-semibold text-[15px]">Yang Berjaga</h1>
            <h1 class="text-t-black font-semibold text-[10px]"><?= tampilanTanggal($tanggal_sekarang) ?></h1>
          </div>

          <!-- Yang berjaga -->
          <div class="text-center">
            <h1 class="text-t-black font-bold text-[20px]"><?= $jaga['nama']  ?></h1>
            <h2 class="text-t-black font-medium text-[20px]"><?= ubahFormatJam($jaga['jamMulai']) ?> s/d <?= ubahFormatJam($jaga['jamAkhir']) ?></h2>
          </div>
        </div>

        <!-- Button untuk memulai -->


        <?php
        if ($belumJaga) : ?>
          <button class="w-full px-[25px] py-[5px] rounded-[10px] bg-s-grey" disabled>
            <p class="font-semibold text-xl text-s-white">Tidak Jaga</p>
          </button>
        <?php else : ?>
          <?php if ($berjaga == "ready") : ?>

            <form action="" method="post">
              <input type="hidden" name="$id_security" value="<?= $id_security ?>">
              <button type="submit" name="jaga" class="w-full px-[25px] py-[5px] rounded-[10px] bg-ijo-500 hover:bg-ijo-400 cursor-pointer ">
                <p class="font-semibold text-xl text-s-white">Mulai Berjaga</p>
              </button>
            </form>

          <?php elseif ($berjaga == "sedang") : ?>
            <button class="w-full px-[25px] py-[5px] rounded-[10px]  bg-s-grey" disabled>
              <p class="font-semibold text-xl text-s-white">Sedang Berjaga</p>
            </button>
          <?php elseif ($berjaga == "selesai") : ?>
            <button class="w-full px-[25px] py-[5px] rounded-[10px] bg-ijo-500 hover:bg-ijo-400 cursor-pointer ">
              <p class="font-semibold text-xl text-s-white">Selesai Berjaga</p>
            </button>
          <?php endif; ?>

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