<?php
include "../koneksi/checknlog.php";
?>
<html>
<head>
</head>
<body>
<table width="100%">
<form id="tambahhak">
<?php
$idmenu = isset($_GET['idmenu']) ? $_GET['idmenu'] : null;
$sql = "SELECT * FROM penempatan_menu WHERE idmenu = $idmenu";
$hasil = mysqli_query($connection,$sql);
$itung = mysqli_num_rows($hasil);
$i = 0;
$termasuk = array();
$tidaktermasuk[0] = array();
$statustidaktermasuk[0] = array();
while($fetch = mysqli_fetch_array($hasil))
{
	$termasuk[$i] = $fetch['iduser'];
	$i++;
}
$sql2 = "SELECT * FROM datalogin";
$hasil2 = mysqli_query($connection,$sql2);
$ccc = 0;
while($fetch2 = mysqli_fetch_array($hasil2))
{
	$ada = 0;
	for($j = 0;$j < $i;$j++)
	{
		if($fetch2['nim'] == $termasuk[$j])
		{$ada++;}
		else
		{}		
	}
	if($ada == 0)
	{$tidaktermasuk[$ccc] = $fetch2['nim'];$statustidaktermasuk[$ccc] = $fetch2['status'];$ccc++;}
	else
	{}
}
for($kk = 0;$kk<$ccc;$kk++)
{
	$sql3 = "SELECT * FROM status WHERE nomor=$statustidaktermasuk[$kk]";
	$hasil3 = mysqli_query($connection,$sql3);
	$fetch3 = mysqli_fetch_array($hasil3);
	$status = $fetch3['sebagai'];
	$sql4  = "SELECT * FROM $status WHERE noid ='$tidaktermasuk[$kk]'";
	$hasil4 = mysqli_query($connection,$sql4);
	$fetch4 = mysqli_fetch_array($hasil4);
		?>
		<tr align="center"><td><?php echo $tidaktermasuk[$kk];?></td><td><?php echo $fetch4['namadep']." ".$fetch4['namabel'];?></td><td><?php echo $statustidaktermasuk[$kk];?></td><td><button onclick="tambahuser_input(<?php echo $tidaktermasuk[$kk].",".$idmenu;?>)">Tambah</button></td></tr>
	<?php
}
?>
</form>
</table>
</body>
</html>