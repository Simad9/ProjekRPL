<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Laporan Terkirim</title>
</head>

<body class=" md:w-5/12 md:m-auto border border-s-black border-e-black">
  <section class="flex flex-col gap-[10px] h-screen">
    <?php judulPolos("Laporan Terkirim") ?>

    <main class="flex flex-col gap-[20px] mb-20 justify-center items-center w-full">
      <section class="flex flex-col">
        <div class="flex flex-col justify-center items-center">
          <img src="../../assets/icon/guest-icon-sukses.png" alt="Sukses">
          <p class="font-bold text-xl text-s-black">Laporan Terkirim!</p>
        </div>
      </section>
      <a href="./SecurityJaga.php">
        <div class="w-full px-[25px] py-[8px] rounded-[10px] bg-ijo-500 hover:bg-ijo-400 cursor-pointer ">
          <p class="font-semibold text-xl text-s-white">Kembali ke Halaman Awal</p>
        </div>
      </a>
    </main>

  </section>
</body>

</html>