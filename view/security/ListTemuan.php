<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>List Temuan</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("List Temuan", "./SecurityJaga.php") ?>

    <main class="px-[15px] flex flex-col gap-[10px]">
      <h1 class="text-t-black font-semibold text-[18px]"> List Barang Temuan</h1>

      <section class="p-[10px] bg-ijo-500 rounded-[10px]">
        <div class="flex justify-between items-center text-s-white mb-2">
          <h1 class="font-semibold text-[15px]">Kunci Motor</h1>
          <h2 class="font-normal text-[10px]">06/04/2024</h2>
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
      </section>


    </main>

  </section>

</body>

</html>