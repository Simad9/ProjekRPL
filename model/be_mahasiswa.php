<?php
function pinjamKunci()
{
  global $koneksi;

  $nama = $_POST["nama"];
  $jurusan = $_POST["jurusan"];
  $nohp = $_POST["nohp"];

  // Masuk Ke DB mahasiswa
  $query = "INSERT INTO mahasiswa (nama, jurusan, nohp) VALUES ('$nama', '$jurusan', '$nohp')";
  $hasil = mysqli_query($koneksi, $query);

  // Ambil ID Terakhir
  $id = mysqli_insert_id($koneksi);
  $kunci = $_POST["kunci"];

  // Masuk Ke DB lap_pinjamkunci
  $query = "INSERT INTO lap_pinjamkunci (id_mhs, id_kunci) VALUES ('$id', '$kunci')";
  $hasil = mysqli_query($koneksi, $query);

  // Cek apakah berhasil
  if ($hasil) {
    header("Location: laporanTerkirim.php");
    exit;
  } else {
    header("Location: laporanPinjamKunci.php?status=gagal");
    exit;
  }
}
