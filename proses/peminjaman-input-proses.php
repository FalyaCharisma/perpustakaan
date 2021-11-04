<?php
include'../koneksi.php'; //menyisipkan/mamanggil file koneksi.php untuk koneksi dengan database

$id_peminjaman = $_POST['id_peminjaman'];
$idanggota = $_POST['idanggota'];
$id_buku = $_POST['id_buku'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];

if(isset($_POST['simpan'])){

	$sql = "INSERT INTO peminjaman VALUES('$id_peminjaman', '$idanggota', '$id_buku', '$tanggal_pinjam')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=peminjaman");
}
?>