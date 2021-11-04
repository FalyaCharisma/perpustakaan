<?php
session_start();

include'koneksi.php';

$tgl = date('Y-m-d');

if(isset($_SESSION['sesi']) && !empty($_SESSION['sesi'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="logo-perpustakaan-container">
				<image id="logo-perpustakaan" src="book.png" border=0 style="border: 0; text-decoration: none;
				outline: none">
			</div>
			<div id="nama-alamat-perpustakaan-container">
				<div class="nama-alamat-perpustakaan">
					<h1> PERPUSTAKAAN FALYA</h1>
				</div>
				<div class="nama-alamat-perpustakaan">
					<h4>Jl. Lemba Abang No. 11, Telp: (021)555555</h4>
				</div>
			</div>
		</div>

		<div id="header2">
			<div id="nama-user">Hai <?php echo$_SESSION['sesi']; ?>!</div>
		</div>
		<div id="sidebar">
			<a href="index.php?p=beranda">Beranda</a>
			<p class="label-navigasi">Data Master</p>
			<ul>
				<li><a href="pages/anggota.php">Data Anggota</a></li>
				<li><a href="pages/buku.php">Data Buku</a></li>
			</ul>
			<p class="label-navigasi">Data Transaksi</p>
			<ul>
				<li><a href="pages/peminjaman.php">Transaksi Peminjaman</a></li>
				<li><a href="pages/pengembalian.php">Transaksi Pengembalian</a></li>
			</ul>
			<p class="label-navigasi" style="color: white;"><a href="index.php?p=transaksi-peminjaman" style="color: white;">
				Laporan Transaksi</a>
			</p>
			<a href="logout.php">Logout</a>
		</div>
		<div id="content-container">
			<div class="container">
				<div class="row"><br/><br><br><br><br><br><br><br><br>
					<h2 id="beranda-judul">SELAMAT DATANG DI SISTEM INFORMASI PERPUSTAKAAN</h2>
					<br/><br><br><br><br><br><br><br><br>
					<div class="col-md-10 col-md-offset-1" style="background-image: url('background.jpg');">
						<div class="col-md-4 col-md-offset-4">
							<div class="panel panel-warning login-panel" style="background-color:rgba(255,255,255,0.6);position: relative;">
								<div class="panel-footer">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				$pages_dir = 'pages';
				if(!empty($_GET['p'])){
					$pages = scandir($pages_dir,0);
					unset($pages[0], $pages[1]);

					$p = $_GET['p'];
					if(in_array($p. ' .php', $pages)){
						include($pages_dir.'/'.$p.' .php');
					}
					// else{
					// 	echo'Halaman Tidak Ditemukan';
					// }
				}
				else{
					include($pages_dir.'/beranda.php');
				}
			?>
		</div>
		<div id="footer"><h3>Sistem Informasi Perpustakaan Falya | Praktikum</h3></div>
	</div>
</body>
</html>
<?php
} else {
	echo"<script>alert('Anda Harus Login Dahulu'); </script>";
	header('location:login.php');
}
?>
