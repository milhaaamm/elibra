<?php
include "../koneksi/checknlog.php";
$no = isset($_GET['no']) ? $_GET['no'] : null;
$sql = "SELECT * FROM datalogin WHERE _id='$no'";
$fetch = mysqli_fetch_array(mysqli_query($connection,$sql));
$sql2 = "SELECT * FROM status WHERE nomor = '$fetch[status]'";
$fetch2 = mysqli_fetch_array(mysqli_query($connection,$sql2));
$sql3 = "DELETE FROM $fetch2[sebagai] WHERE noid = '$fetch[nim]'";
$sql4 = "DELETE FROM datalogin WHERE _id = '$no'";
$sql5 = "ALTER TABLE datalogin DROP '_id'";
$sql6 = "ALTER TABLE datalogin ADD '_id' INT(4) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY ('_id')";
mysqli_query($connection,$sql3);
mysqli_query($connection,$sql4);
mysqli_query($connection,$sql5);
mysqli_query($connection,$sql6);
?>