<?php
include "../koneksi/checknlog.php";

?>
<html>
<head>
<script>
$(document).ready(function()
{
	var request;
	$("#catatpeminjaman").submit(function(event){
		event.preventDefault();
		if (request) {
        request.abort();
		}
		var $form = $(this);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		$inputs.prop("disabled", true);
		request = $.ajax({
			url: "menu/mencatatp_input.php",
			type: "post",
			data: serializedData
		});
		request.done(function (response, textStatus, jqXHR){
			alert(response);
		});
		request.fail(function (jqXHR, textStatus, errorThrown){
			alert("The following error occurred: "+textStatus, errorThrown);
		});
		request.always(function () {
			$inputs.prop("disabled", false);
		});
	});
});
</script>
</head>
<body>
<h2>Catat Peminjaman Buku</h2>
<form id="catatpeminjaman">
<table width="100%">
<tr><th>No.Id peminjam</th><td><input type="text" name="noid"></td></tr>
<tr><th>Judul</th><td><input type="text" name="judul"></td></tr>
<tr><th>ISBN10</th><td><input type="text" name="isbn10"></td></tr>
<tr><th>ISBN13</th><td><input type="text" name="isbn13"></td></tr>
<tr><th>Kuantitas</th><td><input type="text" name="kuantitas"></td></tr>
<tr><td colspan="2"><input type="submit" value="Catat peminjaman"></td></tr>
</table>
</form>
</body>
</html>