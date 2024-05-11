<?php
require 'koneksi.php';

// Login
function be_login()
{
  global $koneksi;

  // Menangkap data yang dikirim dari form
  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST['password']);

  // Prepared statement untuk menghindari SQL injection
  $query = "SELECT * FROM user WHERE username=?";
  $stmt = mysqli_prepare($koneksi, $query);
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  $hasil = mysqli_stmt_get_result($stmt);

  if ($hasil && mysqli_num_rows($hasil) === 1) {
    $dataUser = mysqli_fetch_array($hasil);

    // cek password - sementara
    if ($password == $dataUser['password']) {
      // Ngirim data sesion
      $_SESSION['id_user'] = $dataUser['id_user'];

      // redirect ke halaman homepage
      header("location:homepage.php");
      exit();
    } else {
      header("location:login.php?status=gagal");
      exit();
    }

    // Cek password
    // if (password_verify($password, $dataUser['password'])) {
    //   // Ngirim data sesion
    //   $_SESSION['id_user'] = $dataUser['id_user'];

    //   // redirect ke halaman homepage
    //   header("location:homepage.php?status=gagal");
    //   exit();
    // } else {
    //   header("location:login.php?status=gagal");
    //   exit();
    // }
  } else {
    // Kembali ke halaman login dengan pesan kesalahan
    header("location:login.php?status=gagal");
    exit();
  }
  // Tutup koneksi database
  mysqli_close($koneksi);
}

// session protection
function sessionProtection()
{
  if (!isset($_SESSION['id_user'])) {
    header("location: login.php?status=belumLogin");
    exit();
  }
}

// Khusus guest
require 'be_guest.php';
// Khusus security
require 'be_security.php';

// Khsusu tampilan seperti waktu;
require 'be_tampilan.php';
