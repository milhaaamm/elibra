<?php
include "../koneksi/checknlog.php";
$nama = isset($_GET['nama']) ? $_GET['nama'] : null;
$sql = "INSERT INTO kategori (no,nama,jumlah) VALUES (null,'$nama',0)";
mysqli_query($connection,$sql)
?>