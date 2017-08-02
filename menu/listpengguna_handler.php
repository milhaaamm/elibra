<?php
include "../koneksi/checknlog.php";
$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
$nbuku = $hal * 10;
$sql = "SELECT * FROM datalogin WHERE _id <= $nbuku AND _id >= $nbuku-9";
$result = mysqli_query($connection,$sql);
$count = (mysqli_num_rows($result)/10)+1;
$countbuku = 1;
?>
<table width="100%">
<tr><th>No.</th><th>Id User</th><th>Status</th><th>Aksi</th></tr>
<?php
$count = 0;
while($fetch = mysqli_fetch_array($result))
{
	$count++;
	?>
	<tr align="center">
	<td><?php echo $count;?></td>
	<td><?php echo $fetch['nim'];?></td>
	<td>
	<?php
	switch($fetch['status']){
		case 1:echo "Admin";break;
		case 2:echo "Anggota / Mahasiswa";break;
		case 3:echo "Pimpinan";break;
		case 4:echo "Operator";break;
		default:echo "Uncategorized";
	}
	?>
	</td>
	<td><button onclick="edituser(<?php echo $fetch['_id'];?>)">Edit</button><button onclick="hapus(<?php echo $fetch['_id'];?>)">Hapus</button></td>
	</tr>
<?php 
}
?>
</table>