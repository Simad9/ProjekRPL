<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Pengaturan Akun | Security App</title>
</head>


<body class="flex flex-col gap-[10px] p-[30px] w-full">
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

      <div>
        <!-- Form input - Username -->
        <div class="flex flex-col gap-1">
          <label for="username" class="font-semibold text-[15px] text-s-black">Username :</label>
          <input type="text" name="username" id="username" placeholder="Masukkan Username Anda" value="123" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
        </div>

        <!-- Form input - email -->
        <div class="flex flex-col gap-1">
          <label for="email" class="font-semibold text-[15px] text-s-black">Email :</label>
          <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" value="wijdan@gmail.com" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
        </div>
      </div>

      <div>
        <h1 class="font-medium text-[15px] text-s-black ">Amankan akun Anda dengan kombinasi password yang baik</h1>
        <!-- Form input - Username -->
        <div class="flex flex-col gap-1">
          <label for="passwordLama" class="font-semibold text-[15px] text-s-black">Password Lama :</label>
          <input type="password" name="passwordLama" id="passwordLama" placeholder="Password Lama Anda" value="123" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
        </div>

        <!-- Form input - Username -->
        <div class="flex flex-col gap-1">
          <label for="passwordBaru" class="font-semibold text-[15px] text-s-black">Password Baru :</label>
          <input type="password" name="passwordBaru" id="passwordBaru" placeholder="Password Baru Anda" value="123" class="px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
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