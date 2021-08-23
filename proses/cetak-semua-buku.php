<?php
require_once("../dompdf/dompdf_config.inc.php");
require_once("../koneksi.php");

$nomor = 1;
$html = "";
$query = "SELECT * FROM tbbuku";
$q_tampil_anggota = mysqli_query($db, $query);

if (mysqli_num_rows($q_tampil_anggota) > 0) {
  while ($r_tampil_buku = mysqli_fetch_array($q_tampil_anggota)) {
    if (empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-'))
      $foto = "admin-no-photo.jpg";
    else
      $foto = $r_tampil_buku['foto'];


    $html .= "<tr>
					<td>" . $nomor . "</td>
					<td>" . $r_tampil_buku['idbuku'] . "</td>
					<td>" . $r_tampil_buku['judulbuku'] . "</td>
					<td><img src='../images/$foto' width='70px' height='70px'></td>
					<td>" . $r_tampil_buku['kategori'] . "</td>
					<td>" . $r_tampil_buku['pengarang'] . "</td>
					<td>" . $r_tampil_buku['penerbit'] . "</td>
				</tr>";

    $nomor++;
  }
}

$hasil =  "<html><head><link rel='stylesheet' type='text/css' href='../style.css'></head><body>
<center style='margin-top:30px;'>
<h1> DATA SEMUA BUKU </h1>
<hr>
</center>
<table id='tabel-tampil' style='margin-bottom:50px; margin-top:30px;'>
<tr>
  <th id='label-tampil-no'>No</td>
  <th>ID Buku</th>
  <th>Foto</th>
  <th>Judul Buku</th>
  <th>Kategori</th>
  <th>Pengarang</th>
  <th>Penerbit</th>
</tr>" . $html . "</table></body></html>";

$dompdf = new DOMPDF();
$dompdf->load_html($hasil);
$dompdf->render();
ob_end_clean();
$dompdf->stream('laporan_' . $nama . '.pdf');
