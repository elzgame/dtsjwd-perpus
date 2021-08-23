<?php
require_once("../dompdf/dompdf_config.inc.php");
require_once("../koneksi.php");

$nomor = 1;
$html = "";
$query = "SELECT * FROM tbtransaksi INNER JOIN tbbuku on tbtransaksi.idbuku = tbbuku.idbuku INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota";
$q_tampil_anggota = mysqli_query($db, $query);

if (mysqli_num_rows($q_tampil_anggota) > 0) {
  while ($r_tampil_transaksi = mysqli_fetch_array($q_tampil_anggota)) {
    if ($r_tampil_transaksi['tglkembali'] != "0000-00-00") {
      $countpage++;
      continue;
    }
    if (empty($r_tampil_transaksi['foto']) or ($r_tampil_transaksi['foto'] == '-'))
      $foto = "admin-no-photo.jpg";
    else
      $foto = $r_tampil_transaksi['foto'];


    $html .= "<tr>
					<td>" . $nomor . "</td>
					<td>" . $r_tampil_transaksi['idtransaksi'] . "</td>
					<td>" . $r_tampil_transaksi['idanggota'] . "</td>
					<td>" . $r_tampil_transaksi['nama'] . "</td>
					<td>" . $r_tampil_transaksi['idbuku'] . "</td>
					<td>" . $r_tampil_transaksi['judulbuku'] . "</td>
					<td>" . $r_tampil_transaksi['tglpinjam'] . "</td>
				</tr>";

    $nomor++;
  }
}

$hasil =  "<html><head><link rel='stylesheet' type='text/css' href='../style.css'></head><body>
<center style='margin-top:30px;'>
<h1> DATA SEMUA TRANSAKSI PEMINJAMAN </h1>
<hr>
</center>
<table id='tabel-tampil' style='margin-bottom:50px; margin-top:30px;'>
<tr>
<th id='label-tampil-no'>No</td>
<th>ID Transaksi</th>
<th>ID Anggota</th>
<th>Nama</th>
<th>ID Buku</th>
<th>Judul Buku</th>
<th>Tanggal Pinjaman</th>
</tr>" . $html . "</table></body></html>";

$dompdf = new DOMPDF();
$dompdf->load_html($hasil);
$dompdf->render();
ob_end_clean();
$dompdf->stream('laporan_' . $nama . '.pdf');
