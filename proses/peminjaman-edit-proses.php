<?php
include'../koneksi.php'; 

$id_peminjaman = $_POST['id_peminjaman'];
$idanggota = $_POST['idanggota'];
$id_buku = $_POST['id_buku'];
$tanggal_pinjam= $_POST['tanggal_pinjam'];

if(isset($_POST['simpan'])){ //cek jika ada form yang disubmit
	mysqli_query($db, "UPDATE peminjaman
						SET idanggota='$idanggota', id_buku='$id_buku', tanggal_pinjam='$tanggal_pinjam'
						WHERE id_peminjaman = '$id_peminjaman'");

	header("location:../index.php?p=peminjaman");
}
?>