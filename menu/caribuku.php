<?php
include "../koneksi/checknlog.php";
?>
<html>
<head>
<script>
function cari()
{
	var judul = document.getElementById("judulcari").innerHTML;
	var subjudul = document.getElementById("subjudulcari").innerHTML;
	var isbn10 = document.getElementById("isbn10cari").innerHTML;
	var isbn13 = document.getElementById("isbn13cari").innerHTML;
	var penulis = document.getElementById("penuliscari").innerHTML;
	var penerbit = document.getElementById("penerbitcari").innerHTML;
	var kategori = document.getElementById("kategoricari").innerHTML;
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				document.getElementById("hasilpencarian").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","menu/caribuku_input.php?judul="+judul+"&subjudul="+subjudul+"&isbn10="+isbn10+"&isbn13="+isbn13+"&penulis="+penulis+"&penerbit="+penerbit+"&kategori="+kategori,true);
        xmlhttp.send();
}
</script>
</head>
<body>
<h2>Cari Buku</h2>
<table width="100%">
<tr><th>Judul</th><td><input type="text" id="judulcari" value="" /></td></tr>
<tr><th>Sub Judul</th><td><input type="text" id="subjudulcari" value=""/></td></tr>
<tr><th>ISBN10</th><td><input type="text" id="isbn10cari" value=""/></td></tr>
<tr><th>ISBN13</th><td><input type="text" id="isbn13cari" value=""/></td></tr>
<tr><th>Penulis</th><td><input type="text" id="penuliscari" value=""/></td></tr>
<tr><th>Penerbit</th><td><input type="text" id="penerbitcari" value=""/></td></tr>
<tr><th>Kategori</th><td><input type="text" id="kategoricari" value=""/></td></tr>
<tr align="center"><td colspan="2"><button onclick="cari()">CARI</button></td></tr>
</table>
<div id="hasilpencarian">
</div>
</body>
</html>