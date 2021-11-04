<?php
include('../koneksi.php');
require("vendor/autoload.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select * from tbanggota");
$html = '<center><h3>Daftar Anggota</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>ID</th>
 <th>Nama</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 <th>Status</th>
 <th>Foto</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['idanggota']."</td>
 <td>".$row['nama']."</td>
 <td>".$row['jeniskelamin']."</td>
 <td>".$row['alamat']."</td>
 <td>".$row['status']."</td>
 <td>".$row['foto']."</td>
 </tr>";
 $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_anggota.pdf');
?>