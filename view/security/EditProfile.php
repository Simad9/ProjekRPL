<?php
session_start();
require '../../model/be_main.php';

$query = "SELECT * FROM security WHERE id_security = $_SESSION[id_security]";
$fetch = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($fetch);

if (isset($_POST["submit"])) {
  be_updateDataPersonal();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Edit Profile</title>
</head>

<body>
  <section class="flex flex-col gap-[10px]">
    <?php judulPath("Edit Profile", "./FiturTambahan.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]">Edit Profile</h1>

        <form action="" method="post">
          <!-- hidden data -->
          <input type="hidden" name="id_security" value="<?= $_SESSION['id_security'] ?>">
          <div class="flex flex-col gap-[10px]">
            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Nama</h1>
              <input type="text" name="nama" value="<?= $data['nama'] ?>" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama Security" value="Wijdan">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">No Hp</h1>
              <input type="text" name="nohp" value="<?= $data['noHp'] ?>" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan No Hp Security" value="082135322025">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Username</h1>
              <input type="text" name="username" value="<?= $data['username'] ?>" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Username Security Sementara" value="123">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Password</h1>
              <input type="password" name="password" value="<?= $data['password'] ?>" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Password Security Sementara" value="123">
            </div>

            <div>
              <button type="sumbit" name="submit" class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">SIMPAN</button>
            </div>

          </div>
        </form>
      </div>


    </main>

  </section>
</body>

</html>