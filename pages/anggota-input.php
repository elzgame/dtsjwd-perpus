<div id="label-page"><h3>Input Data Anggota</h3></div>
<div id="content">
	<form action="proses/anggota-input-proses.php" method="post" enctype="multipart/form-data">
	
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">FOTO</td>
			<td class="isian-formulir"><input required type="file" name="foto" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">ID Anggota</td>
			<td class="isian-formulir"><input required type="text" name="id_anggota" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama</td>
			<td class="isian-formulir"><input required type="text" name="nama" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Jenis Kelamin</td>
			<td class="isian-formulir"><input required type="radio" name="jenis_kelamin" value="Pria">Pria</label></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input required type="radio" name="jenis_kelamin" value="Wanita">Wanita</td>
		</tr>
		<tr>
			<td class="label-formulir">Alamat</td>
			<td class="isian-formulir"><textarea required rows="2" cols="40" name="alamat" class="isian-formulir isian-formulir-border"></textarea></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input required type="submit" name="simpan" value="simpan" class="tombol"></td>
		</tr>
	</table>
	</form>
</div>