<?php
$connection = mysqli_connect("localhost","root","","elibra_db");
//$connection = mysqli_connect("sql300.byethost4.com","b4_19389589","mentoelucu1!","b4_19389589_elibra_db");

if($connection -> connect_error)
	die("Connection Failed : ". $connection -> connect_error);
/* untuk auto cek ke pc server apakah udah ada databasenya atau belum, kalo belum auto bikin database dan tabel2nya
$checkdb = "SELECT SCHEMA_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = 'elibra_db'"
$checkdb2 = mysqli_num_rows($checkdb);

if($checkdb2 == 0)
{
	mysqli_query($connection,"CREATE DATABASE elibra_db;");
}
$connection = mysqli_connect("localhost","root","","elibra_db");
*/
?>