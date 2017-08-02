<?php
$connection = mysqli_connect("localhost","root","","elibra_db");
$namadep = $namabel = $jk = $ttl = $fakultas = $jurusan = $email = $notel = $catatan = $status = $password = "";
$idu = isset($_POST['idu']) ? $_POST['idu'] : null;
$statuslama = isset($_POST['statuslama']) ? $_POST['statuslama'] : null;
$namadep = isset($_POST['namadep']) ? test_input($_POST['namadep']) : null;
$namabel = isset($_POST['namabel']) ? test_input($_POST['namabel']) : null;
$noidlama = isset($_POST['noidlama']) ? test_input($_POST['noidlama']) : null;
$noidbaru = isset($_POST['noidbaru']) ? test_input($_POST['noidbaru']) : null;
$password = isset($_POST['password']) ? test_input($_POST['password']) : null;
$jk = isset($_POST['jk']) ? test_input($_POST['jk']) : null;
$ttl = isset($_POST['ttl']) ? test_input($_POST['ttl']) : null;
$fakultas = isset($_POST['fakultas']) ? test_input($_POST['fakultas']) : null;
$jurusan = isset($_POST['jurusan']) ? test_input($_POST['jurusan']) : null;
$email = isset($_POST['email']) ? test_input($_POST['email']) : null;
$notel = isset($_POST['notel']) ? test_input($_POST['notel']) : null;
$catatan = isset($_POST['catatan']) ? $_POST['catatan'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
if($status == $statuslama)
{
	$sql2 = "UPDATE $status SET noid = '$noidbaru',namadep = '$namadep' ,namabel = '$namabel',jeniskelamin = '$jk',
	ttl = '$ttl',fakultas = '$fakultas',jurusan = '$jurusan',email = '$email',notel = '$notel',
	catatan = '$catatan' WHERE noid = '$noidlama'";
	$hasil2 = mysqli_query($connection,$sql2);
}
else
{
	$sql = "DELETE FROM $statuslama WHERE noid = '$noidlama'";
	$hasil0 = mysqli_query($connection,$sql);
	$sql4 = "INSERT INTO $status (noid,namadep,namabel,jeniskelamin,ttl,fakultas,jurusan,email,notel,catatan)
	VALUES ('$noidbaru','$namadep','$namabel','$jk','$ttl','$fakultas','$jurusan','$email','$notel','$catatan')";
	$hasil4 = mysqli_query($connection,$sql4);
	$sql5 = "SELECT * FROM status WHERE sebagai = '$status'";
	$hasil5 = mysqli_query($connection,$sql5);
	$fetch5 = mysqli_fetch_array(mysqli_query($connection,$sql5));
	$sql6 = "UPDATE datalogin SET status='$fetch5[nomor]' WHERE _id='$idu'";
	$hasil6 = mysqli_query($connection,$sql6);
}
$sql3 = "UPDATE datalogin SET password = '$password',nim = '$noidbaru' WHERE _id = '$idu'";
$hasil3 = mysqli_query($connection,$sql3);
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>