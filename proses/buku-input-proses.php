<?php
include'../koneksi.php'; //menyisipkan/mamanggil file koneksi.php untuk koneksi dengan database

$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$penulis = $_POST['penulis'];
$tahun_terbit = $_POST['tahun_terbit'];

if(isset($_POST['simpan'])){
	extract($_POST);
	$nama_file = $_FILES['foto']['name'];

	if(!empty($nama_file)){
		//Baca lokasi file sementara dan nama file dari form (fupload)
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$lokasi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_buku.".".$tipe_file;

		$folder = "../images/$file_foto"; //Tentukan folder penyimpanan file
		move_uploaded_file($lokasi_file, "$folder"); //Apabila file berhasil diupload
	}else{
		$file_foto="-";
	}

	$sql = "INSERT INTO tbbuku VALUES('$id_buku', '$judul', '$penerbit', '$penulis', '$tahun_terbit', '$file_foto')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=buku");
}
?>