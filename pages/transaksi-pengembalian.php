<div id="label-page">
    <h3>Transaksi Pengembalian</h3>
</div>
<div id="content">
 
    <div align="right">
        </p>
        <table id="tabel-tampil">
            <tr>
                <th id="label-tampil-no">No</td>
                <th>ID Transaksi</th> 
                <th>Nama</th> 
                <th>Judul Buku</th>
                <th>Tanggal Pengembalian</th> 
                <th>Status</th> 
            </tr>

            <?php
		$batas = 5;
		extract($_GET);
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
			$nomor = 1;
		}
		else {
			$posisi = ($hal - 1) * $batas;
			$nomor = $posisi+1;
		}	
		
		$query = "SELECT * FROM tbtransaksi INNER JOIN tbbuku on tbtransaksi.idbuku = tbbuku.idbuku INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota LIMIT $posisi, $batas";
		$queryJml = "SELECT * FROM tbtransaksi";
		$no = $posisi * 1;
		
		$q_tampil_transaksi = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_transaksi)>0)
		{
		while($r_tampil_transaksi=mysqli_fetch_array($q_tampil_transaksi)){
		?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_transaksi['idtransaksi']; ?></td> 
                <td><?php echo $r_tampil_transaksi['nama']; ?></td> 
                <td><?php echo $r_tampil_transaksi['judulbuku']; ?></td>
                <td><?php echo $r_tampil_transaksi['tglkembali']; ?></td>
                <td><?php echo $r_tampil_transaksi['status']; ?></td> 
                
            </tr>
            <?php $nomor++; } 
		}
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}?>
        </table>
        <?php
	if(isset($_POST['pencarian'])){
	}
	else{ ?>
        <div style="float: left;">
            <?php
			$jml = mysqli_num_rows(mysqli_query($db, $query));
			echo "<br>Jumlah Data : <b>$jml</b>";
		?>
        </div>
        <div class="pagination">
            <?php
				$jml_hal = ceil($jml/$batas);
				for($i=1; $i<=$jml_hal; $i++){
					if($i != $hal){
						echo "<a href=\"?p=transaksi-peminjaman&hal=$i\">$i</a>";
					}
					else {
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