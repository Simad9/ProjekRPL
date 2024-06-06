<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Penemuan Barang</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Penemuan Barang", "./SecurityJaga.php") ?>

    <main class="px-[15px] flex flex-col gap-[10px]">
      <h1 class="text-t-black font-semibold text-[18px]"> Laporan Penemuan</h1>

      <!-- <form action=""> -->
      <div class="flex flex-col gap-[5px]">

        <div>
          <h1 class="font-semibold text-s-black text-[15px]">Tanggal dan Waktu</h1>
          <div class="flex gap-[5px]">
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full  text-center" value="06/04/2024" readonly="readonly">
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full  text-center" value="13:00" readonly="readonly">
          </div>
        </div>

        <div>
          <h1 class="font-semibold text-s-black text-[15px]">Jenis Barang</h1>
          <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Contoh: Kunci Motor, Tas, Dokumen, dst">
        </div>

        <div>
          <h1 class="font-semibold text-s-black text-[15px]">Deskripsi Saat Ditentukan</h1>
          <textarea type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Contoh: Ditemukan di motor xxx"></textarea>
        </div>

        <div class="flex flex-col gap-1">
          <label class="font-semibold text-[15px] text-s-black">Foto Barang Temuan</label>
          <div class="flex items-center gap-[10px]">
            <label for="foto" class="flex items-center gap-3">
              <img src="../../assets/icon/guest-icon-upload.png" id="foto-preview" class="object-cover w-[100px] h-[100px] border border-s-black rounded-[10px]" alt="Foto">
            </label>
            <p class="font-normal text-[10px] text-s-black">kirim foto maksimal 2mb</p>
          </div>
          <input type="file" id="foto" name="foto" accept="image/*" class="hidden">
        </div>

        <div>
          <a href="./LaporanTerkirim.php" class="w-full">
            <button class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">KIRIM</button>
          </a>
        </div>

      </div>
    </main>

  </section>

</body>

</html>