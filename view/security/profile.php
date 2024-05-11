<?php
session_start();
require "../../model/be_main.php";
// Harus login dulu
sessionProtection();

// Fetch id dari session // ambil data security
$id_user = $_SESSION["id_user"];
$queryUser = "SELECT * FROM security WHERE id_user = $id_user";
$hasilUser = mysqli_query($koneksi, $queryUser);
$dataUser = mysqli_fetch_assoc($hasilUser);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../../tamplate/meta.php" ?>
  <title>Profile | Security App</title>
</head>

<body class="flex flex-col gap-[10px] p-[30px] w-full h-screen relative bg-s-white border-x border-ijo-600 mx-auto md:w-9/12 lg:w-7/12">
  <!-- Header -->
  <div class="flex justify-between w-full">
    <a href="homepage.php">
      <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali">
    </a>
    <h1 class="font-semibold text-xl text-s-black text-center">Profile</h1>
    <img src="../../assets/icon/guest-icon-arrow.png" alt="kembali" class="opacity-0">
  </div>
  <!-- END Header -->
  <div class="h-[3px] w-full bg-s-black rounded"></div>

  <!-- Main -->
  <main class="flex flex-col gap-[10px]">
    <div class="flex gap-[10px] p-[5px] justify-center">
      <img src="../../assets/img/anonim.jpg" alt="Foto Profile" class="size-[50px] rounded-[8px]">
      <div class="text-t-black">
        <h1 class="font-semibold text-[18px]"><?= $dataUser['nama'] ?></h1>
        <p class="font-normal text-[15px]">Security Kampus 2</p>
      </div>
    </div>

    <!-- listnya -->
    <div class="flex flex-col gap-[3px]">
      <a href="profile_dataPersonal.php" class="flex justify-between p-[10px] group border border-t-white rounded-md hover:border-ijo-400 hover:border">
        <div class="flex gap-[5px] justify-center items-center">
          <svg class="fill-black group-hover:fill-ijo-400" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 8.75C10 7.42392 10.5268 6.15215 11.4645 5.21447C12.4021 4.27678 13.6739 3.75 15 3.75C16.3261 3.75 17.5979 4.27678 18.5355 5.21447C19.4732 6.15215 20 7.42392 20 8.75C20 10.0761 19.4732 11.3479 18.5355 12.2855C17.5979 13.2232 16.3261 13.75 15 13.75C13.6739 13.75 12.4021 13.2232 11.4645 12.2855C10.5268 11.3479 10 10.0761 10 8.75ZM10 16.25C8.3424 16.25 6.75269 16.9085 5.58058 18.0806C4.40848 19.2527 3.75 20.8424 3.75 22.5C3.75 23.4946 4.14509 24.4484 4.84835 25.1517C5.55161 25.8549 6.50544 26.25 7.5 26.25H22.5C23.4946 26.25 24.4484 25.8549 25.1517 25.1517C25.8549 24.4484 26.25 23.4946 26.25 22.5C26.25 20.8424 25.5915 19.2527 24.4194 18.0806C23.2473 16.9085 21.6576 16.25 20 16.25H10Z" />
          </svg>
          <h1 class="font-medium text-[15px] text-t-black group-hover:text-ijo-400">Data Personal</h1>
        </div>
        <svg class="fill-black group-hover:fill-ijo-400" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14.6374 19.1125L17.8749 15.875C17.9908 15.7594 18.0827 15.622 18.1455 15.4708C18.2082 15.3196 18.2405 15.1575 18.2405 14.9937C18.2405 14.83 18.2082 14.6679 18.1455 14.5167C18.0827 14.3655 17.9908 14.2281 17.8749 14.1125L14.6374 10.875C13.8499 10.0875 12.4999 10.65 12.4999 11.7625V18.2375C12.4999 19.35 13.8499 19.9 14.6374 19.1125Z" />
        </svg>
      </a>

      <a href="profile_pengaturanAkun.php" class="flex justify-between p-[10px] group border border-t-white rounded-md hover:border-ijo-400 hover:border">
        <div class="flex gap-[5px] justify-center items-center">
          <svg class="fill-black group-hover:fill-ijo-400" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8487 2.69C17.3862 2.5 16.7987 2.5 15.6249 2.5C14.4512 2.5 13.8649 2.5 13.4012 2.69C12.7855 2.94276 12.2954 3.42971 12.0387 4.04375C11.9212 4.3225 11.8762 4.64875 11.8574 5.1225C11.8491 5.46575 11.7533 5.80121 11.5792 6.09715C11.4051 6.39309 11.1584 6.63973 10.8624 6.81375C10.5608 6.98138 10.2218 7.07018 9.87681 7.07193C9.53179 7.07368 9.19191 6.98831 8.88866 6.82375C8.46616 6.60125 8.15991 6.47875 7.85741 6.43875C7.1956 6.35185 6.52625 6.52975 5.99491 6.93375C5.59741 7.23625 5.30366 7.74125 4.71741 8.75C4.12991 9.75875 3.83741 10.2625 3.77116 10.7562C3.68366 11.4137 3.86366 12.0787 4.27116 12.605C4.45616 12.845 4.71741 13.0462 5.12116 13.2987C5.71741 13.67 6.09991 14.3025 6.09991 15C6.09991 15.6975 5.71741 16.33 5.12241 16.7C4.71741 16.9537 4.45616 17.155 4.26991 17.395C4.06876 17.6549 3.92112 17.9521 3.83551 18.2695C3.74991 18.5868 3.72803 18.9179 3.77116 19.2438C3.83741 19.7363 4.12991 20.2413 4.71741 21.25C5.30491 22.2587 5.59741 22.7625 5.99491 23.0662C6.52491 23.47 7.19491 23.6475 7.85741 23.5613C8.15991 23.5213 8.46616 23.3988 8.88866 23.1763C9.19206 23.0115 9.53218 22.926 9.87744 22.9277C10.2227 22.9295 10.5619 23.0184 10.8637 23.1862C11.4712 23.5362 11.8312 24.18 11.8574 24.8775C11.8762 25.3525 11.9212 25.6775 12.0387 25.9562C12.2937 26.5687 12.7837 27.0562 13.4012 27.31C13.8637 27.5 14.4512 27.5 15.6249 27.5C16.7987 27.5 17.3862 27.5 17.8487 27.31C18.4643 27.0572 18.9544 26.5703 19.2112 25.9562C19.3287 25.6775 19.3737 25.3525 19.3924 24.8775C19.4174 24.18 19.7787 23.535 20.3874 23.1862C20.689 23.0186 21.028 22.9298 21.373 22.9281C21.718 22.9263 22.0579 23.0117 22.3612 23.1763C22.7837 23.3988 23.0899 23.5213 23.3924 23.5613C24.0549 23.6488 24.7249 23.47 25.2549 23.0662C25.6524 22.7637 25.9462 22.2587 26.5324 21.25C27.1199 20.2413 27.4124 19.7375 27.4787 19.2438C27.5216 18.9178 27.4995 18.5867 27.4137 18.2693C27.3279 17.952 27.18 17.6548 26.9787 17.395C26.7937 17.155 26.5324 16.9538 26.1287 16.7013C25.5324 16.33 25.1499 15.6975 25.1499 15C25.1499 14.3025 25.5324 13.67 26.1274 13.3C26.5324 13.0463 26.7937 12.845 26.9799 12.605C27.1811 12.3451 27.3287 12.0479 27.4143 11.7305C27.4999 11.4132 27.5218 11.0821 27.4787 10.7562C27.4124 10.2637 27.1199 9.75875 26.5324 8.75C25.9449 7.74125 25.6524 7.2375 25.2549 6.93375C24.7236 6.52975 24.0542 6.35185 23.3924 6.43875C23.0899 6.47875 22.7837 6.60125 22.3612 6.82375C22.0577 6.98854 21.7176 7.07402 21.3724 7.07227C21.0271 7.07052 20.6879 6.9816 20.3862 6.81375C20.0904 6.63958 19.8439 6.39287 19.6701 6.09694C19.4962 5.80101 19.4006 5.46563 19.3924 5.1225C19.3737 4.6475 19.3287 4.3225 19.2112 4.04375C19.0841 3.73967 18.8984 3.4636 18.6646 3.23132C18.4308 2.99904 18.1535 2.8151 17.8487 2.69ZM15.6249 18.75C17.7124 18.75 19.4037 17.0712 19.4037 15C19.4037 12.9288 17.7112 11.25 15.6249 11.25C13.5374 11.25 11.8462 12.9288 11.8462 15C11.8462 17.0712 13.5387 18.75 15.6249 18.75Z" />
          </svg>
          <h1 class="font-medium text-[15px] text-t-black group-hover:text-ijo-400">Pengaturan Akun</h1>
        </div>
        <svg class="fill-black group-hover:fill-ijo-400" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14.6374 19.1125L17.8749 15.875C17.9908 15.7594 18.0827 15.622 18.1455 15.4708C18.2082 15.3196 18.2405 15.1575 18.2405 14.9937C18.2405 14.83 18.2082 14.6679 18.1455 14.5167C18.0827 14.3655 17.9908 14.2281 17.8749 14.1125L14.6374 10.875C13.8499 10.0875 12.4999 10.65 12.4999 11.7625V18.2375C12.4999 19.35 13.8499 19.9 14.6374 19.1125Z" />
        </svg>
      </a>

      <a href="profile_laporanMahasiswa.php" class="flex justify-between p-[10px] group border border-t-white rounded-md hover:border-ijo-400 hover:border">
        <div class="flex gap-[5px] justify-center items-center">
          <svg class="fill-black group-hover:fill-ijo-400" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.27 3.75C8.92588 4.53848 8.74883 5.3897 8.75 6.25C8.75 6.91305 9.01339 7.54893 9.48223 8.01777C9.95107 8.48661 10.587 8.75 11.25 8.75H18.75C19.413 8.75 20.0489 8.48661 20.5178 8.01777C20.9866 7.54893 21.25 6.91305 21.25 6.25C21.25 5.36125 21.065 4.515 20.73 3.75H22.5C23.163 3.75 23.7989 4.0134 24.2678 4.48224C24.7366 4.95108 25 5.58696 25 6.25V25C25 25.663 24.7366 26.2989 24.2678 26.7678C23.7989 27.2366 23.163 27.5 22.5 27.5H7.5C6.83696 27.5 6.20107 27.2366 5.73223 26.7678C5.26339 26.2989 5 25.663 5 25V6.25C5 5.58696 5.26339 4.95108 5.73223 4.48224C6.20107 4.0134 6.83696 3.75 7.5 3.75H9.27ZM15 17.5H11.25C10.9185 17.5 10.6005 17.6317 10.3661 17.8661C10.1317 18.1005 10 18.4185 10 18.75C10 19.0815 10.1317 19.3995 10.3661 19.6339C10.6005 19.8683 10.9185 20 11.25 20H15C15.3315 20 15.6495 19.8683 15.8839 19.6339C16.1183 19.3995 16.25 19.0815 16.25 18.75C16.25 18.4185 16.1183 18.1005 15.8839 17.8661C15.6495 17.6317 15.3315 17.5 15 17.5ZM18.75 12.5H11.25C10.9314 12.5004 10.625 12.6224 10.3933 12.8411C10.1616 13.0598 10.0222 13.3587 10.0035 13.6767C9.98486 13.9948 10.0883 14.308 10.2928 14.5523C10.4973 14.7966 10.7874 14.9536 11.1038 14.9913L11.25 15H18.75C19.0815 15 19.3995 14.8683 19.6339 14.6339C19.8683 14.3995 20 14.0815 20 13.75C20 13.4185 19.8683 13.1005 19.6339 12.8661C19.3995 12.6317 19.0815 12.5 18.75 12.5ZM15 2.5C15.5277 2.49923 16.0496 2.61021 16.5314 2.82566C17.0131 3.04111 17.4438 3.35614 17.795 3.75C18.33 4.3475 18.675 5.11625 18.7388 5.965L18.75 6.25H11.25C11.25 5.34375 11.5713 4.5125 12.1063 3.865L12.205 3.75C12.8925 2.9825 13.89 2.5 15 2.5Z" />
          </svg>
          <h1 class="font-medium text-[15px] text-t-black group-hover:text-ijo-400">Laporan Mahasiswa</h1>
        </div>
        <svg class="fill-black group-hover:fill-ijo-400" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14.6374 19.1125L17.8749 15.875C17.9908 15.7594 18.0827 15.622 18.1455 15.4708C18.2082 15.3196 18.2405 15.1575 18.2405 14.9937C18.2405 14.83 18.2082 14.6679 18.1455 14.5167C18.0827 14.3655 17.9908 14.2281 17.8749 14.1125L14.6374 10.875C13.8499 10.0875 12.4999 10.65 12.4999 11.7625V18.2375C12.4999 19.35 13.8499 19.9 14.6374 19.1125Z" />
        </svg>
      </a>

      <a href="login.php" class="flex justify-between p-[10px] group border border-t-white rounded-md hover:border-[#FF1F00] hover:border">
        <div class="flex gap-[5px] justify-center items-center">
          <svg class="fill-black group-hover:fill-[#FF1F00]" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 2.89286C0 2.12562 0.304782 1.38981 0.847298 0.847298C1.38981 0.304782 2.12562 0 2.89286 0L16.3929 0C17.1601 0 17.8959 0.304782 18.4384 0.847298C18.9809 1.38981 19.2857 2.12562 19.2857 2.89286V6.63236C18.5032 7.25914 17.9955 8.16598 17.8701 9.16071H11.0893C10.5194 9.16071 9.95518 9.27295 9.42871 9.49102C8.90225 9.70909 8.42389 10.0287 8.02095 10.4317C7.61801 10.8346 7.29838 11.313 7.08031 11.8394C6.86224 12.3659 6.75 12.9302 6.75 13.5C6.75 14.0698 6.86224 14.6341 7.08031 15.1606C7.29838 15.687 7.61801 16.1654 8.02095 16.5683C8.42389 16.9713 8.90225 17.2909 9.42871 17.509C9.95518 17.727 10.5194 17.8393 11.0893 17.8393H17.8701C17.9955 18.834 18.5032 19.7409 19.2857 20.3676V24.1071C19.2857 24.8744 18.9809 25.6102 18.4384 26.1527C17.8959 26.6952 17.1601 27 16.3929 27H2.89286C2.12562 27 1.38981 26.6952 0.847298 26.1527C0.304782 25.6102 0 24.8744 0 24.1071L0 2.89286ZM21.1429 8.30636C20.8786 8.41584 20.6527 8.60126 20.4937 8.83916C20.3348 9.07706 20.25 9.35675 20.25 9.64286V11.5714H11.0893C10.5778 11.5714 10.0873 11.7746 9.72558 12.1363C9.3639 12.498 9.16071 12.9885 9.16071 13.5C9.16071 14.0115 9.3639 14.502 9.72558 14.8637C10.0873 15.2254 10.5778 15.4286 11.0893 15.4286H20.25V17.3571C20.2503 17.643 20.3352 17.9224 20.4942 18.1601C20.6531 18.3977 20.8789 18.5829 21.1431 18.6923C21.4072 18.8016 21.6979 18.8303 21.9783 18.7746C22.2587 18.7189 22.5163 18.5813 22.7186 18.3793L26.5757 14.5221C26.8466 14.2509 26.9987 13.8833 26.9987 13.5C26.9987 13.1167 26.8466 12.7491 26.5757 12.4779L22.7186 8.62071C22.5164 8.41842 22.2589 8.28059 21.9784 8.22464C21.698 8.16869 21.4072 8.19713 21.1429 8.30636Z" />
          </svg>
          <h1 class="font-medium text-[15px] text-t-black group-hover:text-[#FF1F00]">Keluar Akun</h1>
        </div>
        <svg class="fill-black group-hover:fill-[#FF1F00]" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14.6374 19.1125L17.8749 15.875C17.9908 15.7594 18.0827 15.622 18.1455 15.4708C18.2082 15.3196 18.2405 15.1575 18.2405 14.9937C18.2405 14.83 18.2082 14.6679 18.1455 14.5167C18.0827 14.3655 17.9908 14.2281 17.8749 14.1125L14.6374 10.875C13.8499 10.0875 12.4999 10.65 12.4999 11.7625V18.2375C12.4999 19.35 13.8499 19.9 14.6374 19.1125Z" />
        </svg>
      </a>
    </div>

  </main>

  <!-- Navbar -->
  <nav class="flex px-[63px] py-[13px] justify-between items-center bg-ijo-500 w-full absolute bottom-0 left-0">
    <!-- Barang -->
    <a href="../security/laporan_barang.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer">
        <div class="relative">
          <img src="../../assets/icon/nav-icon-barang.png" alt="Barang" class="size-[30px] group-hover:opacity-0">
          <img src="../../assets/icon/nav-icon-barang-active.png" alt="Barang-hover" class="size-[30px] opacity-0 absolute top-0 left-0 group-hover:opacity-100">
        </div>
        <p class="font-reguler text-[12px] text-s-white group-hover:font-bold">Barang</p>
      </div>
    </a>
    <!-- Pergantian -->
    <a href="../security/pergantian_shift.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer">
        <div class="relative">
          <img src="../../assets/icon/nav-icon-shift.png" alt="shift" class="size-[30px] group-hover:opacity-0">
          <img src="../../assets/icon/nav-icon-shift-active.png" alt="shift-hover" class="size-[30px] opacity-0 absolute top-0 left-0 group-hover:opacity-100">
        </div>
        <p class="font-reguler text-[12px] text-s-white group-hover:font-bold">Pergantian</p>
      </div>
    </a>
    <!-- Profile -->
    <a href="../security/profile.php">
      <div class="flex flex-col gap-0 justify-center items-center group cursor-pointer">
        <img src="../../assets/icon/nav-icon-profile-active.png" alt="profile" class="size-[30px] ">
        <p class="font-bold text-[12px] text-s-white ">Profile</p>
      </div>
    </a>
  </nav>
  <!-- END Navbar -->
</body>

</html>