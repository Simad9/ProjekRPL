<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Data Personal | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] w-full">
  <!-- Header -->
  <div class="flex justify-between w-full">
    <a href="profile.php">
      <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali">
    </a>
    <h1 class="font-semibold text-xl text-s-black text-center">Data Personal</h1>
    <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali" class="opacity-0">
  </div>
  <!-- END Header -->
  <div class="h-[3px] w-full bg-s-black rounded"></div>
  <!-- Main -->
  <main>
    <form action="" method="post" class="flex flex-col gap-[10px]">

      <!-- Foto Profile -->
      <div class="flex justify-center items-center">
        <label for="foto" class="relative cursor-pointer">
          <img src="../../assets/img/anonim.jpg" id="foto-preview" alt="Foto Profile" class="size-[80px] rounded-[8px]">
          <img src="../../assets/icon/dataPersonal-icon-kamera.png" alt="kamera" class="absolute bottom-0 right-0">
          <input id="foto" name="foto" type="file" class="hidden">
        </label>
      </div>

      <!-- Form input - Nama -->
      <div class="flex flex-col gap-1">
        <label for="nama" class="font-semibold text-[15px] text-s-black">Nama :</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Anda" value="Wijdan Akhmad S" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
      </div>

      <!-- Form input - Tanggal-->
      <div class="flex flex-col gap-1">
        <label for="tgl" class="font-semibold text-[15px] text-s-black">Tanggal Lahir :</label>
        <input type="date" name="tgl" id="tgl" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black" value="2004-12-31">
      </div>

      <!-- Form input - Alamat Rumah -->
      <div class="flex flex-col gap-1">
        <label for="alamat" class="font-semibold text-[15px] text-s-black">Alamat Rumah :</label>
        <textarea type="text" name="alamat" id="alamat" placeholder="Masukan Alamat Rumah Anda" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">Jalan Cendana no 20</textarea>
      </div>

      <!-- Form input - No Hp -->
      <div class="flex flex-col gap-1">
        <label for="NoHP" class="font-semibold text-[15px] text-s-black">Nomer Handphone :</label>
        <input type="text" name="NoHP" id="NoHP" placeholder="Masukkan Nomer Handphone Anda" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black" value="081234567890">
      </div>

      <!-- Button -->
      <button type="submit" name="submit" class="px-[30px] py-[8px] mt-[20px] bg-ijo-500 w-full rounded-[10px] hover:bg-ijo-300">
        <p class="font-semibold text-xl text-s-white">SIMPAN</p>
      </button>

    </form>
  </main>

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