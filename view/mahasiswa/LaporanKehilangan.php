<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Laporan Barang</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Laporan Barang", "./LaporanBarang.ph") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">
      <div class="flex flex-col gap-[5px]">
        <h1 class="text-t-black font-semibold text-[18px]"> Barang</h1>
        <section class="p-[10px] bg-ijo-500 rounded-[10px]">
          <div class="flex justify-between items-center text-s-white mb-2">
            <h1 class="font-semibold text-[15px]">Kunci Motor</h1>
            <h2 class="font-normal text-[10px]">06/04/2024</h2>
          </div>
          <div class="flex gap-[5px]">
            <img src="../../img/kehilangan/" alt="" class="w-[64px] h-[64px] bg-s-grey">
            <div class="text-[10px] text-s-white">
              <h1 class="font-semibold">Deskripsi ditemukan : </h1>
              <p class="font-medium">Ditemukan di motor AB xxx</p>
            </div>
          </div>
        </section>
      </div>

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]"> Laporan Kehilangan</h1>

        <!-- <form action=""> -->
        <div class="flex flex-col gap-[5px]">

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama anda">
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">No Hp</h1>
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan No Hp anda">
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Bukti Kepemilikan</h1>
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Contoh : STNK">
          </div>

          <div class="flex flex-col gap-1">
            <label class="font-semibold text-[15px] text-s-black">Bukti Foto</label>
            <div class="flex items-center gap-[10px]">
              <label for="foto" class="flex items-center gap-3">
                <img src="../../assets/icon/guest-icon-upload.png" id="foto-preview" class="object-cover w-[100px] h-[100px] border border-s-black rounded-[10px]" alt="Foto">
              </label>
              <p class="font-normal text-[10px] text-s-black">kirim foto maksimal 2mb</p>
            </div>
            <input type="file" id="foto" name="foto" accept="image/*" class="hidden">
          </div>

          <a href="./LaporanTerkirim.php" class="w-full">
            <button class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">KIRIM</button>
          </a>

        </div>
        <!-- </form> -->
      </div>


    </main>

  </section>

  <script>
    // Memperbaiki penanganan perubahan gambar
    document.getElementById('foto').onchange = function(event) {
      event.preventDefault(); // Mencegah default action form
      const fotoPreview = document.getElementById('foto-preview');
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function() {
          fotoPreview.src = reader.result;
        }
        reader.readAsDataURL(file);
      }
    };
  </script>
</body>

</html>