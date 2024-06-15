<?php
if (isset($_GET["status"])) {
  switch ($_GET["status"]) {
    case "gagal":
      echo '<script>
      alert("ada yang salah");
      </script>';
      break;
    case "updateProfile":
      echo '<script>
      alert("berhasil update profile");
      </script>';
      break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Fitur Tambahan</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Fitur Tambahan", "./SecurityJaga.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[5px]">
        <h1 class="text-t-black font-semibold text-[18px]">Fitur Tambahan Kami</h1>
        <div class="flex flex-col gap-[10px]">
          <a href="./LaporanKehilangan.php">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-s-white border border-ijo-500 cursor-pointer ">
              <p class="font-semibold text-xl text-s-black">Laporan Kehilangan</p>
            </div>
          </a>
          <a href="./PerizinanKunci.php">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-s-white border border-ijo-500  cursor-pointer ">
              <p class="font-semibold text-xl text-s-black">Perizinan Pinjaman Kunci</p>
            </div>
          </a>
          <a href="./PengembalianKunci.php">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-s-white border border-ijo-500  cursor-pointer ">
              <p class="font-semibold text-xl text-s-black">Pengembalian Kunci</p>
            </div>
          </a>
          <a href="./RequestJadwal.php">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-s-white border border-ijo-500  cursor-pointer ">
              <p class="font-semibold text-xl text-s-black">Request Jadwal</p>
            </div>
          </a>
          <a href="./EditProfile.php">
            <div class="w-full  text-center px-[25px] py-[5px] rounded-[10px] bg-s-white border border-ijo-500  cursor-pointer ">
              <p class="font-semibold text-xl text-s-black">Edit Profile</p>
            </div>
          </a>
        </div>
      </div>


    </main>

  </section>
</body>

</html>