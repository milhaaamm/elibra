<?php
include "../koneksi/checknlog.php";
$id = isset($_GET['id']) ? $_GET['id'] : null;
$fetch1 = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM datalogin WHERE _id ='$id'"));
$fetch2 = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM status WHERE nomor ='$fetch1[status]'"));
$fetch3 = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM $fetch2[sebagai] WHERE noid = '$fetch1[nim]'"));
?>
<html>
<head>
<script>
</script>
<script src="js/jquery-3.1.1.min.js"></script>
<script>
/*
$("#tblubah").click(function(){
	alert("clicked");
	var namadep = $("#namadep").val();
	var namabel = $("#namabel").val();
	var noidlama = $("#noidlama").val();
	var password = $("#password").val();
	var noidbaru = $("#noidbaru").val();
	var jk = $("#jk").val();
	var ttl = $("#ttl").val();
	var fakultas = $("#fakultas").val();
	var jurusan = $("jurusan").val();
	var email = $("#email").val();
	var notel = $("#notel").val();
	var catatan = $("#catatan").val();
	var status = $("#status").val();
	var idu = $("#idu").val();
	var params = "namadep="+namadep+"&namabel="+namabel+"&noidlama="+noidlama+"&noidbaru="+noidbaru+"&password="+password+"&jk="+jk+"&ttl="+ttl+"&fakultas="+fakultas+"&jurusan="+jurusan+"&email="+email+"&notel="+notel+"&catatan="+catatan+"&status="+status+"&idu="+idu;
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				alert("updated?");
				closed();
			}
        };
        xmlhttp.open("POST","menu/listpenggunaedit_input.php",true);
        xmlhttp.send(params);
});
function ubah(){
	alert("clicked2");
	var namadep = $("#namadep").val();
	var namabel = $("#namabel").val();
	var noidlama = $("#noidlama").val();
	var password = $("#password").val();
	var noidbaru = $("#noidbaru").val();
	var jk = $("#jk").val();
	var ttl = $("#ttl").val();
	var fakultas = $("#fakultas").val();
	var jurusan = $("jurusan").val();
	var email = $("#email").val();
	var notel = $("#notel").val();
	var catatan = $("#catatan").val();
	var status = $("#status").val();
	var idu = $("#idu").val();
	var params = "namadep="+namadep+"&namabel="+namabel+"&noidlama="+noidlama+"&noidbaru="+noidbaru+"&password="+password+"&jk="+jk+"&ttl="+ttl+"&fakultas="+fakultas+"&jurusan="+jurusan+"&email="+email+"&notel="+notel+"&catatan="+catatan+"&status="+status+"&idu="+idu;
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				alert("updated?");
				closed();
			}
        };
        xmlhttp.open("POST","menu/listpenggunaedit_input.php",true);
        xmlhttp.send(params);
}
/*
	alert("is it ready yet?");
	var request;
	$("#editprofil").submit(function(event){
		alert("submitted");
		event.preventDefault();
		if (request) {
        request.abort();
		}
		var $form = $(this);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		$inputs.prop("disabled", true);
		request = $.ajax({
			url: "menu/listpenggunaedit_input.php",
			type: "post",
			data: serializedData
		});
		request.done(function (response, textStatus, jqXHR){
			alert("Berhasil mengganti data profil");
			closed();
		});
		request.fail(function (jqXHR, textStatus, errorThrown){
			alert("The following error occurred: "+textStatus, errorThrown);
		});
		request.always(function () {
			$inputs.prop("disabled", false);
		});
	});
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
*/
</script>
<link href="../style/modalbox.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="modal-header">
      <span class="close" onclick="closed()">&times;</span>
      <h2>Edit Profil</h2>
    </div>
    <div class="modal-body">
<form id="editprofil">
<table width="100%">
<tr><td rowspan="12" width="200px"><img width="200px" height="200px" src="<?php echo $fetch3['imgsrc'];?>"></td>
<td>Nama :</td><td><input type="text" name="namadep" placeholder="nama depan" value="<?php echo $fetch3['namadep'];?>"><input type="text" name="namabel" placeholder="nama belakang" value="<?php echo $fetch3['namabel'];?>"></td></tr>
<tr><td>Nomer Identitas Baru :</td><td><input type="text" value="<?php echo $fetch1['nim']; ?>" name="noidbaru"></td></tr>
<tr><td>Password :</td><td><input type="text" value="<?php echo $fetch1['password']; ?>" name="password"></td></tr>
<tr><td>Jenis kelamin :</td>
<td><input type="radio" name="jk" value="P" <?php if($fetch3['jeniskelamin'] == 'P')echo "checked";?>>Perempuan
	<input type="radio" name="jk" value="L" <?php if($fetch3['jeniskelamin'] == 'L')echo "checked";?>>Laki - Laki
