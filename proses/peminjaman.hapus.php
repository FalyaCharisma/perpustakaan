<?php
include'../koneksi.php'; //menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data

$id_peminjaman = $_GET['id'];

mysqli_query($db, "DELETE FROM peminjaman WHERE id_peminjaman ='$id_peminjaman'");

header("location:../index.php?>p=peminjaman");
?>