<?php
include'../koneksi.php';
$id_transaksi       =$_POST['id_transaksi'];
$id_anggota         =$_POST['id_anggota'];
$id_buku            =$_POST['id_buku'];
$tgl_pinjam         =$_POST['tgl_pinjam'];
$tgl_pengembalian   =$_POST['tgl_pengembalian']; 

    If(isset($_POST['simpan'])){ 
        extract($_POST);
        mysqli_query($db,
            "UPDATE tbanggota SET status='Sedang Meminjam' WHERE idanggota='$id_anggota'"
        );
    }
    If(isset($_POST['simpan'])){ 
        extract($_POST);
        mysqli_query($db,
            "UPDATE tbbuku SET status='Dipinjam' WHERE idbuku='$id_buku'"
        );
    }
    if(isset($_POST['simpan'])){
        extract($_POST);
        $sql_transaksi = 
        "INSERT INTO tbtransaksi
            VALUES('$id_transaksi','$id_anggota','$id_buku','$tgl_pinjam','$tgl_pengembalian')";
        $query = mysqli_query($db, $sql_transaksi);

	    header("location:../index.php?p=transaksi-peminjaman");
    }

?>