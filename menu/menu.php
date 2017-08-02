<?php
include "koneksi/checknlog.php";
$sql = "SELECT * FROM penempatan_menu WHERE iduser = $_COOKIE[id] ORDER BY idmenu ASC";
$hasil = mysqli_query($connection,$sql);
?>
<ul>
<h3>Menu:</h3>
<?php
while ($fetch = mysqli_fetch_array($hasil))
{
	$sql2="SELECT * FROM all_fungsi WHERE _idf = $fetch[idmenu]";
	$hasil2 = mysqli_query($connection,$sql2);
	while($fetch2 = mysqli_fetch_array($hasil2))
	{
?>
	<li><a href="#" name="<?php echo $fetch2['link']; ?>" class="menu"><?php echo $fetch2['namatampil']; ?></a></li>
<?php
	}
}
?>
<li><a href="logout.php">Log Out</a></li>
</ul>