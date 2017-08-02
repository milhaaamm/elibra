<?php
include "../koneksi/checknlog.php";
$fetch1 = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM status WHERE nomor = '$_COOKIE[pengguna]'"));
$fetch = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM $fetch1[sebagai] WHERE noid = '$_COOKIE[id]'"));
?>
<h2>Beranda</h2>
Selamat datang <?php echo $fetch['namadep']." ".$fetch['namabel'];?><br />
Recent Changes: