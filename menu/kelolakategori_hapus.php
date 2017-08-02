<?php
include "../koneksi/checknlog.php";
$no = isset($_GET['idk']) ? $_GET['idk'] : null;
$sql = "DELETE FROM kategori WHERE no = '$no'";
mysqli_query($connection,$sql);
?>