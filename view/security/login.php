<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Login | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] justify-center items-center h-screen">
  <!-- heading -->
  <div class="flex flex-col text-center justify-center items-center">
    <img src="../../assets/icon/Logo.png" alt="Logo">
    <h1 class="font-bold text-xl text-s-black">Selamat Datang</h1>
    <p class="font-meidum text-[13px] text-s-black">Silahkan masuk ke akun anda</p>
  </div>
  <!-- END heading -->
  <!-- FORM -->
  <form action="" method="post" class="w-full flex flex-col gap-[10px]">
    <input type="text" name="username" id="username" placeholder="Username" class="w-full px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
    <input type="password" name="password" id="password" placeholder="Password" class="w-full px-[15px] py-[5px] rounded-[10px] text-s-black border-[2px] border-s-black">
    <p class="font-normal text-[10px] text-ijo-600 text-right cursor-pointer">Lupa Passowrd</p>
    <!-- Buttonnya nanti diperbaiki -->
    <button class="px-[30px] py-[8px] bg-ijo-500 rounded-[10px] mt-4" type="submit" name="submit">
      <p class="font-bold text-xl text-s-white">MASUK</p>
    </button>
  </form>
  <a href="../security/homepage.php">
    <button class="px-[30px] py-[8px] bg-ijo-500 rounded-[10px] mt-4" type="submit" name="submit">
      <p class="font-bold text-xl text-s-white">MASUK</p>
    </button>
  </a>
</body>

</html>