<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Security</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPolos("Security") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px] text-center"> Saat ini yang berjaga</h1>
        <div class="flex flex-col gap-[5px] border border-ijo-500 p-[10px] rounded-[10px]">
          <div class="flex justify-between items-center">
            <h1 class="text-t-black font-semibold text-[15px]">Yang Berjaga</h1>
            <h1 class="text-t-black font-semibold text-[10px]">06/04/2024</h1>
          </div>
          <div class="text-center">
            <h1 class="text-t-black font-bold text-[20px]">Wijdan</h1>
            <h2 class="text-t-black font-medium text-[20px]">07:00 s/d 15:00</h2>
          </div>
        </div>

        <button class="w-full px-[25px] py-[5px] rounded-[10px] bg-ijo-500 hover:bg-ijo-400 cursor-pointer ">
          <p class="font-semibold text-xl text-s-white">Mulai Berjaga</p>
        </button>
      </div>

      <div class="flex flex-col gap-[5px]">
        <h1 class="text-t-black font-semibold text-[18px]">Fitur Utama Lainnya</h1>
        <div class="flex flex-col gap-[10px]">
          <a href="./PenemuanBarang.php">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-ijo-500 border border-ijo-500 cursor-pointer ">
              <p class="font-semibold text-xl text-s-white">Penemuan Barang</p>
            </div>
          </a>
          <a href="./ListTemuan.php">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-s-white border border-ijo-500 cursor-pointer ">
              <p class="font-semibold text-xl text-s-black">List Barang Ditemukan</p>
            </div>
          </a>
          <a href="./FiturTambahan.php">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-s-white border border-ijo-500  cursor-pointer ">
              <p class="font-semibold text-xl text-s-black">Tambahan</p>
            </div>
          </a>
        </div>
      </div>


    </main>

  </section>
</body>

</html>