<?php
include "koneksi/checknlog.php";
$sql = "UPDATE log SET tgllogout=now() WHERE _idl=$_COOKIE[sessionid]";
$result = mysqli_query($connection,$sql);
setcookie("pengguna","",time() - 3600,"/");
setcookie("nim","",time() - 3600,"/");
setcookie("sessionid","",time()-3600,"/");
echo "<script>window.location.href='index.php';</script>";
?>