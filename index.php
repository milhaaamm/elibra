<?php
include "koneksi/checknlog.php";
if(isset($_COOKIE['pengguna']))
{
	$fetch = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM status WHERE nomor = '$_COOKIE[pengguna]'"));
	echo "<script>window.alert.href='$fetch[sebagai].php';</script>";
}
?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="style/as.css">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/login.js"></script>
<script>
$(document).ready(function(){
	
	);
</script>
<title>OLibra - Perpustakaan Online</title>
</head>
<body>
<div id="container">
<div class="login">
<h1>LOGIN</h1>
<form method="post" id="login">
<table width="200px">
<tr><td><input type="text" placeholder="id" name="id"></td></tr>
<tr><td><input type="password" placeholder="password" name="pw"></td></tr>
<tr><td colspan="2"><center><input type="submit" value="Masuk"></center></td></tr>
</table>
</form>
</div>
</div>
</body>
</html>