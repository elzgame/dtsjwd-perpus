<?php
include'../koneksi.php';
$idtransaksi = $_GET['id'];
$waktu_sekarang = date("Y-m-d");
mysqli_query($db,
"UPDATE tbtransaksi
SET tglkembali='$waktu_sekarang'
WHERE idtransaksi='$idtransaksi'"
) or die(mysqli_error($db));


header("location:../index.php?p=transaksi-peminjaman");
