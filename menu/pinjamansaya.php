<?php
include "../koneksi/checknlog.php";
?>
<html>
<head>
</head>
<body>
<h2>Lihat buku saya pinjam</h2>
<table width="100%">
<tr><th>No.</th><th>Judul</th><th>ISBN10</th><th>ISBN13</th><th>Kuantitas</th><th>Tgl Maks Pengembalian</th><th>Denda</th></tr>
<?php
$denda = 0;
$count = 1;
$sql = "SELECT * FROM databukudp WHERE peminjam = '$_COOKIE[id]'";
$hasil = mysqli_query($connection,$sql);
while($fetch = mysqli_fetch_array($hasil))
{
	?>
	<tr align="center"><td><?php echo $count;?></td>
		<td><?php echo $fetch['judul'];?></td>
		<td><?php echo $fetch['isbn10'];?></td>
		<td><?php echo $fetch['isbn13'];?></td>
		<td><?php echo $fetch['kuantitas'];?></td>
		<td><?php echo $fetch['tanggalbalikmax'];?></td>
		<td><?php echo $fetch['denda'];?></td></tr>
	<?php
	$count++;
	$denda += $fetch['denda'];
}
?>
<tr  align="center" ><td colspan="6">Total Denda</td><td><?php echo $denda;?></td></tr>
</table>
</body>
</html>