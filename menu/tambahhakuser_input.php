<?php
include "../koneksi/checknlog.php";
$noid = isset($_GET['iduser']) ? $_GET['iduser'] : null;
$nomenu = isset ($_GET['idmenu']) ? $_GET['idmenu'] : null;
$sql = "SELECT * FROM datalogin WHERE nim = '$noid'";
$hasil = mysqli_query($connection,$sql);
$fetch = mysqli_fetch_array($hasil);
$sqlquery = "INSERT INTO penempatan_menu (no,idmenu,iduser,statususer) VALUES (null,$nomenu,'$noid',$fetch[status])";
$hasil2 = mysqli_query($connection,$sqlquery);
echo $nomenu;
echo $noid;
?>