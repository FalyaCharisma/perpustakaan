<?php 

include'../koneksi.php'; 
    $id_peminjaman = $_GET['id'];
    $q_tampil_peminjaman = mysqli_query($db, "SELECT * FROM peminjaman WHERE id_peminjaman= '$id_peminjaman'");
    $r_tampil_peminjaman = mysqli_fetch_array($q_tampil_peminjaman);
?>

<link rel="stylesheet" type="text/css" href="../style.css">
<div id="label-page"><h3>Edit Data Peminjaman</h3></div>
<div id="content">
    <form action="../proses/peminjaman-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">ID Peminjaman</td>
                <td class="isian-formulir"><input type="text" name="id_peminjaman" value="<?php echo $r_tampil_peminjaman['id_peminjaman'];?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">ID Anggota</td>
                <td class="isian-formulir"><input type="text" name="idanggota" value="<?php echo $r_tampil_peminjaman['idanggota'];?>" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir">ID Buku</td>
                <td class="isian-formulir"><input type="text" name="id_buku" value="<?php echo $r_tampil_peminjaman['id_buku'];?>" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir">Tanggal Pinjam</td>
                <td class="isian-formulir"><input type="date" name="tanggal_pinjam" value="<?php echo $r_tampil_peminjaman['tanggal_pinjam'];?>" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>