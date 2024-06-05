<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Admin</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <!-- Judul -->
    <?php judulPolos("Admin") ?>

    <!-- Fitur -->
    <main class="px-[15px] flex flex-col gap-[20px]">
      <div class="flex flex-col gap-[5px]">
        <h1 class="text-t-black font-semibold text-[18px]">Fitur Kami</h1>
        <section class="flex gap-[5px]">
          <a href="./JadwalSecurity.php">
            <img src="../../assets/sementara/adm-icon-jadwalSecurity-off.svg">
          </a>
          <div>
            <img src="../../assets/sementara/adm-icon-listKunci.svg">
          </div>
        </section>
      </div>
      <div class="flex justify-end">
        <a href="./LaporanPinjamKunci.php">
          <img src="../../assets/sementara/adm-icon-tambahSecurity.svg">
        </a>
      </div>


      <!-- Isi -->
      <section class="p-[10px] bg-ijo-500 rounded-[10px]">
        <div class="flex justify-between items-center text-s-white mb-2">
          <h1 class="font-semibold text-[15px]">Kunci Lab Patt 1</h1>
          <h2 class="font-normal text-[10px]">06/04/2024</h2>
        </div>
        <div class="flex gap-[5px]">
          <img src="../../img/kehilangan/" alt="" class="w-[64px] h-[64px] bg-s-grey">
          <div class="text-[10px] text-s-white">
            <h1 class="font-semibold">Nama : Wijdan </h1>
            <h1 class="font-semibold">Jurusan : Informatika </h1>
            <h1 class="font-semibold">Nomer Hp : 0821353322025 </h1>
          </div>
        </div>

      </section>

    </main>

  </section>

</body>

</html>