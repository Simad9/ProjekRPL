<?php
// Waktu sekarang
$waktu_sekarang = date("H:i:s");

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
