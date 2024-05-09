<?php
require "../../model/be_main.php";

// Fetch Data di Laporan Barang dengan id tertentu
if (isset($_GET["id"])) {
  $id_lapBarang = $_GET["id"];
  $query = "SELECT * FROM lap_barang WHERE id_lapBarang = '$id_lapBarang'";
  $hasil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_assoc($hasil);
} else {
  // Handle jika $_GET["id"] tidak diatur
}

// lapor kehilangan
if (isset($_POST["submit"])) {
  be_laporKehilangan();
}

// Notifikasi
if (isset($_GET["status"])) {
  switch ($_GET["status"]) {
    case 'gagal;':
      echo "<script>alert('Gagal Mengirim')</script>";
      break;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Laporan Kehilangan | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] w-full  bg-s-white border-x border-ijo-600 mx-auto md:w-9/12 lg:w-7/12">
  <!-- Header -->
  <div class="flex justify-between w-full">
    <a href="homepage.php">
      <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali">
    </a>
    <h1 class="font-semibold text-xl text-s-black text-center">Laporan Kehilangan</h1>
    <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali" class="opacity-0">
  </div>
  <!-- END Header -->
  <div class="h-[3px] w-full bg-s-black rounded"></div>

  <!-- Barang -->
  <p class="font-semibold text-[15px] text-s-black">Barang yang ditemukan : </p>
  <!-- Perulangan card -->
  <div class="flex gap-[10px] bg-ijo-400 w-full p-[10px] rounded-[8px] items-center">
    <img src="../../assets/icon/contoh.png" alt="Gambar Barang" class="object-cover w-[75px] h-[75px]">
    <div class="w-full flex flex-col gap-[5px]">
      <h2 class="font-semibold text-[18px] text-s-black"><?= $data["namaBarang"] ?></h2>
      <div>
        <p class="font-medium text-[13px] text-s-black">Tgl ditemukan : <span class="font-normal text-[13px] text-s-black"><?= tanggalBarangHilang($data['tanggal']) ?></span></p>
        <p class="font-medium text-[13px] text-s-black">Ditemukan di : </p>
        <p class="font-normal text-[13px] text-s-black"><?= $data['deskripsi']  ?></p>
      </div>

    </div>
  </div>
  <!-- END Barang -->
  <div class="h-[3px] w-full bg-s-black rounded"></div>

  <!-- Bukti Kepemilkan -->
  <p class="font-semibold text-[15px] text-s-black">Bukti Kepemilikan : </p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="flex flex-col gap-[10px]">
    <!-- Hidden data -->
    <input type="hidden" name="id_lapBarang" value="<?= $data["id_lapBarang"] ?>">
    <!-- Nama -->
    <div class="flex flex-col gap-1">
      <label for="nama" class="font-semibold text-[15px] text-s-black">Nama :</label>
      <input type="text" name="nama" id="nama" required placeholder="Masukkan Nama" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
    </div>

    <!-- Nomer HP -->
    <div class="flex flex-col gap-1">
      <label for="noHP" class="font-semibold text-[15px] text-s-black">Nomer Handphone :</label>
      <input type="text" name="noHP" id="noHP" required placeholder="Masukkan Nomer HP Anda" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
    </div>

    <!-- Bukti Kepemilikan -->
    <div class="flex flex-col gap-1 relative">
      <label for="kepemilikan" class="font-semibold text-[15px] text-s-black">Bukti Kepemilikan</label>
      <img src="../../assets/icon/guest-icon-arrow.png" alt="arrow" class="-rotate-90 absolute right-3 top-1/2">
      <select name="kepemilikan" id="kepemilikan" class="px-[15px] py-[10px] rounded-[10px] text-s-black border-[2px] border-s-black appearance-none" required>
        <option value="">Opsi Bukti Kepemilikan</option>
        <option value="STNK">STNK</option>
        <option value="Foto">Foto Asli</option>
      </select>
    </div>

    <!-- Bukti Foto -->
    <div class="flex flex-col gap-1">
      <label class="font-semibold text-[15px] text-s-black">Bukti Foto</label>
      <label for="foto" class="flex items-center gap-3">
        <img src="../../assets/icon/guest-icon-upload.png" id="foto-preview" class="object-cover w-[100px] h-[100px] border border-s-black rounded-[10px]" alt="Foto">
        <p class="font-normal text-[10px] text-s-black">kirim foto maksimal 2mb</p>
      </label>
      <input type="file" id="foto" name="foto" class="hidden">
    </div>

    <!-- Button -->
    <button type="submit" name="submit" class="px-[30px] py-[8px] bg-ijo-500 w-full rounded-[10px] hover:bg-ijo-300 font-semibold text-xl text-s-white">KIRIM
    </button>
  </form>

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