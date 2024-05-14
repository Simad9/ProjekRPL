<?php
session_start();
require "../../model/be_main.php";
// Harus login dulu
sessionProtection();

// Absen jaga
if (isset($_GET['submit'])) {
  be_mulaiJaga();
}

// Fetch id dari session // ambil data security
$id_user = $_SESSION["id_user"];
$queryUser = "SELECT * FROM security WHERE id_user = $id_user";
$hasilUser = mysqli_query($koneksi, $queryUser);
$dataUser = mysqli_fetch_assoc($hasilUser);

// id_security yang saat ini
$id_security = be_fetchIdSecurity();
$jaga = false;

// Fetch Data Apakah jaga atau tidak
$queryJadwal = "SELECT * FROM jadwal_security 
INNER JOIN jadwal ON jadwal.id_jadwal = jadwal_security.id_jadwal
INNER JOIN security ON security.id_security = jadwal_security.id_security
WHERE jadwal_security.id_security = $id_security;";
$fetchJadwal = mysqli_query($koneksi, $queryJadwal);
$dataJadwal = mysqli_fetch_assoc($fetchJadwal);
$dataMulai = $dataJadwal['waktuMulai'];
$dataSelesai = $dataJadwal['waktuSelesai'];
if ($waktu_sekarang > $dataMulai && $waktu_sekarang < $dataSelesai) {
  $jaga = true;
}

// cek sudah absen
$query = "SELECT * FROM lap_shift 
  WHERE id_security = $id_security ORDER BY waktuMulai DESC LIMIT 1";
$data = mysqli_fetch_assoc(mysqli_query($koneksi, $query));
if (!$data == null) {
  if ($data['waktuMulai'] > $waktu_sekarang) {
    $jaga = false;
  }
}




