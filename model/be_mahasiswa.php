<?php
function pinjamKunci()
{
  global $koneksi;

  $nama = $_POST["nama"];
  $jurusan = $_POST["jurusan"];
  $nohp = $_POST["nohp"];
  $kunci = $_POST["kunci"];

  $query = "SELECT * FROM lap_pinjamKunci
  INNER JOIN kunci ON lap_pinjamKunci.id_kunci = kunci.id_kunci";
  $result = mysqli_query($koneksi, $query);
  while ($kunci1 = mysqli_fetch_assoc($result)) {
    if ($kunci1['id_kunci'] == $kunci) {
      header("Location: laporanPinjamKunci.php?status=sudahAda");
      exit();
    }
  }

  // Masuk Ke DB mahasiswa
  $query = "INSERT INTO mahasiswa (nama, jurusan, nohp) VALUES ('$nama', '$jurusan', '$nohp')";
  $hasil = mysqli_query($koneksi, $query);

  // Ambil ID Terakhir
  $id = mysqli_insert_id($koneksi);


  // Masuk Ke DB lap_pinjamkunci
  $query = "INSERT INTO lap_pinjamkunci (id_mhs, id_kunci) VALUES ('$id', '$kunci')";
  $hasil = mysqli_query($koneksi, $query);

  // Cek apakah berhasil
  if ($hasil) {
    header("Location: LaporanKunciTerkirim.php?id_mhs=$id&id_kunci=$kunci");
    exit;
  } else {
    header("Location: laporanPinjamKunci.php?status=gagal");
    exit;
  }
}

function be_laporanKehilangan()
{
  global $koneksi;

  $nama = $_POST["nama"];
  $nohp = $_POST["nohp"];

  // Masuk Ke DB mahasiswa
  $query = "INSERT INTO mahasiswa (nama, nohp) VALUES ('$nama', '$nohp')";
  $hasil = mysqli_query($koneksi, $query);

  // Ambil ID Terakhir
  $id_mhs = mysqli_insert_id($koneksi);

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
  if (!move_uploaded_file($tmpNama, "../../img/laporanKehilangan/" . $namaFileBaru)) {
    // file tidak pindah, ERROR
    header("Location: ?status=gagal");
    exit();
  }

  // Ambil ID lapBarang
  $id_lapBarang = $_POST["id_lapBarang"];
  $bukti = $_POST["bukti"];

  // Masuk ke DB
  $query = "INSERT INTO `lap_kehilangan` (`urlFoto`,`bukti`, `id_lapBarang`, `id_mhs`) VALUES ('$namaFileBaru','$bukti','$id_lapBarang', '$id_mhs')";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: LaporanTerkirim.php");
    exit();
  } else {
    header("location:?status=gagal");
    exit();
  }
}
