<?php
include "../koneksi/checknlog.php";
$sql = "SELECT * FROM kategori WHERE no != 99";
$hasil = mysqli_query($connection,$sql);
?>
<html>
<head>
<script src="js/inputbuku.js"></script>
</head>
<body>
<h2>Input data buku baru ke database</h2>
<form id="inputbuku">
<table width="100%">
<tr><td rowspan="11" width="256" align="center"><img width="200" height="256" src="img/cb/default.png"></td>
	<td>Judul</td><td><input type="text" name="judul"></td></tr>
<tr><td>Sub Judul</td><td><input type="text" name="subjudul"></td></tr>
<tr><td>ISBN-10</td><td><input type="text" name="isbn10"></td></tr>
<tr><td>ISBN-13</td><td><input type="text" name="isbn13"></td></tr>
<tr><td>Penulis</td><td><input type="text" name="penulis"></td></tr>
<tr><td>Penerbit</td><td><input type="text" name="penerbit"></td></tr>
<tr><td>Edisi</td><td><input type="text" name="edisi"></td></tr>
<tr><td>Kategori</td><td>
<select name="kategori">
<option value="99" selected>--Pilih salah satu Kategori--</option>
<?php 
while($fetch = mysqli_fetch_array($hasil))
{
	echo "<option value='$fetch[no]'>$fetch[nama]</option>";
}?>
</select></td></tr>
<tr><td>Halaman</td><td><input type="text" name="halaman"></td></tr>
<tr><td>Sinopsis</td><td><textarea name="sinopsis" value=""></textarea></td></tr>
<tr><td>Jumlah</td><td><input type="text" name="tersedia"></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="tambahkan"></input></td></tr>
</table>
</form>
</body>
</html>