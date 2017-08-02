<?php
include "../koneksi/checknlog.php";
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/modalbox.css" />
<script src="js/jquery-3.1.1.min.js"></script>
<script>
hal(1);
var halaman = 1;
function hal(nohal)
{
	var halaman = nohal;
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
            document.getElementById("tempatlistpengguna").innerHTML = this.responseText;
			document.getElementById("nomor").innerHTML = nohal;
        }
    };
    xmlhttp.open("GET","menu/listpengguna_handler.php?hal="+nohal,true);
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
				$("#tempatlistpengguna").html(this.responseText);
			}
        };
        xmlhttp.open("GET","menu/listpengguna_handler.php?hal="+halaman,true);
        xmlhttp.send();
	}
$(document).on('change','#editstatus',function(){
	alert("PERHATIAN, Jika status diubah, maka menu akan direset ulang sesuai status barunya !,Hak akses khusus akan di hilangkan!. Mohon hubungi admin untuk info lebih lanjut.");
});
$(document).on('submit','#editprofil',function(event){
		event.preventDefault();
		var $form = $(this);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		$inputs.prop("disabled", true);
		var request = $.ajax({
			url: "menu/listpenggunaedit_input.php",
			type: "post",
			data: serializedData
		});
		request.done(function (response, textStatus, jqXHR){
			alert("Berhasil diubah");
			update();
			closed();
		});
		request.fail(function (jqXHR, textStatus, errorThrown){
			alert("The following error occurred: "+textStatus+" : "+errorThrown);
		});
		request.always(function () {
			$inputs.prop("disabled", false);
		});
});
function closed()
{
	modal.style.display = "none";
}
var modal = document.getElementById('myModal');
var span = document.getElementsByClassName('close');
function edituser(id) {
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
        xmlhttp.open("GET","menu/listpengguna_edit.php?id="+id,true);
        xmlhttp.send();
    modal.style.display = "block";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "block";
    }
}
function hapus(no){
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				alert("Berhasil Dihapus");
			}
        };
        xmlhttp.open("GET","menu/listpengguna_hapus.php?no="+no,true);
        xmlhttp.send();
	}
</script>
</head>
<body>
<h2>List Pengguna OLibra</h2>
<table><tr><td><h3>Page : </h3></td><td><h3><div id="nomor"></div></h3></td></tr></table>
<div id="tempatlistpengguna">
</div>
<?php
$sql = "SELECT * FROM databukudp";
$result = mysqli_query($connection,$sql);
$count = mysqli_num_rows($result)/10;
for($i = 1;$i <= $count+1;$i++)
{
	echo '<a style="color:black;" href="#" id="'.$i.'" onclick="hal('.$i.')">'.$i.'</a>     ';
}
?>
<div id="myModal" class="modal">
<div class="modal-content" id="modalbox">
</div>
</div>
</body>
</html>