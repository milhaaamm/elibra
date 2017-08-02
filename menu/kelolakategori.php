<html>
<head>
<script src="../js/jquery-3.1.1.min.js"></script>
<script>
$(document).ready(function(){
		update();
	$("#buttontambah").click(function(){
		var nama = $("#inputkategoribaru").val();
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
        xmlhttp.open("GET","menu/kelolakategori_input.php?nama="+nama,true);
        xmlhttp.send();
	});
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
				$("#inputkategoribaru").val("");
			}
        };
        xmlhttp.open("GET","menu/kelolakategori_handler.php",true);
        xmlhttp.send();
	}
});
</script>
</head>
<body>
<h2>Kelola Kategori Buku</h2>
<div id="tablekategori">
</div>
<table width="100%" border="1"><tr><td><input style="width:400px;" type="text" id="inputkategoribaru" value=""/><button id="buttontambah">Tambah Kategori</button></td></tr></table>
</body>
</html>