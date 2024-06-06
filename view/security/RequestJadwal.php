<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Requset Jadwal</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Requset Jadwal", "./FiturTambahan.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]">Laporan Request Jadwal</h1>

        <!-- <form action=""> -->
        <div class="flex flex-col gap-[10px]">

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Tanggal dan Waktu</h1>
            <div class="flex gap-[5px]">
              <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full  text-center" value="06/04/2024" readonly="readonly">
              <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full  text-center" value="13:00" readonly="readonly">
            </div>
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Isikan Nama Anda">
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Nama Teman Penganti</h1>
            <select name="kunci" id="" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full">
              <!-- Nanti ambil dari db -->
              <option value="">Pilih Rekan</option>
              <option value="">Ageng</option>
              <option value="">Security 1</option>
            </select>
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Alasan Request jadwal</h1>
            <textarea type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan alasan anda"></textarea>
          </div>

          <div>
            <a href="./LaporanTerkirim.php" class="w-full">
              <button class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">KIRIM</button>
            </a>
          </div>

        </div>
        <!-- </form> -->
      </div>


    </main>

  </section>
</body>

</html>