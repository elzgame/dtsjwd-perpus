<?php
include'../koneksi.php';

$idbuku		=$_POST['idbuku'];
$judulbuku			=$_POST['judulbuku'];
$kategori			=$_POST['kategori'];
$pengarang			=$_POST['pengarang'];
$penerbit			=$_POST['penerbit'];
$status			=$_POST['status'];

If(isset($_POST['simpan'])){
	
		extract($_POST);
		$nama_file   = $_FILES['foto']['name'];
		if(!empty($nama_file)){
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $idbuku.".".$tipe_file;
		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		@unlink ("$folder");
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto=$foto_awal;
	
	mysqli_query($db,
		"UPDATE tbbuku
		SET judulbuku='$judulbuku',kategori='$kategori',pengarang='$pengarang',penerbit='$penerbit',status='$status',foto='$file_foto'
		WHERE idbuku='$idbuku'"
	) or die(mysqli_error($db));
	header("location:../index.php?p=buku");
}
?>
