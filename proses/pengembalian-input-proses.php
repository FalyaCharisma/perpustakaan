<?php
include'../koneksi.php'; //menyisipkan/mamanggil file koneksi.php untuk koneksi dengan database

$id_pengembalian = $_POST['id_pengembalian'];
$id_peminjaman = $_POST['id_peminjaman'];
$tanggal_pengembalian = $_POST['tanggal_pengembalian'];

if(isset($_POST['simpan'])){

	$sql = "INSERT INTO pengembalian VALUES('$id_pengembalian', '$id_peminjaman', '$tanggal_pengembalian')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=pengembalian");
}
?>