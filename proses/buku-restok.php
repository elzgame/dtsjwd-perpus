<?php
include'../koneksi.php';
$idtransaksi = $_GET['id'];

mysqli_query($db,
"UPDATE tbtransaksi
SET tglkembali='0000-00-00'
WHERE idtransaksi='$idtransaksi'"
) or die(mysqli_error($db));


header("location:../index.php?p=transaksi-pengembalian");
