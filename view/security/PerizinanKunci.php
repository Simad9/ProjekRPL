<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Perizinan Kunci</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Perizinan Kunci", "./FiturTambahan.php") ?>

    <main class="px-[15px] flex flex-col gap-[10px]">
      <h1 class="text-t-black font-semibold text-[18px]">Laporan Perizinan Kunci</h1>

      <section class="p-[10px] bg-ijo-500 rounded-[10px] flex flex-col gap-[5px]">
        <div class="flex justify-between items-center text-s-white mb-2">
          <h1 class="font-semibold text-[15px]">Kunci Ruang Seminar</h1>
          <h2 class="font-normal text-[10px]">06/04/2024</h2>
        </div>

        <div class="flex gap-[5px] w-full">
          <div class="aspect-[1/1] w-[64px]">
            <img src="../../assets/img" alt="foto kunci" class="object-cover w-full h-full bg-s-grey">
          </div>
          <div class="text-[10px] text-s-white">
            <h1 class="font-semibold text-[13px]">Nama: Dino </h1>
            <h1 class="font-semibold text-[13px]">Jurusan: Informatika </h1>
            <h1 class="font-semibold text-[13px]">No Hp: 0812345678 </h1>
          </div>
        </div>

        <div class="flex gap-[5px] w-full">
          <button class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-s-red font-semibold text-[15px] text-center">
            Tolak
          </button>
          <button class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
            Izinkan
          </button>
        </div>
      </section>


    </main>

  </section>

</body>

</html>