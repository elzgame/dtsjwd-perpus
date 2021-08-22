<?php
include'../koneksi.php';
$id_transaksi=$_GET['id'];

$query = "SELECT * FROM tbtransaksi WHERE idtransaksi='$id_transaksi'";
$q_tampil_transaksi = mysqli_query($db, $query);
if(mysqli_num_rows($q_tampil_transaksi)>0){
	while($r_tampil_transaksi=mysqli_fetch_array($q_tampil_transaksi)){
		mysqli_query($db,
			"UPDATE tbbuku SET status='Tersedia' WHERE idbuku='$r_tampil_transaksi[idbuku]'"
		);

		mysqli_query($db,
		"UPDATE tbanggota SET status='Tidak Meminjam' WHERE idanggota='$r_tampil_transaksi[idanggota]'"
		);

		mysqli_query($db,
		"DELETE FROM tbtransaksi
		WHERE idtransaksi='$id_transaksi'"
		);
		
		header("location:../index.php?p=transaksi-peminjaman");	
	}
} 
?>