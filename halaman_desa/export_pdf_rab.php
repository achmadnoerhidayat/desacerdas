<?php
session_start();
$kd_kel=$_SESSION['kodewil'];
include "config/koneksi.php";

$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$kd_prop=substr($kd_kel,0,2);
	$kd_kab=substr($kd_kel,0,5);
	$kd_kec=substr($kd_kel,0,8);

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_prop'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_prop=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kab'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kab=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];
	
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"SELECT 
									tahun, bidang, bidang_sub, kegiatan, 
									waktu, rincian from tbrab where kode='$kd_kel' order by id asc");
$html = '<center><h4>Rencana Anggaran Biaya<br>
DESA '.$nm_kel.'<br>
KECAMATAN '.$nm_kec.'</h4></center><br/>';
$html .= '<table border="1" cellspacing="0" width="100%">
        <tr>
            <th><font size=2><center>No</center></font></th>
            <th><font size=2><center>Tahun Anggaran</center></font></th>
            <th><font size=2>Bidang</font></th>
            <th><font size=2>Sub Bidang</font></th>
			<th><font size=2>Kegiatan</font></th>
			<th><font size=2><center>Waktu Pelaksanaan</center></font></th>
			<th><font size=2>Rincian Pendanaan</font></th>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
	

    $html .= "<tr>
        <td align='center'><font size=2>".$no."</font></td>
        <td align='center'><font size=2>".$row['tahun']."</font></td>
        <td><font size=2>".$row['bidang']."</font></td>
        <td><font size=2>".$row['bidang_sub']."</font></td>
		<td><font size=2>".$row['kegiatan']."</font></td>
		<td align='center'><font size=2>".$row['waktu']."</font></td>
		<td><font size=2>".$row['rincian']."</font></td>
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
$dompdf->stream('Rencana Anggaran Biaya.pdf');
?>
