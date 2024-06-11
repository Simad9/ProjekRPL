<?php
require '../../model/be_main.php';

$id_security = $_GET["id_security"];
$query = "SELECT * FROM `security` WHERE id_security = '$id_security'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);

if (isset($_POST['simpan'])) {
  be_updateSecurity($id_security);
} else if (isset($_POST['hapus'])) {
  be_hapusSecurity($id_security);
}

?>

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

        <form action="" method="post">
          <div class="flex flex-col gap-[10px]">

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
              <input type="text" name="nama" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama Security" value="<?= $data['nama'] ?>">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">No Hp</h1>
              <input type="text" name="nohp" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan No Hp Security" value="<?= $data['noHp'] ?>">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Username</h1>
              <input type="text" name="username" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Username Security Sementara" value="<?= $data['username'] ?>">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Password</h1>
              <input type="password" name="password" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Password Security Sementara" value="<?= $data['password'] ?>">
            </div>

            <div>
              <!-- <a href="./JadwalSecurity.php" class="w-full"> -->
              <button type="submit" name="simpan" class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">SIMPAN</button>
              <!-- </a> -->
            </div>

            <div>
              <button type="submit" name="hapus" class="w-full px-[10px] py-[5px] rounded-[10px] bg-s-red text-s-white font-medium text-[20px]">HAPUS</button>
            </div>


          </div>
        </form>
      </div>


    </main>

  </section>
</body>

</html>