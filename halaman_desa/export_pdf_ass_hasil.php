<?php
session_start();
$kd_kel=$_SESSION['kodewil'];
include "config/koneksi.php";

$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$kd_kec=substr($kd_kel,0,8);
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];
	
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"SELECT * FROM vw_ujian WHERE id_kel='$kd_kel'");
$html = '<center><h4><b>Hasil Ujian/Sertifikasi</b></h4></center>';
$html .= '<table border="1" cellspacing="0" width="100%">
												<tr>
													<td><b>NAMA PELAKSANA UJIAN</b></td>
													<td><b>PAKET SOAL</b></td>													
													<td align="center"> <b>TANGGAL UJIAN</b></td>
													<td align="center"> <b>SKOR/NILAI</b></td>
													<td align="center"> <b>STATUS</b></td>													
												</tr>';

while($row = mysqli_fetch_array($query))
{

    $html .= "<tr>
        <td>".$row['nama']."<br>".$row['email']."</td>
        <td>".$row['nama']."</td>		
        <td align='center'>".$row['tanggal']."</td>
        <td align='center'>".$row['nilai']."</td>
        <td align='center'>".$row['status']."</td>		
        </tr>";
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-hasil-ujian.pdf');
?>
