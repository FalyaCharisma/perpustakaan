<link rel="stylesheet" type="text/css" href="../style.css">

<div id="label-page"><h3>Input Data Peminjaman</h3></div>
<div id="content">
	<form action="../proses/peminjaman-input-proses.php" method="post" enctype="multipart/form-data">
		
		<table id="tabel-input">
			<tr>
				<td class="label-formulir">ID Peminjaman</td>
				<td class="isian-formulir"><input type="text" name="id_peminjaman" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir">ID Anggota</td>
				<td class="isian-formulir"><input type="text" name="idanggota" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir">ID Buku</td>
				<td class="isian-formulir"><input type="text" name="id_buku" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir">Tanggal Pinjam</td>
				<td class="isian-formulir"><input type="date" name="tanggal_pinjam" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir"></td>
				<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
			</tr>
		</table>
	</form>
</div>