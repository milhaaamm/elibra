<?php
include "../koneksi/checknlog.php";
?>
<html>
<head>
<script>
function tampil(str) {
    if (str == "") {
        document.getElementById("tempatfetchmenu").innerHTML = "";
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
                document.getElementById("tempatfetchmenu").innerHTML = this.responseText;
				document.getElementById("tambahhak").style.display = "none";
            }
        };
        xmlhttp.open("GET","menu/kelolamenuhandler.php?fungsi="+str,true);
        xmlhttp.send();
    }
}
function hapus(id,idf)
{
	if (id == "") {
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
				alert("berhasil dihapus");
				tampil(idf);
            }
        };
        xmlhttp.open("GET","menu/hapushakaksesmenuuser.php?nolist="+id,true);
        xmlhttp.send();
    }
}
function tambah(idmenu)
{
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				document.getElementById("tambahhak").innerHTML = this.responseText;
				document.getElementById("tambahhak").style.display = "block";
            }
        };
        xmlhttp.open("GET","menu/tambahhakuser.php?idmenu="+idmenu,true);
        xmlhttp.send();
}
function tambahuser_input(noiduser,noidmenu)
{
	if (noiduser == "" && noidmenu == "") {
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
				alert("berhasil ditambahkan");
				tampil(noidmenu);
				tambah(noidmenu);
            }
        };
        xmlhttp.open("GET","menu/tambahhakuser_input.php?iduser="+noiduser+"&idmenu="+noidmenu,true);
        xmlhttp.send();
    }
}
/*
$("#hapusb").ready(function(){	
	$(this).click(function(){
		var identitas = $(this).attr("name");
		alert(identitas);
	});
	/*$(this).addEventListener('click', function()
	{
		var x = $(this).attr("name");
		alert(x);
	}, false);
	
	alert("jancuk2");/*
	function hapus(idl)
	{
		alert("clicked2");
		var identitas = idl;
		var hapusdaridb;
		hapusdaridb = $.ajax({url:"menu/hapushakaksesmenuuser.php",type:"post",data{nolist:identitas}});
		hapusdaridb.done(function(response,textStatus,jqXHR){
			alert("Berhasil menghapus");
		});
		hapusdaridb.fail(function(jqXHR,textStatus,errorThrown){
			alert("Gagal Menghapus, Error : "+textStatus,errorThrown);
		});
	}
});*/
</script>
</head>
<body>
<h2>Kelola Fungsi Elibra</h2>
<div id="listfungsi">
<ul>
<?php
$sql = "SELECT * FROM all_fungsi";
$hasil = mysqli_query($connection,$sql);
while($fetch = mysqli_fetch_array($hasil))
{
	$i = 0;
?>	
	<li id="<?php echo $fetch['_idf'];$idd[$i] = $fetch['_idf'];?>" ><button onclick="tampil(<?php echo $fetch['_idf'];?>)"><?php echo $fetch['nama'];?></button></li>
<?php 
$i++;
} 
?>
</ul>
</div>
<div id="tempatfetchmenu">
</div>
<div id="tambahhak">
</div>
</body>
</html>