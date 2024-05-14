<?php
require 'be_main.php';

global $koneksi;

// Validasi input
$id_security = isset($_POST['id_security']) ? intval($_POST['id_security']) : null;
$id_lapBarang = isset($_POST["id_lapBarang"]) ? intval($_POST["id_lapBarang"]) : null;
$note = isset($_POST["note"]) ? mysqli_real_escape_string($koneksi, $_POST["note"]) : null;
$id_jadwal = isset($_POST["id_jadwal"]) ? intval($_POST["id_jadwal"]) + 1 : null;

if ($id_security && $id_jadwal) {
  // Prepared statement untuk update lap_shift
  $stmt = $koneksi->prepare("UPDATE lap_shift SET id_lapBarang = ?, waktuSelesai = CURRENT_TIMESTAMP(), note = ? WHERE id_security = ?");
  $stmt->bind_param('isi', $id_lapBarang, $note, $id_security);
  $hasil_lap_shift = $stmt->execute();
  $stmt->close();

  // Prepared statement untuk update jadwal_security
  $stmt = $koneksi->prepare("UPDATE jadwal_security SET id_jadwal = ? WHERE id_security = ?");
  $stmt->bind_param('ii', $id_jadwal, $id_security);
  $hasil_jadwal_security = $stmt->execute();
  $stmt->close();

  if ($hasil_lap_shift && $hasil_jadwal_security) {
    header("Location: ../view/security/homepage.php?status=beresJaga");
    exit();
  } else {
    header("Location: ../view/security/homepage.php?status=gagal");
    exit();
  }
} else {
  // Input tidak valid
  header("Location: ../view/security/homepage.php?status=gagal");
  exit();
}
