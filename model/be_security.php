<?php
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
