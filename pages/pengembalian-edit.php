<?php 

include'../koneksi.php'; 
    $id_pengembalian = $_GET['id'];
    $q_tampil_pengembalian = mysqli_query($db, "SELECT * FROM pengembalian WHERE id_pengembalian= '$id_pengembalian'");
    $r_tampil_pengembalian = mysqli_fetch_array($q_tampil_pengembalian);
?>

<link rel="stylesheet" type="text/css" href="../style.css">
<div id="label-page"><h3>Edit Data Pengembalian</h3></div>
<div id="content">
    <form action="../proses/pengembalian-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">ID Pengembalian</td>
                <td class="isian-formulir"><input type="text" name="id_pengembalian" value="<?php echo $r_tampil_pengembalian['id_pengembalian'];?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">ID Peminjaman</td>
                <td class="isian-formulir"><input type="text" name="id_peminjaman" value="<?php echo $r_tampil_pengembalian['id_peminjaman'];?>" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir">Tanggal Kembali</td>
                <td class="isian-formulir"><input type="date" name="tanggal_pengembalian" value="<?php echo $r_tampil_pengembalian['tanggal_pengembalian'];?>" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>