<?php
require_once("../dompdf/dompdf_config.inc.php");
require_once("../koneksi.php");

$nomor = 1;
$idanggota = $_GET['id'];
$html = "";
$query = "SELECT * FROM tbanggota WHERE idanggota = '$idanggota'";
$q_tampil_anggota = mysqli_query($db, $query) or die(mysqli_error($db));

$r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota);

if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-'))
  $foto = "admin-no-photo.jpg";
else
  $foto = $r_tampil_anggota['foto'];


$html .= "";

$nomor++;


$hasil =  "<html><head><link rel='stylesheet' type='text/css' href='../style.css'></head><body>
<center style='margin-top:30px;'>
<h1> KARTU ANGGOTA </h1>
<hr>
</center>
<table id='tabel-input' style='margin-left:auto; margin-right: auto;'>
		<tr>
			<td class='label-formulir'>FOTO</td>
			<td class='isian-formulir'>
			<img src='../images/$foto' width=70px height=75px>
			</td>
		</tr>
		<tr>
			<td class='label-formulir'>ID Anggota</td>
			<td class='isian-formulir'>" . $r_tampil_anggota['idanggota'] . "</td>
		</tr>
		<tr>
			<td class='label-formulir'>Nama</td>
			<td class='isian-formulir'>" . $r_tampil_anggota['nama'] . "</td>
		</tr>
		<tr>
			<td class='label-formulir'>Jenis Kelamin</td>
			<td class='isian-formulir'>" . $r_tampil_anggota['jeniskelamin'] . "</td>
		</tr>
		<tr>
			<td class='label-formulir'>Alamat</td>
			<td class='isian-formulir'>" . $r_tampil_anggota['alamat'] . "</td>
		</tr>
	</table>
</body></html>";


$dompdf = new DOMPDF();
$dompdf->load_html($hasil);
$dompdf->render();
ob_end_clean();
$dompdf->stream('laporan_' . $nama . '.pdf');
