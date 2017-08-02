<?php
include "../koneksi/checknlog.php";
$hal = $_GET['hal'];
$nbuku = $hal * 30;
$sql = "SELECT * FROM databukudp WHERE _idp <= $nbuku AND _idp >= $nbuku-29";
$result = mysqli_query($connection,$sql);
$count = (mysqli_num_rows($result)/30)+1;
$countbuku = 1;
?>
<table width="100%">
<tr>
<th>No.</th>
<th>Judul</th>
<th>ISBN-10</th>
<th>Peminjam</th>
<th>Tgl Pinjam</th>
<th>Tgl Balik</th>
<th>Qt</th>
<th>Denda</th>
<th>Aksi</th>
</tr>
<?php
while($fetch = mysqli_fetch_array($result))
{?>
<tr align="center"  style="font-size:12px">
<td><?php echo $fetch['_idp']; ?></td>
<td><?php echo $fetch['judul']; ?></td>
<td><?php echo $fetch['isbn10']; ?></td>
<td><?php echo $fetch['peminjam']; ?></td>
<td><?php echo $fetch['tanggalp']; ?></td>
<td><?php echo $fetch['tanggalb']; ?></td>
<td><?php echo $fetch['kuantitas']; ?></td>
<td><?php echo $fetch['denda']; ?></td>
</div>
<?php
if($fetch['selesai'] == 1)
{
	?>
	<td id="status">Peminjaman Selesai</td>
	<?php
}
else
{
	?>
	<td id="tombolselesaipinjam<?php $fetch['_idp'];?>"><button onclick="balikbuku(<?php echo $fetch['_idp'];?>)">Selesai Dikembalikan</button></td>
<?php
}
?>
</tr>
<?php 
}
?>
</table>