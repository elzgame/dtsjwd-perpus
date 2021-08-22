<?php
	include "../koneksi.php";
	$id_transaksi=$_GET['id'];
    $query = "SELECT * FROM tbtransaksi INNER JOIN tbbuku on tbtransaksi.idbuku = tbbuku.idbuku INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota";
	
	$q_tampil_nota=mysqli_query($db, $query);
	$r_tampil_nota=mysqli_fetch_array($q_tampil_nota);
	if(empty($r_tampil_nota['foto'])or($r_tampil_nota['foto']=='-'))
		$foto = "admin-no-photo.jpg";
	else
		$foto = $r_tampil_nota['foto'];
?>
<link rel="stylesheet" type="text/css" href="../css/style.css"> 
<div id="label-page"><h3>Nota Peminjaman Buku</h3></div>
<div id="content">
	<table border="1px solid" id="tabel-tampil">
		<tr>
			<td class="label-formulir">FOTO</td>
			<td class="isian-formulir">
			<img src="../images/<?php echo $foto; ?>" width=70px height=75px>
			</td>
		</tr>
		<tr>
			<td class="label-formulir">ID Anggota</td>
			<td class="isian-formulir"><?php echo $r_tampil_nota['idanggota']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">ID Buku</td>
			<td class="isian-formulir"><?php echo $r_tampil_nota['idbuku']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama Anggota</td>
			<td class="isian-formulir"><?php echo $r_tampil_nota['nama']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul Buku Dipinjam</td>
			<td class="isian-formulir"><?php echo $r_tampil_nota['judulbuku']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggal Pinjam</td>
			<td class="isian-formulir"><?php echo $r_tampil_nota['tglpinjam']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggal Pengembalian</td>
			<td class="isian-formulir"><?php echo $r_tampil_nota['tglkembali']; ?></td>
		</tr>
	</table>
</div>
<script>
		window.print();
	</script>