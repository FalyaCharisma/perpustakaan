<?php
include'../koneksi.php'; //menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data

$id_pengembalian = $_GET['id'];

mysqli_query($db, "DELETE FROM pengembalian WHERE id_pengembalian ='$id_pengembalian'");

header("location:../index.php?>p=pengembalian");
?>