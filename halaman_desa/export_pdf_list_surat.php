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
$query = mysqli_query($koneksi,"select * FROM tbbuatsurat");
$html = '<center><h4><b>Listing Layanan Surat</b></h4></center>';
$html .= '<table border="1" cellspacing="0" width="100%">
												<tr>
													<td align="center"> <b>No</b></td>
													<td> <b>NOMOR SURAT</b></td>
													<td> <b>TITLE SURAT</b></td>
												</tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{

    $html .= "<tr>
        <td align='center'><font size=2>".$no."</font></td>
        <td><font size=2>".$row['nomor_surat']."</font></td>
        <td><font size=2>".$row['title_surat']."</font></td>
        </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_list_surat.pdf');
?>
