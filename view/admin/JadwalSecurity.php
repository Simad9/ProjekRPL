<?php
require '../../model/be_main.php';

$query = "SELECT * FROM lap_jaga
INNER JOIN security ON lap_jaga.id_security = security.id_security
LEFT JOIN jadwal ON lap_jaga.id_jadwal = jadwal.id_jadwal";
$hasil = mysqli_query($koneksi, $query);


// notif
if (isset($_GET["status"])) {
  switch ($_GET["status"]) {
    case "securityDiupdate":
      echo '<script>
      alert("Berhasil Update jadwal security");
      </script>';
      break;
    case "laporanReqDihapus":
      echo '<script>
        alert("Laporan Request Dihapus");
        </script>';
      break;
    case "securityDitambah":
      echo '<script>
          alert("Berhasil tambah security");
          </script>';
      break;
    case "securityDihapus":
      echo '<script>
            alert("Security dihapus");
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
      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]">Fitur Kami</h1>
        <section class="flex justify-between items-center">
          <div class="flex gap-[5px]">
            <div>
              <img src="../../assets/sementara/adm-icon-jadwalSecurity.svg">
            </div>
            <a href="./ListKunci.php">
              <img src="../../assets/sementara/adm-icon-listKunci-off.svg">
            </a>
          </div>
          <a href="../../">
            <img src="../../assets/sementara/adm-icon-tombolKeluar.svg">
          </a>
        </section>
        <div class="flex justify-end">
          <a href="./TambahSecurity.php">
            <img src="../../assets/sementara/adm-icon-tambahSecurity.svg">
          </a>
        </div>
      </div>

      <!-- btn -->
      <a href="RequestJadwal.php" class="w-full">
        <div class="w-full px-[10px]  py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-s-black font-medium text-[20px] text-center">Laporan Request Jadwal</div>
      </a>

      <!-- heading -->
      <div class="flex flex-col gap-[10px] font-semibold text-s-black text-[18px]">
        <h1>Jadwal Security</h1>

        <?php
        while ($data = mysqli_fetch_assoc($hasil)) :
          switch ($data['id_jadwal']) {
            case 1:
              $jadwal = "07:00 s/d 15:00";
              break;
            case 2:
              $jadwal = "15:00 s/d 22:00";
              break;
            case 3:
              $jadwal = "22:00 s/d 07:00";
              break;
            default:
              $jadwal = "-";
              break;
          }
        ?>
          <!-- Isi -->
          <section class="flex flex-col gap-[5px] p-[10px] bg-ijo-500 rounded-[5px]">
            <h1 class="font-semibold text-s-white text-[15px]">Security</h1>
            <div class="w-full h-[2px] bg-s-white"></div>
            <div class="flex gap-[5px]">
              <div class="text-[13px] text-s-white">
                <h1 class="font-semibold">Nama : <?= $data['nama'] ?> </h1>
                <h1 class="font-semibold">Nomer Hp : <?= $data['noHp'] ?> </h1>
                <h1 class="font-semibold">Jadwal : <?= $jadwal ?> </h1>
              </div>
            </div>
            <div class="flex gap-[5px] w-full">
              <a href="EditSecurity.php?id_security=<?= $data['id_security'] ?>" class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                Edit Data
              </a>
              <a href="EditJadwal.php?id_security=<?= $data['id_security'] ?>" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                Ubah Jadwal
              </a>
            </div>
          </section>
        <?php endwhile; ?>

      </div>

    </main>

  </section>

</body>

</html>