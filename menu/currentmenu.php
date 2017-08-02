<?php
if(!isset($_COOKIE['current'])
	setcookie("current","menu/admin_utama.php",time() + 7200,"/");
else
{
	$menu = $_GET['href'];
	setcookie("current","menu/$menu.php",time() + 7200,"/");
}
?>