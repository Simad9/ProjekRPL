<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Lap. Kehilangan</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Lap. Kehilangan", "./FiturTambahan.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]">Laporan Kehilangan Barang</h1>

        <!-- <form action=""> -->
        <div class="flex flex-col gap-[10px]">

          <section class="flex flex-col gap-[5px] p-[10px] bg-ijo-500 rounded-[5px]">
            <div class="flex justify-between items-center text-s-white">
              <h1 class="font-semibold text-[15px]">Kunci Motor</h1>
              <h1 class="font-normal text-[10px]">06/04/2024</h1>
            </div>
            <div class="flex gap-[5px] w-full">
              <div class="aspect-[1/1] w-[64px]">
                <img src="../../assets/img" alt="foto barang" class="object-cover w-full h-full bg-s-grey">
              </div>
              <div class="text-[10px] text-s-white">
                <h1 class="font-semibold text-[13px]">Deskripsi ditemukan : </h1>
                <p class="font-medium shrink">Ditemukan di motor AB xxx Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi reprehenderit, ratione odit mollitia perspiciatis ullam tempore .</p>
              </div>
            </div>

            <div class="w-full h-[2px] bg-s-white"></div>

            <div class="flex flex-col gap-[5px]">
              <h1 class="font-bold text-s-white text-[13px]">Pelapor</h1>
              <div class="text-[13px] text-s-white">
                <h1 class="font-semibold">Nama : Ageng </h1>
                <h1 class="font-semibold">Nomer Hp : 081234567890 </h1>
              </div>
            </div>

            <div class="flex flex-col gap-[5px]">
              <div class="flex gap-[5px] w-full">
                <a href="https://wa.me/+6281234567890" class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                  Hubungi
                </a>
                <a href="DetailKehilangan.php" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                  Cek Detail
                </a>
              </div>

            </div>
          </section>


        </div>
        <!-- </form> -->
      </div>


    </main>

  </section>
</body>

</html>