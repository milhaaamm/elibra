<?php
include "../koneksi/checknlog.php";
$no = isset($_GET['idk']) ? $_GET['idk'] : null;
$nama = isset($_GET['nama']) ? $_GET['nama'] : null;
$sql = "UPDATE kategori SET nama='$nama' WHERE no = '$no'";
mysqli_query($connection,$sql);
?>