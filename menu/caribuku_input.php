<?php
include "../koneksi/checknlog.php";
?>
<html>
<head>
</head>
<body>
<?php
$judul = isset($_GET['judulcari']) ? $_GET['judulcari'] : null;
$subjudul = isset($_GET['subjudulcari']) ? $_GET['subjudulcari'] : null;
$isbn10 = isset($_GET['isbn10cari']) ? $_GET['isbn10cari'] : null;
$isbn13 = isset($_GET['isbn13cari']) ? $_GET['isbn13cari'] : null;
$penulis = isset($_GET['penuliscari']) ? $_GET['penuliscari'] : null;
$penerbit = isset($_GET['penerbitcari']) ? $_GET['penerbitcari'] : null;
$kategori = isset($_GET['kategoricari']) ? $_GET['kategoricari'] : null;

$sql = "SELECT * FROM databuku WHERE 
		judul LIKE '%$judul%' OR 
		subjudul LIKE '%$subjudul%' OR
		isbn10 LIKE '%$isbn10%' OR
		isbn13 LIKE '%$isbn13%' OR
		penulis LIKE '%$penulis%' OR
		penerbit LIKE '%$penerbit%' OR
		kategori LIKE '%$kategori%'";
$hasil = mysqli_query($connection,$sql);
while($fetch = mysqli_fetch_array($hasil))
{
	?>
	<table width="100%">
	<tr><td rowspan="11" width="256" align="center"><img width="200" height="256" src="<?php echo $fetch['imgsrc'];?>"></td>
	<td>Judul</td><td align="center"><?php echo $fetch['judul'];?></td></tr>
	<tr><td>Sub Judul</td><td align="center"><?php echo $fetch['subjudul'];?></td></tr>
	<tr><td>ISBN-10</td><td align="center"><?php echo $fetch['isbn10'];?></td></tr>
	<tr><td>ISBN-13</td><td align="center"><?php echo $fetch['isbn13'];?></td></tr>
	<tr><td>Penulis</td><td align="center"><?php echo $fetch['penulis'];?></td></tr>
	<tr><td>Penerbit</td><td align="center"><?php echo $fetch['penerbit'];?></td></tr>
	<tr><td>Edisi</td><td align="center"><?php echo $fetch['edisi'];?></td></tr>
	<tr><td>Kategori</td><td align="center"><?php echo $fetch['kategori'];?></td></tr>
	<tr><td>Halaman</td><td align="center"><?php echo $fetch['halaman'];?></td></tr>
	<tr><td>Sinopsis</td><td align="center"><?php echo $fetch['sinopsis'];?></td></tr>
	<tr><td>Kesediaan</td><td align="center"><?php echo $fetch['tersedia'];?></td></tr>
	<tr><td colspan="3" style="border-bottom:dashed 2px grey"></td></tr>
	</table>
<?php
}
?>
</body>
</html>