</td></tr>
<tr><td>Tempat, tanggal lahir :</td><td><input type="text" name="ttl" value="<?php echo $fetch3['ttl']; ?>"></td></tr>
<tr><td>Fakultas :</td><td><input type="text" value="<?php echo $fetch3['fakultas']; ?>" name="fakultas"></td></tr>
<tr><td>Jurusan :</td><td><input type="text" value="<?php echo $fetch3['jurusan']; ?>" name="jurusan"></td></tr>
<tr><td>Email :</td><td><input type="text" value="<?php echo $fetch3['email']; ?>" name="email"></td></tr>
<tr><td>No. Telp :</td><td><input type="text" value="<?php echo $fetch3['notel']; ?>" name="notel"></td></tr>
<tr><td>Catatan :</td><td><textarea name="catatan" style="width:100%;height:50px;"><?php echo $fetch3['catatan']; ?></textarea></td></tr>
<tr><td>Status</td>
	<td><select name="status" id="editstatus">
	<option value="anggota" <?php if($fetch2['sebagai'] == 'anggota')echo "selected";?>>Anggota / Mahasiswa</option>
	<option value="pimpinan" <?php if($fetch2['sebagai'] == 'pimpinan')echo "selected";?>>Pimpinan</option>
	<option value="operator" <?php if($fetch2['sebagai'] == 'operator')echo "selected";?>>Operator</option>
	<option value="admin" <?php if($fetch2['sebagai'] == 'admin')echo "selected";?>>Admin</option>
		</select>
	</td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="Ubah"/></td></tr>
</table>
<input type="text" name="noidlama" value="<?php echo $fetch1['nim']; ?>" hidden />
<input type="text" name="idu" value="<?php echo $id;?>" hidden />
<input type="text" name="statuslama" value="<?php echo $fetch2['sebagai'];?>" hidden />
    </div>
    <div class="modal-footer">
      <h3>Nomor Pengguna : <?php echo $id;?></h3>
    </div>
</form>
<!--
<script>

$("#tblubah").click(function(){
	alert("clicked3");
	var namadep = $("#namadep").val();
	var namabel = $("#namabel").val();
	var noidlama = $("#noidlama").val();
	var password = $("#password").val();
	var noidbaru = $("#noidbaru").val();
	var jk = $("#jk").val();
	var ttl = $("#ttl").val();
	var fakultas = $("#fakultas").val();
	var jurusan = $("jurusan").val();
	var email = $("#email").val();
	var notel = $("#notel").val();
	var catatan = $("#catatan").val();
	var status = $("#status").val();
	var idu = $("#idu").val();
	var params = "namadep="+namadep+"&namabel="+namabel+"&noidlama="+noidlama+"&noidbaru="+noidbaru+"&password="+password+"&jk="+jk+"&ttl="+ttl+"&fakultas="+fakultas+"&jurusan="+jurusan+"&email="+email+"&notel="+notel+"&catatan="+catatan+"&status="+status+"&idu="+idu;
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				alert("updated?");
				closed();
			}
        };
        xmlhttp.open("POST","menu/listpenggunaedit_input.php",true);
        xmlhttp.send(params);
});
function ubah(){
	alert("clicked4");
	var namadep = $("#namadep").val();
	var namabel = $("#namabel").val();
	var noidlama = $("#noidlama").val();
	var password = $("#password").val();
	var noidbaru = $("#noidbaru").val();
	var jk = $("#jk").val();
	var ttl = $("#ttl").val();
	var fakultas = $("#fakultas").val();
	var jurusan = $("jurusan").val();
	var email = $("#email").val();
	var notel = $("#notel").val();
	var catatan = $("#catatan").val();
	var status = $("#status").val();
	var idu = $("#idu").val();
	var params = "namadep="+namadep+"&namabel="+namabel+"&noidlama="+noidlama+"&noidbaru="+noidbaru+"&password="+password+"&jk="+jk+"&ttl="+ttl+"&fakultas="+fakultas+"&jurusan="+jurusan+"&email="+email+"&notel="+notel+"&catatan="+catatan+"&status="+status+"&idu="+idu;
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				alert("updated?");
				closed();
			}
        };
        xmlhttp.open("POST","menu/listpenggunaedit_input.php",true);
        xmlhttp.send(params);
}
</script>
-->
</body>
</html>