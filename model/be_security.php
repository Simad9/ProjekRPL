<?php
// Nambah laporan barang
function be_laporanBarang()
{
  global $koneksi;

  $jenisBarang = $_POST['jenis'];
  $deskripsi = $_POST["deskripsi"];

  // Foto logic
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpNama = $_FILES['foto']['tmp_name'];

  // cek apakah yang diupload adalah file yang benar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    header("Location: ?status=notImage");
    exit;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranFile > 2000000) { //ukuran 2mb
    header("Location: ?status=bigSize");
    exit;
  }

  // generate nama baru
  $namaFileBaru = uniqid(); //generate nama baru
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  // move file ke folder
  if (!move_uploaded_file($tmpNama, "../../img/laporanBarang/" . $namaFileBaru)) {
    // file tidak pindah, ERROR
    header("Location: ?status=gagal");
    exit();
  }

  $query = "INSERT INTO `lap_barang` (`jenisBarang`, `deskripsi`, `urlFoto`) VALUES ('$jenisBarang', '$deskripsi', '$namaFileBaru')";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: LaporanTerkirim.php");
    exit();
  } else {
    header("location:?status=gagal");
    exit();
  }
}

// Update data personal
function be_updateDataPersonal()
{
  global $koneksi;

  $id_security = $_POST['id_security'];
  $nama = $_POST['nama'];
  $noHp = $_POST["nohp"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "UPDATE security
  SET nama = '$nama', noHp = '$noHp', username = '$username', password = '$password'
  WHERE id_security = $id_security;";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: FiturTambahan.php?status=updateProfile");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}

// Fetch id_security dari id_user
function be_fetchIdSecurity()
{
  global $koneksi;

  $id_security = $_SESSION['id_security'];
  $query = "SELECT id_security FROM security WHERE id_security = $id_security";
  $hasil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_assoc($hasil);

  return $data['id_security'];
}

//  Fetch Name Security 
function be_fetchNameSecurity()
{
  global $koneksi;

  $id_security = $_SESSION['id_security'];
  $query = "SELECT nama FROM security WHERE id_security = $id_security";
  $hasil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_assoc($hasil);

  return $data['nama'];
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

// PEMINJAMAN KUNCI
// Ditolak Perizinan
function be_tolakKunci()
{

  global $koneksi;

  $id_pinjamKunci = $_POST['id_pinjamKunci'];
  $query = "DELETE FROM lap_pinjamKunci
  WHERE id_pinjamKunci = $id_pinjamKunci;";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: ?status=tolakKunci");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}

// Diterima Perizinan
function be_terimaKunci()
{
  global $koneksi;

  $id_pinjamKunci = $_POST['id_pinjamKunci'];
  $query = "UPDATE lap_pinjamKunci
  SET diizinkan = '1'
  WHERE id_pinjamKunci = $id_pinjamKunci;";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: ?status=terimaKunci");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}

// Laporan Selesai
function hapusLapKehilangan($id_lapKehilangan, $urlBukti, $id_lapBarang, $urlBarang, $id_mhs)
{
  global $koneksi;

  // hapus file kehilangan Barang
  $fileLokasi = "../../img/laporanKehilangan/$urlBukti";
  unlink($fileLokasi);

  // hapus lporan kehilangan
  $query = "DELETE FROM lap_kehilangan
  WHERE id_lapKehilangan = $id_lapKehilangan;";
  $hasil = mysqli_query($koneksi, $query);

  // hapus file laporan Barang
  $fileLokasi = "../../img/laporanBarang/$urlBarang";
  unlink($fileLokasi);

  // hapus lporan barang
  $query = "DELETE FROM lap_barang
   WHERE id_lapBarang = $id_lapBarang;";
  $hasil = mysqli_query($koneksi, $query);

  // hapus data mahasiswa
  $query = "DELETE FROM mahasiswa
  WHERE id_mhs = $id_mhs;";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: LaporanKehilangan.php?status=terhapus");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}

// Request Jadwal
function requestJadwal()
{
  global $koneksi;

  $id_security = $_POST['id_security'];
  $id_securityTeman = $_POST["id_rekan"];
  $alasan = $_POST["alasan"];

  $query = "INSERT INTO lap_reqJadwal (id_security, id_securityTeman, alasan) VALUES ('$id_security', '$id_securityTeman', '$alasan');";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: LaporanTerkirim.php");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}
