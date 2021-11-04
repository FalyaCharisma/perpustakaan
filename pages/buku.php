<?php
include'../koneksi.php'; //menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data
?>
<link rel="stylesheet" type="text/css" href="../style.css">
<div id="label-page"><h3>Tampil Data Buku</h3></div>
<div id="content">
	<p id="tombol-tambah-container">
		<a href="buku-input.php" class="tombol">Tambah Buku</a>
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
				<th>ID Buku</th>
				<th>Judul</th>
				<th>Foto</th>
				<th>Penerbit</th>
				<th>Penulis</th>
				<th>Tahun</th>
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
					$sql = "SELECT * FROM tbbuku WHERE id_buku LIKE '%$pencarian%'
							OR judul LIKE '%$pencarian%'
							OR penerbit LIKE '%$pencarian%'
							OR  penulis LIKE '%$pencarian%'
							OR tahun_terbit LIKE '%$pencarian%'";
					$query = $sql;
					$queryJml = $sql;

				} else {
					$query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
					$queryJml = "SELECT * FROM tbbuku";
					$no = $posisi * 1;
				}
			}
			else{
				$query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbbuku";
				$no = $posisi * 1;
			}

			$q_tampil_buku = mysqli_query($db, $query);

			/*pengecekan apakah terdapat data di database, jika ada tampilkan*/
			if(mysqli_num_rows($q_tampil_buku)> 0){

				/*looping data sesuai yang ada di database */
				while ($r_tampil_buku=mysqli_fetch_array($q_tampil_buku)) {
					if(empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto' == '-'])){
						$foto = "admin-no-photo.jpg";
					} else {
						$foto = $r_tampil_buku['foto'];
					}
					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $r_tampil_buku['id_buku']; ?></td>
						<td><?php echo $r_tampil_buku['judul']; ?></td>
						<td><img src="images/<?php echo $foto; ?>" width=70px height=70px></td>
						<td><?php echo $r_tampil_buku['penerbit']; ?></td>
						<td><?php echo $r_tampil_buku['penulis']; ?></td>
						<td><?php echo $r_tampil_buku['tahun_terbit']; ?></td>
						<td>
							<div class="tombol-opsi-container"><a href="buku-edit.php?id=<?php echo $r_tampil_buku['id_buku'];?>" class="tombol">Edit</a>
							</div>
							<div class="tombol-opsi-container"><a href="../proses/buku-hapus.php?id=<?php echo $r_tampil_buku['id_buku'];?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a>
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
					echo "<a href=\"?p=buku&hal=$i\">$i</a>";
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