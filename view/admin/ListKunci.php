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
        <a href="./TambahKunci.php">
          <img src="../../assets/sementara/adm-icon-tambahKunci.svg">
        </a>
      </div>


      <!-- Isi -->
      <div class="flex flex-col gap-[10px] font-semibold text-s-black text-[18px]">
        <h1>List KUnci Dimiliki</h1>

        <!-- Perulangan -->
        <section class="p-[10px] bg-ijo-500 rounded-[10px]">
          <div class="flex justify-center items-center text-s-white mb-2">
            <h1 class="font-semibold text-[15px]">Kunci Lab Patt 1</h1>
          </div>
          <div class="flex gap-[5px]">
            <img src="../../img/kehilangan/" alt="" class="w-[64px] h-[64px] bg-s-grey">
            <div class="text-[13px] text-s-white font-semibold">
              <h1>Lokasi : Patt 1, arah Selatan</h1>
              <h1>Penganggung Jawab : Pak Sugeng</h1>
              <h1>Note : </h1>
              <p>Mahasiswa harus izin terlebih dahulu</p>
            </div>
          </div>
          <div class="flex gap-[5px] w-full">
            <button class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-s-red font-semibold text-[15px] text-center">
              Hapus
            </button>
            <a href="EditKunci.php" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
              Edit
            </a>
          </div>

        </section>

        <section class="p-[10px] bg-ijo-500 rounded-[10px]">
          <div class="flex justify-center items-center text-s-white mb-2">
            <h1 class="font-semibold text-[15px]">Kunci Ruang Seminar</h1>
          </div>
          <div class="flex gap-[5px]">
            <img src="../../img/kehilangan/" alt="" class="w-[64px] h-[64px] bg-s-grey">
            <div class="text-[13px] text-s-white font-semibold">
              <h1>Lokasi : Patt 1, arah Utara</h1>
              <h1>Penganggung Jawab : Pak Sugeng</h1>
              <h1>Note : </h1>
              <p>Mahasiswa harus izin terlebih dahulu</p>
            </div>
          </div>
          <div class="flex gap-[5px] w-full">
            <button href="EditSecurity.php" class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-s-red font-semibold text-[15px] text-center">
              Hapus
            </button>
            <a href="EditKunci.php" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
              Edit
            </a>
          </div>

        </section>
      </div>

    </main>

  </section>

</body>

</html>