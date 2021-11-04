<?php
include'../koneksi.php'; 

$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$penulis = $_POST['penulis'];
$tahun_terbit = $_POST['tahun_terbit'];

if(isset($_POST['simpan'])){ //cek jika ada form yang disubmit
	extract($_POST);
	$nama_file = $_FILES['foto']['name'];

	if(!empty($nama_file)){
		//baca lokasi file sementara dan nama file dari form
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto =  $id_anggota.".".$tipe_file;

		$folder = "../images/$file_foto"; //tentukan folder untuk menyimpan file
		@unlink ("$folder"); //hapus foto yang lama, tanda @untuk menyembunyikan warning jika file tidak ditemukan
		move_uploaded_file($lokasi_file, $folder); //apabila file berhasil diupload
	} else {
		$file_foto=$foto_awal;
	}

	mysqli_query($db, "UPDATE tbbuku
						SET judul='$judul', penerbit='$penerbit', penulis='$penulis', tahun_terbit='$tahun_terbit', foto='$file_foto'
						WHERE id_buku = '$id_buku'");

	header("location:../index.php?p=buku");
}
?>