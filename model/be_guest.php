<?php
function be_laporKehilangan()
{
  global $koneksi;

  $id_lapBarang = $_POST["id_lapBarang"];
  $nama = $_POST["nama"];
  $noHP = $_POST["noHP"];
  $kepemilikan = $_POST["kepemilikan"];

  // Foto logic
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpNama = $_FILES['foto']['tmp_name'];

  // cek apakah yang diupload adalah file yang benar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    header("Location: laporan_kehilangan.php?id=$id_lapBarang&status=notImage");
    exit;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranFile > 2000000) { //ukuran 2mb
    header("Location: laporan_kehilangan.php?id=$id_lapBarang&status=bigSize");
    exit;
  }

  // generate nama baru
  $namaFileBaru = uniqid(); //generate nama baru
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  // move file ke folder
  if (!move_uploaded_file($tmpNama, "../../img/kehilangan/" . $namaFileBaru)) {
    // file tidak pindah, ERROR
    header("Location: laporan_kehilangan.php?id=$id_lapBarang&status=gagal");
    exit;
  }

  $query = "INSERT INTO `lap_kehilangan` (`id_lapKehilangan`, `namaPemilik`, `noHp`, `buktiKepemilikan`, `fotoBukti`, `id_lapBarang`) VALUES (NULL, '$nama', '$noHP', '$kepemilikan', '$namaFileBaru', '$id_lapBarang')";
  $hasil = mysqli_query($koneksi, $query);

  if ($hasil) {
    header("Location: laporan_sukses.php");
    exit;
  } else {
    header("Location: laporan_kehilangan.php?id=$id_lapBarang&status=gagal");
    exit;
  }
}
