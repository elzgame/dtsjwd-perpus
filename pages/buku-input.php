<div id="label-page"><h3>Input Data Buku</h3></div>
<div id="content">
	<form action="proses/buku-input-proses.php" method="post" enctype="multipart/form-data">
	
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">FOTO</td>
			<td class="isian-formulir"><input required type="file" name="foto" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">ID Buku</td>
			<td class="isian-formulir"><input required type="text" name="idbuku" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul Buku</td>
			<td class="isian-formulir"><input required type="text" name="judulbuku" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Kategori</td>
			<td class="isian-formulir"><input required type="text" name="kategori" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Pengarang</td>
			<td class="isian-formulir"><input required type="text" name="pengarang" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Penerbit</td>
			<td class="isian-formulir"><input required type="text" name="penerbit" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input required type="submit" name="simpan" value="simpan" class="tombol"></td>
		</tr>
	</table>
	</form>
</div>