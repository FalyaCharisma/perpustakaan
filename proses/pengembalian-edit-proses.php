<?php
include'../koneksi.php'; 

$id_pengembalian = $_POST['id_pengembalian'];
$id_peminjaman = $_POST['id_peminjaman'];
$tanggal_pengembalian = $_POST['tanggal_pengembalian'];

if(isset($_POST['simpan'])){ //cek jika ada form yang disubmit
	mysqli_query($db, "UPDATE tanggal_pengembalian
						SET id_peminjaman='$id_peminjaman', tanggal_pengembalian='$tanggal_pengembalian'
						WHERE id_pengembalian = '$id_pengembalian'");

	header("location:../index.php?p=id_pengembalian");
}
?>