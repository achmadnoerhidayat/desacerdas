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
$query = mysqli_query($koneksi,"select *, 
										DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl, 
										DATE_FORMAT(tgl_surat,'%d/%m/%Y') AS tgl1 
										FROM tbsurat_masuk where kode='$kd_kel'");
$html = '<center>Buku Agenda Surat Masuk BPD<br>DESA ".$nm_kel."<br>Kecamatan .$nm_kec.<br></center>';
$html .= '<table border="1" cellspacing="0" width="100%">
												<tr>
													<td align="center" rowspan="2"> <b>No</b></td>
													<td align="center" rowspan="2"> <b>Tanggal</b></td>
													<td align="center" colspan="4"> <b>Surat Masuk</b></td>
													<td rowspan="2"> <b>Keterangan</b></td>
												</tr>
												<tr>
													<td align="center"> <b>Nomor</b></td>
													<td align="center"> <b>Tanggal</b></td>
													<td> <b>Hal dan Isi Singkat</b></td>
													<td> <b>Tujuan</b></td>
												</tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{

    $html .= "<tr>
        <td><font size=2>".$no."</font></td>
        <td><font size=2>".$row['tgl']."</font></td>
        <td><font size=2>".$row['nomor']."</font></td>
        <td><font size=2>".$row['tgl1']."</font></td>
		<td><font size=2>".$row['isi']."</font></td>
		<td><font size=2>".$row['tujuan']."</font></td>
        <td><font size=2>".$row['keterangan']."</font></td>
        </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_surat_masuk.pdf');
?>
