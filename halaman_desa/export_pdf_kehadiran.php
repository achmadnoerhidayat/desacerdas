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
$query = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tbkehadiran.tanggal,'%d/%m/%Y') AS tgl_kehadiran, tbuser.nama, tbuser.jabatan 
										FROM tbkehadiran, tbuser 
										WHERE tbkehadiran.nip=tbuser.nip");
$html = '<center><h4><b>Laporan Kehadiran</b></h4></center>';
$html .= '<table border="1" cellspacing="0" width="100%">
												<tr>
													<td><b>NAMA LENGKAP</b></td>
													<td align="center"> <b>TANGGAL</b></td>
													<td align="center"> <b>MASUK</b></td>
													<td align="center"> <b>PULANG</b></td>													
												</tr>';
while($row = mysqli_fetch_array($query))
{

    $html .= "<tr>
        <td>".$row['nama']."<br>".$row['jabatan']."</td>
        <td align='center'>".$row['tgl_kehadiran']."</td>
        <td align='center'>".$row['masuk']."</td>
        <td align='center'>".$row['pulang']."</td>		
        </tr>";
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_kehadiran.pdf');
?>
