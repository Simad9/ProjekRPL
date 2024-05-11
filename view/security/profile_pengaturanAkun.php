<?php
session_start();
require "../../model/be_main.php";
// Harus login dulu
sessionProtection();

// update akun
if (isset($_POST['submit'])) {
  be_updateAkun();
}

// Fetch id dari session
$id_user = $_SESSION["id_user"];

// ambil data security
$query = "SELECT * FROM user WHERE id_user = $id_user";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);

// notif
if (isset($_GET["status"])) {
  switch ($_GET["status"]) {
      case 'gagal':
          echo "<script>alert('gagal mengirim data')</script>";
          break;
      case 'passwordLama':
          echo "<script>alert('password lama tidak sesuai')</script>";
          break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Pengaturan Akun | Security App</title>
</head>


<body class="flex flex-col gap-[10px] p-[30px] w-full h-screen bg-s-white border-x border-ijo-600 mx-auto md:w-9/12 lg:w-7/12">
  <!-- Header -->
  <div class="flex justify-between w-full">
    <a href="profile.php">
      <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali">
    </a>
    <h1 class="font-semibold text-xl text-s-black text-center">Pengaturan Akun</h1>
    <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali" class="opacity-0">
  </div>
  <!-- END Header -->
  <div class="h-[3px] w-full bg-s-black rounded"></div>
  <!-- Main -->
  <main>
    <form action="" method="post" class="flex flex-col gap-[20px]">
      <!-- hidden input -->
      <input type="hidden" name="id_user" value="<?= $id_user ?>">

      <div class="flex flex-col gap-[10px]">
        <!-- Form input - Username -->
        <div class="flex flex-col gap-1">
          <label for="username" class="font-semibold text-[15px] text-s-black">Username :</label>
          <input type="text" name="username" id="username" placeholder="Masukkan Username Anda" value="<?= $data['username'] ?>" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
        </div>

        <!-- Form input - email -->
        <div class="flex flex-col gap-1">
          <label for="email" class="font-semibold text-[15px] text-s-black">Email :</label>
          <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" value="<?= $data['email'] ? $data['email'] : "Isi Email Anda" ?>" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
        </div>
      </div>

      <div class="flex flex-col gap-[10px]">
        <h1 class="font-medium text-[15px] text-s-black ">Amankan akun Anda dengan kombinasi password yang baik</h1>
        <!-- Form input - Username -->
        <div class="flex flex-col gap-1">
          <label for="passwordLama" class="font-semibold text-[15px] text-s-black">Password Lama :</label>
          <input type="password" name="passwordLama" id="passwordLama" required placeholder="Password Lama Anda" value="" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
        </div>

        <!-- Form input - Username -->
        <div class="flex flex-col gap-1">
          <label for="passwordBaru" class="font-semibold text-[15px] text-s-black">Password Baru :</label>
          <input type="password" name="passwordBaru" id="passwordBaru" required placeholder="Password Baru Anda" value="" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
        </div>
      </div>

      <!-- Button -->
      <button type="submit" name="submit" class="px-[30px] py-[8px] mt-[20px] bg-ijo-500 w-full rounded-[10px] hover:bg-ijo-300">
        <p class="font-semibold text-xl text-s-white">SIMPAN</p>
      </button>

    </form>
  </main>

</body>

</html>