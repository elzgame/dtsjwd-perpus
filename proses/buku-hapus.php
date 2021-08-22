<?php
include'../koneksi.php';
$idbuku = $_GET['id'];

mysqli_query($db,
	"DELETE FROM tbbuku
	WHERE idbuku='$idbuku'"
);


header("location:../index.php?p=buku");
?>