<?php
$connection = mysqli_connect("localhost","root","","elibra_db");
$namadep = $namabel = $jk = $ttl = $fakultas = $jurusan = $email = $notel = $catatan = $status = $password = "";
$namadep = isset($_POST['namadep']) ? test_input($_POST['namadep']) : null;
$namabel = isset($_POST['namabel']) ? test_input($_POST['namabel']) : null;
$password = isset($_POST['password']) ? test_input($_POST['password']) : null;
$jk = isset($_POST['jk']) ? test_input($_POST['jk']) : null;
$ttl = isset($_POST['ttl']) ? test_input($_POST['ttl']) : null;
$fakultas = isset($_POST['fakultas']) ? test_input($_POST['fakultas']) : null;
$jurusan = isset($_POST['jurusan']) ? test_input($_POST['jurusan']) : null;
$email = isset($_POST['email']) ? test_input($_POST['email']) : null;
$notel = isset($_POST['notel']) ? test_input($_POST['notel']) : null;
$catatan = isset($_POST['catatan']) ? $_POST['catatan'] : null;
$sql1 = "SELECT * FROM status WHERE nomor = '$_COOKIE[pengguna]'";
$hasil1 = mysqli_query($connection,$sql1);
$status = mysqli_fetch_array($hasil1);
$sql2 = "UPDATE $status[sebagai] SET namadep = '$namadep' ,namabel = '$namabel',jeniskelamin = '$jk',
		ttl = '$ttl',fakultas = '$fakultas',jurusan = '$jurusan',email = '$email',notel = '$notel',
		catatan = '$catatan' WHERE noid = '$_COOKIE[id]'";
$hasil2 = mysqli_query($connection,$sql2);
$sql3 = "UPDATE datalogin SET password = '$password' WHERE nim = '$_COOKIE[id]'";
$hasil3 = mysqli_query($connection,$sql3);
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>