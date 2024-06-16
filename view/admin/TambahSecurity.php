<?php
require '../../model/be_main.php';

if (isset($_POST['submit'])) {
  be_tambahSecurity();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Tambah Security</title>
</head>

<body class=" md:w-5/12 md:m-auto border border-s-black border-e-black">
  <section class="flex flex-col gap-[10px] h-screen">
    <?php judulPath("Tambah Security", "./JadwalSecurity.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]"> Tambah Security</h1>

        <form action="" method="post">
          <div class="flex flex-col gap-[10px]">

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
              <input type="text" name="nama" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama Security">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">No Hp</h1>
              <input type="text" name="noHp" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan No Hp Security">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Username</h1>
              <input type="text" name="username" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Username Security Sementara">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Password</h1>
              <input type="password" name="password" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Password Security Sementara">
            </div>

            <div>
              <!-- <a href="./JadwalSecurity.php" class="w-full"> -->
              <button type="submit" name="submit" class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">KIRIM</button>
              <!-- </a> -->
            </div>

          </div>
        </form>
      </div>


    </main>

  </section>
</body>

</html>