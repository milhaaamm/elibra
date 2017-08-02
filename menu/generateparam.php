<?php
include "../koneksi/checknlog.php";
$id = $_GET['idb'];
$sql = "SELECT * FROM databuku WHERE _idb='$id'";
$hasil = mysqli_query($connection,$sql);
$fetch = mysqli_fetch_array($hasil);
$enter = "%25%30%41";
$param = "Judul = ".$fetch['judul'].$enter."Subjudul = ".$fetch['subjudul'].$enter."ISBN-10 = ".$fetch['isbn10'].$enter."ISBN-13 = ".$fetch['isbn13'].$enter."Penulis = ".$fetch['penulis'].$enter."Penerbit = ".$fetch['penerbit'].$enter."Edisi = ".$fetch['edisi'].$enter."Kategori = ".$fetch['kategori'].$enter."Halaman = ".$fetch['halaman'].$enter."Sinposis = ".$fetch['sinopsis'].$enter."Tersedia = ".$fetch['tersedia'];
echo $param;
?>