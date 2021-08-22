<?php
include '../koneksi.php';
$idbuku = $_POST['idbuku'];
$judulbuku = $_POST['judulbuku'];
$kategori = $_POST['kategori'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$status = "Tersedia";

if (isset($_POST['simpan'])) {
	extract($_POST);
	$nama_file   = time() . $_FILES['foto']['name'];
	$imageFileType = $_FILES['foto']['type'];
	if ($imageFileType != "image/jpg" && $imageFileType != "image/png" && $imageFileType != "image/jpeg") {
		echo "Maaf, mohon masukkan gambar dengan format jpg / jpeg / png.";
		die;
	}
	if (!empty($nama_file)) {
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = "buku" . $idbuku . "." . $tipe_file;

		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file, "$folder");
	} else
		$file_foto = "-";

	$sql =
		"INSERT INTO tbbuku
		VALUES('$idbuku','$judulbuku','$kategori','$pengarang','$penerbit','$status','$file_foto')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=buku");
}
