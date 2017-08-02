<?php
$connection = mysqli_connect("localhost","root","","elibra_db");
$judul = $subjudul = $isbn10 = $isbn13 = $penulis = $penerbit = $edisi = $kategori = $halaman = $sinopsis = "-";
$judul = isset($_POST['judul']) ? test_input($_POST['judul']) : null;
$subjudul = isset($_POST['subjudul']) ? test_input($_POST['subjudul']) : null;
$isbn10 = isset($_POST['isbn10']) ? test_input($_POST['isbn10']) : null;
$isbn13 = isset($_POST['isbn13']) ? test_input($_POST['isbn13']) : null;
$penulis = isset($_POST['penulis']) ? test_input($_POST['penulis']) : null;
$penerbit = isset($_POST['penerbit']) ? test_input($_POST['penerbit']) : null;
$edisi = isset($_POST['edisi']) ? test_input($_POST['edisi']) : null;
$kategori = isset($_POST['kategori']) ? test_input($_POST['kategori']) : null;
$halaman = isset($_POST['halaman']) ? test_input($_POST['halaman']) : null;
$sinopsis = isset($_POST['sinopsis']) ? $_POST['sinopsis'] : null;
$tersedia = isset($_POST['tersedia']) ? $_POST['tersedia'] : 1;
$sql = "SELECT * FROM kategori WHERE no = $kategori";
$fetch = mysqli_fetch_array(mysqli_query($connection,$sql));
$kuantitasbaru = $fetch['jumlah'] + $tersedia;
$sql2 = "INSERT INTO databuku (judul,subjudul,isbn10,isbn13,penulis,penerbit,edisi,kategori,halaman,sinopsis,tersedia)
		VALUES ('$judul','$subjudul','$isbn10','$isbn13','$penulis','$penerbit','$edisi','$fetch[nama]','$halaman','$sinopsis',$tersedia)";
$hasil2 = mysqli_query($connection,$sql2);
mysqli_query($connection,"UPDATE kategori SET jumlah = $kuantitasbaru WHERE no=$kategori");
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>