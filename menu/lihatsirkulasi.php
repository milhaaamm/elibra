<?php
include "../koneksi/checknlog.php";
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/modalbox.css" />
<script>
function closed()
{
	modal.style.display = "none";
}
var modal = document.getElementById('myModal');
var span = document.getElementsByClassName('close');
function lihatbuku(idb) {
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				document.getElementById("modalbox").innerHTML = this.responseText;
				
            }
        };
        xmlhttp.open("GET","menu/lihatsirkulasi_buku.php?idb="+idb,true);
        xmlhttp.send();
    modal.style.display = "block";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "block";
    }
}
</script>
<script>
hallistbuku(1);
hallistpinjaman(1);
function hallistbuku(nohal)
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
            document.getElementById("listbuku").innerHTML = this.responseText;
			document.getElementById("nomorlistbuku").innerHTML = nohal;
        }
    };
    xmlhttp.open("GET","menu/sirkulasibukuhandler.php?hal="+nohal,true);
    xmlhttp.send();
}
function hallistpinjaman(nohal)
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
            document.getElementById("listbukudp").innerHTML = this.responseText;
			document.getElementById("nomorlistbukudp").innerHTML = nohal;
        }
    };
    xmlhttp.open("GET","menu/sirkulasipinjamanhandler.php?hal="+nohal,true);
    xmlhttp.send();
}
</script>
<script>
var toggle1 = document.getElementById("togglebutton1");
var toggle2 = document.getElementById("togglebutton2");
var toggle3 = document.getElementById("togglebutton3");
toggle1.onclick = function(){
	var div = document.getElementById("listbuku");
	if(div.style.display != "none")
		div.style.display = "none";
	else
		div.style.display = "block";
};
toggle2.onclick = function(){
	var div = document.getElementById("listbukudp");
	if(div.style.display != "none")
		div.style.display = "none";
	else
		div.style.display = "block";
};
toggle3.onclick = function(){
	var div = document.getElementById("piechart");
	if(div.style.display != "none")
		div.style.display = "none";
	else
		div.style.display = "block";
};
</script>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
var data = google.visualization.arrayToDataTable([
	['Kategori', 'Jumlah Buku']
	<?php
	$sqlk = "SELECT * FROM kategori";
	$hasilk = mysqli_query($connection,$sqlk);
	while($fetchk = mysqli_fetch_array($hasilk))
	{
		echo ",['".$fetchk['nama']."',".$fetchk['jumlah']."]";
	}
	?>
]);
var options = {
    title: 'Data Buku dilihat dari kategori'
};
var chart = new google.visualization.PieChart(document.getElementById('piechart'));
chart.draw(data, options);
}
</script>
</head>
<body>
<button id="togglebutton1">Lihat semua buku</button>
<button id="togglebutton2">Lihat semua peminjaman buku</button>
<button id="togglebutton3">Lihat grafik kategori</button>
<div id="listbuku" style="display:none;">
</div>
<div id="myModal" class="modal">
<div class="modal-content" id="modalbox">
</div>
</div>
<div id="listbukudp" style="display:none;">
</div>
<div id="piechart" style="width:100%;height:500px;" style="display:none;margin:auto;">
</div>
</body>
</html>