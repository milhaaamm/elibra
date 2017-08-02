<?php
$connection = mysqli_connect("localhost","root","","elibra_db");
$namadep = $namabel = $noid = $jk = $ttl = $fakultas = $jurusan = $email = $notel = $catatan = $status = $password = "";
$namadep = isset($_POST['namadep']) ? test_input($_POST['namadep']) : null;
$namabel = isset($_POST['namabel']) ? test_input($_POST['namabel']) : null;
$noid = isset($_POST['noid']) ? test_input($_POST['noid']) : null;
$password = isset($_POST['password']) ? test_input($_POST['password']) : null;
$jk = isset($_POST['jk']) ? test_input($_POST['jk']) : null;
$ttl = isset($_POST['ttl']) ? test_input($_POST['ttl']) : null;
$fakultas = isset($_POST['fakultas']) ? test_input($_POST['fakultas']) : null;
$jurusan = isset($_POST['jurusan']) ? test_input($_POST['jurusan']) : null;
$email = isset($_POST['email']) ? test_input($_POST['email']) : null;
$notel = isset($_POST['notel']) ? test_input($_POST['notel']) : null;
$catatan = isset($_POST['catatan']) ? $_POST['catatan'] : null;
$status = isset($_POST['status']) ? test_input($_POST['status']) : null;
$sql1 = "SELECT nomor FROM status WHERE sebagai = '$status'";
$hasil1 = mysqli_query ($connection,$sql1);
$fetch1 = mysqli_fetch_array($hasil1);
$sql2 = "INSERT INTO $status (noid,namadep,namabel,jeniskelamin,ttl,fakultas,jurusan,email,notel,catatan)
		VALUES ('$noid','$namadep','$namabel','$jk','$ttl','$fakultas','$jurusan','$email','$notel','$catatan')";
$hasil2 = mysqli_query($connection,$sql2);
$sql3 = "INSERT INTO datalogin (nim,password,status) VALUES ('$noid','$password','$fetch1[nomor]')";
$hasil3 = mysqli_query($connection,$sql3);
switch($fetch1['nomor'])
{
	case 1:$n = 12;$counting=array('1','2','3','4','5','7','8','9','10','11','12','13');break;
	case 2:$n = 5;$counting=array('1','2','9','11','13');break;
	case 3:$n = 6;$counting=array('1','2','3','8','9','11');break;
	case 4:$n = 5;$counting=array('2','4','7','9','11');break;
}
$i = 0;
while($i<$n)
{
	$sql = "INSERT INTO penempatan_menu (no,idmenu,iduser,statususer) 
			VALUES (null,$counting[$i],'$noid','$fetch1[nomor]')";
	$penempatanmenu = mysqli_query($connection,$sql);
	echo $sql."<br>";
	$i++;
}
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>