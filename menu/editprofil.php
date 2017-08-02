<html>
<head>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/edituser.js"></script>
<script>
var check = 1; 
$(document).on('submit','#uploadimage',function(){
		if(check == 1)
		{
			var formData = new FormData($('#uploadimage')[0]);
			$.ajax({
			url: 'editprofil_imgupload.php',  //Server script to process data
			type: 'POST',
			xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if(myXhr.upload){ // Check if upload property exists
                myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
            }
            return myXhr;
			},
			//Ajax events
			beforeSend: beforeSendHandler,
			success: function(){$("#tmptgmbr").attr('src',this.responseText};
			error: errorHandler,
			// Form data
			data: formData,
			//Options to tell jQuery not to process data or worry about content-type.
			cache: false,
			contentType: false,
			processData: false
			});
		}
		else
		{
			alert("anda masih belum memenuhi persyaratan upload. (ukuran < 500 kb & file type gambar)");
		}
});
$(document).on('change','#img',function(){
	var file = this.files[0];
	var name = file.name;
	var size = file.size;
	var type = file.type;
	if(size > 500000)
	{
		alert("ukuran terlalu besar (>500kb) !");
		check = 0;
	}else
	if(type != "image/jpeg" || type != "image/png" || type != "image/gif")
	{
		alert("Bukan file gambar !");
		check = 0;
	}
});
</script>
</head>
<body>
<?php
include "../koneksi/checknlog.php";
$status = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM status WHERE nomor ='$_COOKIE[pengguna]'"));
$fetch = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM $status[sebagai] WHERE noid = '$_COOKIE[id]'"));
$fetch2 = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM datalogin WHERE nim = '$_COOKIE[id]'"));
?>
<h2>Profil</h2>
<form id="editprofil" enctype="multipart/form-data">
<table width="100%">
<tr><td rowspan="11" width="200px" id="tempatimg"><form id="uploadimage" enctype="multipart/form-data"><img id ="tmptgmbr" width="200px" height="200px" src="<?php echo $fetch['imgsrc'];?>">
	<br><input type="file" name="img" id="img"/>
	<br><input type="submit" /></form></td>
<td>Nama :</td><td><input type="text" name="namadep" placeholder="nama depan" value="<?php echo $fetch['namadep'];?>"><input type="text" name="namabel" placeholder="nama belakang" value="<?php echo $fetch['namabel'];?>"></td></tr>
<tr><td>Password :</td><td><input type="text" value="<?php echo $fetch2['password']; ?>" name="password"></td></tr>
<tr><td>No. Telp :</td><td><input type="text" value="<?php echo $fetch['notel']; ?>" name="notel"></td></tr>
<tr><td>Jenis kelamin :</td>
<td><input type="radio" name="jk" value="P" <?php if($fetch['jeniskelamin'] == 'P')echo "checked";?>>Perempuan
	<input type="radio" name="jk" value="L" <?php if($fetch['jeniskelamin'] == 'L')echo "checked";?>>Laki - Laki
</td></tr>
<tr><td>Tempat, tanggal lahir :</td><td><input type="text" name="ttl" value="<?php echo $fetch['ttl']; ?>"></td></tr>
<tr><td>Fakultas :</td><td><input type="text" value="<?php echo $fetch['fakultas']; ?>" name="fakultas"></td></tr>
<tr><td>Jurusan :</td><td><input type="text" value="<?php echo $fetch['jurusan']; ?>" name="jurusan"></td></tr>
<tr><td>Email :</td><td><input type="text" value="<?php echo $fetch['email']; ?>" name="email"></td></tr>
<tr><td>No. Telp :</td><td><input type="text" value="<?php echo $fetch['notel']; ?>" name="notel"></td></tr>
<tr><td>Catatan :</td><td><textarea name="catatan" style="width:100%;height:50px;"><?php echo $fetch['catatan']; ?></textarea></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" value="Ubah"></td></tr>
</table>
</form>
</body>
</html>