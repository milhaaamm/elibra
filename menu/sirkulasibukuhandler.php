<?php
include "../koneksi/checknlog.php";
$hal = $_GET['hal'];
$nbuku = $hal * 10;
$sql = "SELECT * FROM databuku WHERE _idb <= $nbuku AND _idb >= $nbuku-9";
$result = mysqli_query($connection,$sql);
$count = (mysqli_num_rows($result)/10)+1;
$countbuku = 1;
?>
<html>
<head>
</head>
<body>
<table><tr><td><h3>Page : </h3></td><td><h3><div id="nomorlistbuku"></div></h3></td></tr></table>
<table width="100%">
<tr><th colspan="7"><h2>List semua buku terdaftar</h2></th></tr>
<tr><th>No.</th><th>Judul</th><th>SubJudul</th><th>ISBN-10</th><th>ISBN-13</th><th>Kuantitas</th><th>Aksi</th></tr>
<?php
while($fetch = mysqli_fetch_array($result))
{
	?>
	<tr align="center">
	<td><?php echo $fetch['_idb'];?></td>
	<td><?php echo $fetch['judul'];?></td>
	<td><?php echo $fetch['subjudul'];?></td>
	<td><?php echo $fetch['isbn10'];?></td>
	<td><?php echo $fetch['isbn13'];?></td>
	<td><?php echo $fetch['tersedia'];?></td>
	<td><button onclick="lihatbuku(<?php echo $fetch['_idb'];?>)">Lihat</button></td>
	</tr>
	<?php
}
?>
<tr><td colspan="7" style="border-bottom:dashed 2px grey"></td></tr>
<tr><td colspan="7">
<?php
$sql = "SELECT * FROM databuku";
$result = mysqli_query($connection,$sql);
$count = mysqli_num_rows($result)/10;
for($i = 1;$i <= $count+1;$i++)
{
	echo '<a style="color:black;" href="#" id="'.$i.'" onclick="hallistbuku('.$i.')">'.$i.'</a>     ';
}
?></td></tr>
<tr><td colspan="7" style="border-bottom:solid 1px grey"></td></tr>
</table>
</body>
</html>