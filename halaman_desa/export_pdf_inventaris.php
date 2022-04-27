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
$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl FROM tbinventaris where kode='$kd_kel'");
$html = '<center>Buku Inventaris Hasil Pembangunan<br>DESA ".$nm_kel."<br>Kecamatan .$nm_kec.<br></center>';
$html .= '<table border="1" cellspacing="0" width="100%">
        <tr>
			<th><font size="2">No</font></th>
            		<th><font size="2">Tanggal</font></th>
		       	<th><font size="2">Jenis/Nama Hasil Pembangunan</font></th>
		    	<th><font size="2">Volume</font></th>
			<th><font size="2">Biaya</font></th>
			<th><font size="2">Lokasi</font></th>
			<th><font size="2">Keterangan</font></th>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{


    $html .= "<tr>
        <td><font size=2>".$no."</font></td>
        <td><font size=2>".$row['tgl']."</font></td>
        <td><font size=2>".$row['nama']."</font></td>
        <td><font size=2>".$row['volume']."</font></td>
		<td><font size=2>".number_format($row['biaya'],0)."</font></td>
		<td><font size=2>".$row['lokasi']."</font></td>
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
$dompdf->stream('laporan_inventaris.pdf');
?>
