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
            document.getElementById("tempatbuku").innerHTML = this.responseText;
			document.getElementById("nomor").innerHTML = nohal;
        }
    };
    xmlhttp.open("GET","menu/listbukuhandler.php?hal="+nohal,true);
    xmlhttp.send();
}

function generateparam(idb){
	var param = "";
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				param = this.responseText;
				generateqr(param);
            }
        };
        xmlhttp.open("GET","menu/generateparam.php?idb="+idb,true);
        xmlhttp.send();
		
	function generateqr(param){
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				document.getElementById(idb).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","php/index.php?d="+param,true);
        xmlhttp.send();
	}
}
</script>
<h2>List semua buku terdaftar</h2>
<table><tr><td><h3>Page : </h3></td><td><h3><div id="nomor"></div></h3></td></tr></table>
<div id="tempatbuku">
</div>
<?php
$sql = "SELECT * FROM databuku";
$result = mysqli_query($connection,$sql);
$count = mysqli_num_rows($result)/5;
for($i = 1;$i <= $count+1;$i++)
{
	echo '<a style="color:black;" href="#" id="'.$i.'" onclick="hal('.$i.')">'.$i.'</a>     ';
}
?>