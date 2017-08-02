<?php
if(isset($_COOKIE['pengguna']))
{
	if($_COOKIE['pengguna'] != 2)
		echo "<script>alert('Anda tidak memiliki izin');window.location.href='index.php';</script>";	
}
else
{
	echo "<script>alert('Anda belum login');window.location.href='index.php';</script>";
}
?>
<html>
<head>
<title>Selamat Datang di ELibra</title>
<link href="style/anggotastyle.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/menuhandler.js"></script>
</head>
<body>
<div id="container">
<div id="header">
<h1>OLibra - Perpus Online UINJKT</h1>
</div>
<div id="tengah">
<div id="menu">
<?php
include "menu/menu.php";
?>
</div>
<div id="konten">
</div>
</div>
</div>
</body>
</html>