<?php

function judulPath($judul, $path)
{
?>
  <div class="flex justify-center items-center relative h-[100px] gap-5">
    <img src='../../assets/icon/bg.png' class="absolute rounded-bl-[10px] rounded-br-[10px] bottom-0 left-0 -z-10">
    <a href="<?= $path ?>"> <img src="../../assets/icon/arrow.png"> </a>
    <h1 class="font-semibold text-s-white text-[25px]"><?= $judul ?></h1>
    <img src="../../assets/icon/arrow.png" class="opacity-0">
  </div>
<?php
}

function judulPolos($judul)
{
?>
  <div class="flex justify-center items-center relative h-[100px] gap-5">
    <img src='../../assets/icon/bg.png' class="absolute rounded-bl-[10px] rounded-br-[10px] bottom-0 left-0 -z-10">
    <h1 class="font-semibold text-s-white text-[25px]"><?= $judul ?></h1>
  </div>
<?php
}
?>