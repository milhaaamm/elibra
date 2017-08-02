<?php
include "../koneksi/checknlog.php";
$datalogin = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM datalogin WHERE nim = '$_COOKIE[id]'"));
$status = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM status WHERE nomor ='$_COOKIE[pengguna]'"));
$fetch = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM $status[sebagai] WHERE noid = '$_COOKIE[id]'"));
?>
<h2>Profil</h2>
<table width="100%">
<tr><td rowspan="10" width="200px"><img width="200px" height="200px" src="<?php echo $fetch['imgsrc'];?>"></td>
	<td>Nama :</td><td><?php echo $fetch['namadep']." ".$fetch['namabel']; ?></td></tr>
	<td>No ID:</td><td><?php echo $fetch['noid'];?></td></tr>
	<td>Password :</td><td><?php echo $datalogin['password']; ?></td></tr>
<tr><td>Jenis kelamin :</td><td><?php echo $fetch['jeniskelamin']; ?></td></tr>
<tr><td>Tempat, tanggal lahir :</td><td><?php echo $fetch['ttl']; ?></td></tr>
<tr><td>Fakultas :</td><td><?php echo $fetch['fakultas']; ?></td></tr>
<tr><td>Jurusan :</td><td><?php echo $fetch['jurusan']; ?></td></tr>
<tr><td>Email :</td><td><?php echo $fetch['email']; ?></td></tr>
<tr><td>No. Telp :</td><td><?php echo $fetch['notel']; ?></td></tr>
<tr><td>Catatan :</td><td><?php echo $fetch['catatan']; ?></td></tr>
</table>