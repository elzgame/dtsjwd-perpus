<?php
include'../koneksi.php';
$id_transaksi   =$_POST['id_transaksi'];
$id_anggota     =$_POST['id_anggota'];
$id_buku        =$_POST['id_buku'];
$tgl_pinjam     =$_POST['tgl_pinjam'];


    if(isset($_POST['simpan'])){
        extract($_POST);
        $sql = 
        "INSERT INTO tbtransaksi
            VALUES('$id_transaksi','$id_anggota','$id_buku','$tgl_pinjam', '0000-00-00')";
        mysqli_query($db, $sql) or die(mysqli_error($db));;

	    header("location:../index.php?p=transaksi-peminjaman");
    }

?>