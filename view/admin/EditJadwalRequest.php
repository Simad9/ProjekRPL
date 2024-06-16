<?php
require '../../model/be_main.php';

$id_security = $_GET["id_security"];
$query1 = "SELECT * FROM lap_jaga 
INNER JOIN security ON lap_jaga.id_security = security.id_security
WHERE lap_jaga.id_security = $id_security";
$hasil1 = mysqli_query($koneksi, $query1);
$data1 = mysqli_fetch_assoc($hasil1);

$id_securityTeman = $_GET["id_securityTeman"];
$query2 = "SELECT * FROM lap_jaga 
INNER JOIN security ON lap_jaga.id_security = security.id_security
WHERE lap_jaga.id_security = $id_securityTeman";
$hasil2 = mysqli_query($koneksi, $query2);
$data2 = mysqli_fetch_assoc($hasil2);

if (isset($_POST['simpan'])) {
  $id_jadwal = $_POST["id_jadwal"];
  $id_jadwalTeman = $_POST["id_jadwalTeman"];

  if ($id_jadwal != $id_jadwalTeman) {
    be_updateJadwalJaga($id_security, $id_jadwal);
    be_updateJadwalJaga($id_securityTeman, $id_jadwalTeman);
    header("location: JadwalSecurity.php?status=diupdate");
    exit();
  } else {
    echo '<script>
      alert("Jam tidak boleh sama");
      </script>';
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Edit Jadwal Request</title>
</head>

<body class=" md:w-5/12 md:m-auto border border-s-black border-e-black" >
  <section class="flex flex-col gap-[10px] h-screen">
    <?php judulPath("Edit Jadwal Request", "./RequestJadwal.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]"> Edit Jadwal Security Request</h1>

        <form action="" method="post">
          <div class="flex flex-col gap-[10px]">
            <div class="flex flex-col gap-[5px]">
              <h1 class="text-t-black font-semibold text-[15px]">Security 1</h1>
              <div>
                <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
                <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama anda" value="<?= $data1['nama'] ?>" readonly>
              </div>

              <div>
                <h1 class="font-semibold text-s-black text-[15px]">Jadwal</h1>
                <select name="id_jadwal" id="" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full">
                  <?php if ($data1['id_jadwal'] == 1) : ?>
                    <option value="1" selected>07:00 s/d 15:00</option>
                  <?php else : ?>
                    <option value="1">07:00 s/d 15:00</option>
                  <?php endif; ?>
                  <?php if ($data1['id_jadwal'] == 2) : ?>
                    <option value="2" selected>15:00 s/d 22:00</option>
                  <?php else : ?>
                    <option value="2">15:00 s/d 22:00</option>
                  <?php endif; ?>
                  <?php if ($data1['id_jadwal'] == 3) : ?>
                    <option value="3" selected>22:00 s/d 07:00</option>
                  <?php else : ?>
                    <option value="3">22:00 s/d 07:00</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>

            <div class="flex flex-col gap-[5px]">
              <h1 class="text-t-black font-semibold text-[15px]">Security 2</h1>
              <div>
                <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
                <input type="text" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama anda" value="<?= $data2['nama'] ?>" readonly>
              </div>

              <div>
                <h1 class="font-semibold text-s-black text-[15px]">Jadwal</h1>
                <select name="id_jadwalTeman" id="" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full">
                  <?php if ($data2['id_jadwal'] == 1) : ?>
                    <option value="1" selected>07:00 s/d 15:00</option>
                  <?php else : ?>
                    <option value="1">07:00 s/d 15:00</option>
                  <?php endif; ?>
                  <?php if ($data2['id_jadwal'] == 2) : ?>
                    <option value="2" selected>15:00 s/d 22:00</option>
                  <?php else : ?>
                    <option value="2">15:00 s/d 22:00</option>
                  <?php endif; ?>
                  <?php if ($data2['id_jadwal'] == 3) : ?>
                    <option value="3" selected>22:00 s/d 07:00</option>
                  <?php else : ?>
                    <option value="3">22:00 s/d 07:00</option>
                  <?php endif; ?>
                </select>
              </div>
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