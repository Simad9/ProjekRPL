<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Edit Security</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Edit Security", "./JadwalSecurity.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]"> Edit Security</h1>

        <!-- <form action=""> -->
        <div class="flex flex-col gap-[10px]">

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama Security" value="Wijdan">
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">No Hp</h1>
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan No Hp Security" value="082135322025">
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Username</h1>
            <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Username Security Sementara" value="123">
          </div>

          <div>
            <h1 class="font-semibold text-s-black text-[15px]">Password</h1>
            <input type="password" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Password Security Sementara" value="123">
          </div>

          <div>
            <a href="./JadwalSecurity.php" class="w-full">
              <button class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">SIMPAN</button>
            </a>
          </div>

          <div>
            <button class="w-full px-[10px] py-[5px] rounded-[10px] bg-s-red text-s-white font-medium text-[20px]">HAPUS</button>
          </div>


        </div>
        <!-- </form> -->
      </div>


    </main>

  </section>
</body>

</html>