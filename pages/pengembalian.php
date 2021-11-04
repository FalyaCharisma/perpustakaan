<?php
include'../koneksi.php'; //menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data
?>
<link rel="stylesheet" type="text/css" href="../style.css">
<div id="label-page"><h3>Tampil Data Pengembalian</h3></div>
<div id="content">
	<p id="tombol-tambah-container">
		<a href="pengembalian-input.php" class="tombol">Tambah Pengembalian</a>
		<a target="_blank" href="cetak.php"><img src="printer.png" height="35px"></a>
		<div class="form-inline">
			<div alignnment="right">
				<form method=post>
					<input type="text" name="pencarian">
					<input type="submit" name="search" value="search" class="tombol">
				</form>
			</div>
		</div>
	</p>
	<table id="tabel-tampil">
		<thead>
			<tr>
				<th id="label-tampil-no">No</td>
				<th>ID Pengembalian</th>
				<th>ID Peminjaman</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Kembali</th>
				<th id="label-opsi">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$batas=5;
			extract($_GET);
			if(empty($hal)){
				$posisi = 0;
				$hal = 1;
				$nomor = 1;
			} else {
				$posisi = ($hal-1) * $batas;
				$nomor = $posisi+1;
			}

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
				if($pencarian != ""){
					$sql = "SELECT pengembalian.id_pengembalian, peminjaman.id_peminjaman,peminjaman.tanggal_pinjam, pengembalian.tanggal_pengembalian FROM pengembalian JOIN peminjaman ON pengembalian.id_peminjaman = peminjaman.id_peminjaman WHERE 
							pengembalian.id_pengembalian LIKE '%$pencarian'
							OR peminjaman.id_peminjaman LIKE '%$pencarian%'
							OR peminjaman.tanggal_pinjam LIKE '%$pencarian%'
							OR pengembalian.tanggal_pengembalian LIKE '%$pencarian%'";
					$query = $sql;
					$queryJml = $sql;

				} else {
					$query = "SELECT pengembalian.id_pengembalian, peminjaman.id_peminjaman,peminjaman.tanggal_pinjam, pengembalian.tanggal_pengembalian FROM pengembalian JOIN peminjaman ON pengembalian.id_peminjaman = peminjaman.id_peminjaman LIMIT $posisi, $batas";
					$queryJml = "SELECT * FROM pengembalian";
					$no = $posisi * 1;
				}
			}
			else{
				$query = "SELECT pengembalian.id_pengembalian, peminjaman.id_peminjaman,peminjaman.tanggal_pinjam, pengembalian.tanggal_pengembalian FROM pengembalian JOIN peminjaman ON pengembalian.id_peminjaman = peminjaman.id_peminjaman LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM pengembalian";
				$no = $posisi * 1;
			}

			$q_tampil_pengembalian = mysqli_query($db, $query);

			/*pengecekan apakah terdapat data di database, jika ada tampilkan*/
			if(mysqli_num_rows($q_tampil_pengembalian)> 0){

				/*looping data sesuai yang ada di database */
				while ($r_tampil_pengembalian=mysqli_fetch_array($q_tampil_pengembalian)) {
					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $r_tampil_pengembalian['id_pengembalian']; ?></td>
						<td><?php echo $r_tampil_pengembalian['id_peminjaman']; ?></td>
						<td><?php echo $r_tampil_pengembalian['tanggal_pinjam']; ?></td>
						<td><?php echo $r_tampil_pengembalian['tanggal_pengembalian']; ?></td>
						<td>
							<div class="tombol-opsi-container"><a href="pengembalian-edit.php?id=<?php echo $r_tampil_pengembalian['id_pengembalian'];?>" class="tombol">Edit</a>
							</div>
							<div class="tombol-opsi-container"><a href="../proses/pengembalian-hapus.php?id=<?php echo $r_tampil_pengembalian['id_pengembalian'];?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a>
							</div>
						</td>
					</tr>
					<?php 
							$nomor++;
				} //selesai looping while 
			}
			else{
				echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
			}
			?>
		</tbody>
	</table>

	<?php
	if(isset($_POST['pencarian'])){
		if($_POST['pencarian']!=' '){
			echo "<div style=\"float:left;\">";
			$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			echo "Data Hasil Pencarian: <b>$jml</b>";
		}
	} else {
	?>
		<div style="float: left;">
			<?php
				$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
				echo "Jumlah Data : <b>$jml</b>";
			?>
		</div>
		</div>
		<div class="pagination">
			<?php 
			$jml_hal = ceil($jml / $batas);
			for($i = 1; $i <= $jml_hal; $i++){
				if($i != $hal){
					echo "<a href=\"?p=pengembalian&hal=$i\">$i</a>";
				} else {
					echo "<a class=\"active\">$i</a>";
				}
			}
			?>
		</div>
	<?php
	}
	?>
</div>