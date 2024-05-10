<?php
// Nambah laporan barang
function be_laporanBarang()
{
  global $koneksi;

  $jenisBarang = $_POST['barang'];
  $deskripsi = $_POST["note"];

  // Foto logic

  $query = "INSERT INTO `lap_barang` (`id_lapBarang`, `namaBarang`, `tanggal`, `deskripsi`) VALUES (NULL, '$jenisBarang', current_timestamp(), '$deskripsi');";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: homepage.php");
    exit();
  } else {
    header("location:laporan_barang.php?status=gagal");
    exit();
  }
}

// Update data personal
function be_updateDataPersonal()
{
  global $koneksi;

  $id_security = $_POST['id_security'];
  $nama = $_POST['nama'];
  $tgl_lhr = $_POST["tgl"];
  $alamat = $_POST["alamat"];
  $NoHp = $_POST["NoHp"];


  // Foto logic

  $query = "UPDATE security
  SET nama = '$nama', tgl_lhr= '$tgl_lhr', alamat = '$alamat', noHp = '$NoHp'
  WHERE id_security = $id_security;";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: homepage.php");
    exit();
  } else {
    header("location:laporan_barang.php?status=gagal");
    exit();
  }
}

// Update akun
function be_updateAkun()
{
  global $koneksi;

  $id_user = $_POST['id_user'];
  $username = $_POST['username'];
  $email = $_POST["email"];
  $passwordLama = $_POST["passwordLama"];
  $passwordBaru = $_POST["passwordBaru"];

  // Logic password
  $queryPassword = "SELECT password FROM user WHERE id_user = $id_user";
  $resultPassword = mysqli_query($koneksi, $queryPassword);
  $dataPassword = mysqli_fetch_assoc($resultPassword);
  $paswordLamaDB = $dataPassword['password'];
  if ($paswordLamaDB == $passwordLama) {
    $query = "UPDATE user
    SET username = '$username', email= '$email', password = '$passwordBaru', passwordLama = '$passwordLama'
    WHERE id_user = $id_user;";
    $hasil = mysqli_query($koneksi, $query);
  } else {
    header("location:profile_pengaturanAkun.php?status=passwordLama");
    exit();
  }

  if ($hasil) {
    header("location: homepage.php");
    exit();
  } else {
    header("location:laporan_barang.php?status=gagal");
    exit();
  }
}
