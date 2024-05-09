<?php
function be_laporKehilangan()
{
  global $koneksi;

  $nama = $_POST["nama"];
  $noHP = $_POST["noHP"];
  $kepemilikan = $_POST["kepemilikan"];
  $id_lapBarang = $_POST["id_lapBarang"];

  // Foto logic

  $query = "INSERT INTO `lap_kehilangan` (`id_lapKehilangan`, `namaPemilik`, `noHp`, `buktiKepemilikan`, `id_lapBarang`) VALUES (NULL, '$nama', '$noHP', '$kepemilikan', '$id_lapBarang')";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("location: laporan_sukses.php");
    exit();
  } else {
    header("location:laporan_kehilangan.php?status=gagal");
    exit();
  }
}
