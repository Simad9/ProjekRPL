<?php
require 'koneksi.php';

// Login
function be_login()
{
  global $koneksi;

  // Menangkap data yang dikirim dari form
  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST['password']);

  if ($username == 'admin' && $password == 'admin') {
    header("Location: ./view/admin/JadwalSecurity.php");
    exit();
  } else {
    // Prepared statement untuk menghindari SQL injection
    $query = "SELECT * FROM security WHERE username=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $hasil = mysqli_stmt_get_result($stmt);

    if ($hasil && mysqli_num_rows($hasil) === 1) {
      $dataUser = mysqli_fetch_array($hasil);

      // cek password - sementara
      if ($password == $dataUser['password']) {
        // Ngirim data sesion
        $_SESSION['id_security'] = $dataUser['id_security'];

        // redirect ke halaman homepage
        header("Location: ./view/security/SecurityJaga.php");
        exit();
      } else {
        header("location: ?status=gagal");
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
      header("location: ?status=gagal");
      exit();
    }
    // Tutup koneksi database
    mysqli_close($koneksi);
  }
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
// require 'be_guest.php';
// Khusus security
// require 'be_security.php';

// Require BE files
require 'be_mahasiswa.php';
require 'be_security.php';
require 'be_admin.php';

// Khsusu tampilan seperti waktu;
require 'be_tampilan.php';
