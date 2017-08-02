<?php
if(isset($_COOKIE['pengguna']))
{
	if($_COOKIE['pengguna'] != 1)
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
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>$(document).ready(function(){
	$("#konten").load("menu/default.php");
});
</script>
<title>Control Panel</title>
<link href="style/as.css" rel="stylesheet" type="text/css">
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