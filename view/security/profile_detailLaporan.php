<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Detail Laporan | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] w-full">
  <!-- Header -->
  <div class="flex justify-between w-full">
    <a href="profile.php">
      <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali">
    </a>
    <h1 class="font-semibold text-xl text-s-black text-center">Laporan Mahasiswa</h1>
    <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali" class="opacity-0">
  </div>
  <!-- END Header -->
  <div class="h-[3px] w-full bg-s-black rounded"></div>
  <!-- Main -->
  <main>
    <!-- Nanti dibikin perulangan sesuai data || Kasih kalo data kosong juga-->
    <section class="flex flex-col gap-[5px] p-[10px] border-[2px] border-ijo-400 rounded-[10px]">
      <!-- Barangnya -->
      <div class="flex gap-[10px] w-full p-[10px] rounded-[8px] items-center">
        <img src="../../assets/icon/contoh.png" alt="Gambar Barang" class="object-cover w-[75px] h-[75px]">
        <div class="w-full flex flex-col gap-0">
          <h2 class="font-semibold text-[18px] text-s-black">Kunci Motor</h2>
          <div class="font-normal text-[13px] text-s-black">
            <p>Tgl : </p>
            <p>ditemukan di : </p>
            <p>Deskripsi Barang</p>
          </div>
        </div>
      </div>
      <div class="h-[2px] w-full bg-ijo-400 rounded"></div>
      <!-- pelapor -->
      <div class="flex flex-col">
        <h1 class="font-semibold text-[18px] text-s-black">Pelapor</h1>
        <div class="flex flex-col font-normal text-[13px] text-s-black">
          <p>Nama : Ageng Sandar</p>
          <p>No Hp : 08123456789</p>
        </div>
      </div>
      <!-- Bukti -->
      <div class="flex flex-col gap-[5px]">
        <h1 class="font-semibold text-[18px] text-s-black">Bukti</h1>
        <div class="font-normal text-[13px] text-s-black">
          <p>Jenis : STNK</p>
        </div>
        <img src="../../assets/img/contohBukti.JPG" alt="foot bukti" class="w-full h-full object-cover">
      </div>
      <!-- Button -->
      <div class="flex w-full gap-[10px]">
        <a href="https://wa.me/<?= $noHp ?>" target="_blank" class="w-full px-[15px] py-[5px] border border-ijo-400 rounded-[10px] hover:bg-ijo-400 hover:text-s-white text-center text-medium text-[13px] text-s-black">Hubungi</a>
      </div>

    </section>

  </main>

</body>

</html>