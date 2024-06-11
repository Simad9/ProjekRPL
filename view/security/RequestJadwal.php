<?php
session_start();
require '../../model/be_main.php';

// panggil data security
$query = "SELECT * FROM security";
$hasil = mysqli_query($koneksi, $query);

$id_security = be_fetchIdSecurity();
$nama_security = be_fetchNameSecurity();

if (isset($_POST["submit"])) {
  requestJadwal();
}

if (isset($_GET["status"])) {
  switch ($_GET["status"]) {
    case "gagal":
      echo '<script>
      alert("ada yang gagal");
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
  <title>Requset Jadwal</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Requset Jadwal", "./FiturTambahan.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]">Laporan Request Jadwal</h1>

        <form action="" method="post">
          <!-- hidden data -->
          <input type="text" name="id_security" value="<?= $id_security ?>" class="hidden">

          <div class="flex flex-col gap-[10px]">
            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Tanggal dan Waktu</h1>
              <div class="flex gap-[5px]">
                <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full  text-center" value="<?= $tanggal_sekarang ?>" readonly="readonly">
                <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full  text-center" value="<?= $waktu_sekarang ?>" readonly="readonly">
              </div>
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
              <input type="text" name="nama" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Isikan Nama Anda" value="<?= $nama_security?>" readonly="readonly">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Nama Teman Penganti</h1>
              <select name="id_rekan" id="" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full">
                <!-- Nanti ambil dari db -->
                <option value="">Pilih Rekan</option>
                <?php while ($data = mysqli_fetch_assoc($hasil)) : ?>
                  <?php if ($data['id_security'] == $id_security) continue; ?>
                  <option value="<?= $data['id_security'] ?>"><?= $data['nama'] ?></option>
                <?php endwhile; ?>
              </select>
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Alasan Request jadwal</h1>
              <textarea type="text" name="alasan" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan alasan anda"></textarea>
            </div>

            <div>
              <button type="submit" name="submit" class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">KIRIM</button>
            </div>

          </div>
        </form>
      </div>


    </main>

  </section>
</body>

</html>