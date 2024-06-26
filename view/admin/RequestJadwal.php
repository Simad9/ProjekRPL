<?php
require '../../model/be_main.php';

$query = "SELECT rj.*, 
s.nama as nama, s.noHp as nohp,  
st.nama as nama_teman, st.noHp as nohp_teman
FROM lap_reqJadwal rj
INNER JOIN security s ON rj.id_security = s.id_security
INNER JOIN security st ON rj.id_securityTeman = st.id_security
";
$hasil = mysqli_query($koneksi, $query);

if (isset($_POST["hapus"])) {
  be_hapusLaporanReq();
}

// notif
if (isset($_GET["status"])) {
  switch ($_GET["status"]) {
    case "laporanReqDihapus":
      echo '<script>
      alert("Laporan Request Berhasil Dihapus");
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
  <title>Request Jadwal</title>
</head>

<body class=" md:w-5/12 md:m-auto border border-s-black border-e-black">
  <section class="flex flex-col gap-[10px] h-screen">
    <!-- Judul -->
    <?php judulPath("Request Jadwal", "./JadwalSecurity.php") ?>

    <!-- Fitur -->
    <main class="px-[15px] flex flex-col gap-[20px]">
      <!-- heading -->
      <div class="flex flex-col gap-[10px] font-semibold text-s-black text-[18px]">
        <h1>Laporan Request Jadwal</h1>

        <?php
        if (mysqli_num_rows($hasil) > 0) :
          while ($data = mysqli_fetch_assoc($hasil)) :
            $data['tanggal'] = explode(' ', $data['tanggalWaktu'])[0];
        ?>
            <!-- Isi -->
            <section class="flex flex-col gap-[5px] p-[10px] bg-ijo-500 rounded-[5px]">
              <div class="flex justify-between items-center text-s-white">
                <h1 class="font-semibold text-[15px]">Request Jadwal</h1>
                <h1 class="font-normal text-[10px]"><?= $data['tanggal'] ?></h1>
              </div>
              <div class="w-full h-[2px] bg-s-white"></div>
              <div class="flex flex-col gap-[5px]">
                <h1 class="text-center font-bold - text-s-white text-[13px]">Bertukar Jadwal</h1>
                <div class="text-[13px] text-s-white">
                  <h1 class="font-semibold">Nama : <?= $data['nama'] ?> </h1>
                  <h1 class="font-semibold">Nomer Hp : <?= $data['nohp'] ?> </h1>
                </div>
                <h1 class="text-center  font-bold - text-s-white text-[13px]">dengan</h1>
                <div class="text-[13px] text-s-white">
                  <h1 class="font-semibold">Nama : <?= $data['nama_teman'] ?> </h1>
                  <h1 class="font-semibold">Nomer Hp : <?= $data['nohp_teman'] ?> </h1>
                </div>
                <h1 class="text-center  font-bold - text-s-white text-[13px]">Alasan Bertukar</h1>
                <div class="text-[13px] text-s-white">
                  <h1 class="font-semibold">Alasan : <?= $data['alasan'] ?> </h1>
                </div>
              </div>
              <div class="flex flex-col gap-[5px]">
                <div class="flex gap-[5px] w-full">
                  <?php $data['nohp'] = ltrim($data['nohp'], '0');  ?>
                  <a href="https://wa.me/+62<?= $data['nohp'] ?>" target="_blank" class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                    Hubungi
                  </a>
                  <a href="EditJadwalRequest.php?id_security=<?= $data['id_security'] ?>&id_securityTeman=<?= $data['id_securityTeman'] ?>" class="w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-ijo-500 font-semibold text-[15px] text-center">
                    Ubah Jadwal
                  </a>
                </div>
                <form action="" method="post">
                  <input type="hidden" name="id_reqJadwal" value="<?= $data['id_reqJadwal'] ?>">
                  <button type="submit" name="hapus" class=" w-full px-[10px] py-[5px] rounded-[10px] border border-ijo-500 bg-s-white text-s-red font-semibold text-[15px] text-center">
                    Hapus Laporan
                  </button>
                </form>

              </div>
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