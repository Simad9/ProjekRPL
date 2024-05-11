<?php
// Nambah laporan barang
function be_laporanBarang()
{
  global $koneksi;

  $jenisBarang = $_POST['barang'];
  $deskripsi = $_POST["note"];

  // Foto logic
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpNama = $_FILES['foto']['tmp_name'];

  // cek apakah yang diupload adalah file yang benar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    header("Location: laporan_barang.php?status=notImage");
    exit;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranFile > 2000000) { //ukuran 2mb
    header("Location: laporan_barang.php?status=bigSize");
    exit;
  }

  // generate nama baru
  $namaFileBaru = uniqid(); //generate nama baru
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  // move file ke folder
  if (!move_uploaded_file($tmpNama, "../../img/laporan/" . $namaFileBaru)) {
    // file tidak pindah, ERROR
    header("Location: laporan_barang.php?status=gagal");
    exit();
  }


  $query = "INSERT INTO `lap_barang` (`id_lapBarang`, `namaBarang`, `tanggal`, `deskripsi`, `fotoBarang`) VALUES (NULL, '$jenisBarang', current_timestamp(), '$deskripsi', '$namaFileBaru')";
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

// Masuk absen
function be_masukAbsen()
{
  global $koneksi;


  if (true) {
    header("location: homepage.php");
    exit();
  } else {
    header("location:homepage.php?status=gagal");
    exit();
  }
}

// Fetch id_security dari id_user
function be_fetchIdSecurity()
{
  global $koneksi;

  $id_user = $_SESSION['id_user'];
  $query = "SELECT id_security FROM security WHERE id_user = $id_user";
  $hasil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_assoc($hasil);

  return $data['id_security'];
}
