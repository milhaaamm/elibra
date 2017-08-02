<?php
$connection = mysqli_connect("localhost","root","","elibra_db");
$noid = $judul = $isbn10 = $isbn13 = "";
$judul = isset($_POST['judul']) ? test_input($_POST['judul']) : null;
$isbn10 = isset($_POST['isbn10']) ? test_input($_POST['isbn10']) : null;
$noid = isset($_POST['noid']) ? test_input($_POST['noid']) : null;
$isbn13 = isset($_POST['isbn13']) ? test_input($_POST['isbn13']) : null;
$kuantitas = isset($_POST['kuantitas']) ? test_input($_POST['kuantitas']) : null;
$sql1 = "SELECT * FROM databuku WHERE isbn10 = '$isbn10' OR isbn13  = '$isbn13' OR judul LIKE '$judul'";
$hasil1 = mysqli_query ($connection,$sql1);
$fetch1 = mysqli_fetch_array($hasil1);
if($fetch1['tersedia'] > $kuantitas)
{
	$sql2 = "INSERT INTO databukudp (peminjam,judul,isbn10,isbn13,kuantitas,tanggalp)
			VALUES ('$noid','$judul','$isbn10','$isbn13',$kuantitas,now())";
	$hasil2 = mysqli_query($connection,$sql2);
	$sql3 = "UPDATE databuku SET tersedia =$fetch1[tersedia]-$kuantitas WHERE isbn10 = '$isbn10' OR isbn13  = '$isbn13' OR judul LIKE '$judul'";
	$hasil3 = mysqli_query($connection,$sql3);
	echo "Berhasil memasukkan data";
}
else
{
	echo "Gagal, kuantitas buku kurang dari yang diharapkan";
}
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>