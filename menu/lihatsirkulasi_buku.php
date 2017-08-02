<?php
include "../koneksi/checknlog.php";
$idb = $_GET['idb'];
$sql = "SELECT * FROM databuku WHERE _idb = $idb";
$result = mysqli_query($connection,$sql);
$fetch = mysqli_fetch_array($result)
?>
<html>
<head>
<script>

</script>
<link href="../style/modalbox.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="modal-header">
      <span class="close" onclick="closed()">&times;</span>
      <h2><?php echo $fetch['judul'];?></h2>
	  <h4><?php echo $fetch['subjudul'];?></h4>
    </div>
    <div class="modal-body">
	<table>
<tr><td rowspan="10" width="256" align="center"><img width="200" height="256" src="<?php echo $fetch['imgsrc'];?>"></td>
	<td>Judul</td><td><?php echo $fetch['judul']; ?></td></tr>
<tr><td>Sub Judul</td><td><?php echo $fetch['subjudul']; ?></td></tr>
<tr><td>ISBN-10</td><td><?php echo $fetch['isbn10']; ?></td></tr>
<tr><td>ISBN-13</td><td><?php echo $fetch['isbn13']; ?></td></tr>
<tr><td>Penulis</td><td><?php echo $fetch['penulis']; ?></td></tr>
<tr><td>Penerbit</td><td><?php echo $fetch['penerbit']; ?></td></tr>
<tr><td>Edisi</td><td><?php echo $fetch['edisi']; ?></td></tr>
<tr><td>Kategori</td><td><?php echo $fetch['kategori']; ?></td></tr>
<tr><td>Halaman</td><td><?php echo $fetch['halaman']; ?></td></tr>
<tr><td>Kesediaan</td><td><?php echo $fetch['tersedia']; ?></td></tr>
<tr><td colspan="3"><?php echo $fetch['sinopsis']; ?></td></tr>
<tr><td colspan="3" style="border-bottom:dashed 2px grey"></td></tr>
</table>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
</body>
</html>