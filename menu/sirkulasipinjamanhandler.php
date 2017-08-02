<?php
include "../koneksi/checknlog.php";
$hal = $_GET['hal'];
$nbuku = $hal * 10;
$sql = "SELECT * FROM databukudp WHERE _idp <= $nbuku AND _idp >= $nbuku-9";
$result = mysqli_query($connection,$sql);
$count = (mysqli_num_rows($result)/10)+1;
$countbuku = 1;
?>
<table><tr><td><h3>Page : </h3></td><td><h3><div id="nomorlistbukudp"></div></h3></td></tr></table>
<table width="100%">
<tr><th colspan="8"><h2>List semua peminjaman buku</h2></th></tr>
<tr><th>No.</th><th>ISBN-10</th><th>Tgl pinjam</th><th>Tgl balik</th><th>Peminjam</th><th>Kuantitas</th><th>Denda</th><th>Status</th></tr>
<?php
$tdenda = 0;
while($fetch2 = mysqli_fetch_array($result))
{
	$tdenda += $fetch2['denda'];
	?>
	<tr align="center">
	<td><?php echo $fetch2['_idp'];?></td>
	<td><?php echo $fetch2['isbn10'];?></td>
	<td><?php echo $fetch2['tanggalp'];?></td>
	<td><?php echo $fetch2['tanggalb'];?></td>
	<td><?php echo $fetch2['peminjam'];?></td>
	<td><?php echo $fetch2['kuantitas'];?></td>
	<td>Rp <?php echo $fetch2['denda'];?></td>
	<?php
	if($fetch2['selesai'] == 1)
	{
		?>
		<td>Sudah Selesai</td>
		<?php
	}
	else
	{
		?>
		<td>Belum Selesai</td>
		<?php
	}
	?>
	</tr>
	<?php
}
?>
<tr align="center"><td colspan="6">Total Denda</td><td>Rp <?php echo $tdenda;?></td><td>&nbsp;</td></tr> 
<tr><td colspan="8" style="border-bottom:dashed 2px grey"></td></tr>
<tr><td colspan="8"><?php
$sql = "SELECT * FROM databuku";
$result = mysqli_query($connection,$sql);
$count = mysqli_num_rows($result)/10;
for($i = 1;$i <= $count+1;$i++)
{
	echo '<a style="color:black;" href="#" id="'.$i.'" onclick="hallistpinjaman('.$i.')">'.$i.'</a>     ';
}
?></td></tr>
<tr><td colspan="8" style="border-bottom:solid 1px grey"></td></tr>
</table>
