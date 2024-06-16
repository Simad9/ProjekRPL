<?php
function be_updateJadwalJaga($id_security, $id_jadwal)
{
  global $koneksi;

  $query = "UPDATE lap_jaga SET id_jadwal = '$id_jadwal' WHERE id_security = '$id_security'";
  $hasil = mysqli_query($koneksi, $query);
}

function be_hapusLaporanReq()
{
  global $koneksi;

  $id_reqJadwal = $_POST["id_reqJadwal"];
  $query = "DELETE FROM lap_reqJadwal WHERE id_reqJadwal = '$id_reqJadwal'";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: ?status=laporanReqDihapus");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}

function be_tambahSecurity()
{
  global $koneksi;

  $nama = $_POST["nama"];
  $noHp = $_POST["noHp"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Tambah Security
  $query = "INSERT INTO security (nama, noHp, username, password) VALUES ('$nama', '$noHp', '$username', '$password');";
  $hasil = mysqli_query($koneksi, $query);

  // Ambil ID Terakhir
  $id = mysqli_insert_id($koneksi);

  // Tambah ke lap_jaga
  $query = "INSERT INTO lap_jaga (id_security, id_jadwal) VALUES ($id, NULL);";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: JadwalSecurity.php?status=securityDitambah");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}

function be_hapusSecurity($id_security)
{
  global $koneksi;

  $query = "DELETE FROM lap_jaga WHERE id_security = '$id_security'";
  $hasil = mysqli_query($koneksi, $query);

  $query = "DELETE FROM security WHERE id_security = '$id_security'";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: JadwalSecurity.php?status=securityDihapus");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}

function be_updateSecurity($id_security)
{
  global $koneksi;

  $nama = $_POST['nama'];
  $noHp = $_POST["nohp"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "UPDATE security
  SET nama = '$nama', noHp = '$noHp', username = '$username', password = '$password'
  WHERE id_security = $id_security;";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: JadwalSecurity.php?status=securityDiupdate");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}

function be_hapusKunci($id_kunci)
{
  global $koneksi;

  $query = "SELECT urlFoto FROM kunci WHERE id_kunci = '$id_kunci'";
  $result = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_assoc($result);
  $urlKunci = $data['urlFoto'];
  unlink("../../img/kunci/$urlKunci");

  $query = "DELETE FROM lap_pinjamKunci WHERE id_kunci = '$id_kunci'";
  $hasil = mysqli_query($koneksi, $query);

  $query = "DELETE FROM kunci WHERE id_kunci = '$id_kunci'";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: ListKunci.php?status=kunciDihapus");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}

function be_updateKunci($id_kunci)
{
  global $koneksi;

  $nama = $_POST["nama"];
  $lokasi = $_POST["lokasi"];
  $penanggungJawab = $_POST["penjaw"];
  $note = $_POST["note"];

  $query = "UPDATE kunci
  SET nama = '$nama', lokasi = '$lokasi', penjaw = '$penanggungJawab', note = '$note'
  WHERE id_kunci = $id_kunci;";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: ListKUnci.php?status=kunciDiupdate");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}

function be_tambahKunci()
{
  global $koneksi;

  $nama = $_POST["nama"];
  $lokasi = $_POST["lokasi"];
  $penanggungJawab = $_POST["penjaw"];
  $note = $_POST["note"];

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
  if (!move_uploaded_file($tmpNama, "../../img/kunci/" . $namaFileBaru)) {
    // file tidak pindah, ERROR
    header("Location: ?status=gagal");
    exit();
  }

  $query = "INSERT INTO kunci (nama, lokasi, penjaw, note, urlFoto) VALUES ('$nama', '$lokasi', '$penanggungJawab', '$note', '$namaFileBaru');";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: ListKUnci.php?status=kunciDiupdate");
    exit();
  } else {
    header("location: ?status=gagal");
    exit();
  }
}
