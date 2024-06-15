<?php
require '../../model/be_main.php';

if (isset($_POST["submit"])) {
  be_laporanBarang();
}

?>
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

      <form action="" method="post" enctype="multipart/form-data">
        <div class="flex flex-col gap-[5px]">

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Tanggal dan Waktu</h1>
            <div class="flex gap-[5px]">
              <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full  text-center" value="<?= tampilanTanggal($tanggal_sekarang) ?>" readonly="readonly">
              <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full  text-center" value="<?= $waktu_sekarang ?>" readonly="readonly">
            </div>
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Jenis Barang</h1>
            <input type="text" name="jenis" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Contoh: Kunci Motor, Tas, Dokumen, dst">
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Deskripsi Saat Ditentukan</h1>
            <textarea type="text" name="deskripsi" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Contoh: Ditemukan di motor xxx"></textarea>
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
            <button type="submit" name="submit" class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">KIRIM</button>
          </div>

        </div>
      </form>
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