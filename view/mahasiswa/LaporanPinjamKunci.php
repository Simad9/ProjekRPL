<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Pinjam Kunci</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Pinjam Kunci", "./LaporanBarang.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]"> Laporan Kehilangan</h1>

        <!-- <form action=""> -->
        <div class="flex flex-col gap-[10px]">

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama anda">
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Jurusan</h1>
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Jurusan anda">
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">No Hp</h1>
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan No Hp anda">
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Kunci Yang Dipinjam</h1>
            <select name="kunci" id="" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full">
              <!-- Nanti ambil dari db -->
              <option value="">Pilih Kunci</option>
              <option value="">Kunci Lab Patt1</option>
              <option value="">Kunci Seminar Informatika</option>
            </select>
          </div>

          <div>
            <a href="./LaporanKunciTerkirim.php" class="w-full">
              <button class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">KIRIM</button>
            </a>
          </div>

        </div>
        <!-- </form> -->
      </div>


    </main>

  </section>
</body>

</html>