// Notif
if (isset($_GET["status"])) {
  $message = "";
  switch ($_GET["status"]) {
    case 'gagal':
      $message = "Gagal Mengirim";
      break;
    case 'berhasil':
      $message = "Berhasil Absen untuk hari ini";
      break;
    case 'beresJaga':
      $message = "Selesai jaga hari ini";
      break;
    case 'berhasilBarang':
      $message = "Berhasil mengirim laporan barang";
      break;
  }
  echo "<script>alert('$message');</script>";
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Homepage | Security App</title>
</head>

<body class="relative bg-s-white border-x border-ijo-600 mx-auto md:w-9/12 lg:w-7/12 flex flex-col gap-[10px] p-[30px] w-full h-screen ">
  <!-- Bagian atas -->
  <div class="flex justify-between items-center w-full">
    <img src="../../assets/img/anonim.jpg" alt="Foto Profile" class="size-[40px] rounded-full">
    <img src="../../assets/icon/icon-notif.png" alt="notif icon" class="size-[20px] cursor-pointer">
  </div>
  <!-- END Bagian atas -->

  <!-- Sapa User -->
  <div>
    <p class="font-medium text-[15px] text-s-black">Selamat Pagi</p>
    <h1 class="font-bold text-[25px] text-s-black"><?= $dataUser["nama"] ?></h1>
  </div>
  <!-- END Sapa User -->

  <div class="h-[3px] w-full bg-s-black rounded"></div>

  <!-- Fitur Kami -->
  <div class="flex flex-col gap-[5px]">
    <p class="font-semibold text-[15px] text-s-black">Fitur Kami : </p>
    <div class="flex gap-[10px] justify-evenly">
      <a href="../security/laporan_barang.php" class="flex flex-col justify-center items-center p-[10px] bg-ijo-400 hover:bg-ijo-500 rounded-[10px] w-full cursor-pointer">
        <img src="../../assets/icon/security-icon-barang.png" alt="Lapor Barang" class="w-[50px] h-[50px] fill-s-black">
        <p class="font-semibold text-[15px] text-s-black">Laporan</p>
        <p class="font-semibold text-[15px] text-s-black">Barang</p>
      </a>
      <a href="../security/pergantian_shift.php" class="flex flex-col justify-center items-center p-[10px] bg-ijo-400 hover:bg-ijo-500 rounded-[10px] w-full cursor-pointer">
        <img src="../../assets/icon/security-icon-shift.png" alt="Lapor Barang" class="w-[50px] h-[50px] fill-s-black">
        <p class="font-semibold text-[15px] text-s-black">Pergantian</p>
        <p class="font-semibold text-[15px] text-s-black">Shift</p>
      </a>
    </div>
  </div>
  <!-- END Fitru Kami -->

  <div class="h-[3px] w-full bg-s-black rounded"></div>

  <!-- Mulai jaga -->
  <div class="mb-20">
    <?php if ($jaga) : ?>
      <p class="font-semibold text-[15px] text-s-black text-center">Waktunya jaga pak!! </p>
      <form action="../../model/be_mulaiJaga.php" method="post">
        <!-- Hidden data -->
        <input type="hidden" name="id_security" value="<?= $id_security ?>">
        <input type="hidden" name="id_jadwal" value="<?= $dataJadwal['id_jadwal'] ?>">
        <!-- button -->
        <button type="submit" name="submit" class="px-[30px] py-[10px] bg-ijo-500 w-full rounded-[10px] hover:bg-ijo-400 mb-2 font-semibold text-xl text-s-white">
          Absen Masuk Jaga
        </button>
      </form>
    <?php else : ?>
      <button type="button" class="px-[30px] py-[10px] bg-slate-500 w-full rounded-[10px] mb-2">
        <p class="font-semibold text-xl text-s-white text-center">Absen Masuk Jaga</p>
      </button>
    <?php endif; ?>

    <?php
    // Logic Yang jaga
    $queryJaga = "SELECT * FROM jadwal_security 
      INNER JOIN jadwal ON jadwal.id_jadwal = jadwal_security.id_jadwal
      INNER JOIN security ON security.id_security = jadwal_security.id_security";
    $fetchJaga = mysqli_query($koneksi, $queryJaga);
    while ($dataJaga = mysqli_fetch_assoc($fetchJaga)) {
      $waktu_sekarang = date('H:i:s');
      $waktu_mulai = $dataJaga['waktuMulai'];
      $waktu_selesai = $dataJaga['waktuSelesai'];
      // ini waktu yang berjaga
      if ($waktu_sekarang >= $waktu_mulai && $waktu_sekarang <= $waktu_selesai) {
        $namaSecurity = $dataJaga['nama'];
        $jamJadwal = $dataJaga['id_jadwal'];
        switch ($jamJadwal) {
          case 1:
            $jamWaktuJaga = "07:00 s/d 15:00";
            break;
          case 2:
            $jamWaktuJaga = "15:00 s/d 22:00";
            break;
          case 3:
            $jamWaktuJaga = "22:00 s/d 07:00";
            break;
        }
      }
    }
    ?>

    <section class="flex flex-col gap-[5px] p-[10px] border-[2px] border-ijo-400 rounded-[10px]">
      <div class="flex flex-col gap-[10px] w-full p-[10px] rounded-[8px] items-center">
        <img src="../../assets/icon/contoh.png" alt="Gambar Barang" class="object-cover w-[75px] h-[75px]">
        <div class="w-full flex flex-col gap-[5px] justify-center items-center">
          <h2 class="font-semibold text-[18px] text-s-black"><?= $namaSecurity ?></h2>
          <h2 class="font-semibold text-[18px] text-s-black">
            <?= $jamWaktuJaga ?>
          </h2>
        </div>
      </div>
    </section>
  </div>


  <?php // require '../../tamplate/navbar.php' 
  ?>

  <nav class="flex px-[63px] py-[13px] justify-between items-center bg-ijo-500 w-full bottom-0 left-0 absolute">
    <!-- Barang -->
    <a href="../security/laporan_barang.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer  p-1">
        <div class="relative">
          <img src="../../assets/icon/nav-icon-barang.png" alt="Barang" class="size-[30px] group-hover:opacity-0">
          <img src="../../assets/icon/nav-icon-barang-active.png" alt="Barang-hover" class="size-[30px] opacity-0 absolute top-0 left-0 group-hover:opacity-100">
        </div>
        <p class="font-reguler text-[12px] text-s-white group-hover:font-bold">Barang</p>
      </div>
    </a>
    <!-- Pergantian -->
    <a href="../security/pergantian_shift.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer ">
        <div class="relative">
          <img src="../../assets/icon/nav-icon-shift.png" alt="shift" class="size-[30px] group-hover:opacity-0">
          <img src="../../assets/icon/nav-icon-shift-active.png" alt="shift-hover" class="size-[30px] opacity-0 absolute top-0 left-0 group-hover:opacity-100">
        </div>
        <p class="font-reguler text-[12px] text-s-white group-hover:font-bold">Pergantian</p>
      </div>
    </a>
    <!-- Profile -->
    <a href="../security/profile.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer ">
        <div class="relative">
          <img src="../../assets/icon/nav-icon-profile.png" alt="profile" class="size-[30px] group-hover:opacity-0">
          <img src="../../assets/icon/nav-icon-profile-active.png" alt="profile-hover" class="size-[30px] opacity-0 absolute top-0 left-0 group-hover:opacity-100">
        </div>
        <p class="font-reguler text-[12px] text-s-white group-hover:font-bold">Profile</p>
      </div>
    </a>
  </nav>


</body>


</html>