<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Request Jadwal</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <!-- Judul -->
    <?php judulPath("Request Jadwal", "./JadwalSecurity.php") ?>

    <!-- Fitur -->
    <main class="px-[15px] flex flex-col gap-[20px]">
      <!-- heading -->
      <div class="flex flex-col gap-[10px] font-semibold text-s-black text-[18px]">
        <h1>Laporan Request Jadwal</h1>

        <!-- Isi -->
        <section class="flex flex-col gap-[5px] p-[10px] bg-ijo-500 rounded-[5px]">
          <div class="flex justify-between items-center text-s-white">
            <h1 class="font-semibold text-[15px]">Request Jadwal</h1>
            <h1 class="font-normal text-[10px]">06/04/2024</h1>
          </div>
          <div class="w-full h-[2px] bg-s-white"></div>
          <div class="flex flex-col gap-[5px]">
            <h1 class="text-center font-bold - text-s-white text-[13px]">Bertukar Jadwal</h1>
            <div class="text-[13px] text-s-white">
              <h1 class="font-semibold">Nama : Wijdan </h1>
              <h1 class="font-semibold">Nomer Hp : 0821353322025 </h1>
            </div>
            <h1 class="text-center  font-bold - text-s-white text-[13px]">dengan</h1>
            <div class="text-[13px] text-s-white">
              <h1 class="font-semibold">Nama : Ageng </h1>
              <h1 class="font-semibold">Nomer Hp : 0812345678 </h1>
            </div>
          </div>
          <div class="flex flex-col gap-[5px]">
            <div class="flex gap-[5px] w-full">
              <a href="" class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                Hubungi
              </a>
              <a href="EditJadwal.php" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                Ubah Jadwal
              </a>
            </div>
            <a href="" class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-s-red font-semibold text-[15px] text-center">
              Hapus Laporan
            </a>

          </div>
        </section>
      </div>

    </main>

  </section>

</body>

</html>