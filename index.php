<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./assets/favicon/Icon.svg" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- CSS Tailwind -->
  <link rel="stylesheet" href="./src/output.css">
  <title>Security App</title>
</head>

<body class="flex flex-col justify-center items-center p-[30px] gap-[20px] h-screen">

  <!-- Judul -->
  <section>
    <div class="flex flex-col justify-center items-center">
      <img src="./assets/icon/Logo.png" alt="Logo Aps">
      <p class="font-bold text-lg text-center">Untuk memulai, silahkan peran yang ingin Anda ambil</p>
    </div>
  </section>
  <!-- END Judul -->

  <!-- Pilih Role -->
  <section class="flex flex-col gap-[10px] w-full">
    <a href="view/security/login.php">
      <div class="bg-ijo-500 hover:bg-ijo-400 cursor-pointer rounded px-[25px] py-[8px] flex flex-col gap-1 justify-center items-center w-full">
        <img src="./assets/icon/icon-security.png" alt="Security">
        <h1 class="font-bold text-xl text-s-white">SECURITY</h1>
        <div class="h-[3px] w-full bg-s-white rounded"></div>
        <p class="font-bold text-[15px] text-s-white text-center">Masuk sebagai Security, Anda adalah security di sini</p>
      </div>
    </a>

    <a href="view/guest/homepage.php">
      <div class="bg-ijo-500 hover:bg-ijo-400 cursor-pointer rounded px-[25px] py-[8px] flex flex-col gap-1 justify-center items-center w-full">
        <img src="./assets/icon/icon-guest.png" alt="Guest">
        <h1 class="font-bold text-xl text-s-white">GUEST</h1>
        <div class="h-[3px] w-full bg-s-white rounded"></div>
        <p class="font-bold text-[15px] text-s-white text-center">Masuk sebagai Guest, Untuk melihat barang hilang</p>
      </div>
    </a>
  </section>
  <!-- END Pilih Role -->
</body>

</html>