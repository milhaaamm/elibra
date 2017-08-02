<?php
include "../koneksi/checknlog.php";
$sql = "SELECT * FROM kategori";
$hasil = mysqli_query($connection,$sql);
?>
<html>
<head>
<script>
	function edit(idk){
		var namaedit = $("#nama"+idk).html();
		$("#nama"+idk).html('<input type="text" value="'+namaedit+'" id="newname'+idk+'" />');
		$("#edit"+idk).html('<button onclick="applyedit('+idk+')">Terapkan</button>');
	}
	function applyedit(idk)
	{
		var namabaru = $("#newname"+idk).val();
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				update();
			}
        };
        xmlhttp.open("GET","menu/kelolakategori_edit.php?idk="+idk+"&nama="+namabaru,true);
        xmlhttp.send();
	}
	function hapus(idk){
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				update();
			}
        };
        xmlhttp.open("GET","menu/kelolakategori_hapus.php?idk="+idk,true);
        xmlhttp.send();
	}
	function update(){
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				$("#tablekategori").html(this.responseText);
			}
        };
        xmlhttp.open("GET","menu/kelolakategori_handler.php",true);
        xmlhttp.send();
	}
</script>
</head>
<body>
<table border="1" width="100%">
<tr><th>Nama : </th><th>Total Buku</th><th>Aksi</th></tr>
<?php
while($fetch = mysqli_fetch_array($hasil))
{
	?>
	<tr><td id="nama<?php echo $fetch['no'];?>"><?php echo $fetch['nama'];?></td><td><?php echo $fetch['jumlah'];?></td><td align="center" id="edit<?php echo $fetch['no'];?>"><button onclick="edit(<?php echo $fetch['no'];?>)">Edit</button><button onclick="hapus(<?php echo $fetch['no'];?>)">Hapus</button></tr>
	<?php
}
?>
</table>
</body>
</html>