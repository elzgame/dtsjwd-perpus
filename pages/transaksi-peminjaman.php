<div id="label-page">
	<h3>Transaksi Pinjaman</h3>
</div>
<div id="content">

	<p id="tombol-tambah-container"><a href="index.php?p=transaksi-input" class="tombol">Transaksi Baru</a>
	<div align="right">
		</p>
		<table id="tabel-tampil">
			<tr>
				<th id="label-tampil-no">No</td>
				<th>ID Transaksi</th>
				<th>ID Anggota</th>
				<th>Nama</th>
				<th>ID Buku</th>
				<th>Judul Buku</th>
				<th>Tanggal Pinjaman</th>
				<th id="label-opsi">Opsi</th>
			</tr>

			<?php
			$batas = 5;
			extract($_GET);
			if (empty($hal)) {
				$posisi = 0;
				$hal = 1;
				$nomor = 1;
			} else {
				$posisi = ($hal - 1) * $batas;
				$nomor = $posisi + 1;
			}

			$query = "SELECT * FROM tbtransaksi INNER JOIN tbbuku on tbtransaksi.idbuku = tbbuku.idbuku INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbtransaksi";
			$no = $posisi * 1;
			// if($_SERVER['REQUEST_METHOD'] == "POST"){
			// $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
			// if($pencarian != ""){
			// $sql = "SELECT * FROM tbanggota WHERE nama LIKE '%$pencarian%'
			// 		OR idanggota LIKE '%$pencarian%'
			// 		OR jeniskelamin LIKE '%$pencarian%'
			// 		OR alamat LIKE '%$pencarian%'";

			// $query = $sql;
			// $queryJml = $sql;	

			// }
			// else {
			// $query = "SELECT * FROM tbtransaksi INNER JOIN tbbuku on tbtransaksi.idbuku = tbbuku.idbuku INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota LIMIT $posisi, $batas";
			// $queryJml = "SELECT * FROM tbtransaksi";
			// $no = $posisi * 1;
			// }			
			// }
			// else {
			// 	$query = "SELECT * FROM tbtransaksi INNER JOIN tbbuku on tbtransaksi.idbuku = tbbuku.idbuku INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota LIMIT $posisi, $batas";
			// 	$queryJml = "SELECT * FROM tbtransaksi";
			// 	$no = $posisi * 1;
			// }

			//$sql="SELECT * FROM tbtransaksi ORDER BY idtransaksi DESC";
			$q_tampil_transaksi = mysqli_query($db, $query);
			$countpage = 0;
			if (mysqli_num_rows($q_tampil_transaksi) > 0) {
				while ($r_tampil_transaksi = mysqli_fetch_array($q_tampil_transaksi)) {
					if ($r_tampil_transaksi['tglkembali'] != "0000-00-00") {
						$countpage++;
						continue;
					}
					// if(empty($r_tampil_transaksi['foto'])or($r_tampil_transaksi['foto']=='-'))
					// 	$foto = "admin-no-photo.jpg";
					// else
					// 	$foto = $r_tampil_transaksi['foto'];
			?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $r_tampil_transaksi['idtransaksi']; ?></td>
						<td><?php echo $r_tampil_transaksi['idanggota']; ?></td>
						<td><?php echo $r_tampil_transaksi['nama']; ?></td>
						<td><?php echo $r_tampil_transaksi['idbuku']; ?></td>
						<td><?php echo $r_tampil_transaksi['judulbuku']; ?></td>
						<td><?php echo $r_tampil_transaksi['tglpinjam']; ?></td>
						<td>
							<div class="tombol-opsi-container"><br><a target="_blank" href="" class="tombol">Cetak Nota</a></div><br><br> <br>
							<div class="tombol-opsi-container"><a href="proses/buku-pengembalian.php?id=<?php echo $r_tampil_transaksi['idtransaksi']; ?>" onclick="return confirm ('Apakah Anda Yakin Akan Memasukkan Data Ini ke Daftar Pengembalian?')" class="tombol">Pengembalian</a></div>
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
				$jml = $countpage;
				echo "<br>Jumlah Data : <b>$jml</b>";
				?>
			</div>
			<div class="pagination">
				<?php
				$jml_hal = ceil($jml / $batas);
				for ($i = 1; $i <= $jml_hal; $i++) {
					if ($i != $hal) {
						echo "<a href=\"?p=transaksi-peminjaman&hal=$i\">$i</a>";
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