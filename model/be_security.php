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
    header("location: homepage.php?status=berhasilBarang");
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

  $query = "UPDATE security
  SET nama = '$nama', tgl_lhr= '$tgl_lhr', alamat = '$alamat', noHp = '$NoHp'
  WHERE id_security = $id_security;";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: profile.php?status=updateProfile");
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
    header("location: profile.php?status=updateAkun");
    exit();
  } else {
    header("location:laporan_barang.php?status=gagal");
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

// Mulai Jaga
function be_mulaiJaga()
{
  global $koneksi;

  $id_security = $_POST['id_security'];
  $id_jadwal = $_POST["id_jadwal"];

  $query = "INSERT INTO `lap_shift` (`id_lapShift`, `id_security`, `id_jadwal`, `id_lapBarang`, `waktuMulai`, `waktuSelesai`, `note`) VALUES (NULL, '$id_security', '$id_jadwal', NULL, current_timestamp(), NULL, NULL);";
  $hasil = mysqli_query($koneksi, $query);
  echo "tai";
  die;

  if ($hasil) {
    header("location: homepage.php?status=berhasil");
    exit();
  } else {
    header("location: homepage.php?status=gagal");
    exit();
  }
}

// selesai Jaga
function be_selesaiJaga()
{
  global $koneksi;

  $id_security = $_POST['id_security'];
  $id_lapBarang = $_POST["id_lapBarang"] ? $_POST["id_lapBarang"] : null;
  $note = $_POST["note"] ? $_POST["note"] : null;

  $query = "UPDATE lap_shift
  SET id_lapBarang = '$id_lapBarang', waktuSelesai = current_timestamp(), note = '$note'
  WHERE id_security = $id_security;";
  $hasil = mysqli_query($koneksi, $query);

  $id_jadwal = $_POST["id_jadwal"] + 1;
  $query = "UPDATE jadwal_security 
  SET id_jadwal = '$id_jadwal' 
  WHERE id_security = '$id_security';";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: homepage.php?status=beresJaga");
    exit();
  } else {
    header("location: homepage.php?status=gagal");
    exit();
  }
}
