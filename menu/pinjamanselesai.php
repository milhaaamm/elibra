<?php
include "../koneksi/checknlog.php";
$idp = $_GET['idp'];
$sql = "UPDATE databukudp SET tanggalb = now() WHERE _idp = '$idp'";
mysqli_query($connection,$sql);
$sql = "SELECT * FROM databukudp WHERE _idp = '$idp'";
$hasil = mysqli_query($connection,$sql);
$fetch = mysqli_fetch_array($hasil);
$tanggalbalik = strtotime($fetch['tanggalb']);
$tanggalbalikmax = strtotime($fetch['tanggalbalikmax']);
$denda = 0;
if($tanggalbalik > $tanggalbalikmax)
{
	$selisih = $tanggalbalik - $tanggalbalikmax;
	$denda = $selisih / 86400;
	$denda = floor($denda) * 500;
}
else
{
	
}

$sql2 = "UPDATE databukudp SET denda=$denda,selesai='1',kuantitas=0 WHERE _idp = '$idp'";
$isbn10 = $fetch['isbn10'];
$kuantitasdipinjam = $fetch['kuantitas'];
mysqli_query($connection,$sql2);
$sql4 = "SELECT * FROM databuku WHERE isbn10 = '$isbn10'";
$result = mysqli_query($connection,$sql4);
$fetch2 = mysqli_fetch_array($result);
$sql3 = "UPDATE databuku SET tersedia=$fetch2[tersedia]+$kuantitasdipinjam WHERE isbn10 = '$isbn10'";
mysqli_query($connection,$sql3);
?>