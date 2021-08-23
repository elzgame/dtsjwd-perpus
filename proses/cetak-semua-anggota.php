<?php
require_once("../dompdf/dompdf_config.inc.php");
require_once("../koneksi.php");

$nomor = 1;
$html = "";
$query = "SELECT * FROM tbanggota";
$q_tampil_anggota = mysqli_query($db, $query);

if (mysqli_num_rows($q_tampil_anggota) > 0) {
  while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
    if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-'))
      $foto = "admin-no-photo.jpg";
    else
      $foto = $r_tampil_anggota['foto'];


    $html .= "<tr>
					<td>" . $nomor . "</td>
					<td>" . $r_tampil_anggota['idanggota'] . "</td>
					<td>" . $r_tampil_anggota['nama'] . "</td>
					<td><img src='../images/$foto' width='70px' height='70px'></td>
					<td>" . $r_tampil_anggota['jeniskelamin'] . "</td>
					<td>" . $r_tampil_anggota['alamat'] . "</td>
				</tr>";

    $nomor++;
  }
}

$hasil =  "<html><head><link rel='stylesheet' type='text/css' href='../style.css'></head><body>
<center style='margin-top:30px;'>
<h1> DATA SEMUA ANGGOTA </h1>
<hr>
</center>
<table id='tabel-tampil' style='margin-bottom:50px; margin-top:30px;'>
<tr>
  <th id='label-tampil-no'>No</td>
  <th>ID Anggota</th>
  <th>Nama</th>
  <th>Foto</th>
  <th>Jenis Kelamin</th>
  <th>Alamat</th>
</tr>" . $html . "</table></body></html>";

$dompdf = new DOMPDF();
$dompdf->load_html($hasil);
$dompdf->render();
ob_end_clean();
$dompdf->stream('laporan_' . $nama . '.pdf');
