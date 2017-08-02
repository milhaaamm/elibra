<?php
if(isset($_COOKIE['pengguna']))
{
	if($_COOKIE['pengguna'] != 4)
		echo "<script>alert('Anda tidak memiliki izin');window.location.href='index.php';</script>";	
}
else
{
	echo "<script>alert('Anda belum login');window.location.href='index.php';</script>";
}
?>
<html>
<head>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/menuhandler.js"></script>
<title>Control Panel</title>
<link href="style/os.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
<div id="header">
<h1>OLibra - Control Panel</h1>
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