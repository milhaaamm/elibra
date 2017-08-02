<?php
include "koneksi/checknlog.php";
$id = isset($_POST['id']) ? test_input($_POST['id']) : null;
$pw = isset($_POST['pw']) ? test_input($_POST['pw']) : null;
$sql = "SELECT * FROM datalogin WHERE nim='$id' AND password='$pw'";
$query = mysqli_query($connection,$sql);
$check = mysqli_num_rows($query);
if($check == 1)
{
	$fetch = mysqli_fetch_array($query);
	setcookie("pengguna",$fetch['status'],time() + (7200),"/");
	setcookie("id",$id,time() + (7200),"/");
	mysqli_query($connection,"UPDATE datalogin SET logcount = $fetch[logcount]+1 WHERE nim = '$id'");
	$sql2 = "INSERT INTO log (noid,tgllogin) VALUES ('$id',now())";
	$result = mysqli_query($connection,$sql2);
	$sql3 = "SELECT * FROM log WHERE noid = '$id' AND tgllogout = DATE_ADD(now(),INTERVAL 2 HOUR)";
	$result2 = mysqli_query($connection,$sql3);
	$ikat = mysqli_fetch_array($result2);
	setcookie("sessionid",$ikat['_idl'],time() + (7200),"/");
}
else
{	
	echo "<script>alert('Anda Gagal Login');window.location.href='index.php';</script>";
}
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>