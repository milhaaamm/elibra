<?php
include "../koneksi/checknlog.php";
?> 
<html>
<head>
</head>
<body>
<table width="100%">
<tr><th id="judulmenu" colspan="4">Yang bisa memakai menu</th></tr>
<tr><th>no.id</th><th>nama</th><th>status</th><th>aksi</th></tr>
<?php
$idf = isset($_GET['fungsi']) ? $_GET['fungsi'] : null;
$sql = "SELECT * FROM penempatan_menu WHERE idmenu = '$idf'";
$hasil = mysqli_query($connection,$sql);
while($fetch = mysqli_fetch_array($hasil))
{
	$sql3 = "SELECT * FROM status WHERE nomor = '$fetch[statususer]'";
	$hasil3 = mysqli_query($connection,$sql3);
	$fetch3 = mysqli_fetch_array($hasil3);
	$sql2 = "SELECT * FROM $fetch3[sebagai] WHERE noid = '$fetch[iduser]'";
	$hasil2 = mysqli_query($connection,$sql2);
	$fetch2 = mysqli_fetch_array($hasil2);
	?>
	<tr align="center"><td><?php echo $fetch['iduser'];?></td><td><?php echo $fetch2['namadep']." ".$fetch2['namabel'];?></td><td><?php echo $fetch['statususer'];?></td><td><button onclick="hapus(<?php echo $fetch['no'].",".$idf;?>)">Hapus</button></td></tr>
	<?php
}
?>
<tr><td colspan="4" align="center"><button onclick="tambah(<?php echo $idf;?>)">Tambah hak akses</button></td></tr>
</table>
</body>
</html>