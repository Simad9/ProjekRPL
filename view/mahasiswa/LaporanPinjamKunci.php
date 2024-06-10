<?php
require '../../model/be_main.php';

$query = "SELECT * FROM kunci";
$hasil = mysqli_query($koneksi, $query);

if (isset($_POST["submit"])) {
  $input = ["nama", "nohp", "jurusan", "kunci"];
  foreach ($input as $i) {
    if (empty($_POST[$i])) {
      header("location: LaporanPinjamKunci.php?status=kosong");
      exit;
    }
  }
  pinjamKunci();
}

if (isset($_GET["status"])) {
  switch ($_GET["status"]) {
    case "gagal":
      echo '<script>
      alert("Pinjam Kunci Gagal");
      </script>';
      break;
    case "kosong":
      echo '<script>
        alert("Isi formnya dulu");
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
  <title>Pinjam Kunci</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Pinjam Kunci", "./LaporanKunci.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]"> Laporan Kehilangan</h1>

        <form action="" method="post">
          <div class="flex flex-col gap-[10px]">

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
              <input type="text" name="nama" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama anda">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Jurusan</h1>
              <input type="text" name="jurusan" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Jurusan anda">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">No Hp</h1>
              <input type="text" name="nohp" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan No Hp anda">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Kunci Yang Dipinjam</h1>
              <select name="kunci" id="" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full">

                <!-- Nanti ambil dari db -->
                <option value="0">Pilih Kunci</option>
                <?php while ($data = mysqli_fetch_assoc($hasil)) : ?>
                  <option value="<?= $data["id_kunci"] ?>"><?= $data["nama"] ?></option>
                <?php endwhile; ?>

              </select>
            </div>

            <div>
              <!-- <a href="./LaporanKunciTerkirim.php" class="w-full"> -->
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