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
      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]">Fitur Kami</h1>
        <section class="flex gap-[5px]">
          <div>
            <img src="../../assets/sementara/adm-icon-jadwalSecurity.svg">
          </div>
          <a href="./ListKunci.php">
            <img src="../../assets/sementara/adm-icon-listKunci-off.svg">
          </a>
        </section>
        <div class="flex justify-end">
          <a href="./TambahSecurity.php">
            <img src="../../assets/sementara/adm-icon-tambahSecurity.svg">
          </a>
        </div>
      </div>

      <!-- btn -->
      <a href="RequestJadwal.php" class="w-full">
        <div class="w-full px-[10px]  py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-s-black font-medium text-[20px] text-center">Laporan Request Jadwal</div>
      </a>

      <!-- heading -->
      <div class="flex flex-col gap-[10px] font-semibold text-s-black text-[18px]">
        <h1>Jadwal Security</h1>

        <!-- Isi -->
        <section class="flex flex-col gap-[5px] p-[10px] bg-ijo-500 rounded-[5px]">
          <h1 class="font-semibold text-s-white text-[15px]">Security</h1>
          <div class="w-full h-[2px] bg-s-white"></div>
          <div class="flex gap-[5px]">
            <div class="text-[13px] text-s-white">
              <h1 class="font-semibold">Nama : Wijdan </h1>
              <h1 class="font-semibold">Nomer Hp : 0821353322025 </h1>
              <h1 class="font-semibold">Jadwal : 07:00 s/d 15:00 </h1>
            </div>
          </div>
          <div class="flex gap-[5px] w-full">
            <a href="EditSecurity.php" class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
              Edit Data
            </a>
            <a href="EditJadwal.php" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
              Ubah Jadwal
            </a>
          </div>
        </section>
      </div>

    </main>

  </section>

</body>

</html>