<?php
include'../koneksi.php';
$id_buku=$_GET['id'];

mysqli_query($db,
	"DELETE FROM tbbuku
	WHERE idbuku='$id_buku'"
);

header("location:../index.php?p=buku");
?>