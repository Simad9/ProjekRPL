<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Edit Jadwal</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Edit Jadwal", "./JadwalSecurity.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]"> Edit Jadwal Security</h1>

        <!-- <form action=""> -->
        <div class="flex flex-col gap-[10px]">

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama anda" value="Wijdan">
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Jadwal</h1>
            <select name="kunci" id="" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full">
              <!-- Nanti ambil dari db -->
              <option value="">07:00 s/d 15:00</option>
              <option value="">15:00 s/d 22:00</option>
              <option value="">22:00 s/d 07:00</option>
            </select>
          </div>

          <div>
            <a href="./JadwalSecurity.php" class="w-full">
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