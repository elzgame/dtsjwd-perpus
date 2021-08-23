<?php
require_once("../dompdf/dompdf_config.inc.php");
require_once("../koneksi.php");

$nomor = 1;
$idtransaksi = $_GET['id'];
$html = "";
$query = "SELECT * FROM tbtransaksi INNER JOIN tbbuku on tbtransaksi.idbuku = tbbuku.idbuku INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota WHERE idtransaksi = '$idtransaksi'";
$q_tampil_transaksi = mysqli_query($db, $query) or die(mysqli_error($db));

$r_tampil_transaksi = mysqli_fetch_array($q_tampil_transaksi);

$html .= "";

$nomor++;


$hasil =  "<html><head><link rel='stylesheet' type='text/css' href='../style.css'></head><body>
<center style='margin-top:30px;'>
<h1> NOTA TRANSAKSI PEMINJAMAN </h1>
<hr>
</center>
<table id='tabel-input' style='margin-left:auto; margin-right: auto;'>

		<tr>
			<td class='label-formulir'>ID Transaksi</td>
			<td class='isian-formulir'>" . $r_tampil_transaksi['idtransaksi'] . "</td>
		</tr>
		<tr>
			<td class='label-formulir'>ID Anggota</td>
			<td class='isian-formulir'>" . $r_tampil_transaksi['idanggota'] . "</td>
		</tr>
		<tr>
			<td class='label-formulir'>Nama</td>
			<td class='isian-formulir'>" . $r_tampil_transaksi['nama'] . "</td>
		</tr>
		<tr>
			<td class='label-formulir'>ID Buku</td>
			<td class='isian-formulir'>" . $r_tampil_transaksi['idbuku'] . "</td>
		</tr>
		<tr>
			<td class='label-formulir'>Judul Buku</td>
			<td class='isian-formulir'>" . $r_tampil_transaksi['judulbuku'] . "</td>
		</tr>
		<tr>
			<td class='label-formulir'>Tanggal Peminjaman</td>
			<td class='isian-formulir'>" . $r_tampil_transaksi['tglpinjam'] . "</td>
		</tr>
	</table>
</body></html>";


$dompdf = new DOMPDF();
$dompdf->load_html($hasil);
$dompdf->render();
ob_end_clean();
$dompdf->stream('laporan_' . $nama . '.pdf');
