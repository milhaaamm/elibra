<?php
include "../koneksi/checknlog.php";
$hal = $_GET['hal'];
$nbuku = $hal * 5;
$sql = "SELECT * FROM databuku WHERE _idb <= $nbuku AND _idb >= $nbuku-4";
$result = mysqli_query($connection,$sql);
$count = (mysqli_num_rows($result)/5)+1;
$countbuku = 1;
?>
<html>
<head>
<script>
</script>
</head>
<body>
<?php
while($fetch = mysqli_fetch_array($result))
{?>
<table width="100%">
<tr><td rowspan="3" width="256" align="center"><img width="200" height="256" src="<?php echo $fetch['imgsrc'];?>"></td>
	<td>Judul</td><td align="center"><?php echo $fetch['judul']; ?></td></tr>
<tr><td>Sub Judul</td><td align="center"><?php echo $fetch['subjudul']; ?></td></tr>
<tr><td id="<?php echo $fetch['_idb'];?>" colspan="2" align="left" height="220px" ><button onclick="generateparam(<?php echo $fetch['_idb'];?>)">Info lebih lanjut</button></td></tr>
<tr><td colspan="3" style="border-bottom:dashed 3px black;"></td></tr>
</table>
<?php
}
?>
<script>
</script>
</body>
</html>