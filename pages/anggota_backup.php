<div id="label-page"><h3>Tampil Data Anggota</h3></div>
<div id="content">
	
	<p id="tombol-tambah-container"><a href="index.php?p=anggota-input" class="tombol">Tambah Anggota</a>
	<a href=><img src="print.png" height="50px" height="50px"></a>
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
	</FORM>
	</p>
	<table id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th id="label-opsi">Opsi</th>
		</tr>
		

		
		<?php
		$batas = 5;
		$hal = $_GET['hal'];
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
		}
		else {
			$posisi = ($hal - 1) * $batas;
		}	
		$nomor = 1;
		if(isset($_SERVER['REQUEST_METHOD'] == "POST")){
			$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
			if($pencarian != ""){
				$sql = "SELECT * FROM tbanggota WHERE nama LIKE '%$pencarian%'";
				$query = $sql;
				$queryJml = $sql;
			}
			else {
				$query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbanggota";
				$no = $posisi * 1;
			}			
		}
		else {
			$query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbanggota";
			$no = $posisi * 1;
		}
		
		$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC";
		$q_tampil_anggota = mysqli_query($db, $sql);
		while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)){
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_anggota['idanggota']; ?></td>
			<td><?php echo $r_tampil_anggota['nama']; ?></td>
			<td><?php echo $r_tampil_anggota['jeniskelamin']; ?></td>
			<td><?php echo $r_tampil_anggota['alamat']; ?></td>
			<td>
				<div class="tombol-opsi-container"><a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota'];?>" class="tombol">Cetak Kartu</a></div>
				<div class="tombol-opsi-container"><a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota'];?>" class="tombol">Edit</a></div>
				<div class="tombol-opsi-container"><a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>" class="tombol">Hapus</a></div>
			</td>			
		</tr>		
		<?php $nomor++; } ?>
		
		<tr>
			<td colspan=6 align="right">
			page 1 next
			</td>
		</tr>
		
	</table>
</div>