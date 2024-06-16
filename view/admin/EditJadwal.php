<?php
require '../../model/be_main.php';

$id_security = $_GET["id_security"];
$query = "SELECT * FROM lap_jaga 
INNER JOIN security ON lap_jaga.id_security = security.id_security
WHERE lap_jaga.id_security = $id_security";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);

if (isset($_POST['simpan'])) {
  be_updateJadwalJaga($id_security, $_POST['id_jadwal']);
  header("location: JadwalSecurity.php?status=securityDiupdate");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Edit Jadwal</title>
</head>

<body class=" md:w-5/12 md:m-auto border border-s-black border-e-black">
  <section class="flex flex-col gap-[10px] h-screen">
    <?php judulPath("Edit Jadwal", "./JadwalSecurity.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]"> Edit Jadwal Security</h1>

        <form action="" method="post">
          <div class="flex flex-col gap-[10px]">

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
              <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama anda" value="<?= $data['nama'] ?>">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Jadwal</h1>
              <select name="id_jadwal" id="" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full">
                <?php if ($data['id_jadwal'] == 1) : ?>
                  <option value="1" selected>07:00 s/d 15:00</option>
                <?php else : ?>
                  <option value="1">07:00 s/d 15:00</option>
                <?php endif; ?>
                <?php if ($data['id_jadwal'] == 2) : ?>
                  <option value="2" selected>15:00 s/d 22:00</option>
                <?php else : ?>
                  <option value="2">15:00 s/d 22:00</option>
                <?php endif; ?>
                <?php if ($data['id_jadwal'] == 3) : ?>
                  <option value="3" selected>22:00 s/d 07:00</option>
                <?php else : ?>
                  <option value="3">22:00 s/d 07:00</option>
                <?php endif; ?>
                <?php if ($data['id_jadwal'] == NULL) : ?>
                  <option value="-" selected>-</option>
                <?php endif; ?>
              </select>
            </div>

            <div>
              <!-- <a href="./JadwalSecurity.php" class="w-full"> -->
              <button type="submit" name="simpan" class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">KIRIM</button>
              <!-- </a> -->
            </div>

          </div>
        </form>
      </div>


    </main>

  </section>
</body>

</html>