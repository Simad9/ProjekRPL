<?php
// Format jam Indonesia
date_default_timezone_set('Asia/Jakarta');

// Waktu sekarang
$waktu_sekarang_versi_lama = date("H:i:s");

// Waktu sesuai design
$waktu_sekarang = date("H:i");

// Tanggal sekarang
$tanggal_sekarang = date("d M Y");

// tanggal barang hilang 5 Mey 2022 - 12:00
function tanggalBarangHilang($tanggal_waktu)
{
  $tanggal_waktu_unix = strtotime($tanggal_waktu);
  $tanggal_format = date("d M Y - H:i", $tanggal_waktu_unix);
  echo $tanggal_format;
}

// ubah nomer hp jadi +628
function noHpWa($noHp)
{
  if (substr($noHp, 0, 2) === "08") {
    // Jika ya, maka ubah menjadi "+628"
    $noHp = "+628" . substr($noHp, 2);
  }

  echo $noHp;
}

// tampilan tnaggal
function tampilanTanggal($tanggal)
{
  $tanggal_waktu_unix = strtotime($tanggal);
  $tanggal_format = date("d/m/Y", $tanggal_waktu_unix);
  echo $tanggal_format;
}

// ubah format jam
function ubahFormatJam($jam)
{
  $jam = date("H:i", strtotime($jam));
  echo $jam;
}
