<?php
require '../../model/be_main.php';

$id_kunci = $_GET["id_kunci"];
$query = "SELECT * FROM kunci WHERE id_kunci = '$id_kunci'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);

if (isset($_POST["submit"])) {
  be_updateKunci($id_kunci);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../tamplate/meta.php'; ?>
  <?php require '../../tamplate/judul.php'; ?>
  <title>Edit Kunci</title>
</head>

<body class=" md:w-5/12 md:m-auto border border-s-black border-e-black">
  <section class="flex flex-col gap-[10px] h-screen">
    <?php judulPath("Edit Kunci", "./ListKunci.php") ?>

    <main class="px-[15px] flex flex-col gap-[20px] pb-[15px]">

      <div class="flex flex-col gap-[10px]">
        <h1 class="text-t-black font-semibold text-[18px]">Edit Kunci</h1>

        <form action="" method="post">
          <div class="flex flex-col gap-[5px]">

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Nama Kunci</h1>
              <input type="text" value="<?= $data['nama'] ?>" name="nama" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Nama Kunci" value="Kunci Lab Patt 1">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Lokasi</h1>
              <input type="text" value="<?= $data['lokasi'] ?>" nama="lokasi" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Lokasi" value="Patt 1, arah Selatan">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Penganggung Jawab</h1>
              <input type="text" value="<?= $data['penjaw'] ?>" nama="penjaw" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Masukan Penanggung Jawab" value="Pak Sugeng">
            </div>

            <div>
              <h1 class="font-semibold text-s-black text-[15px]">Note</h1>
              <textarea type="text" name="note" class="px-[15px] py-[5px] border border-s-black rounded-[8px] w-full" placeholder="Note untuk Kunci"><?= $data['note'] ?></textarea>
            </div>

            <div class="flex flex-col gap-1">
              <label class="font-semibold text-[15px] text-s-black">Foto Kunci</label>
              <div class="flex items-center gap-[10px]">
                <label for="foto" class="flex items-center gap-3">
                  <img src="../../img/kunci/<?= $data['urlFoto'] ?>" id="foto-preview" class="object-cover w-[100px] h-[100px] border border-s-black rounded-[10px]" alt="Foto">
                </label>
                <p class="font-normal text-[10px] text-s-black">kirim foto maksimal 2mb</p>
              </div>
              <input type="file" id="foto" name="foto" accept="image/*" class="hidden">
            </div>

            <!-- <a href="./ListKunci.php" class="w-full"> -->
            <button type="submit" name="submit" class="w-full px-[10px] py-[5px] rounded-[10px] bg-ijo-500 text-s-white font-medium text-[20px]">SIMPAN</button>
            <!-- </a> -->

          </div>
        </form>
      </div>


    </main>

  </section>

  <script>
    // Memperbaiki penanganan perubahan gambar
    document.getElementById('foto').onchange = function(event) {
      event.preventDefault(); // Mencegah default action form
      const fotoPreview = document.getElementById('foto-preview');
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function() {
          fotoPreview.src = reader.result;
        }
        reader.readAsDataURL(file);
      }
    };
  </script>
</body>

</html>