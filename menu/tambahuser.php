<html>
<head>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/tambahuser.js"></script>
</head>
<body>
<form id="registrasi">
<h2>Tambah Akun Pengguna</h2>
<span class="diperlukan">*Kolom diperlukan untuk registrasi</span>
<table class="registrasi">
<tr><th>Nama Depan</th><td><input type="text" name="namadep" value=""><span class="diperlukan" id="errnama">*</span></td></tr>
<tr><th>Nama Belakang</th><td><input type="text" name="namabel" value=""></td></tr>
<tr><th>No. Identitas</th><td><input type="text" name="noid" value=""><span class="diperlukan" id="errid">*</span></td></tr>
<tr><th>Password</th><td><input type="password" name="password" value=""><span class="diperlukan" id="errpw">*</span></td></tr>
<tr><th>Jenis Kelamin</th>
	<td><input type="radio" name="jk" value="P" >Perempuan
		<input type="radio" name="jk" value="L" >Laki - Laki
		<span class="diperlukan" name="errjk">*</span>
	</td>
</tr>
<tr><th>Tempat Tanggal Lahir</th><td><input type="text" name="ttl" value=""></td></tr>
<tr><th>Fakultas</th><td><input type="text" name="fakultas" value=""></td></tr>
<tr><th>Jurusan</th><td><input type="text" name="jurusan" value=""></td></tr>
<tr><th>Email</th><td><input type="text" name="email" value=""></td></tr>
<tr><th>No. telp</th><td><input type="text" name="notel" value=""></td></tr>
<tr><th>Catatan</th><td><textarea name="catatan" value=""></textarea></td></tr>
<tr><th>Status</th>
	<td><select name="status">
	<option value="anggota" selected>Anggota / Mahasiswa</option>
	<option value="pimpinan">Pimpinan</option>
	<option value="operator">Operator</option>
	<option value="admin">Admin</option>
		</select>
	</td>
</tr>
<tr><td><input type="submit" value="Register"></td><td><input type="reset" value="Reset" onclick="reset()"></td></tr>
</table>
</form>
</body>
</html>