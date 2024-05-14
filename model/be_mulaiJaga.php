<?php
require 'be_main.php';

global $koneksi;

$id_security = $_POST['id_security'];
$id_jadwal = $_POST["id_jadwal"];

$query = "INSERT INTO `lap_shift` (`id_lapShift`, `id_security`, `id_jadwal`, `id_lapBarang`, `waktuMulai`, `waktuSelesai`, `note`) VALUES (NULL, '$id_security', '$id_jadwal', NULL, current_timestamp(), NULL, NULL);";
$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
  header("location: ../view/security/homepage.php?status=berhasil");
  exit();
} else {
  header("location: ../view/security/homepage.php?status=gagal");
  exit();
}
