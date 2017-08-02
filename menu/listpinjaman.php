<?php
include "../koneksi/checknlog.php";
?>
<script>
hal(1);
function hal(nohal)
{
	var hal = nohal;
	if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
    } else {
            // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tempatpinjaman").innerHTML = this.responseText;
			document.getElementById("nomor").innerHTML = nohal;
        }
    };
    xmlhttp.open("GET","menu/listpinjamanhandler.php?hal="+nohal,true);
    xmlhttp.send();
}
function balikbuku(idp)
{
	if (idp == "") {
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				alert(this.responseText);
				hal(1);
            }
        };
        xmlhttp.open("GET","menu/pinjamanselesai.php?idp="+idp,true);
        xmlhttp.send();
    }
}
</script>
<h2>List semua buku dipinjam</h2>
<table><tr><td><h3>Page : </h3></td><td><h3><div id="nomor"></div></h3></td></tr></table>
<div id="tempatpinjaman">
</div>
<?php
$sql = "SELECT * FROM databukudp";
$result = mysqli_query($connection,$sql);
$count = mysqli_num_rows($result)/30;
for($i = 1;$i <= $count+1;$i++)
{
	echo '<a style="color:black;" href="#" id="'.$i.'" onclick="hal('.$i.')">'.$i.'</a>     ';
}
?>