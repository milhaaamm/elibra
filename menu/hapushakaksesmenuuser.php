<?php
include "../koneksi/checknlog.php";
$nolist = isset($_GET['nolist']) ? $_GET['nolist'] : null;
$sql = "DELETE FROM penempatan_menu WHERE no = '$nolist'";
mysqli_query($connection,$sql);
?>