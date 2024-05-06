<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Laporan Kehilangan | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] w-full">
  <!-- Header -->
  <div class="flex justify-between w-full">
    <a href="homepage.php">
      <img src="../../assets/img/guest-icon-arrow.png" alt="kembali">
    </a>
    <h1 class="font-semibold text-xl text-s-black text-center">Laporan Kehilangan</h1>
    <img src="../../assets/img/guest-icon-arrow.png" alt="kembali" class="opacity-0">
  </div>
  <div class="h-[3px] w-full bg-s-black rounded"></div>
  <!-- END Header -->

  <!-- Barang -->
  <p class="font-semibold text-[15px] text-s-black">Barang yang ditemukan : </p>
  <!-- Perulangan card -->
  <div class="flex gap-[10px] bg-ijo-400 w-full p-[10px] rounded-[8px] items-center">
    <img src="../../assets/img/contoh.png" alt="Gambar Barang" class="object-cover w-[75px] h-[75px]">
    <div class="w-full flex flex-col gap-[5px]">
      <h2 class="font-semibold text-[18px] text-s-black">Kunci Motor</h2>
      <div class="font-normal text-[13px] text-s-black">
        <p>Tgl : </p>
        <p>ditemukan di : </p>
        <p>Deskripsi Barang</p>
      </div>
    </div>
  </div>
  <div class="h-[3px] w-full bg-s-black rounded"></div>
  <!-- END Barang -->

  <!-- Bukti Kepemilkan -->
  <p class="font-semibold text-[15px] text-s-black">Bukti Kepemilikan : </p>
  <form action="" method="post" class="flex flex-col gap-[10px]">
    <!-- Nama -->
    <div class="flex flex-col gap-1">
      <label for="Nama" class="font-semibold text-[15px] text-s-black">Nama :</label>
      <input type="text" name="Nama" id="Nama" placeholder="Masukkan Nama" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
    </div>

    <!-- Nomer HP -->
    <div class="flex flex-col gap-1">
      <label for="Nomer Handphone" class="font-semibold text-[15px] text-s-black">Nomer Handphone :</label>
      <input type="text" name="Nomer Handphone" id="Nomer Handphone" placeholder="Masukkan Nomer Handphone" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
    </div>
    <!-- Bukti Kepemilikan -->
    <div class="flex flex-col gap-1 relative">
      <label for="kepemilikan" class="font-semibold text-[15px] text-s-black">Bukti Kepemilikan</label>
      <img src="../../assets/img/guest-icon-arrow.png" alt="arrow" class="-rotate-90 absolute right-3 top-1/2">
      <select name="kepemilikan" id="kepemilikan" class="px-[15px] py-[10px] rounded-[10px] text-s-black border-[2px] border-s-black appearance-none">
        <option value="">Opsi Bukti Kepemilikan</option>
        <option value="STNK">STNK</option>
        <option value="Foto">Foto Asli</option>
      </select>
    </div>
    <!-- Bukti Foto -->
    <div class="flex flex-col gap-1">
      <label class="font-semibold text-[15px] text-s-black">Bukti Foto</label>
      <label for="foto" class="flex items-center gap-3">
        <img src="../../assets/img/guest-icon-upload.png" id="foto-preview" class="object-cover w-[100px] h-[100px] border border-s-black rounded-[10px]" alt="Foto">
        <p class="font-normal text-[10px] text-s-black">kirim foto maksimal 2mb</p>
      </label>
      <input type="file" id="foto" required class="hidden">
    </div>
    <!-- Button -->
    <!-- <a href="laporan_sukses.php">
      <button type="submit" name="submit" class="px-[30px] py-[8px] bg-ijo-500 w-full rounded-[10px] hover:bg-ijo-300">
        <p class="font-semibold text-xl text-s-white">KIRIM</p>
      </button>
    </a> -->
  </form>
  <!-- Button -->
  <a href="laporan_sukses.php">
    <button type="submit" name="submit" class="px-[30px] py-[8px] bg-ijo-500 w-full rounded-[10px] hover:bg-ijo-300">
      <p class="font-semibold text-xl text-s-white">KIRIM</p>
    </button>
  </a>
  <!-- END BUkti Kepemilikan -->

  <script>
    const fotoPreview = document.getElementById('foto-preview');
    foto.onchange = function() {
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