<div id="label-page">
	<h3>Tampil Data Buku Perpustakaan</h3>
</div>
<div id="content">
	<p id="tombol-tambah-container"><a href="index.php?p=buku-input" class="tombol">Tambah Buku</a>
	<div align="right">
		</p>
		<FORM CLASS="form-inline" METHOD="POST">
			<div align="right">
				<form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
		</FORM>
		<table id="tabel-tampil">
			<tr>
				<th id="label-tampil-no">No</td>
				<th>ID Buku</th>
				<th>Foto</th>
				<th>Judul Buku</th>
				<th>Kategori</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Status</th>
				<th>Opsi</th>

			</tr>



			<?php
			$batas = 10;
			extract($_GET);
			if (empty($hal)) {
				$posisi = 0;
				$hal = 1;
				$nomor = 1;
			} else {
				$posisi = ($hal - 1) * $batas;
				$nomor = $posisi + 1;
			}

			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
				if ($pencarian != "") {
					$sql = "SELECT * FROM tbbuku WHERE judulbuku LIKE '%$pencarian%'
						OR idbuku LIKE '%$pencarian%'
						OR kategori LIKE '%$pencarian%'
						OR pengarang LIKE '%$pencarian%'
						OR penerbit LIKE '%$pencarian%'
						OR status LIKE '%$pencarian%'";

					$query = $sql;
					$queryJml = $sql;
				} else {
					$query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
					$queryJml = "SELECT * FROM tbbuku";
					$no = $posisi * 1;
				}
			} else {
				$query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbbuku";
				$no = $posisi * 1;
			}

			//$sql="SELECT * FROM tbbuku ORDER BY idbuku DESC";
			$q_tampil_buku = mysqli_query($db, $query) or die(mysqli_error($db));
			if (mysqli_num_rows($q_tampil_buku) > 0) {
				while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
					if (empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-'))
						$foto = "admin-no-photo.jpg";
					else
						$foto = $r_tampil_buku['foto'];
			?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $r_tampil_buku['idbuku']; ?></td>
						<td><img src="images/<?php echo $foto; ?>" width=70px height=70px></td>
						<td><?php echo $r_tampil_buku['judulbuku']; ?></td>
						<td><?php echo $r_tampil_buku['kategori']; ?></td>
						<td><?php echo $r_tampil_buku['pengarang']; ?></td>
						<td><?php echo $r_tampil_buku['penerbit']; ?></td>
						<td><?php echo $r_tampil_buku['status']; ?></td>
						<td>
							<div class="tombol-opsi-container"><a href="index.php?p=buku-edit&id=<?php echo $r_tampil_buku['idbuku']; ?>" class="tombol">Edit</a></div>
							<div class="tombol-opsi-container"><a href="proses/buku-hapus.php?id=<?php echo $r_tampil_buku['idbuku']; ?>" onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a></div>
						</td>
					</tr>
			<?php $nomor++;
				}
			} else {
				echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
			} ?>
		</table>

		<?php
		if (isset($_POST['pencarian'])) {
			// if($_POST['pencarian']!=''){
			// 	echo "<div style=\"float:left;\">";
			// 	$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			// 	echo "Data Hasil Pencarian: <b>$jml</b>";
			// 	echo "</div>";
			// }
		} else { ?>
			<div style="float: left;">
				<?php
				$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
				echo "<br>Jumlah Data : <b>$jml</b>";
				?>
			</div>
			<div class="pagination">
				<?php
				$jml_hal = ceil($jml / $batas);
				for ($i = 1; $i <= $jml_hal; $i++) {
					if ($i != $hal) {
						echo "<a href=\"?p=buku&hal=$i\">$i</a>";
					} else {
						echo "<a class=\"active\">$i</a>";
					}
				}
				?>
			</div>
		<?php
		}
		?>
	</div>
</div>