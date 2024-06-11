<?php
require '../../model/be_main.php';

$query = "SELECT * FROM kunci";
$hasil = mysqli_query($koneksi, $query);

if (isset($_POST["hapus"])) {
  be_hapusKunci($_POST["id_kunci"]);
}

// notif
if (isset($_GET["status"])) {
  switch ($_GET["status"]) {
    case "kunciDiupdate":
      echo '<script>
      alert("Berhasil Update kunci");
      </script>';
      break;
    case "kunciDihapus":
      echo '<script>
            alert("Kunci dihapus");
            </script>';
      break;
    case "kunciDitambah":
      echo '<script>
            alert("Berhasil tambah kunci");
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
  <title>Admin</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <!-- Judul -->
    <?php judulPolos("Admin") ?>

    <!-- Fitur -->
    <main class="px-[15px] flex flex-col gap-[20px]">
      <div class="flex flex-col gap-[5px]">
        <h1 class="text-t-black font-semibold text-[18px]">Fitur Kami</h1>
        <section class="flex justify-between items-center">
          <div class="flex gap-[5px]">
            <a href="./JadwalSecurity.php">
              <img src="../../assets/sementara/adm-icon-jadwalSecurity-off.svg">
            </a>
            <div>
              <img src="../../assets/sementara/adm-icon-listKunci.svg">
            </div>
          </div>
          <a href="../../">
            <img src="../../assets/sementara/adm-icon-tombolKeluar.svg">
          </a>
        </section>
      </div>
      <div class="flex justify-end">
        <a href="./TambahKunci.php">
          <img src="../../assets/sementara/adm-icon-tambahKunci.svg">
        </a>
      </div>


      <!-- Isi -->
      <div class="flex flex-col gap-[10px] font-semibold text-s-black text-[18px]">
        <h1>List Kunci Dimiliki</h1>

        <?php
        if (mysqli_num_rows($hasil) > 0) :
          while ($data = mysqli_fetch_assoc($hasil)) :
            // var_dump($data);
        ?>
            <!-- Perulangan -->
            <section class="p-[10px] bg-ijo-500 rounded-[10px]">
              <div class="flex justify-center items-center text-s-white mb-2">
                <h1 class="font-semibold text-[15px]"><?= $data['nama'] ?></h1>
              </div>
              <div class="flex gap-[5px]">
                <img src="../../img/kunci/<?= $data['urlFoto'] ?>" alt="" class="w-[64px] h-[64px] bg-s-grey">
                <div class="text-[13px] text-s-white font-semibold">
                  <h1>Lokasi : <?= $data['lokasi'] ?></h1>
                  <h1>Penganggung Jawab : <?= $data['penjaw'] ?></h1>
                  <h1>Note : </h1>
                  <p><?= $data['note'] ?></p>
                </div>
              </div>
              <form action="" method="post">
                <input type="hidden" name="id_kunci" value="<?= $data['id_kunci'] ?>">
                <div class="flex gap-[5px] w-full">
                  <button type="submit" name="hapus" class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-s-red font-semibold text-[15px] text-center">
                    Hapus
                  </button>
                  <a href="EditKunci.php?id_kunci=<?= $data['id_kunci'] ?>" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                    Edit
                  </a>
                </div>
              </form>
            </section>
          <?php endwhile; ?>

        <?php else : ?>
          <h1 class="font-semibold text-s-black text-[20px] text-center">Tidak Ada Laporan</h1>
        <?php endif; ?>

      </div>

    </main>

  </section>

</body>

</html>